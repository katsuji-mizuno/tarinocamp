<!DOCTYPE HTML>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/common/favicon.ico">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-454547-9"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'UA-454547-9');
	</script>

	<?php $myCorpName = '© Trainocate Japan, Ltd. All Right Reserved.' ?>
	<?php $mySiteName = 'トレノキャンプ' ?>
	<?php $myDiscripton = get_bloginfo('description'); ?>
	<?php $myURL = home_url(); ?>

	<link rel="author" title="<?php echo $myCorpName; ?>" href="<?php echo $myURL; ?>">
	<meta name="description" content='<?php echo $myDiscripton; ?>'>
	<meta name="keywords" content="オンライン研修,プログラミングスクール,trainocamp,トレノキャンプ">
<meta name=" copyright" content="<?php echo $myCorpName; ?>">

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script>

	<?php echo '<script type="text/javascript">var templatePath = "' . get_template_directory_uri() . '";</script>'; ?>
	<?php echo '<script type="text/javascript">var homeURL = "' . home_url() . '";</script>'; ?>
	<?php echo '<script type="text/javascript">var blnIsHome = "' . is_home() . '";</script>'; ?>

	<meta property='og:title' content='<?php echo $mySiteName; ?>'>
	<meta property='og:description' content='<?php echo $myDiscripton; ?>'>
	<meta property='og:url' content='<?php echo $myURL; ?>'>
	<meta property='og:site_name' content='<?php echo $mySiteName; ?>'>
	<meta property='og:type' content='website'>
	<meta property='og:image' content='<?php echo get_template_directory_uri(); ?>/images/ogp.png' />
	<?php wp_head(); ?>

	<!-- フォント -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;500;700;800&family=Noto+Sans+JP:wght@400;500;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<!--以下不要なプラグインは削除-->

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/hover-min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/hover.css">


	<!--JS-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ofi.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.inview.min.js"></script>

	<!--ここまでプラグインは削除-->
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
