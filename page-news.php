<?php
	get_header();
	$_curcategory = 'latest-news';
	$_curlimit = 32;
	if(!empty(get_option('cgp_server_base_url')))
		$_cururl = get_option('cgp_server_base_url');
	$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
	$_posts = json_decode($_posts);
	$_terms = [];
	foreach ($_posts as $p) {
		$_pterms = json_decode($p->post_terms);
		foreach ($_pterms as $pt) {
			if(!empty($pt)){
				if(!isset($_terms[$pt->slug])){
					$_terms[$pt->slug] = $pt->name;
				}
			}
		}
	}
?>
	<!-- FEATURES -->
	<section id="features" class="section-news">
		<div class="container">
			<header class="text-center margin-bottom-30">
				<h2 class="section-title">Global News</h2>
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
			         		 $newimgsrc = [
								'/wp-content/uploads/2016/02/www.newsoracle.comwp-contentuploads201509how-to-buy-stocks-e8ba2c93ea77c74045ee9d6badfe17c688654767.jpg',
								'/wp-content/uploads/2016/02/www.newsoracle.comwp-contentuploads201509Stock-Investment-1-4c260dbd76e9480e0d12c9c11d882f6c3a9f43e0.jpg',
								'/wp-content/uploads/2016/03/glocdn.investing.comnewsWarsWarsaw-Stock-Exchange_800x533_L_1430991033-dae82efb6283addfa779cad83ad60f22338685a5.jpg',
								'/wp-content/uploads/2016/05/stock-market-1.jpg',
								'/wp-content/uploads/2016/05/stock-market-2.jpg',
								'/wp-content/uploads/2016/05/glocdn.investing.comnewsLYNXNPEB7A004_L-55a0d1b38df4279dbc302f3d57dc3ef9c9925239.jpg',
								'/wp-content/uploads/2016/05/stock-watch.jpg',
								'/wp-content/uploads/2016/05/WideModern_StockMarketChart_062613-e1462847698711.jpg',
								'/wp-content/uploads/2016/04/glocdn.investing.comnewsBrazil-Stock-Market_1_309X149._800x533_L_1413121146-896630eb895cfa2c8e6ca0df38eeef72301215f9.jpg',
								'/wp-content/uploads/2016/05/gen-news-1.jpg',
								'/wp-content/uploads/2016/05/gen-news-2.jpg',
								'/wp-content/uploads/2016/05/gen-news-3.jpg',
								'/wp-content/uploads/2016/05/gen-news-4.jpg',
								'/wp-content/uploads/2016/05/gen-news-5.jpg',
								'/wp-content/uploads/2016/05/gen-news-6.jpg',
								'/wp-content/uploads/2016/05/gen-news-7.jpg',
								'/wp-content/uploads/2016/06/gen-news-8.jpg',
								'/wp-content/uploads/2016/06/gen-news-9.jpg',
								'/wp-content/uploads/2016/06/gen-news-10.jpg',
								'/wp-content/uploads/2016/06/gen-news-11.jpg',
								'/wp-content/uploads/2016/06/gen-news-12.jpg',
								'/wp-content/uploads/2016/06/gen-news-13.jpg',
								'/wp-content/uploads/2016/06/gen-news-14.jpg',
								'/wp-content/uploads/2016/06/gen-news-15.jpg',
								'/wp-content/uploads/2016/06/gen-news-16.jpg',
								'/wp-content/uploads/2016/06/gen-news-17.jpg',
								'/wp-content/uploads/2016/06/gen-news-18.jpg',
								'/wp-content/uploads/2016/06/gen-news-19.jpg'
							];
			         		foreach ($_posts as $p) {
			         			if (empty($p->featured_image)){
		         				  	$p->featured_image = $newimgsrc[rand(0,count($newimgsrc)-1)];
			         			}
			         			$_postcontent = substr(strip_tags(html_entity_decode($p->post_content)),0,150).'...';

			         			$_slugs = json_decode($p->post_terms);
			         			$_pslug = '';
			         			foreach ($_slugs as $_slug) {
			         				$_pslug .= ' '.$_slug->slug;
			         			}

			         			$_custom_url = esc_url(home_url( '/' ).'latest-news/'.$p->ID.'/'.$CustomPageTemplate->seoUrl($p->post_title));
			         			
			         			?>
			         			<div class="portfolio-item cont-global-news <?=$_pslug?>">
									<figure style="background-image:url(<?=$p->featured_image?>)"></figure>
									<span class="section-content">
										<div class="text-left">
											<a href="<?=$_custom_url?>" title="<?=$p->post_title?>"><h4 class="title"><strong><?=mb_strimwidth(strip_tags($p->post_title), 0, 37, '...');?></strong></h4></a>
											<label><?=mb_strimwidth(strip_tags(html_entity_decode($p->post_content)), 0, 135, '...');?></label>
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
			<?php include_once('_template/world-news-slider.php');?>
		</div>
	</section>
<?
	get_footer();