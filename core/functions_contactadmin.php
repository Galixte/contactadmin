<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/
namespace rmcgirr83\contactadmin\core;

use phpbb\exception\http_exception;

class functions_contactadmin
{
	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\cache\service */
	protected $cache;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\db\driver\driver */
	protected $db;

	/** @var \phpbb\log\log */
	protected $log;

	/** @var \phpbb\user */
	protected $user;

	/** @var string phpBB root path */
	protected $root_path;

	/** @var string phpEx */
	protected $php_ext;

	public function __construct(
			\phpbb\auth\auth $auth,
			\phpbb\cache\service $cache,
			\phpbb\config\config $config,
			\phpbb\db\driver\driver_interface $db,
			\phpbb\log\log $log,
			\phpbb\user $user,
			$root_path,
			$php_ext)
	{
		$this->auth = $auth;
		$this->cache = $cache;
		$this->config = $config;
		$this->db = $db;
		$this->log = $log;
		$this->user = $user;
		$this->root_path = $root_path;
		$this->php_ext = $php_ext;
		$this->contact_constants = $this->contact_constants();

		if (!class_exists('messenger'))
		{
			include($this->root_path . 'includes/functions_messenger.' . $this->php_ext);
		}
	}

	/**
	* contact_change_auth
	* thanks to poppertom69 for the idea..and some of the code
	*
	*/
	public function contact_change_auth($bot_id, $mode = 'replace', $bkup_data = false)
	{
		switch($mode)
		{
			// change our user to one we chose in the ACP settings
			// for posting or PM'ing only
			case 'replace':

				$bkup_data = array(
					'user_backup'	=> $this->user->data,
				);

				// sql to get the bots info
				$sql = 'SELECT *
					FROM ' . USERS_TABLE . '
					WHERE user_id = ' . (int) $bot_id;
				$result	= $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				// reset the current users info to that of the bot
				$this->user->data = array_merge($this->user->data, $row);

				unset($row);

				return $bkup_data;

			break;

			// now we restore the users stuff
			case 'restore':

				$this->user->data = $bkup_data['user_backup'];

				unset($bkup_data);
			break;
		}
	}

