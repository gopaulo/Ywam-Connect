<?php

//Theme Init Scripts

require_once(TEMPLATEPATH . '/includes/theme-scripts.php');   

//ywamconnect specific functions
require_once(TEMPLATEPATH . '/includes/ywamconnect_functions.php');   

add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'header-menu' => 'Header Menu',
          'footer-menu' => 'Footer Menu'
        )
    );
}

?>