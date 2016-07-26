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
		
		<link rel='stylesheet' id='main-css' href='<?=get_stylesheet_directory_uri();?>/main.min.css' type='text/css' media='all' />
			
	</head>

	
	<body class="smoothscroll enable-animation">
		<!-- wrapper -->
		<div id="wrapper" >
			<!-- Top Bar -->
			<div id="header" class="sticky header-sm clearfix noshadow dark">
				<!-- TOP NAV -->
				<header id="topNav">
					<div class="full-container">
					
						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						
						<!-- BUTTONS -->
						<ul class="pull-right nav nav-pills nav-second-main">
							
							<!-- ACCOUNT -->
							<li class="acount">
								<a href="#">
									<i class="glyphicon glyphicon-user"></i> 
								</a>
							</li>
							<!-- /ACCOUNT -->

						</ul>
						<!-- /BUTTONS -->
						
						
						<!-- Logo -->
						<a class="logo pull-left" href="<?php bloginfo('home'); ?>" title="<? bloginfo();?>">
							<img src="<?=CUSTOM_ASSETS?>dummies-to-investing.png" alt="" class="custom-logo">
						</a>
						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-right nav-main-collapse collapse submenu-dark">
							<nav class="nav-main">
								<?php

								$_menu = wp_nav_menu(array(
									'menu' => 'main',
									'walker' => new custom_xyren_smarty_walker_nav_menu(), 
									'menu_id'=>'topMain',
									'container' =>'ul',
									'menu_class' =>'nav nav-pills nav-main has-topBar',
									'echo' => false
								));
								
								echo $_menu;
								
								?>
							</nav>
						</div>
					</div>
				</header>
				<!-- /Top Nav -->
			</div>
			<div class="cont-askanexpert">
				<a class="askanexpert-avatar" href="#" title="Ask an Expert"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>askanexpert_avatar.png" alt=""></a> 
				<div class="askanexpert-message"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>askanexpert-message.png" alt=""></div>
				<button class="btn btn-warning btn-block btn-custom yellow btn-askanexpert"> ASK AN EXPERT</button>
			</div>
			<? 
