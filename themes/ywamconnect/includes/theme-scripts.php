<?php


// SCRIPTS AND STYLE LOADING
add_action('wp_enqueue_scripts', 'init_scripts');
function init_scripts() {
  wp_enqueue_script( 'jquery' );		
  wp_enqueue_script('boostrap3', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"', array(), '3', true);

  wp_enqueue_script('ywamconnect', get_bloginfo('template_url').'/js/ywamconnect.js', array(), '3', true);


}

add_action('wp_head', 'init_styles');
function init_styles() {
  	wp_enqueue_style( 'boostrap3-css', 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css', true ,'3.0-rc1'); 
  	wp_enqueue_style( 'fontawesome-icons', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css', 'bootstrap3-css' , '3.2.1'); 

  	wp_enqueue_style( 'slate-theme-css', get_bloginfo('template_url').'/css/slate.css', 'bootstrap3-css','1.0' ); 

  	//MAIN STYLESHEET
	wp_enqueue_style( 'yc-style', get_stylesheet_uri(),'slate-theme-css','3.2' );

}



?>