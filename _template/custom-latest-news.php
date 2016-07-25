<?php
  get_header();
  	$_curcategory = 'latest-news';
	$_curlimit = 32;
	if(!empty(get_option('cgp_server_base_url')))
		$_cururl = get_option('cgp_server_base_url');
	$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
	$_posts = json_decode($_posts);
	$_post = $_posts[CustomPageTemplate::post_search($_feedid, $_posts)];
	// echo '<pre>';
	// print_r($_posts);
	// echo '</pre>';
	if(empty($_post)){
		wp_redirect( home_url() ); exit;
	}
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

							<!-- <hr> -->

							<!-- FEATURED VIDEO -->
							<h3 class="hidden-xs size-16 margin-bottom-10">FEATURED VIDEO</h3>
							<div class="hidden-xs embed-responsive embed-responsive-16by9 margin-bottom-60">
								<iframe class="embed-responsive-item" src="http://player.vimeo.com/video/8408210" width="800" height="450"></iframe>
							</div>


							<!-- side navigation -->
							<div class="side-nav margin-bottom-60 margin-top-30">

								<div class="side-nav-head">
									<button class="fa fa-bars"></button>
									<h4>CATEGORIES</h4>
								</div>
								<ul class="list-group list-group-bordered list-group-noicon uppercase">
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(12)</span> MEDIA</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(8)</span> MOVIES</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(32)</span> NEW</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(16)</span> TUTORIALS</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(2)</span> DEVELOPMENT</a></li>
									<li class="list-group-item"><a href="#"><span class="size-11 text-muted pull-right">(1)</span> UNCATEGORIZED</a></li>

								</ul>
								<!-- /side navigation -->

							
							</div>


							<!-- JUSTIFIED TAB -->
							<div class="tabs nomargin-top hidden-xs margin-bottom-60">

								<!-- tabs -->
								<ul class="nav nav-tabs nav-bottom-border nav-justified">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
											Popular
										</a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab">
											Recent
										</a>
									</li>
								</ul>

								<!-- tabs content -->
								<div class="tab-content margin-bottom-60 margin-top-30">

									<!-- POPULAR -->
									<div id="tab_1" class="tab-pane active">

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/1-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/2-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/3-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Nam et lacus neque. Ut enim massa, sodales</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

									</div>
									<!-- /POPULAR -->


									<!-- RECENT -->
									<div id="tab_2" class="tab-pane">

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/4-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Curabitur pellentesque neque eget diam</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/5-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Maecenas metus nulla</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->

										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="blog-sidebar-left.html">
													<img src="assets/images/demo/people/300x300/6-min.jpg" width="50" alt="">
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="blog-sidebar-left.html" class="tab-post-link">Quisque ut nulla at nunc</a>
												<small>June 29 2014</small>
											</div>
										</div><!-- /post -->
									</div>
									<!-- /RECENT -->

								</div>

							</div>
							<!-- JUSTIFIED TAB -->


							<!-- TAGS -->
							<h3 class="hidden-xs size-16 margin-bottom-20">TAGS</h3>
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

							</div>


							

							


							<!-- FACEBOOK -->
							<iframe class="hidden-xs" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fstepofweb&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>


							<hr>


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

						</div>
		</div>
	</div>
</section>

<?php
  get_footer();