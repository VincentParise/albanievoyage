<?php

/**
 * @package Ma connexion
 * @version 1.0.0
 */
/*
Plugin Name: Ma connexion
Plugin URI: http://localhost/wordpress
Description: Ma connexion.
Author: Vince Parise
Version: 1.0.0
Author URI: http://localhost/wordpress
*/

// -----------------------------------------------------------------------------
// Modification du Style CSS :
/*function add_custom_css() {
   //wp_enqueue_style('add_custom_css', get_template_directory_uri() . '/custom.css');
    //var_dump(get_template_directory_uri());
}
//add_action('wp_enqueue_scripts', 'add_custom_css');
//add_action('admin_notices', 'add_custom_css');
*/

//--------------------------------------------------
// Changement du logo
function my_login_logo_one() {
    ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
        }
    </style>
    <?php
    //$var=get_stylesheet_directory_uri();
    //var_dump(pll_current_language());
}

add_action('login_enqueue_scripts', 'my_login_logo_one');

// ---------------------------------------------------------------
// Ajout du texte et message de bienvenue Formulaire de connexion
function wplogin_ajouterTexte() {
    $texte='';
    if ( pll_current_language() === 'fr' ) {
        $texte = '<p> Veuillez saisir votre nom d\'utilisateur et votre mot de passe.</p>';
    }
    if ( pll_current_language() === 'en' ) {
        $texte = '<p> Please enter your username and password.</p>';
    }
    echo $texte;
}

add_action('login_form', 'wplogin_ajouterTexte');

// Ajout du message de bienvenue.
function wplogin_message($message) {
    if ( empty($message) ) {
        if ( pll_current_language() === 'fr' ) {
            return '<h1>Bienvenue sur Agence Voyage Albanie ! Veuillez vous connecter.</h1>';
        }
        if ( pll_current_language() === 'en' ) {
            return '<h1>Welcome to Albania Travel Agency! Please log in.</h1>';
        }
    } else {
        return $message;
    }
}

add_filter('login_message', 'wplogin_message');
