<?

get_header();

?>
	<!-- FEATURES -->
	<section id="features" class="section-about">
		<div class="container">
			<header class="text-center margin-bottom-30">
				<h2 class="section-title">E-Books</h2>
			</header>
			<div class="row">
				<div class="col-md-12">
				<?php
					while ( have_posts() ) : the_post();
						echo the_content();
					endwhile;
				?>
					<div id="portfolio" class="clearfix portfolio-isotope portfolio-isotope-4" style="position: relative;">
						<?php
							$_curcategory = 'e-books';
        					$_curlimit = 40;
							$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
				         	$_posts = json_decode($_posts);
				         	if($_posts!==NULL){
				         		foreach ($_posts as $p) {
				         			$_flag = 0;
				         			$_postcontent = substr(strip_tags(html_entity_decode($p->post_content)),0,150).'...';

				         			$_slugs = json_decode($p->post_terms);
				         			$_pslug = '';
				         			foreach ($_slugs as $_slug) {
				         				$_pslug .= ' '.$_slug->slug;
				         			}
				         			$_custom_url = esc_url(home_url( '/' ).'community/media/e-books/'.$p->ID.'/'.$CustomPageTemplate->seoUrl($p->post_title));
				         			if(!$_flag){
					         			?>
					         			<div class="portfolio-item has-title cont-e-books"><!-- item -->

											<div class="item-box">
												<figure>
													<span class="item-hover">
														<span class="overlay dark-5"></span>
														<span class="inner">
															<a href="<?=$_custom_url?>"><h4><strong><?=$p->post_title?></strong></h4></a>
														</span>

														<!-- overlay title -->
														<div class="item-box-overlay-title">
															<label><?=$_postcontent?></label>
														</div><!-- /overlay title -->

													</span>

													<img class="img-responsive" src="<?=$p->featured_image?>" width="600" height="399" alt="">
												</figure>
											</div>

											
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