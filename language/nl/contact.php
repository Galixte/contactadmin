<?php
/**
*
* Contact admin extension for the phpBB Forum Software package.
*
* @copyright 2016 Rich McGirr (RMcGirr83)
* @license GNU General Public License, version 2 (GPL-2.0)
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'ACP_CAT_CONTACTADMIN'		=> 'Contacteer Administratie',
	'ADD_ATTACHMENT_EXPLAIN'	=> 'Indien je een bestand wenst toe te voegen, voert u de onderstaande details in.',
	'CONTACT_BOT_ERROR'			=> 'Je kan het contacteer formulier momenteel niet gebruiken omdat er een fout zit in de configuratie. Er werd een e-mail naar de oprichter verstuurd.',
	'CONTACT_BOT_NONE'			=> 'Gebruiker %1$s heeft geprobeerd de Contacteer Forum Administratie extensie te gebruiken bij %2$s om een %3$s te verzenden. Maar er zijn geen beheerders die %3$ss toestaan van gebruikers. Gelieve naar de Contact Bot Configuratie te gaan in het beheerderspaneel voor het forum %4$s en kies de “Forum Oprichter” optie',
	'CONTACT_BOT_SUBJECT'		=> 'Contacteer Administratie extensie fout',
	'CONTACT_BOT_USER_MESSAGE'	=> 'Gebruiker %1$s heeft geprobeerd om de Contacteer beheerder extensie te gebruiken bij %2$s, Maar de geselecteerde gebruiker in de configuratie is niet correct. Gelieve het forum %3$s te bezoeken en kies een andere gebruiker in het beheerderspaneel voor de Contacteer Administratie.',
	'CONTACT_BOT_FORUM_MESSAGE'	=> 'Gebruiker %1$s heeft geprobeerd om de Contacteer Beheerder extensie te gebruiken bij %2$s, maar het geselecteerde forum in de configuratie is niet correct. Gelieve het forum %3$s te bezoeken en kies een ander forum in het beheerderspaneel voor de Contacteer Administratie.',
	'CONTACT_CONFIRM'			=> 'Bevestig',
	'CONTACT_DISABLED'			=> 'Je kan het contact formulier momenteel niet gebruiken omdat deze is uitgeschakeld.',
	'CONTACT_MAIL_DISABLED'		=> 'Er is iets fout met de configuratie van de Contacteer Forum Administratie.<br>De extensie is ingesteld om een e-mail te verzenden maar de configuratie is niet ingesteld om e-mails te verzenden. Gelieve de beheerder of oprichter te contacteren: <a href="mailto:%1$s">%1$s</a>',
	'CONTACT_MSG_SENT'			=> 'Je bericht is succesvol verzonden',
	'CONTACT_NO_MSG'			=> 'Je hebt geen bericht opgegeven.',
	'CONTACT_NO_SUBJ'			=> 'Je hebt geen onderwerp opgegeven.',
	'CONTACT_REASON'			=> 'Reden',
	'CONTACT_TEMPLATE'			=> '[b]Naam:[/b] %1$s' . "\n" . '[b]E-mail Adres:[/b] %2$s' . "\n" . '[b]IP:[/b] %3$s' . "\n" . '[b]Onderwerp:[/b] %4$s' . "\n" . '[b]Heeft het volgende bericht opgegeven in het contact formulier:[/b] %5$s',
	'CONTACT_TITLE'				=> 'Contacteer Administratie',
	'CONTACT_TOO_MANY'			=> 'Je hebt het maximum aantal bevestiging pogingen overschreden voor deze sessie. Gelieve later opnieuw te proberen.',

	'CONTACT_YOUR_NAME'			=> 'Je naam',
	'CONTACT_YOUR_NAME_EXPLAIN'	=> 'Vul aub je naam in, zodat je bericht een afzender heeft.',
	'CONTACT_YOUR_EMAIL'		=> 'Je e-mail adres',
	'CONTACT_YOUR_EMAIL_EXPLAIN'	=> 'Gelieve een geldig e-mail adres op te geven, zodat we je kunnen contacteren.',

	'TOO_MANY_CONTACT_TRIES'	=> 'Je hebt het maximum aantal pogingen overschreden voor deze sessie. Gelieve het later opnieuw te proberen.',
	'CONTACT_NO_NAME'			=> 'Je hebt geen naam opgegeven.',

	'RETURN_CONTACT'			=> '%sKeer terug naar de contact pagina%s',
));
