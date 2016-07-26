<!-- latest news -->
<h3 class="hidden-xs size-16 margin-bottom-20">LATEST NEWS</h3>
<?php 
	if(empty($_posts)){
		$_curcategory = 'latest-news';
		$_curlimit = 5;
		if(!empty(get_option('cgp_server_base_url')))
			$_cururl = get_option('cgp_server_base_url');
		$_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
		$_posts = json_decode($_posts);
	}
	$p_limit = 5;
	foreach($_posts as $p){
		if($p->ID!=$_feedid){
			if($p_limit-->0){
				$_custom_url = esc_url(home_url( '/' ).'latest-news/'.$p->ID.'/'.CustomPageTemplate::seoUrl($p->post_title));
?>
	<div class="row tab-post"><!-- post -->
		<div class="col-md-3 col-sm-3 col-xs-3">
			<a href="<?=$_custom_url?>">
				<img src="<?=$p->featured_image?>" width="50" alt="">
			</a>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			<a href="<?=$_custom_url?>" class="tab-post-link"><?=$p->post_title?></a>
			<small><?=date('F j, Y',strtotime($p->post_date))?></small>
		</div>
	</div><!-- /post -->
<?php 
			}
		}
	}
?>
<!-- /latest news -->