<?php
session_start();
if(!$_GET['a'] == 'back') {
	$_SESSION = array();
	session_destroy();
}
/*
Template Name: contact.php
*/
?>

<?php get_header(); ?>
<section>
	<div class="contact">
	<h2>お問い合わせ</h2>
	<div class="leaf"><img src="<?php bloginfo('template_directory'); ?>/images/leaf.png"></div>

<div class="askcontent">
<form action="/confirm" method="post" name="form">
	<table border="1">
		<tr><th>お名前</th><td><input type="text" name="kokyaku_name" value="<?=$_SESSION['kokyaku_name']; ?>"></td></tr>
		<tr><th>メールアドレス</th><td><input type="text" name="email" value="<?=$_SESSION['email']; ?>"></td></tr>
		<tr><th>お問い合わせ内容</th><td><textarea name="text"><?=$_SESSION["text"]; ?></textarea></td></tr>
	</table>
	<div class="submit">
		<!-- <input type="submit" value="確認する"> -->
		<a href="javascript:;" onclick="formsubmit(this);" id="submit">確認する</a>
	</div>
</form>
</div>

</div>
</section>
<?php get_footer(); ?>