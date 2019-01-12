<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters for use
// ’ » “ ” …


$lang = array_merge($lang, array(
	// General config options
	'ACP_CAT_CONTACTADMIN'	=> 'Contacteer Forum Administratie',
	'ACP_CONTACTADMIN_CONFIG'			=> 'Configuratie',
	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'		=> '<strong>Bewerkte Contacteer Forum Administratie extensie pagina instellingen</strong>',
	'LOG_CONTACT_BOT_INVALID'		=> '<strong>De Contacteer Forum Administratie extensie bot heeft een ongeldig gebruikers ID geselecteerd:</strong><br>Gebruikers ID %1$s',
	'LOG_CONTACT_FORUM_INVALID'		=> '<strong>Het Contacteer Forum Administratie extensie forum heeft een ongeldig forum geselecteerd:</strong><br>Forum ID %1$s',
	'LOG_CONTACT_EMAIL_INVALID'		=> '<strong>De Contacteer Forum Administratie extensie staat het gebruik van e-mails toe, maar het forum is niet ingesteld om e-mails toe te staan. De extensie werd uitgeschakeld.',
	'LOG_CONTACT_NONE'				=> '<strong>Er zijn geen beheerders die gebruikers toestaan hen te contacteren via %1$s in de Contacteer Forum Administratie extensie.</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'		=> '<strong>Update Contacteer Forum Administratie configuratie instellingen</strong>',

));
