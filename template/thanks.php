<?php
/*
Template Name: thanks.php
*/

get_header(); 
?>
<section>
<div class="container">
<div class="contact">
	<h2>お問い合わせが完了しました</h2>
	<div class="leaf"><img src="<?php bloginfo('template_directory'); ?>/images/leaf.png"></div>
	<div class="thanksImage">
	<img src="<?php bloginfo('template_directory'); ?>/images/cofe_beans.jpg">
	</div>
	<div class="back"><a href="<?php echo home_url(); ?>">戻る</a></div>

</div>
</section>

<?php get_footer(); ?>
