<!doctype html>
<html lang="EN">

<head>
	<title><?= isset($page_title) ? $page_title : $this->settings->get('app_name') ?></title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name=description content="<?= isset($page_description) ? $page_description : $this->settings->get('app_description') ?>">
	<meta name=author content="<?= isset($page_author) ? $page_author : $this->settings->get('app_author') ?>">
	<meta name="keywords" content="<?= isset($page_keywords) ? $page_keywords : $this->settings->get('app_keywords') ?>">

	<!-- Facebook open graph -->
	<meta property="og:title" content="<?= isset($page_title) ? $page_title : $this->settings->get('app_name') ?>" />
	<meta property="og:url" content="<?= current_url() ?>" />
	<meta property="og:type" content="<?= isset($app_type) ? $app_type : $this->settings->get('app_type') ?>" />
	<meta property="og:description" content="<?= isset($page_description) ? $page_description : $this->settings->get('app_description') ?>" />
	<meta property="og:image" content="<?= isset($page_image) ? $page_image : base_url('assets/img/favicon.png') ?>" />
	
	<!-- Twitter meta tags -->
	<meta name="twitter:title" content="<?= isset($page_title) ? $page_title : $this->settings->get('app_name') ?>" />
	<meta property="twitter:url" content="<?= current_url() ?>" />
	<meta property="twitter:description" content="<?= isset($page_description) ? $page_description : $this->settings->get('app_description') ?>" />
	<meta property="twitter:image" content="<?= isset($page_image) ? $page_image : base_url('assets/img/favicon.png') ?>" />

	<link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700,900&display=swap" rel="stylesheet">
	<!-- Meanmenu css -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/meanmenu.css">
	<!-- Magnific css -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.min.css">
	<!-- Animation CSS -->
	<link href="<?= base_url('assets/') ?>css/aos.min.css" rel="stylesheet">
	<!-- Slick Carousel CSS -->
	<link href="<?= base_url('assets/') ?>css/slick.css" rel="stylesheet">
	<!-- Main CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>style.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
</head>

<body>
	<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

	<!--  Preloader Start
========================-->
	<div id='preloader'>
		<div id='status'>
			<img src='<?= base_url('assets/') ?>img/loading.gif' alt='LOADING . . ' />
		</div>
	</div>