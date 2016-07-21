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
		<meta name="google-site-verification" content="uzlQLKlRMnomfRINrFGV5ai-QejWPXzfLREb-DrbGrY" />
		<meta name="msvalidate.01" content="FFBD617B82949A50C595305B10C4B102" />

		<? wp_head();?>	
		
		<link rel='stylesheet' id='main-css' href='<?=get_stylesheet_directory_uri();?>/main.css' type='text/css' media='all' />
			
	</head>

	
	<body class="smoothscroll enable-animation">

	


		<!-- wrapper -->
		<div id="wrapper" >
		
			<?
				global $_navClass;

			?>
			
			<!-- Top Bar -->
			<div id="header" class="<?=empty($_navClass) ? 'sticky header-sm clearfix' : $_navClass;?> noshadow">
				

				<!-- TOP NAV -->
				<header id="topNav" class="">
					<div class="container" >
					
						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						
						<!-- BUTTONS -->
						<ul class="pull-right nav nav-pills nav-second-main">

							<!-- SEARCH -->
							<li class="search">
								<a href="javascript:;">
									<i class="fa fa-search"></i>
								</a>
								<div class="search-box">
									<form action="<?=site_url();?>" method="post">
										<div class="input-group">
											<input type="text" name="src" placeholder="Search" class="form-control" />
											<span class="input-group-btn">
												<button class="btn btn-primary" type="submit">Search</button>
											</span>
										</div>
									</form>
								</div> 
							</li>
							<!-- /SEARCH -->
							
							<!-- ACCOUNT -->
							<li class="acount">
								<a href="<?=site_url('account');?>">
									<i class="glyphicon glyphicon-user"></i> 
								</a>
							</li>
							<!-- /ACCOUNT -->

						</ul>
						<!-- /BUTTONS -->
						
						
						<!-- Logo -->
						
						<a class="logo pull-left" href="<?php bloginfo('home'); ?>" title="<? bloginfo();?>">
							<?
							/* if(is_home()){ ?><img src="<?=get_stylesheet_directory_uri();?>/assets/dv-media-sm.png" alt="" class="wow fadeInDown" />
							<? }else{ ?>
							<img src="<?=get_stylesheet_directory_uri();?>/assets/dv-logo-blk.png" alt="" class="wow fadeInDown" />
							<? } */ ?>
							
							<img src="<?=get_stylesheet_directory_uri();?>/assets/dv-logo-blk.png" alt="" class="wow fadeInDown" />
							
							
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-right nav-main-collapse collapse nomargin">
							<nav class="nav-main noradius" style="background-color: transparent !important;">

								<!--
									NOTE
									
									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example: 

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								
								<?

								$_menu = wp_nav_menu(array(
									'menu' => 'main',
									'walker' => new xyren_smarty_walker_nav_menu(), 
									'menu_id'=>'topMain',
									'container' =>'ul',
									'menu_class' =>'uppercase nav nav-pills nav-main noradius',
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

			
			<? 
			
			