<?php
// register an action (can be any suitable action)
add_action('admin_init', 'on_admin_init');

function on_admin_init()
{
    // include the library
    include_once('/class-envato-wordpress-theme-upgrader.php');
    
    $upgrader = new Envato_WordPress_Theme_Upgrader( 'madza', '80kuoetrhdtl7d8cwg96fk12bmn3a01b' );
    
    /*
     *  Uncomment to check if the current theme has been updated
     */
    
    // $upgrader->check_for_theme_update(); 

    /*
     *  Uncomment to update the current theme
     */
    
    // $upgrader->upgrade_theme();
}