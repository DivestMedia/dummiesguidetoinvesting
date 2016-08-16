<?
get_header();
?>
<!-- FEATURES -->
<section id="features">
	<div class="container">
		<header class="margin-bottom-30">
			<h2 class="section-title">Subscribe</h2>
		</header>
		<div class="row">
			<div class="col-md-9 col-sm-9">
			<?php
				while ( have_posts() ) : the_post();
					echo the_content();
				endwhile;
			?>
			</div>
			<div class="col-md-3 col-sm-3">
				<?php
					if(is_active_sidebar('sidebar-single'))
						dynamic_sidebar('sidebar-single');
				?>
			</div>
		</div>
	</div>
</section>
<!-- /FEATURES -->
<?
get_footer();