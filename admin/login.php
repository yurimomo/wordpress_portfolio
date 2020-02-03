<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset="<?php bloginfo('charset'); ?>">
<link href="https://fonts.googleapis.com/css?family=Rouge+Script&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>

</head>
<?php 
/*
Template Name: admin-login.php
*/
?>

<body>
<div class="container">
<div class="wrapper">
	<p style="color: red"><?php echo $message; ?></p>

<div class="kanri">
	<h3>管理者ログイン</h3>
<form action="admin_login.php" method="post">
	<label for="name1" class="name">ユーザーID</label>
	<input id="name1" name="user_id" required><br />
	<label for="password1" class="password">password</label>
	<input type="password1" id="password" name="password" required><br />
	<input type="submit" name="login" class="login_submit" value="ログイン">
</form>
</div>

<div class="regist">
	<h3>管理者登録</h3>
<form action="admin_login.php" method="post">
	<label for="name2" class="name">ユーザーID</label>
	<input id="name2" name=""><br />
	<label for="password2" class="password">password</label>
	<input type="password" id="password2" name=""><br />
	<input type="submit" name="regist" class="login_submit" value="登録する">
</form>
</div>
</div>
</div>
</body>
</html>