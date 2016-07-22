<?

get_header();

?>
			<!-- FEATURES -->
			<section id="features" class="section-about">
				<div class="container">
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">Stockwatch</h2>
					</header>
					<div class="row">
						<div class="col-md-12">
						<?php
							while ( have_posts() ) : the_post();
								echo the_content();
							endwhile;
						?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<script src="http://markets.financialcontent.com/stocks?Module=tickerbar&amp;Output=JS"></script>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 margin-bottom-30">
							<h4><strong>Markets</strong></h4>
							<!-- TradingView Widget BEGIN -->
							<div id="tv-medium-widget-e5c5d"></div>
							<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
							<script type="text/javascript">
							new TradingView.MediumWidget({
							  "container_id": "tv-medium-widget-e5c5d",
							  "symbols": [
							    [
							      "S&P 500",
							      "INDEX:INX|1y"
							    ],
							    [
							      "CBOE Volatility Index",
							      "VIX|1y"
							    ],
							    [
							      "Dow Industrial",
							      "INDEX:DJY0|1y"
							    ]
							  ],
							  "gridLineColor": "#d58512",
							  "fontColor": "#83888D",
							  "underLineColor": "#fff2cc",
							  "trendLineColor": "#d58512",
							  "width": "100%",
							  "height": "300px",
							  "tradeItWidget": false,
							  "locale": "en"
							});
							</script>
							<!-- TradingView Widget END -->

						</div>
						<div class="col-md-6 margin-bottom-30">
							<h4><strong>Stock Indexes</strong></h4>
							<!-- TradingView Widget BEGIN -->
							<div id="tv-medium-widget-adb5b"></div>
							<script type="text/javascript">
							new TradingView.MediumWidget({
							  "container_id": "tv-medium-widget-adb5b",
							  "symbols": [
							  	[
							      "FTSE 100",
							      "INDEX:FTSE|1y"
							    ],
							    [
							      "Hang Seng",
							      "INDEX:HSI|1y"
							    ],
							    [
							      "Nikkei 225",
							      "INDEX:NKY|1y"
							    ]
							  ],
							  "gridLineColor": "#d58512",
							  "fontColor": "#83888D",
							  "underLineColor": "#fff2cc",
							  "trendLineColor": "#d58512",
							  "width": "100%",
							  "height": "300px",
							  "tradeItWidget": false,
							  "locale": "en"
							});
							</script>
							<!-- TradingView Widget END -->

						</div>
					</div>
					<div class="row">
						<div class="col-md-6 margin-bottom-30">
							<h4><strong>Commodities</strong></h4>
							<!-- TradingView Widget BEGIN -->
							<div id="tv-medium-widget-130c9"></div>
							<script type="text/javascript">
							new TradingView.MediumWidget({
							  "container_id": "tv-medium-widget-130c9",
							  "symbols": [
							    [
							      "Crude Oil",
							      "FX:USOIL|1y"
							    ],
							    [
							      "Corn",
							      "CBOT:QBC1!|1y"
							    ],
							    [
							      "Gold",
							      "COMEX:GC1!|1y"
							    ]
							  ],
							  "gridLineColor": "#d58512",
							  "fontColor": "#83888D",
							  "underLineColor": "#fff2cc",
							  "trendLineColor": "#d58512",
							  "width": "100%",
							  "height": "300px",
							  "tradeItWidget": false,
							  "locale": "en"
							});
							</script>
							<!-- TradingView Widget END -->
						</div>
						<div class="col-md-6 margin-bottom-30">
							<h4><strong>Currencies</strong></h4>
							<!-- TradingView Widget BEGIN -->
							<div id="tv-medium-widget-11c4c"></div>
							<script type="text/javascript">
							new TradingView.MediumWidget({
							  "container_id": "tv-medium-widget-11c4c",
							  "symbols": [
							    [
							      "EURO/USD",
							      "FX_IDC:EURUSD|1y"
							    ],
							    [
							      "USD/CAD",
							      "FX:USDCAD|1y"
							    ],
							    [
							      "USD/JPY",
							      "FX:USDJPY|1y"
							    ]
							  ],
							  "gridLineColor": "#d58512",
							  "fontColor": "#83888D",
							  "underLineColor": "#fff2cc",
							  "trendLineColor": "#d58512",
							  "width": "100%",
							  "height": "300px",
							  "tradeItWidget": false,
							  "locale": "en"
							});
							</script>
							<!-- TradingView Widget END -->
						</div>
					</div>
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">Latest Stocks News</h2>
					</header>

					<div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
						<?php
							$_curcategory = 'stocks';
        					$_curlimit = 10;
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
					     			$_postcontent = substr(strip_tags(html_entity_decode($p->post_content)),0,150).'...';

					     			?>
									<div class="img-hover">
										<a href="<?=$p->guid?>">
											<img class="img-responsive" src="<?=$p->featured_image?>" alt="<?=$p->post_title?>"  style="height:149px;">
										</a>
										<h4 class="text-left margin-top-20"><a href="<?=$p->guid?>"><?=$p->post_title?></a></h4>
										<p class="text-left"><?=$_postcontent?></p>
									</div>
					     			<?php
					     		}
				         	}
						?>
					</div>
				</div>
			</section>
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