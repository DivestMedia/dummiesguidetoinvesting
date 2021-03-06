<?php
  get_header();
  	$_curcategory = 'brokerage-firms';
	$_curlimit = 50;
	$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
	$_posts = json_decode($_posts);
	$_post = $_posts[CustomPageTemplate::post_search($_feedid, $_posts)];
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

				<div class="text-center">
				<figure class="box-shadow-2 margin-bottom-20 width-300" style="margin: 0 auto;">
					<img class="img-responsive" src="<?=$_post->featured_image?>" alt="<?=$_post->post_title?>" />
				</figure>
				</div>

				<!-- article content -->
				<div class="cont-article-content cont-brokerage-firm"><?=do_shortcode($_post->post_content)?></div>
							
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
							<h3 class="hidden-xs size-16 margin-bottom-10">FEATURED VIDEO</h3>
							<div class="hidden-xs embed-responsive embed-responsive-16by9 margin-bottom-30">
								<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
							</div>

							<hr>

							<?php 
								if(is_active_sidebar('sidebar-single'))
									dynamic_sidebar('sidebar-single');
							// include_once(get_stylesheet_directory().'/_template/latest-news-widget.php');?>

							<!-- TAGS -->
							<!-- <h3 class="hidden-xs size-16 margin-bottom-20">TAGS</h3>
							<div class="hidden-xs margin-bottom-60">

								<a class="tag" href="#">
									<span class="txt">RESPONSIVE</span>
									<span class="num">12</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">CSS</span>
									<span class="num">3</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">HTML</span>
									<span class="num">1</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">JAVASCRIPT</span>
									<span class="num">28</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">DESIGN</span>
									<span class="num">6</span>
								</a>
								<a class="tag" href="#">
									<span class="txt">DEVELOPMENT</span>
									<span class="num">3</span>
								</a>

							</div> -->

							<!-- FACEBOOK -->
							<!-- <iframe class="hidden-xs" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fstepofweb&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>
 -->

							<!-- <hr> -->


							

						</div>
		</div>
	</div>
</section>

<?php
  get_footer();