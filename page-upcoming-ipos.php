<?

get_header();

?>
	<!-- FEATURES -->
	<section id="features" class="section-about">
		<div class="container">
			<header class="text-center margin-bottom-30">
				<h2 class="section-title">Upcoming IPO’s</h2>
			</header>
			<div class="row">
				<div class="col-md-12">
				<?php
					while ( have_posts() ) : the_post();
						echo the_content();
					endwhile;
				?>
					<div id="blog" class="clearfix blog-isotope blog-isotope-4" style="position: relative;">
						<?php
							$_curcategory = 'upcoming-ipos';
        					$_curlimit = 40;
        					if(!empty(get_option('cgp_server_base_url')))
								$_cururl = get_option('cgp_server_base_url');
							$_posts =  do_shortcode( '[CGP_GENERATE_POSTS url="'.$_cururl.'" limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
				         	$_posts = json_decode($_posts);
				         	if($_posts!==NULL){
				         		foreach ($_posts as $p) {
				         			$_flag = 0;
				         			$_terms = json_decode($p->post_terms);
				         			
				         			if(!empty($_terms)){
				         				foreach ($_terms as $t) {

				         					if(is_int(stripos($t->slug,date('F')))){
				         						$_flag = 1;
				         						break;
				         					}
				         				}
				         			}
				         			if($_flag){
					         			?>
					         			<div class="blog-post-item cont-upcoming-ipo">
											<figure style="background-image:url(<?=$p->featured_image?>)">
											</figure>
											<span class="section-content">
												<div class="text-left">
													<!--<a href="<?=$p->guid?>"><h4 class="title"><strong><?=$p->post_title?></strong></h4></a>-->
													<?=html_entity_decode($p->post_excerpt);?>
												</div>
											</span>
										</div>
					         			<?php
				         			}
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