	/**
	* contact_check
	* @param $forum_id, the forum id selected in ACP
	* @param $forum_name returned from contact_check_forum
	* ensures postable forum and correct "bot"
	*/
	public function contact_check($forum_id = false, $bot_id = false, $mode, $method = false)
	{
		// the servers url
		$server_url = generate_board_url();

		switch($mode)
		{
			// check for a valid forum
			case 'contact_check_forum':

				$sql = 'SELECT forum_name
				FROM ' . FORUMS_TABLE . '
				WHERE forum_id = ' . (int) $forum_id . '
				AND forum_type = ' . FORUM_POST;
				$result = $this->db->sql_query($sql);

				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				// we didn't get a result
				// send an email if board enabled
				if (!$row && $this->config['email_enable'])
				{
					// send an email to the board default
					$email_template = '@rmcgirr83_contactadmin/contact_error_forum';
					$email_message = sprintf($this->user->lang('CONTACT_BOT_FORUM_MESSAGE'), $this->user->data['username'], $this->config['sitename'], $server_url);
					$this->contact_send_email($email_template, $email_message);

					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the error log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_FORUM_INVALID',  time(), array($forum_id, $row));

					// show a message to the user
					$message = $this->user->lang('CONTACT_BOT_ERROR') . '<br /><br />' . sprintf($this->user->lang('RETURN_INDEX'), '<a href="' . append_sid("{$this->root_path}index.$phpEx") . '">', '</a>');

					throw new http_exception(503, $message);
				}
				elseif (!$row)
				{
					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the error log
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_FORUM_INVALID',  time(), array($forum_id, $row));

					$message = sprintf($this->user->lang['CONTACT_DISABLED'], '<a href="mailto:' . $this->config['board_contact'] . '">', '</a>');


					throw new http_exception(503, $message);
				}

			break;

			// check for a valid bot
			case 'contact_check_bot':

				$sql = 'SELECT username
					FROM ' . USERS_TABLE . '
						WHERE user_id = ' . (int) $bot_id;
				$result = $this->db->sql_query($sql);
				$row = $this->db->sql_fetchrow($result);
				$this->db->sql_freeresult($result);

				// we didn't get a result
				// send an email if board enabled
				if (!$row && $this->config['email_enable'])
				{
					// send an email to the board default
					$email_template = '@rmcgirr83_contactadmin/contact_error_user';
					$email_message = sprintf($this->user->lang('CONTACT_BOT_USER_MESSAGE'), $this->user->data['username'], $this->config['sitename'], $server_url);
					$this->contact_send_email($email_template, $email_message);

					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the log error table
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_BOT_INVALID',  time(), array($bot_id, $row));

					// show a message to the user
					$message = $this->user->lang('CONTACT_BOT_ERROR') . '<br /><br />' . sprintf($this->user->lang('RETURN_INDEX'), '<a href="' . append_sid("{$this->root_path}index.$phpEx") . '">', '</a>');

					throw new http_exception(503, $message);
				}
				elseif (!$row)
				{
					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the log error table
					$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_CONTACT_BOT_INVALID',  time(), array($bot_id, $row));

					// show a message to the user
					$message = sprintf($this->user->lang('CONTACT_DISABLED'), '<a href="mailto:' . $this->config['board_contact'] . '">', '</a>');

					throw new http_exception(503, $message);
				}
			break;

			case 'contact_nobody':

				//this is only called if there are no contact admins available
				// for pm'ing or for emailing to per the preferences set by the admin user in their profiles

				if ($method == CONTACT_METHOD_EMAIL)
				{
					$error = $this->user->lang('EMAIL');
				}
				else
				{
					$error = $this->user->lang('PRIVATE_MESSAGE');
				}

				// only send an email if the board allows it
				if ($this->config['email_enable'])
				{
					// send an email to the board default
					$email_template = '@rmcgirr83_contactadmin/contact_error_user';
					$email_message = sprintf($this->user->lang('CONTACT_BOT_NONE'), $this->user->data['username'], $this->config['sitename'], $error, $server_url);

					$this->contact_send_email($email_template, $email_message);

					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the log error table
					$this->log->add('admin', $this->user->data['username'], $this->user->ip, 'LOG_CONTACT_NONE',  time(), array($error));

					// show a message to the user
					$message = sprintf($this->user->lang('CONTACT_BOT_ERROR'), '<br /><br />' . sprintf($this->user->lang['RETURN_INDEX'], '<a href="' . append_sid("{$this->root_path}index.$phpEx") . '">', '</a>'));

					throw new http_exception(503, $message);
				}
				else
				{
					// disable the extension
					$this->config->set('contactadmin_enable', 0);

					// add an entry into the log error table
					$this->log->add('admin', $this->user->data['username'], $this->user->ip, 'LOG_CONTACT_NONE',  time(), array($error));

					// show a message to the user
					$message = sprintf($this->user->lang('CONTACT_DISABLED'), '<a href="mailto:' . $this->config['board_contact'] . '">', '</a>');

					throw new http_exception(503, $message);
				}
			break;
		}
		return;
	}

	/**
	 * contact_send_email
	 * @param $email_template, the email template to use
	 * @param $email_message, the message we are sending
	 * sends an email to the board default if an error occurs
	 */
	private function contact_send_email($email_template, $email_message)
	{
		// don't use the queue send the email immediately if not sooner
		$messenger = new \messenger(false);

		// Email headers
		$messenger->headers('X-AntiAbuse: Board servername - ' . $this->config['server_name']);
		$messenger->headers('X-AntiAbuse: User_id - ' . $this->user->data['user_id']);
		$messenger->headers('X-AntiAbuse: Username - ' . $this->user->data['username']);
		$messenger->headers('X-AntiAbuse: User IP - ' . $this->user->ip);

		$messenger->template($email_template, $this->config['default_lang']);
		$messenger->to($this->config['board_email']);
		$messenger->from($this->config['server_name']);

		$messenger->assign_vars(array(
			'SUBJECT'		=> $this->user->lang('CONTACT_BOT_SUBJECT'),
			'EMAIL_SIG'  	=> $this->config['board_email_sig'],
			'MESSAGE'		=> $email_message,
		));

		$messenger->send(NOTIFY_EMAIL);

		return;
	}

	/**
	 * contact_make_select
	 *
	 * @param array $input_ary
	 * @return string Select html
	 * for drop down reasons
	 */
	public function contact_make_select($input_ary, $selected)
	{
		// only accept arrays, no empty ones
		if (!is_array($input_ary) || !sizeof($input_ary))
		{
			return;
		}

		// If selected isn't in the array, use first entry
		if (!in_array($selected, $input_ary))
		{
			$selected = $input_ary[0];
		}

		$select = '';
		foreach ($input_ary as $item)
		{
			//$item = htmlspecialchars($item);
			$item_selected = ($item == $selected) ? ' selected="selected"' : '';
			$select .= '<option value="' . $item . '"' . $item_selected . '>' . $item . '</option>';
		}
		return $select;
	}

