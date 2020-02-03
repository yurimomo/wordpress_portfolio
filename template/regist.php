<?php
session_start();

/*
Template Name: regist.php
*/
function h($str) {
	return htmlspecialchars($str,ENT_QUOTES, "UTF-8");
}


global $wpdb;

if(isset($_POST)) {
	$params = $_POST;
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


$kokyaku_name = h($params['kokyaku_name']);
$email = h($params['email']);
$text = h($params['text']);

// PHPで正規表現
 $regexp = "/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}$/";
	if(preg_match($regexp, $email) == false) {
	exit;
	}



$headers = "From: coffee@co.jp";

// mail to custoner 
$customer_title = "お問い合わせありがとうございます。";
$customer_message .= "この度はお問い合わせ頂き誠にありがとうございます。
下記の内容でお問い合わせを受け付けました。\n\n";
$customer_message .= "------------------------------------\n";
$customer_message .= "お問い合わせ日時：" . date("Y/m/d") . "\n";
$customer_message .= "氏名：" . $kokyaku_name ."様\n";
$customer_message .= "メールアドレス\n" . $email . "\n";
$customer_message .= "お問い合わせ内容：" . $text . "\n";


// mail to owner
$owner = "yuri715lily_momo@yahoo.co.jp";
$owner_title = "下記の内容でお問い合わせがありました。\n";
$owner_message .= "------------------------------------\n";
$owner_message .= "お問い合わせ日時：" . date("Y/m/d") . "\n";
$owner_message .= "氏名：" . $kokyaku_name ."様\n";
$owner_message .= "メールアドレス\n" . $email . "\n";
$owner_message .= "お問い合わせ内容：" . $text . "\n";

// insert tro Database
$sql = $wpdb->prepare("INSERT INTO $wpdb->contact( kokyaku_name, email, text ) VALUES (%s, %s, %s)", $kokyaku_name, $email, $text);
$result = $wpdb->query($sql);


// send mail
if($result){
	wp_mail($email, $customer_title, $customer_message, $headers );
	wp_mail($owner, $owner_title, $owner_message);
}


$_SESSION = array();
session_destroy();
wp_redirect('http://yurikoi.xyz/thanks/');
exit;
mysqli_close($link);

?>