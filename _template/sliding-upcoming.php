

	<section class="padding-bottom-10 background-black">
		<div class="container ">
		
			<header class="text-center margin-bottom-40">
				<p class="lead"><a href="<?=site_url('gigs-sked/upcoming/');?>"><i class="fa fa-microphone"></i> UPCOMING GIGS</a></p>
			</header>
			
			<div class="owl-carousel owl-padding-10 controlls-over" data-plugin-options='{ "singleItem": false, "items":"4", "navigation": true, "pagination": false, "autoPlay":true, "stopOnHover":false}'>
				
				<?				
				
				global $wpdb;
				$args = array(
					'post_type' => GIG_POSTTYPE,
					'posts_per_page'=> 9,
					'showposts'=> 9, 
					'meta_query' => array(array(
						'key' => '_gig_date',
						'value' => date("Y-m-d"),
						'compare' => '>=',//change to >= to make it upcoming
						)),
					'order' => 'ASC',
					'orderby'  => 'meta_value',
					'meta_key' => '_gig_date',
				);
				
				$gigsSlider = new WP_Query( $args );
				//if($gigsSlider->have_posts()):
				
				//global $query_string; query_posts('&posts_per_page=8&offset=10&category_name=Entertainment' );
				if ( $gigsSlider->have_posts()) : while ( $gigsSlider->have_posts()) :  $gigsSlider->the_post(); ?>
					
					<div class="img-hover link-black">
						<a href="<?php the_permalink() ?>" title="<? the_title();?>">
							<? if(has_post_thumbnail()) {
									the_post_thumbnail('mid-image', array('class' => 'img-responsive grey-onhover'));
							} ?>
						</a>
						
						<?
						
						$gig_date=get_post_meta(get_the_ID(),"_gig_date",true); 
						$_gig_date = date("jS M Y",strtotime($gig_date));
						
						?>

						<h4 class="text-left margin-top-20"><a href="<?php the_permalink() ?>" title="<? the_title();?>"><?=xyr_smarty_limit_chars(get_the_title(),50);?></a></h4>
						<ul class="text-left size-12 list-inline list-separator">
							<li>
								<i class="fa fa-calendar"></i> 
								<? echo $_gig_date;?>
							</li><? /* 
							<li>
							
								<i class="fa fa-user-o"></i> By: <? the_author();?>
							</li> */?>
						</ul>
					</div>
				
				<? endwhile; endif; ?>
				<? wp_reset_postdata(); ?>
				
			</div>
			
		</div>
	</section>		