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
	'CONTACT_CONFIG_SAVED'			=> 'Les paramètres de l’extension « Formulaire de contact du forum » ont été sauvegardés.',
	'CONTACT_ENABLE'				=> 'Activer l’extension « Formulaire de contact du forum »',
	'CONTACT_ENABLE_EXPLAIN'		=> 'Permet d’activer ou de désactiver totalement l’extension « Formulaire de contact du forum ».',
	'CONTACT_ACP_CONFIRM'				=> 'Activer la confirmation visuelle',
	'CONTACT_ACP_CONFIRM_EXPLAIN'		=> 'Permet d’activer la confirmation visuelle lorsque les utilisateurs envoient un message.<br>Ceci permet de se prémunir contre les messages indésirables. Information : cette option est uniquement fonctionnelle depuis la page du formulaire de contact et n’affecte en aucun cas toute autre confirmation visuelle configurée sur le forum.',
	'CONTACT_ATTACHMENTS'				=> 'Autoriser les fichiers joints',
	'CONTACT_ATTACHMENTS_EXPLAIN'		=> 'Permet d’autoriser les fichiers joints dans les messages envoyés sur le forum ou en tant que messages privés.<br>Les extensions de fichiers autorisées sont les mêmes que celles définies dans la configuration du forum.<br><span style="color:red;">Cette fonctionnalité n’est pas disponible pour la méthode de contact via « Par e-mail ».</span>',
	'CONTACT_CONFIRM_GUESTS'			=> 'Confirmation visuelle uniquement aux invités',
	'CONTACT_CONFIRM_GUESTS_EXPLAIN'	=> 'Permet d’afficher la confirmation visuelle uniquement aux invités si celle-ci est au préalable activée.',
	'CONTACT_FOUNDER'					=> 'Contacter uniquement les fondateurs du forum',
	'CONTACT_FOUNDER_EXPLAIN'			=> 'Permet d’envoyer uniquement aux administrateurs « Fondateurs » des notifications par e-mail ou par MP (message privé).',
	'CONTACT_GENERAL_SETTINGS'			=> 'Configuration générale de la page du formulaire de contact',
	'CONTACT_MAX_ATTEMPTS'				=> 'Nombre maximal de tentatives de confirmation visuelle',
	'CONTACT_MAX_ATTEMPTS_EXPLAIN'		=> 'Permet de saisir le nombre maximal de tentatives de confirmation visuelle qu’un utilisateur peut saisir.<br>Saisir 0 pour un nombre illimité de tentatives.',
	'CONTACT_METHOD'					=> 'Méthode de contact',
	'CONTACT_METHOD_EXPLAIN'			=> 'Permet de sélectionner la méthode de contacter pour les utilisateurs.<br><span style="color:red;">Si définie sur « Par e-mail » alors les fichiers joints ne sont pas disponibles.</span>',
	'CONTACT_REASONS'					=> 'Raisons du contact',
	'CONTACT_REASONS_EXPLAIN'			=> 'Permet de saisir, séparément sur une nouvelle ligne, les différentes raisons pour lesquelles il est possible d’utiliser le formulaire de contact.<br>Laisser ce champ vide pour désactiver cette fonctionnalité.',
	// Bot config options
	'CONTACT_BOT_FORUM'				=> 'Forum du robot de contact',
	'CONTACT_BOT_FORUM_EXPLAIN'		=> 'Permet de sélectionner le forum dans lequel le robot de contact publiera toute demande de contact soumise par un utilisateur et à la condition que la méthode de contact soit définie sur « Dans un forum ».',
	'CONTACT_BOT_POSTER'			=> 'Utilisation du robot de contact',
	'CONTACT_BOT_POSTER_EXPLAIN'	=> 'Permet de définir dans quelle situation le robot de contact est utilisé. Si la méthode de contact est définie sur « Dans un forum » ou « Par message privé » les messages proviendront du robot de contact suivant le paramètre défini ici. Si le paramètre est défini sur « Ni l’un ni l’autre » le robot de contact n’est pas utilisé. Les messages publiés sur le forum ou par message privé auront pour auteur « Anonymous » (l’utilisateur qui représente tous les invités) et contiendront les informations saisies par l’utilisateur sur la page du formulaire de contact.',
	'CONTACT_BOT_USER'				=> 'Utilisateur comme robot de contact',
	'CONTACT_BOT_USER_EXPLAIN'		=> 'Permet de sélectionner l’utilisateur qui est utilisé comme robot de contact pour publier des messages lorsque la méthode de contact est définie sur « Dans un forum » ou « Par message privé ».',
	'CONTACT_USERNAME_CHK'			=> 'Vérifier le nom d’utilisateur',
	'CONTACT_USERNAME_CHK_EXPLAIN'	=> 'Permet d’activer le contrôle du nom d’utilisateur saisi sur la page du formulaire de contact pour les invités, celui-ci sera comparé avec ceux présents dans la base de données. Si un nom similaire est trouvé un message d’erreur sera affiché à l’utilisateur pour lui demander de saisir un autre nom d’utilisateur.',
	'CONTACT_EMAIL_CHK'				=> 'Vérifier l’adresse e-mail',
	'CONTACT_EMAIL_CHK_EXPLAIN'		=> 'Permet d’activer le contrôle de l’adresse e-mail saisie sur la page du formulaire de contact pour les invités, celle-ci sera comparée avec celles présentes dans la base de données. Si une adresse similaire est trouvée un message d’erreur sera affiché à l’utilisateur pour lui demander de saisir une autre adresse e-mail.',

	// Contact methods
	'CONTACT_METHOD_EMAIL'			=> 'Par e-mail',
	'CONTACT_METHOD_PM'				=> 'Par message privé',
	'CONTACT_METHOD_POST'			=> 'Dans un forum',

	// Contact posters...user bot
	'CONTACT_POST_NEITHER'			=> 'Ni l’un ni l’autre',
	'CONTACT_POST_GUEST'			=> 'Invités uniquement',
	'CONTACT_POST_ALL'				=> 'Tout le monde',
));
