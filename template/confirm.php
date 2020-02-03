<?php
session_start();

/*
Template Name: confirm.php
*/
function h($str) {
	return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function checkempty($param, $name) {
	if($param == "") {
		$message = $name."を入力して下さい";
	}
}

$error_message = "";
$error_message .= checkempty($params['kokyaku_name'], "お名前");
$error_message .= checkempty($params['email'], "メールアドレス");
$error_message .= checkempty($params['text'], "お問い合わせ内容");

if($error_message != "") {
	while($error_message) {
		echo $error_message;
	}
}
if(isset($_POST)) {
	$params = $_POST;
}

$kokyaku_name = h($params['kokyaku_name']);
$email = h($params['email']);
$text = h($params['text']);


$_SESSION["kokyaku_name"] = $kokyaku_name;
$_SESSION["email"] = $email;
$_SESSION["text"] = $text;

?>

<?php get_header();?>

<section>
	<div class="contact">
	<h2>お問い合わせ確認画面</h2>
	<p>こちらの内容で送信します。よろしいですか？</p>
	<div class="leaf"><img src="<?php bloginfo('template_directory'); ?>/images/leaf.png"></div>

<div class="askcontent">
<form action="/regist" method="post" name="form">
	<table border="1">
	<input type="hidden" name="kokyaku_name" value="<?=$kokyaku_name; ?>">
	<input type="hidden" name="email" value="<?=$email; ?>">
	<input type="hidden" name="text" value="<?=$text; ?>">
		<tr><th>お名前</th><td><?=$kokyaku_name; ?></td></tr>
		<tr><th>メールアドレス</th><td><?=$email; ?></td></tr>
		<tr><th>お問い合わせ内容</th><td><?=$text; ?></td></tr>
	</table>
	<p class="back"><a href="<?php bloginfo('template_directory'); ?>/contact?a=back">戻る</a></p>
	<div class="submit"><a href="javascript:;" onclick="formsubmit(this);" id="submit">送信する</a></div>
</form>
</div>

</div>
</section>

<?php get_footer(); ?>