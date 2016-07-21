<?php

/* 
function change_wp_login_url() {
	return bloginfo('url');
}
add_filter('login_headerurl', 'change_wp_login_url');
 */

 function change_wp_login_title() {
	return get_option('blogname');
}
add_filter('login_headertitle', 'change_wp_login_title');

/* function custom_login_logo() {
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo-login.gif) 50% 50% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

 */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/inc/custom-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );