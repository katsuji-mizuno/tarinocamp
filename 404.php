<?php get_header(); ?>
<?php $id = get_page_by_path('store')->ID; ?>

		<style>/*
		<div class="bread">
			a href="<?php echo home_url(); ?>">トップ</a>　>　Not Found
		</div>
	*/</style>
		<div class="main">
			<div id="not_found">
				<div class="inner">
					<h1>404</h1>
					<p class="lead">Not Found.<br class="sp_tab"><span> ー お探しのページは見つかりませんでした。</span></p>
					<p class="text">
						申し訳ございません。アクセスしたページは削除されたか、URLが間違っている可能性がございます。<br>
						大変お手数ですが、左のメニューもしくは下部のトップボタンを押して本サイトにお戻りください。
					</p>
				</div>
				<p class="totop"><a class="btn404goTop" href="<?php echo home_url(); ?>">トップに戻る</a></p>
			</div>
		</div>

<?php get_footer(); ?>
