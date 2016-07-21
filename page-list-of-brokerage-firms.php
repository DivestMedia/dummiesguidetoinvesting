<?

get_header();

?>
	<!-- FEATURES -->
	<section id="features" class="section-about">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php
					while ( have_posts() ) : the_post();
						echo the_content();
					endwhile;
				?>
					<div id="blog" class="clearfix blog-isotope blog-isotope-4" style="position: relative;">
						<?php
							$_curcategory = 'brokerage-firms';
        					$_curlimit = 40;
        					if(!empty(get_option('cgp_server_base_url')))
								$_cururl = get_option('cgp_server_base_url');
							$_posts =  do_shortcode( '[CGP_GENERATE_POSTS url="'.$_cururl.'" limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
				         	$_posts = json_decode($_posts);
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
				         			?>
				         			<div class="blog-post-item">
										<figure class="">
											<img class="img-responsive" src="<?=$p->featured_image?>" alt="" />
										</figure>
										<span class="section-content">
											<div class="text-left">
												<a href="<?=$p->guid?>"><h4 class="title"><strong><?=$p->post_title?></strong></h4></a>
												<?=$p->post_excerpt?>
											</div>
											<button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button>
										</span>
									</div>
				         			<?php
				         		}
				         	}
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /FEATURES -->
	<?

get_footer();