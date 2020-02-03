<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset="<?php bloginfo('charset'); ?>">
<link href="https://fonts.googleapis.com/css?family=Rouge+Script&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>



<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {

	var menu = document.querySelectorAll('li');
	var path = location.pathname;

	if(location.href === 'http://yurikoi.xyz/') {
		menu[0].classList.add('current');
	}
	if(path.match('coffee')) {
		menu[1].classList.add('current');
	}
	if(path.match('about')) {
		menu[2].classList.add('current');
	}
	if(path.match('contact')) {
		menu[3].classList.add('current');
	}
});

</script>
</head>

<body>
<div class="container">
<header>
<div class="header">
	<div class="icon"><img src="<?php bloginfo('template_directory'); ?>/images/bean.jpeg"></div>
	<nav class="navbar">
	<ul>
<?php wp_nav_menu(array(
	'theme_location' => 'navigation'
	));
?>
	</ul>
	</nav>
	<p id="bar">
		<a href="javascript:;" onclick="displayModalWindow();"><i class="fas fa-bars fa-4x"></i>
		</a>
		<ul class="ulmodal" id="ulmodal">
<?php wp_nav_menu(array('theme_location' => 'navigation'));?>
		</ul>
	</p>

	<div class="address">神奈川県横浜市中区新港1丁目3−1<br> シーサイド 2F</div>
</div>

</header>