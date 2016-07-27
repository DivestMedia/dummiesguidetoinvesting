<?php
	get_header();
	$_curcategory = $_feedcategory;
	$_curlimit = 50;
	$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
	$_posts = json_decode($_posts);
	$_cur_article_title = ucwords(str_replace('-', ' ', $_curcategory));
?>
	<!-- FEATURES -->
	<section id="features" class="section-news">
		<div class="container">
			<header class="text-center margin-bottom-30">
				<h2 class="section-title"><?=$_cur_article_title?></h2>
			</header>
			<!-- FEATURED BOXES 3 -->
			<div class="row">
				<?php if(!empty($_terms)){?>
				<ul id="portfolio_filter" class="nav nav-pills margin-bottom-60">
				<li class="filter active"><a data-filter="*" href="#">All</a></li>
				<?php foreach ($_terms as $slug => $t) {?>
					<li class="filter"><a data-filter=".<?=$slug?>" href="#"><?=$t?></a></li>
				<?php }?>
				</ul>
				<?php }?>
				<div id="portfolio" class="clearfix portfolio-isotope portfolio-isotope-4" style="position: relative;">
					<?php
						
			         	if($_posts!==NULL){
			         		
			         		foreach ($_posts as $p) {
			         			$p->post_content = preg_replace("/\[[\/]?vc_[^\]]*\]/", '', $p->post_content);
								$p->post_content = preg_replace("/\[[\/]?lvca_[^\]]*\]/", '', $p->post_content);
			         			
			         			$_postcontent = substr(strip_tags(html_entity_decode($p->post_content)),0,140).'...';

			         			$_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$p->ID.'/'.CustomPageTemplate::seoUrl($p->post_title));
			         			
			         			?>
			         			<div class="portfolio-item">
									<figure class="">
										<img class="img-responsive" src="<?=$p->featured_image?>" alt="" />
									</figure>
									<span class="section-content">
										<div class="text-left">
											<a href="<?=$_custom_url?>"><h4 class="title"><strong><?=$p->post_title?></strong></h4></a>
											<label><?=$_postcontent?></label>
										</div>
										<a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
									</span>
								</div>
			         			<?php
			         		}
			         	}
					?>
				</div>
			</div>
			<!-- /FEATURED BOXES 3 -->
		</div>
	</section>
	<!-- /FEATURES -->

	<section>
		<div class="container">
			<div class="row cont-ads-long">
				<div class="col-md-12">
					<img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
				</div>
			</div>	
			<?php include_once('world-news-slider.php');?>
		</div>
	</section>
<?
	get_footer();