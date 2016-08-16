<?php
  get_header();
  	$_curcategory = 'latest-news';
	$_curlimit = 32;
	if(!empty(get_option('cgp_server_base_url')))
		$_cururl = get_option('cgp_server_base_url');
	$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
	$_posts = json_decode($_posts);
	$_post = $_posts[CustomPageTemplate::post_search($_feedid, $_posts)];
	if(empty($_post)){
		wp_redirect( home_url() ); exit;
	}
	$ending = '...<br><br>To continue reading this article, visit <a href="'.$_post->guid.'">'.$_post->guid.'</a>';
	$_post->post_content = truncate(html_entity_decode($_post->post_content),floor(strlen(html_entity_decode($_post->post_content))/2),array('html' => true, 'ending' => $ending));
?>
<!-- <section class="page-header dark page-header-xs">
	<div class="container">
		<h1>Latest News</h1> -->
		<?php //edit_post_link('<span class="font-lato size-18 weight-300 text-white"></i> '. __( 'Edit Page', XYR_SMARTY ) .'</span>' ); ?>
		<!-- breadcrumbs -->
		<!-- <ol class="breadcrumb">
			<li><a href="<?=site_url();?>">Home</a></li>
			<li class="active">Latest News</li>
		</ol> -->
		<!-- /breadcrumbs -->
	<!-- </div>
</section> -->

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9">
				<h1 class="blog-post-title"><?=$_post->post_title?></h1>
				<ul class="blog-post-info list-inline">
					<li>
						<a href="#">
							<i class="fa fa-clock-o"></i> 
							<span class="font-lato"><?=date('F j, Y',strtotime($_post->post_date))?></span>
						</a>
					</li>
					<!-- <li>
						<a href="#">
							<i class="fa fa-comment-o"></i> 
							<span class="font-lato"></span>
						</a>
					</li> -->
				</ul>

				<div class="thumbnail">
					<img class="img-responsive" src="<?=$_post->featured_image?>" alt="" />
				</div>

				<!-- article content -->
				<p class="dropcap"><p><?php echo html_entity_decode($_post->post_content)?></p></p>
							
				<div class="divider divider-dotted"><!-- divider --></div>

				<!-- SHARE POST -->
				<div class="clearfix margin-top-30">

					<span class="pull-left margin-top-6 bold hidden-xs">
						Share Post: 
					</span>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-facebook pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-twitter pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-gplus pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-linkedin pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-pinterest pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>

					<a href="#" class="social-icon social-icon-sm social-icon-transparent social-call pull-right" data-toggle="tooltip" data-placement="top" title="" data-original-title="Email">
						<i class="icon-email3"></i>
						<i class="icon-email3"></i>
					</a>

				</div>
				<!-- /SHARE POST -->
			</div>
			<div class="col-md-3 col-sm-3">

							<!-- SOCIAL ICONS -->
							<div class="hidden-xs margin-top-30 margin-bottom-60">
								<a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-gplus pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-linkedin pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
									<i class="icon-linkedin"></i>
									<i class="icon-linkedin"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-rss pull-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
							</div>

							<!-- INLINE SEARCH -->
							<!-- <div class="inline-search clearfix margin-bottom-30">
								<form action="#" method="get" class="widget_search">
									<input type="search" placeholder="Start Searching..." id="s" name="s" class="serch-input">
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div> -->
							<!-- /INLINE SEARCH -->
							<br>
							<hr>

							<!-- FEATURED VIDEO -->

							<?php 
							if(is_active_sidebar('sidebar-single'))
									dynamic_sidebar('sidebar-single');
							// include_once(get_stylesheet_directory().'/_template/latest-news-widget.php');?>

						</div>
		</div>
	</div>
</section>

<?php
  get_footer();