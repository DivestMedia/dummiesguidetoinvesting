<?
get_header();
?>
			<section class="dark" style="background-color: #3b3b3b;">
				<div class="container">
					<header class="text-center margin-bottom-30">
						<h3>Invest or Divest Latest Episodes</h3>
					</header>
					<div class="row grid-color">
						<div class="col-md-8 col-sm-12">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/43256303" width="800" height="450"></iframe>
								<div></div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<?=InvestOrDivestWidget::generate_side_widget(5)?>
						</div>
					</div>
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
					<?php include_once('_template/world-news-slider.php');?>
				</div>
			</section>
			<!-- /FEATURES -->
<?

get_footer();