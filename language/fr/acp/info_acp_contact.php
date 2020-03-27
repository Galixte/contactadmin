<?php
/**
 *
 * Contact Admin. An extension for the phpBB Forum Software package.
 * French translation by Galixte (http://www.galixte.com)
 *
 * @copyright (c) 2018 Rich McGirr (RMcGirr83)
 * @license GNU General Public License, version 2 (GPL-2.0-only)
 *
 */

/**
 * DO NOT CHANGE
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
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	// General config options
	'ACP_CAT_CONTACTADMIN'	=> 'Formulaire de contact du forum',
	'ACP_CONTACTADMIN_CONFIG'			=> 'Paramètres',
	// Log entries
	'LOG_CONFIG_CONTACT_ADMIN'		=> '<strong>Paramètres de l’extension « Formulaire de contact du forum » mis à jour</strong>',
	'LOG_CONTACT_BOT_INVALID'		=> '<strong>L’ID utilisateur sélectionné dans l’extension « Formulaire de contact du forum » incorrect :</strong><br />ID utilisateur : %1$s',
	'LOG_CONTACT_FORUM_INVALID'		=> '<strong>L’ID du forum sélectionné dans l’extension « Formulaire de contact du forum » est incorrect :</strong><br />ID du forum : %1$s',
	'LOG_CONTACT_EMAIL_INVALID'		=> '<strong>L’extension « Formulaire de contact du forum » est configurée pour envoyer des e-mails alors que le forum n’autorise pas l’envoi de ces derniers. En conséquence de quoi l’extension a été désactivée',
	'LOG_CONTACT_NONE'				=> '<strong>Aucun administrateur n’a permis aux utilisateurs de les contacter par l’intermédiaire de %1$s depuis le formulaire de contact de l’extension « Formulaire de contact du forum »</strong>',
	'LOG_CONTACT_CONFIG_UPDATE'		=> '<strong>Paramètres de l’extension « Formulaire de contact du forum » mis à jour</strong>',
));
