<?php get_header();
?>
<section>
	<div class="topImage">
		<img src="<?php bloginfo('template_directory'); ?>/images/drip_coffee.jpg">
	</div>
</section>
<section>

	<div class="cofepic">
		<h1>menu</h1>
 
		<div class="cofepics">
		<ul class="pictures">
		<li class="pic pic1"><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/pasta.jpg"><div class="text">軽食</div></a></li>
		<li class="pic"><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/coffee1.jpg"><div class="text">コーヒー</div></a></li>
		<li class="pic"><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/cake.jpg"><div class="text">スイーツ</div></a></li>
		</ul>
		</div>
	</div>
</section>
<section>
<div class="infos">
	<div class="info1">
		<h1>News</h1>
			<div class="info">
			<ul>
<?php $the_query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => -1 ) ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<div class="inner">
<!-- 新着情報 ここから -->
<div class="news">
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<span class="date"><?php the_time( 'Y/m/d' ); ?></span>
	<?php the_content(); ?>
<?php endwhile; ?>

<?php wp_reset_postdata(); ?>
</div>
<!-- 新着情報 ここまで -->
</div>
<?php endif; ?>



				<!-- <li>11月30日 コスタリカ入荷しました！</li>
				<li>11月19日 コーヒーセミナー行います！</li>
				<li>11月16日 パンケーキに新商品登場です!</li>
				<li>11月10日 コロンビア入荷しました！</li>
				<li>11月5日 スタッフ募集開始しました</li> -->
			</ul>
			</div>
	</div>
</div>
</section>
<section>
	<div class="nmenus">
		<h1>Night Pick Up</h1>
		<div class="ulmenu">
			<ul class="menue">
			<li><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/houji.jpg"><div class="ntext">ほうじ茶ラテ</div></a></li>
			<li><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/rum.jpg"><div class="ntext">ラム酒入りラテ</div></a></li>
			<li><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/beer.jpg"><div class="ntext">beer</div></a></li>
			<li><a href="<?php echo (home_url('pasta')); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/tapas.jpg"><div class="ntext">tapas</div></a></li>
			</ul>
		</div>
	</div>
</section>
<section>
	<h1 id="target">Have a great relax time here</h1>

	<div class="enjyoy">
		<img src="<?php bloginfo('template_directory'); ?>/images/coffee5.jpg">
	</div>
</section>
<?php get_footer(); ?>