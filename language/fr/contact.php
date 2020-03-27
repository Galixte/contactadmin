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
	'ACP_CAT_CONTACTADMIN'		=> 'Formulaire de contact du forum',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'Pour joindre un fichier saisir les informations demandées ci-dessous.',
	'CONTACT_BOT_ERROR'			=> 'Actuellement, il n’est pas possible d’utiliser le formulaire de contact car une erreur est présente dans la configuration de ce dernier. Un e-mail a été envoyé à l’administrateur fondateur du forum.',
	'CONTACT_BOT_NONE'			=> 'L’utilisateur %1$s a essayé d’utiliser le formulaire de contact à %2$s pour envoyer un %3$s, mais il n’y a aucun administrateur ayant autorisé %3$ss aux utilisateurs. Merci de corriger la configuration du robot de contact depuis le panneau d’administration concernant le forum %4$s et d’activer l’option « Contacter uniquement les fondateurs du forum ».',
	'CONTACT_BOT_SUBJECT'		=> 'Erreur de l’extension « Formulaire de contact du forum »',
	'CONTACT_BOT_USER_MESSAGE'	=> 'L’utilisateur %1$s a essayé d’utiliser le formulaire de contact à %2$s, mais l’utilisateur sélectionné dans la configuration est incorrect. Merci de consulter le forum %3$s et de sélectionner un utilisateur différent depuis le panneau d’administration pour le formulaire de contact.',
	'CONTACT_BOT_FORUM_MESSAGE'	=> 'L’utilisateur %1$s a essayé d’utiliser le formulaire de contact à %2$s, mais le forum sélectionné dans la configuration est incorrect. Merci de consulter le forum %3$s et de sélectionner un forum différent depuis le panneau d’administration pour le formulaire de contact.',
	'CONTACT_CONFIRM'			=> 'Confirmer',
	'CONTACT_DISABLED'			=> 'Actuellement, il n’est pas possible d’utiliser le formulaire de contact car il est désactivé.',
	'CONTACT_MAIL_DISABLED'		=> 'Une erreur a été rencontrée avec la configuration du formulaire de contact. L’extension est configurée pour envoyer des e-mails alors que la configuration du forum n’autorise pas l’envoi de ces derniers. Merci de rapporter ce problème %saux responsables du forum%s.',
	'CONTACT_MSG_SENT'			=> 'Le message a été envoyé avec succès !',
	'CONTACT_NO_MSG'			=> 'Aucun message n’a été saisi.',
	'CONTACT_NO_SUBJ'			=> 'Aucun sujet n’a été saisi.',
	'CONTACT_REASON'			=> 'Raison',
	'CONTACT_TEMPLATE'			=> '[b]Nom :[/b] %1$s' . "\n" . '[b]Adresse e-mail :[/b] %2$s' . "\n" . '[b]Adresse IP :[/b] %3$s' . "\n" . '[b]Sujet :[/b] %4$s' . "\n" . '[b]Message communiqué au moyen du formulaire de contact :[/b] %5$s',
	'CONTACT_TITLE'				=> 'Formulaire de contact du forum',
	'CONTACT_TOO_MANY'			=> 'Le nombre maximal de tentatives de confirmation visuelle a été atteint. Merci d’essayer plus tard.',

	'CONTACT_YOUR_NAME'			=> 'Votre nom',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Merci de saisir un nom pour identifier votre message.',
	'CONTACT_YOUR_EMAIL'		=> 'Votre adresse e-mail',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Merci de saisir une adresse e-mail valide afin de permettre de vous répondre.',

	'TOO_MANY_CONTACT_TRIES'	=> 'Le nombre maximal de tentatives de confirmation visuelle a été atteint. Merci d’essayer plus tard.',
	'CONTACT_NO_NAME'			=> 'Aucun nom n’a été saisi.',

	'RETURN_CONTACT'			=> '%sRetourner à la page précédente%s',
));
