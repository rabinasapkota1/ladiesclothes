<?php
function my_child_theme_enqueue_styles(){
	wp_enqueue_style('parent-style', get_template_directory_url()./'style.css');
	wp_enqueue_style('child-style',get_stylesheet_url(),array('parent-style'));
}
add_action('wp_enqueue_scripts','my_child_theme_enqueue_styles');