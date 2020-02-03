<?php

function add_files() {
	
	wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/coffee.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'add_files');

register_nav_menus(array(
	'navigation' => 'ナビゲーションバー'
));

function basic_auth($auth_list,$realm="Restricted Area",$failed_text="認証に失敗しました"){
if (isset($_SERVER['PHP_AUTH_USER']) and isset($auth_list[$_SERVER['PHP_AUTH_USER']])){
if ($auth_list[$_SERVER['PHP_AUTH_USER']] == $_SERVER['PHP_AUTH_PW']){
return $_SERVER['PHP_AUTH_USER'];
}
}

function custom_query_vars( $public_query_vars ) {
$public_query_vars[] = 'mp';
return $public_query_vars;
}
add_filter( 'query_vars', 'custom_query_vars' );


header('WWW-Authenticate: Basic realm="'.$realm.'"');
header('HTTP/1.0 401 Unauthorized');
header('Content-type: text/html; charset='.mb_internal_encoding());
die($failed_text);
}



?>