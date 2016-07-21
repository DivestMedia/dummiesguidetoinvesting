	
	
	<section class="nopadding noborder margin-top-60 ">
		<div class="container nopadding">
			<div class="row">
			
				<?	
				$main_news = new WP_Query( '&posts_per_page=2&offset=6&post_type=news');
				if ($main_news->have_posts()) : while ($main_news->have_posts()) : $main_news->the_post(); ?>
					<div class="col-sm-6 col-md-6 col-lg-6">

						<div class=" margin-bottom-20 column-content">
							<a href="<?php the_permalink() ?>">
							<? if(has_post_thumbnail()) {
								the_post_thumbnail('mid-image', array('class'=>'img-responsive margin-bottom-10 grey-onhover'));
							} ?></a>
							
							<h3 class="margin-bottom-0 weight-500"><a href="<?php the_permalink() ?>" title="<? the_title();?>"><?=xyr_smarty_limit_chars(get_the_title(),90);?></a></h3>
							<span class="text-gray size-11">
								<i class="fa fa-calendar-o"></i> <? the_time('jS M Y , h:i');?>
								
								&nbsp;&nbsp;&nbsp;
								<i class="fa fa-user-o"></i> By: <? the_author();?>
							
							</span>
							
							
							
							
						</div>
	
					</div>
			
				<? endwhile; endif; ?>	
				<? wp_reset_postdata(); ?>	
				
			</div>
			<div class="divider"><!-- divider --></div>
		</div>
	</section>