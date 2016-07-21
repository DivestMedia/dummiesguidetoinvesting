
	
	<section class="noborder nopadding">
		<div class="container nopadding">
		
				
			<? 
		
				global $wp_query, $query_string;
				$_category = $wp_query->query; 
				query_posts( '&posts_per_page=6&offset=0&post_type=news');
					
				xyr_standard_loop('', '<h3 class="weight-500">LATEST NEWS UPDATE</h3>');
			
				wp_reset_postdata();
			?>
		
		</div>
	</section>