<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php wp_title( '|', true, 'right' ); ?><? bloginfo();?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- mobile settings -->
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

	<? wp_head();?>

	<link rel='stylesheet' id='main-css' href='<?=get_stylesheet_directory_uri();?>/main.css' type='text/css' media='all' />
	<link rel="apple-touch-icon" sizes="57x57" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?=get_stylesheet_directory_uri();?>/assets/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?=get_stylesheet_directory_uri();?>/assets/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=get_stylesheet_directory_uri();?>/assets/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>


<body class="smoothscroll enable-animation <?=(is_admin_bar_showing()?'has-admin-bar':'')?>">
	<!-- wrapper -->
	<div id="wrapper" >
		<!-- Top Bar -->
		<div id="header" class="sticky header-sm clearfix noshadow dark">
			<div id="topBar">
				<div class="container">

					<!-- right -->
					<ul class="top-links list-inline pull-right">
						<!-- SEARCH -->
						<li class="search">
							<a href="javascript:;">
								<i class="fa fa-search"></i>
							</a>
							<div class="search-box margin-top-10">
								<form action="<?=site_url()?>" method="get">
									<div class="input-group">
										<input type="text" name="s" placeholder="Search" class="form-control" value="">
										<span class="input-group-btn">
											<button class="btn btn-white" type="submit">Search</button>
										</span>
									</div>
								</form>
							</div>
						</li>

						<!-- /SEARCH -->
						<?php if(!is_user_logged_in()):?>
							<li><a href="<?=site_url('accounts/login')?>" class="btn btn-block btn-login">LOGIN</a></li>
							<li><a href="<?=site_url('accounts/register')?>" class="btn btn-block btn-login">REGISTER</a></li>
						<?php else: ?>
							<li class="text-welcome hidden-xs">Hi, <strong><?=xyr_smarty_limit_chars(wp_get_current_user()->nickname,16,false)?></strong></li>
							<li><a href="<?=site_url('accounts')?>" class="btn btn-block btn-login">MY ACCOUNT</a></li>
							<li><a href="<?=wp_logout_url(home_url())?>" class="btn btn-block btn-login">LOGOUT</a></li>
						<?php endif; ?>
						<li>
							<a href="#">
								<span class="word-rotator header-word-rotator active" data-delay="2000" style="height: 21px;">
									<span class="items" style="top: 0px;">
										<span>DEMO ACCOUNT</span>
										<span>COMING SOON</span>
										<span>DEMO ACCOUNT</span></span>
									</span>
								</a>
							</li>
							<li class="divest-logo-link">
								<a href="http://divestmedia.com">
									<img src="http://www.marketmasterclass.com/wp-content/themes/mmcv2/assets/img/divestmedia-top-logo.png">
								</a>
							</li>
						</ul>

					</div>
				</div>
				<!-- TOP NAV -->

				<header id="topNav">
					<div class="container-fluid ads-bar">
						<!-- Logo -->
						<div class="container">
							<a class="logo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo();?>">
								<img src="<?=CUSTOM_ASSETS?>dummies-logo-brand.png" alt="" class="custom-logo">
							</a>
							<div class="pull-right">
								<?php
									if(is_active_sidebar('home-ads-top'))
										dynamic_sidebar('home-ads-top');
								?>
							</div>
						</div>
					</div>
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>



						<!--
						Top Nav

						AVAILABLE CLASSES:
						submenu-dark = dark sub menu
					-->
					<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
						<nav class="nav-main">
							<?php
							if(!empty(wp_get_nav_menu_items('Main Menu'))){
								$_menu = wp_nav_menu(array(
									'menu' => 'Main',
									'walker' => new custom_xyren_smarty_walker_nav_menu(),
									'menu_id'=>'topMain',
									'container' =>'ul',
									'menu_class' =>'nav nav-pills nav-main has-topBar',
									'echo' => false
								));

								echo $_menu;
							}
							?>
						</nav>
					</div>
				</div>
			</header>
			<!-- /Top Nav -->
		</div>
		<div class="container">

		</div>
		<div class="cont-askanexpert">
			<a class="askanexpert-avatar" href="#ask-advisor-modal" data-toggle="modal" title="Ask an Expert"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>askanexpert_avatar.png" alt=""></a>
			<div class="askanexpert-message"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>askanexpert-message.png" alt=""></div>
			<button class="btn btn-warning btn-block btn-custom yellow btn-askanexpert" data-target="#ask-advisor-modal" data-toggle="modal" > ASK AN EXPERT</button>
		</div>
		<?