	/**
	* Contact constants
	*/
	public function contact_constants()
	{
		$contactadmin_constants = "\\rmcgirr83\\contactadmin\\core\\contact_constants";
		$class = new \ReflectionClass($contactadmin_constants);
		$contactadmin_constants = $class->getConstants();

		return $contactadmin_constants;
	}


	/**
	 * make_user_select
	 * @return string User List html
	 * for drop down when selecting the contact bot
	 */
	public function make_user_select($select_id = false)
	{
		// variables
		$user_list = '';

		// do the main sql query
		$sql = 'SELECT user_id, username
			FROM ' . USERS_TABLE . '
			ORDER BY username_clean';
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$selected = ($row['user_id'] == $select_id) ? ' selected="selected"' : '';
			$user_list .= '<option value="' . $row['user_id'] . '"' . $selected . '>' . $row['username'] . '</option>';
		}
		$this->db->sql_freeresult($result);

		return $user_list;
	}
	/**
	 * Create the selection for the contact method
	 */
	public function method_select($value, $key = '')
	{
		$radio_ary = array(
			$this->contact_constants['CONTACT_METHOD_EMAIL']	=> 'CONTACT_METHOD_EMAIL',
			$this->contact_constants['CONTACT_METHOD_POST']	=> 'CONTACT_METHOD_POST',
			$this->contact_constants['CONTACT_METHOD_PM']	=> 'CONTACT_METHOD_PM',
		);
		return h_radio('method', $radio_ary, $value, $key);
	}
	/**
	 * Create the selection for the post method
	 */
	public function poster_select($value, $key = '')
	{
		$radio_ary = array(
			$this->contact_constants['CONTACT_POST_NEITHER']	=> 'CONTACT_POST_NEITHER',
			$this->contact_constants['CONTACT_POST_GUEST']	=> 'CONTACT_POST_GUEST',
			$this->contact_constants['CONTACT_POST_ALL']		=> 'CONTACT_POST_ALL',
		);

		return h_radio('bot_poster', $radio_ary, $value, $key);
	}
	/**
	 * Create the selection for the bot forum
	 */
	public function forum_select($value, $key = '')
	{
		return '<select id="' . $key . '" name="forum">' . make_forum_select($value, false, true, true) . '</select>';
	}
	/**
	 * Create the selection for the bot
	 */
	public function bot_user_select($value, $key = '')
	{
		return '<select id="' . $key . '" name="bot_user">' . $this->make_user_select($value) . '</select>';
	}

	/**
	* get an array of admins and mods
	*/
	public function admin_array()
	{
		$sql_where = '';
		// Only founders...maybe
		if ($this->config['contactadmin_founder_only'])
		{
			$sql_where .= ' WHERE user_type = ' . USER_FOUNDER;
		}
		else
		{
			// Grab an array of user_id's with admin permissions
			$admin_ary = $this->auth->acl_get_list(false, 'a_', false);
			$admin_ary = (!empty($admin_ary[0]['a_'])) ? $admin_ary[0]['a_'] : array();

			if ($this->config['contactadmin_method'] == $this->contact_constants['CONTACT_METHOD_EMAIL'] && sizeof($admin_ary))
			{
				$sql_where .= ' WHERE ' . $this->db->sql_in_set('user_id', $admin_ary) . ' AND user_allow_viewemail = 1';
			}
			else if ($this->config['contactadmin_method'] == $this->contact_constants['CONTACT_METHOD_PM'] && sizeof($admin_ary))
			{
				$sql_where .= ' WHERE ' . $this->db->sql_in_set('user_id', $admin_ary) . ' AND user_allow_pm = 1';
			}
		}

		$sql = 'SELECT user_id, username, user_email, user_lang, user_jabber, user_notify_type
			FROM ' . USERS_TABLE . ' ' .
			$sql_where;
		$result = $this->db->sql_query($sql);
		$contact_users = $this->db->sql_fetchrowset($result);
		$this->db->sql_freeresult($result);

		// we didn't get a soul
		if (!sizeof($contact_users))
		{
			// we have no one to send anything to
			// notify the board default
			$this->functions->contact_check('', '', 'contact_nobody', (int) $this->config['contactadmin_method']);
		}

		return $contact_users;
	}
}