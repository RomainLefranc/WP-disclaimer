<?php
/* 
Plugin Name: EU-disclaimer
Description: Plugin de verification de l'age de l'utilisateur  à l'arrivé sur le site
Author: Romain Lefranc
Version: 1.5
*/

/* Ajoute au menu d'administration un onglet eu-disclaimer ------------------------------------------------------------*/
add_action("admin_menu", "ajouterAuMenu", 10);
function ajouterAuMenu(){
    $page = 'eu-disclaimer';
    $menu = 'eu-disclaimer';
    $capability = 'edit_pages';
    $slug = 'eu-disclaimer';
    $function = 'disclaimerFonction';
    $icon = '';
    $position = 80;
    if(is_admin()){
    add_menu_page($page, $menu, $capability, $slug, $function, $icon, $position);
    }
}
function disclaimerFonction(){
    require_once ('view/disclaimer-menu.php');
}

/* Créer la BDD lorsque l'utilisateur active le plugin et supprime la BDD lorsque l'utilisateur desactive le plugin ---*/
require_once ('model/repository/DisclaimerGestionTable.php');
if (class_exists("DisclaimerGestionTable")){
    $gerer_table = new DisclaimerGestionTable();
}
if (isset($gerer_table)){
    register_activation_hook(__FILE__, array($gerer_table,'creerTable'));
    register_deactivation_hook(__FILE__,array($gerer_table,'supprimerTable')); 
}

add_action('admin_enqueue_scripts', 'ajout_JS_admin');
function ajout_JS_admin() {
    wp_register_script( 'jquery_admin','https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',null, null, true );
    wp_enqueue_script('jquery_admin');

    wp_register_script ('jquery_eu_admin', plugins_url ('assets/js/eu-disclaimer-admin.js', __FILE__), array ('jquery'), '1.1', true);
    wp_enqueue_script('jquery_eu_admin');
}

/* Ajoute les assets Jquery et jquery modal lorsque wp est chargé dans toutes les pages -------------------------------*/
add_action('wp_enqueue_scripts', 'ajout_JS');
function ajout_JS() {
    if(!is_admin()):
        wp_register_script( 'jquery','https://code.jquery.com/jquery-3.3.1.slim.min.js',null, null, true );
        wp_enqueue_script('jquery');

        wp_register_script( 'jquery_modal','https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js', null, null, true );
        wp_enqueue_script('jquery_modal');

        wp_register_script ('jquery_eu', plugins_url ('assets/js/eudisclaimer.js', __FILE__), array ('jquery'), '1.1', true);
        wp_enqueue_script('jquery_eu');
       endif;  
}

/* Ajoute le css dans les balises head de toutes les pages ------------------------------------------------------------*/
add_action('wp_enqueue_scripts','ajout_CSS', 1);
function ajout_CSS() {
    if(!is_admin()):
        wp_register_style( 'modal','https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.css', null, null, false );
        wp_enqueue_style( 'modal' );

        wp_register_style( 'eu-disclaimer-css', plugins_url ('assets/css/eudisclaimer-css.css', __FILE__), null, null, false );
        wp_enqueue_style( 'eu-disclaimer-css' );
    endif;
}

add_action( 'wp_body_open', 'afficherModalDansBody'); 
function afficherModalDansBody() { 
    echo DisclaimerGestionTable::AfficherDonneModal(); 
}