<?php

add_action('wp_enqueue_scripts', 'init_scripts');
function init_scripts() {
  wp_enqueue_script('boostrap3', '//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"', array(), '3', true);

}


add_action('wp_enqueue_styles', 'init_styles');
function init_scripts() {
  wp_enqueue_script('boostrap3-css', '//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css"', array(), '3', true);
}



?>