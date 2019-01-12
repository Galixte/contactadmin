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
	'CONTACT_CONFIG_SAVED'			=> 'Contacteer Forum Administratie configuratie werd geüpdatet',
	'CONTACT_ENABLE'				=> 'Schakel Contacteer Forum Administratie extensie in',
	'CONTACT_ENABLE_EXPLAIN'		=> 'Schakel de extensie globaal in of uit',
	'CONTACT_ACP_CONFIRM'				=> 'Schakel visuele bevestiging in',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'Indien je deze optie inschakelt moeten gebruikers een visuele bevestiging invullen om een bericht te verzenden.<br>Dit is om spam berichten te vermijden. Let op, deze optie is alleen voor de contact pagina. Het heeft geen invloed op andere visuele bevestiging instellingen.',
	'CONTACT_ATTACHMENTS'				=> 'bijlagen toegestaan',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'Indien ingeschakeld worden bijlagen toegestaan bij het posten in het forum en privé berichten.<br>De toegestane bijlagen zijn hetzelfde als in de forum configuratie.<br><span style="color:red;">Geldt niet voor contact methode via “E-Mail”.</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Visuele bevestiging alleen voor gasten',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'Indien deze optie ingeschakeld is zal de visuele bevestiging enkel zichtbaar zijn voor gasten (Indien het ingeschakeld is).',
	'CONTACT_FOUNDER'					=> 'Contacteer alleen de Forum oprichter',
	'CONTACT_FOUNDER_EXPLAIN'			=> 'Indien ingeschakeld zal alleen de Forum oprichter E-mails of notificaties ontvangen.',
	'CONTACT_GENERAL_SETTINGS'			=> 'Algemene contact pagina instellingen',
	'CONTACT_MAX_ATTEMPTS'				=> 'Maximum bevestiging pogingen',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'Hoe vaak mag een gebruiker proberen om de juiste bevestiging in te voeren?<br>Kies 0 voor een onbeperkt aantal pogingen.',
	'CONTACT_METHOD'					=> 'Contacteer methode',
	'CONTACT_METHOD_EXPLAIN'			=> 'Hoe wilt u dat gebruikers in staat zijn om contact te maken.<br><span style="color:red;">Indien ingesteld als “EMail”, dan zijn bijlagen niet van toepassing.</span>',
	'CONTACT_REASONS'					=> 'Contacteer reden',
	'CONTACT_REASONS_EXPLAIN'			=> 'Voer redenen in voor het contact formulier, elk op een nieuwe lijn.<br>Laat deze optie leeg als je dit niet wenst te gebruiken.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Contacteer bot forum',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Selecteer het forum waarin de bot moet posten indien de contacteer methode is ingesteld op “Forum post”.',
	'CONTACT_BOT_POSTER'			=> 'Bot als Poster',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'Indien ingesteld zullen privé berichten en Posten komen van de Contacteer Bot gebruiker die je hierboven hebt gekozen. Als “Geen enkele” is gekozen zal de bot niet gebruikt worden als poster. Posten en privé berichten zullen geplaatst worden gebaseerd op de informatie in het contact formulier.',
	'CONTACT_BOT_USER'				=> 'Contacteer bot gebruiker',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Selecteer de gebruiker waarmee berichten gepost zullen worden indien de contacteer methode is ingesteld op “privé Bericht” of “Forum Post”.',
	'CONTACT_USERNAME_CHK'			=> 'Controleer gebruikersnaam',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'Indien ingesteld op ja zal de opgegeven gebruikersnaam gecontroleerd worden in de gebruikelijkst van onze database. Indien dezelfde naam teruggevonden wordt zal de gebruiker een fout ontvangen, en zal gevraagd worden een andere naam op te geven.',
	'CONTACT_EMAIL_CHK'				=> 'Controleer E-mail',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'Indien ingesteld op ja zal het opgegeven e-mail adres gecontroleerd worden in de gebruikelijkst van onze database. Indien hetzelfde e-mail adres teruggevonden wordt zal de gebruiker een fout ontvangen, en zal gevraagd worden een ander e-mail adres op te geven.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'Email',
	'CONTACT_METHOD_PM'				=> 'privé bericht',
	'CONTACT_METHOD_POST'			=> 'Forum post',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Geen enkele',
	'CONTACT_POST_GUEST'			=> 'Enkel gasten',
	'CONTACT_POST_ALL'				=> 'Iedereen',
));
