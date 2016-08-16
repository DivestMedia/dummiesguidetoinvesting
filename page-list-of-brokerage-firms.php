<?

get_header();

?>
	<!-- FEATURES -->
	<section id="features" class="section-about">
		<div class="container">
			<header class="text-center margin-bottom-30">
				<h2 class="section-title">List of Brokerage Firms</h2>
			</header>
			<div class="row">
				<div class="col-md-12">
				<?php
					while ( have_posts() ) : the_post();
						echo the_content();
					endwhile;
				?>
					<div id="blog" class="clearfix blog-isotope blog-isotope-3" style="position: relative;">
						<?php
							$_curcategory = 'brokerage-firms';
        					$_curlimit = 40;
							$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
				         	$_posts = json_decode($_posts);
				         	if($_posts!==NULL){
				         		foreach ($_posts as $p) {
				         			$_custom_url = esc_url(home_url( '/' ).'find-a-broker/list-of-brokerage-firms/'.$p->ID.'/'.$CustomPageTemplate->seoUrl($p->post_title));
				         			?>
				         			<div class="blog-post-item cont-brokerage-firms">
										<figure style="background-image:url(<?=$p->featured_image?>)">
										</figure>
										<span class="section-content">
											<div class="text-left">
												<a href="<?=$_custom_url?>"><h4 class="title"><strong><?=$p->post_title?></strong></h4></a>
												<label><?=mb_strimwidth(strip_tags($p->post_excerpt), 0, 245, '...');?></label>
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
			</div>
		</div>
	</section>
	<!-- /FEATURES -->
	<?

get_footer();