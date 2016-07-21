


	<section class="noborder">
		<div class="container nopadding">
			<div class="flexslider noradius " data-arrowNav="true" data-pauseOnHover="false">
				<ul class="slides">
				
					<?				
					//global $query_string; query_posts( $query_string . '&posts_per_page=7&category_name=Breaking News' );
					global $query_string; query_posts( $query_string . '&posts_per_page=6&post_type=news' );
					if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>">
							<? if(has_post_thumbnail()) {
								the_post_thumbnail('horizontal-image', array('class' => 'grey-onhover'));
							} ?>
								<div class="flex-caption"><?=xyr_smarty_limit_chars(get_the_title(),40);?></div>
							</a>
						</li>

					<? endwhile; endif; ?>	
					<? wp_reset_postdata(); ?>	
					
				</ul>
			</div>
		</div>
	</section>