<?
get_header();
InvestOrDivestWidget::count_postviews($post->ID);
?>
			<section class="dark sec-invest-or-divest">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<header class="margin-bottom-30">
								<h3><?=$post->post_title?></h3>
							</header>
							<div class="embed-responsive embed-responsive-16by9">
							<?php
								$iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
								echo wp_oembed_get($iod_video, '');
							?>
								<div></div>
							</div>
							<div class="current-episode-details">
<strong>Published on <?=date('F d, Y',strtotime($post->post_date))?></strong>
								<p class="details-content less"><?=$post->post_content?></p>
								<div class="text-center btn-show-more-details">SHOW MORE</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<?=InvestOrDivestWidget::generate_side_widget(8,$post->ID)?>
						</div>
					</div>
				</div>
			</section>
			<section class="sec-invest-or-divest-comments">
				<div class="container">
					<div class="row">
						<div class="col-md-8 cont-main-comments">
							<div id="comments" class="comments">
								<?php 
									comments_template();
								?>
							</div>
						</div>
						<div class="col-md-4">
							
						</div>
					</div>
				</div>
			</section>
			<section class="dark sec-invest-or-divest">
				<div class="container">
					<br>
					<header class="text-center margin-bottom-30">
						<h3>More from Our Channels</h3>
					</header>
					<!-- Featured Videos -->
					<?=InvestOrDivestWidget::generate_featured_videos(4)?>
					<header class="text-center margin-top-40">
						<h4 class="margin-bottom-10">Don't miss out on the latest Dummies Guide to Investing videos!</h4>
						<button type="button" class="btn btn-warning btn-sm btn-custom yellow">SUBSCRIBE NOW</button>
					</header>
				</div>
			</section>



			<!-- FEATURES -->
			<section id="features">
				<div class="container">

					<div class="row cont-ads-long">
						<div class="col-md-12">
							<img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
						</div>
					</div>	
					<?php include_once('world-news-slider.php');?>
				</div>
			</section>
			<!-- /FEATURES -->
<?

get_footer();