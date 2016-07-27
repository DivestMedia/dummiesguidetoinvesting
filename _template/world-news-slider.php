<header class="text-center margin-bottom-30 margin-top-60">
	<h2 class="section-title">News from around the Globe</h2>
</header>
<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
	<?php
		$_curcategory = 'latest-news';
		$_curlimit = 10;
		$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
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
     			$_postcontent = substr(strip_tags(html_entity_decode($p->post_content)),0,150).'...';
     			$_custom_url = esc_url(home_url( '/' ).'latest-news/'.$p->ID.'/'.CustomPageTemplate::seoUrl($p->post_title));
     			?>
				<div class="img-hover">
					<a href="<?=$_custom_url?>">
						<img class="img-responsive" src="<?=$p->featured_image?>" alt="<?=$p->post_title?>"  style="height:149px;">
					</a>
					<h4 class="text-left margin-top-20"><a href="<?=$_custom_url?>"><?=$p->post_title?></a></h4>
					<p class="text-left"><?=$_postcontent?></p>
				</div>
     			<?php
     		}
     	}
	?>
	
</div>