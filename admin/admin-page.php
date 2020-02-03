<?php
	if(is_page() == 'admin-page.php'): 
		$userArray = array("mail" => "check");
		basic_auth($userArray); 
	endif;

/* Template Name: admin-page.php */

global $wpdb;

//全mailデータget
$sql = <<<DOC_END

SELECT 
	*, date_format(created_at, '%Y/%m/%d/%H:%i')
AS 
	contact_day
FROM 
	$wpdb->contact
DOC_END;
// 全てのメール取得
$results = $wpdb->get_results($sql, ARRAY_A);
// 全てのメール件数
$num_row = $wpdb->num_rows;


//////page nation用/////////////////////////

$perPage = 5;
// 全ての件数から5を割る
$page_sum = $num_row / $perPage;
//page nation 何ページ?
$page_sum = ceil($page_sum);

// パラメータなかったら最大ページを表示
if(isset($_GET['mp'])) {
	$page = $_GET['mp'];
}else{
	$page = $page_sum;
}

$offset = ($page -1) * $perPage;

// offset使用
$sql = <<<DOC_END

SELECT
	*, date_format(created_at, '%Y/%m/%d/%H:%i')
AS
	contact_day
FROM
	$wpdb->contact
ORDER BY
	created_at ASC
LIMIT
	$perPage
OFFSET
	$offset
DOC_END;

//$perPage分のmailデーター
$ten_mail = $wpdb->get_results($sql, ARRAY_A);
//件数
$ten_cnt = $wpdb->num_rows;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css?family=Rouge+Script&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" /><meta name="viewport" content="width=device-width,initial-scale=1">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<title><?php bloginfo('name'); ?></title>
<?php wp_head(); ?>

</head>

<body>
	<p style="color: red"><?php echo $_SESSION['login']; ?></p>

<div class="container_admin">
	<div class="wrapper">
	<h3 class="kanri1">管理ページ</h3>
		<p class="kanri2">
		<a href="<?php echo home_url(); ?>"><input type="submit" name="logout" value="ログアウト"></a>
		</p>
	</div>

<table border="1">

<?php 

echo "<tr><th class='id'>id</th><th class='kokyaku_name'>お名前</th><th class='email'>メールアドレス</th><th>お問い合わせ内容</th><th class='contact_time'>問い合わせ時間</th></tr>";

$x = 0;
foreach($ten_mail as $row) {
	$result_array[$x] = $row;
	$x++;
}

for($i = 0; $i < $ten_cnt; $i++) {
		echo "<tr><td class='id'>".
		$result_array[$i]['id']."</td><td>".
		$result_array[$i]['kokyaku_name']."</td><td class='email'>".
		$result_array[$i]['email']."</td><td>".
		$result_array[$i]['text']."</td><td>".
		$result_array[$i]['contact_day']."</td>
		</tr>";
}
?>
</table>

<div class="page_nation_box">
<?php
for($i = 1; $i <= $page_sum; $i++) : ?>
<?php if($page == $i) : ?>
	<a class='page_nation page_current' href='<?php echo add_query_arg('mp', $i, home_url('admin-page')); ?>'><?php echo $i; ?></a>
<?php else : ?>
	<a class='page_nation' href='<?php echo add_query_arg('mp', $i, home_url('admin-page')); ?>'><?php echo $i; ?></a>
<?php endif; ?>
<?php endfor; ?>
</div>
</div>
<?php get_footer(); ?>