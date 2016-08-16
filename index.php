<?
global $post;
 query_posts([
     'posts_per_page' => 1,
     'posts_per_archive_page' => 1,
     'paged' => get_query_var('paged'),
     'post_type' => [
         'iod_video'
     ],
     'orderby' => 'date',
     'order' => 'DESC',
     'post_status'      => 'publish',
 ]);
get_header();
?>
			<!-- OWL SLIDER -->
			<section id="slider">
				<div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
					<div>
						<a href="#"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>samplebanner.png" alt=""></a>
					</div>
					<div>
						<a href="/demo-account/"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>banner-dummiesguide-dummyaccount.jpg" alt=""></a>
					</div>
					<div>
						<a href="/investor-assessment/"><img class="img-responsive" src="<?=CUSTOM_ASSETS?>banner-dummiesguide-questionnares.jpg" alt=""></a>
					</div>
				</div>
			</section>
			<!-- /OWL SLIDER -->
			<section class="dark" style="background-color: #3b3b3b;">
				<div class="container">
					<header class="text-center margin-bottom-30 section-title-container">
						<h3>Invest or Divest Latest Episodes</h3>
					</header>
					<div class="row grid-color">
						<div class="col-md-8 col-sm-12">
							<?php while ( have_posts() ) : the_post(); ?>
		                        
		                        <div class="embed-responsive embed-responsive-16by9">
		                            <?php
		                            $iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
		                            echo wp_oembed_get($iod_video, '');
		                            ?>
		                            <div></div>
		                        </div>
		                        <header class="margin-bottom-30">
		                            <h3><?=$post->post_title?></h3>
		                        </header>
		                    <?php endwhile; ?>
						 	<? wp_reset_postdata(); ?>
						</div>
						<div class="col-md-4 col-sm-12">
							<?=InvestOrDivestWidget::generate_side_widget(5,$post->ID)?>
						</div>
					</div>
					<br>
					<header class="text-center margin-bottom-30">
						<h3>More from Our Channels</h3>
					</header>
					<!-- Featured Videos -->
					<?=InvestOrDivestWidget::generate_featured_videos(4,$post->ID)?>
					<header class="text-center margin-top-40">
						<h4 class="margin-bottom-10">Don't miss out on the latest Dummies Guide to Investing videos!</h4>
						<button type="button" class="btn btn-warning btn-sm btn-custom yellow">SUBSCRIBE NOW</button>
					</header>
				</div>
			</section>

			<!-- FEATURES -->
			<section id="features">
				<div class="container">
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">Featured Articles</h2>
					</header>

					<!-- FEATURED BOXES 3 -->
					<div class="row cont-featured-article">
						<div class="col-md-3 col-sm-6 margin-bottom-10">
							<?php
								$_curcategory = 'rogue-trader';
								$_curlimit = 1;
								$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
								$_posts = json_decode($_posts);
								$_post = $_posts[0];
								$_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
								$_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
							?>
							<figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
							<span class="section-content">
								<div class="text-left">
									<a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
									<label><?=$_postcontent?></label>
								</div>
								<a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
							</span>
						</div>
						<div class="col-md-3 col-sm-6 margin-bottom-10">
							<?php
								$_curcategory = 'our-offshore-experts';
								$_curlimit = 1;
								$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
								$_posts = json_decode($_posts);
								$_post = $_posts[0];
								$_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
								$_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
							?>
							<figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
							<span class="section-content">
								<div class="text-left">
									<a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
									<label><?=$_postcontent?></label>
								</div>
								<a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
							</span>
						</div>
						<div class="col-md-3 col-sm-6 margin-bottom-10">
							<?php
								$_curcategory = 'starting-out';
								$_curlimit = 1;
								$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
								$_posts = json_decode($_posts);
								$_post = $_posts[0];
								$_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
								$_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
							?>
							<figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
							<span class="section-content">
								<div class="text-left">
									<a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
									<label><?=$_postcontent?></label>
								</div>
								<a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
							</span>
						</div>
						<div class="col-md-3 col-sm-6 margin-bottom-10">
							<div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": false, "pagination": false, "transitionStyle":"fadeUp"}'>
								<div>
									<img class="img-responsive" src="<?=CUSTOM_ASSETS?>images/demo/shop/banners/off_2.png" alt="">
								</div>
								<div>
									<img class="img-responsive" src="<?=CUSTOM_ASSETS?>images/demo/shop/banners/off_1.png" alt="">
								</div>
							</div>
						</div>
					</div>
					<!-- /FEATURED BOXES 3 -->
					<div class="row cont-ads-long">
						<div class="col-md-12">
							<img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
						</div>
					</div>	
					<?php include_once('_template/world-news-slider.php');?>
				</div>
			</section>
			<!-- /FEATURES -->
<?

get_footer();
			
			
			