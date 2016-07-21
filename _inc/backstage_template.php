<?



add_filter( 'pre_get_posts', 'add_to_query_news' );

function add_to_query_news( $query ) {
	 if ( !is_admin() ) {
		if( $query->query_vars['suppress_filters'] ) // TODO check if necessary
			return $query;
		$supported = $query->get( 'post_type' );
		if ( !$supported || $supported == 'post' || $supported == 'page' )
			
			$supported = array( 'post', 'news' , 'gigs' , 'bands' , 'venue', 'page' );
			
			if(is_search()){
				//remove  page
				$supported = array( 'post', 'news' , 'gigs' , 'bands' , 'venue' );
			}
			if(is_author()){
				//remove the bands / page
				$supported = array( 'post', 'news' , 'gigs' );
			}
			
		
		elseif ( is_array( $supported ) )
			array_push( $supported, 'news' );
		$query->set( 'post_type', $supported );
		return $query;
	}
}

add_filter( 'posts_where', 'bandname_where', 10, 2 );
function bandname_where( $where, &$wp_query ){
    global $wpdb;
    if ( $bandname = $wp_query->get( 'bandname' ) ) {
		
		if($bandname == '#'){
			$where .= ' AND ' . $wpdb->posts . '.post_title  NOT REGEXP \'^[[:alpha:]]\'';
			$wp_query->query_vars['bandname'] = '0';
			
		}else{
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( like_escape( $bandname ) ) . '%\'';
			$wp_query->query_vars['bandname'] = $bandname;
		}
    }
    return $where;
}

function bands_query_var($vars) {
	$vars[] = 'bandname';
	return $vars;
}

add_filter('query_vars', 'bands_query_var');
	

function load_template_part( $slug, $name = null,$dir = null ) {
	global $settings, $context, $scripturl;
	global $user_info, $boarddir;
	do_action( "load_template_part_{$slug}", $slug, $name );
	if(isset($dir)){
		$dir .= '/';
	}
	$templates = array();
	if ( isset($name) )
		$templates[] = "{$dir}{$slug}-{$name}.php";
	$templates[] = "{$slug}.php";
	locate_template($templates, true, false);
}


//add_filter('wp_handle_upload_prefilter','tc_handle_upload_prefilter');
function tc_handle_upload_prefilter($file)
{

    $img=getimagesize($file['tmp_name']);
    $minimum = array('width' => '500', 'height' => '500');
	
    $maximum = 2000;
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']} px Uploaded image width is $width px");
    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']} px. Uploaded image height is $height px");
   /*  elseif ($width > $maximum )
        return array("error"=>"Image dimensions are too large. Maximum width is {$minimum['width']} px Uploaded image width is $width px");
    elseif ($height >  $maximum)
        return array("error"=>"Image dimensions are too large. Maximum height is {$minimum['height']} px. Uploaded image height is $height px");
    */ else
        return $file; 
}
//add_filter('image_resize_dimensions', 'image_crop_dimensions', 10, 6);
function image_crop_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop){
    if ( !$crop ) return null; // let the wordpress default function handle this

    $aspect_ratio = $orig_w / $orig_h;
    $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

    $crop_w = round($new_w / $size_ratio);
    $crop_h = round($new_h / $size_ratio);

    $s_x = floor( ($orig_w - $crop_w) / 2 );
    $s_y = floor( ($orig_h - $crop_h) / 2 );

    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}

function dateBefore($_date,$as_arr = false){
	$date2 = (string) $_date;

	$diff = abs(strtotime($_date) - strtotime(date('Y-m-d')));
	
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	
	$_ret = '';
	$_ret_arr = '';
	if(!empty($days)){
		$_ret .= $days;
		$_ret .= $days > 1 ? ' days' : ' day';
	}
	if(!empty($months)){
		if(!empty($_ret)){
			$_ret .= ' / ';
		}
		$_ret .= $months;
		$_ret .= $months > 1 ? ' months' : ' month';
		
	}
	if(!empty($years)){
		if(!empty($_ret)){
			$_ret .= ' / ';
		}
		$_ret .= $years;
		$_ret .= $years > 1 ? ' years' : ' year';
		
		
	}
	
	if(strtotime($_date) > strtotime(date('Y-m-d'))){
		if(empty($_ret)) return false;
		
		if($as_arr ==false){
			$_ret .=' left';
		}
		$_ret_arr = true;
	}else{
		if(empty($_ret)) return false;
		
		if($as_arr ==false){
			$_ret .=' ago';
		}
		$_ret_arr = false;
	}
	
	if($as_arr == true){
		return array($_ret, $_ret_arr);
	}
	return $_ret;
	
	
}

function single_column_three(){
	global $post;
	?>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

		<div class="inside inside-full-height margin-bottom-40 column-content">
			
			<a href="<?php the_permalink() ?>" title="<? the_title();?>" class="has-ribbon-category relative block">
			
			
			<? 
			if(is_search() || is_author() || is_category() || is_tag() ){
				global $wp_post_types;
				$_type = $post->post_type;
				$obj = $wp_post_types[$_type];
				
				$_typename = $obj->labels->singular_name;
				if($_type == 'bands'){
					$_typename = 'Bands / Artist';
				}
				
				echo '<span class="ribbon-category uppercase">'. $_typename .'</span>';
			}
	
			
			//if(is_search() || is_author()){
			
			//no-band-photo.jpg
			
			if($post->post_type == 'bands' || $post->post_type == 'venue'){
				if(is_search() || is_author() || is_tag()){
				
					if(has_post_thumbnail()) {
						the_post_thumbnail('mid-image', array('class'=>'img-responsive margin-bottom-10'));
					}else{
						echo '<img src="'. get_stylesheet_directory_uri().'/assets/no-band-photo.jpg" class="img-responsive margin-bottom-10">';
					}
				}
			}else{				
				if(has_post_thumbnail()) {
					the_post_thumbnail('mid-image', array('class'=>'img-responsive margin-bottom-10'));
				}else{
					echo '<img src="'. get_stylesheet_directory_uri().'/assets/no-band-photo.jpg" class="img-responsive margin-bottom-10">';
				}
			}
			?></a>
			
			<h4 class="margin-bottom-0 weight-500"><a href="<?php the_permalink() ?>" title="<? the_title();?>"><?=xyr_smarty_limit_chars(get_the_title(),75);?></a></h4>
			<? single_column_three_meta(); ?>
		</div>

	</div>
	
	
	
	
	<?
}


function single_column_three_meta(){
	global $post;
	
	if($post->post_type == 'bands'){
		?>
			<span class="text-gray link-gray size-13 underdotted">
			
			
			
			<?
				if(has_term('',BAND_ORI_TAXOTYPE)){
					$origins = get_the_terms( $post->ID ,BAND_ORI_TAXOTYPE ); 
					echo '<i class="fa fa-info-circle"></i> &nbsp; ';
					foreach ( $origins as $origin){
						echo '<a href="'. get_term_link($origin).'">', $origin->name , '</a>' ;
					}
					echo '<br/>';
				}
				
				
				if(has_term('',BAND_GENRE_TAXOTYPE)){
					echo '<i class="fa fa-music"></i> &nbsp; ';
					$genres = get_the_terms( $post->ID ,BAND_GENRE_TAXOTYPE ); 
					$genreprimaryID = get_post_meta(get_the_ID(), '_band_genreprimary', true);
					$genre_out = array();
					foreach ( $genres as $genre){
						$primary_genre = '';
						if($genreprimaryID == $genre->term_id){
							$primary_genre = 'primary-genre';
						}
						$genre_out[] = '<a href="'. get_term_link($genre).'" class="'.$primary_genre.'">'. $genre->name .'</a>';
					}
					echo implode(' / ',$genre_out);
					echo '<br/>';
				}?>
			</span>
				
			<span class="text-gray link-gray size-13 underdotted margin-top-10">
				<i class="fa fa-bar-chart"></i> &nbsp; 
			
				
				<a href="<? the_permalink();?>#upcoming-gigs" title="<? the_title();?> Upcoming Gigs" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info::upcoming($post->post_title);?></span>
					Upcoming
				</a> &nbsp;
				
				<a href="<? the_permalink();?>#gigs-month" title="<? the_title();?> Gigs this Month" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info::thismonth($post->post_title);?></span>
					This Month
				</a>  &nbsp;
				
				<a href="<? the_permalink();?>#all-gigs" title="<? the_title();?> all Gigs" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info::total($post->post_title);?></span>
					Total Gigs
				</a>  &nbsp;
				

				
			</span>
		<?
	}
	elseif($post->post_type == 'venue'){
		?>
		
			<span class="text-gray link-gray size-13 underdotted">
				<?
				
				$_gig_venue_id = get_the_ID();
				$venueInfo = get_post($_gig_venue_id); 
				
				if(has_term('',VENUE_CITY_TAXOTYPE, $venueInfo)){
					$venues = get_the_terms( $_gig_venue_id ,VENUE_CITY_TAXOTYPE ); 
					echo '<i class="fa fa-map-marker"></i> &nbsp; ';
			
					$venue_out = array();
					foreach ( $venues as $venue){
						$venue_out[] = '<a href="'. get_term_link($venue).'">'. $venue->name . '</a>' ;
					}
					echo implode(' / ',$venue_out);
				}
				?>
			</span><br/>
			
			<span class="text-gray link-gray size-13 underdotted margin-top-10">
				<i class="fa fa-bar-chart"></i> &nbsp; 
			
				
				<a href="<? the_permalink();?>#upcoming-gigs" title="<? the_title();?> Upcoming Gigs" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info_venue::upcoming($_gig_venue_id);?></span>
					Upcoming
				</a> &nbsp;
				
				<a href="<? the_permalink();?>#gigs-month" title="<? the_title();?> Gigs this Month" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info_venue::thismonth($_gig_venue_id);?></span>
					This Month
				</a>  &nbsp;
				
				<a href="<? the_permalink();?>#all-gigs" title="<? the_title();?> all Gigs" class="btn btn-grey btn-xs relative">
					<span class="badge badge-dark badge-corner badge-corner"><?=gigs_info_venue::total($_gig_venue_id);?></span>
					Gigs Held
				</a>  &nbsp;
				
			</span>
		
		<?
	}
	elseif($post->post_type == 'gigs'){

				$gig_date=get_post_meta(get_the_ID(),"_gig_date",true); 
				$_gig_date = date("Y-m-d",strtotime($gig_date));
				$_gigsTime = get_post_meta(get_the_ID(),"_gig_time",true);
				
			?>
			
			<span class="text-black block"><?
				echo date("F d, Y",strtotime($gig_date));
				if(!empty($_gigsTime)){
					echo ' @ '.$_gigsTime . get_post_meta($post->ID,"_gig_timestamp",true);
				}	
				?>
			</span>
			<span class="text-gray link-gray size-13 underdotted">
				<i class="fa fa-calendar-o"></i> <? echo dateBefore($_gig_date);?>
				<br/>
				
				<?  
				$_gig_venue_id = get_post_meta(get_the_ID(),"_gig_venue_id",true); 
				$city_data =get_the_terms($_gig_venue_id, VENUE_CITY_TAXOTYPE);
				foreach($city_data as $city){
					$_current_city = $city;
				}
				$_city_link = get_term_link($_current_city->slug, VENUE_CITY_TAXOTYPE);
				
				
				?>
				<i class="fa fa-map-marker"></i> &nbsp;
				<a href="<?=get_permalink($_gig_venue_id);?>" title="View all gigs at <?=get_the_title($_gig_venue_id);?>">
					<?=get_the_title($_gig_venue_id);?>
				</a> , 
				
				<a href="<?=$_city_link;?>" title="View all gigs at <?=$_current_city->name;?>">
					<?=$_current_city->name;?>
				</a>
				<br/>
				
				<?
				$bands = get_post_meta(get_the_ID(),"_gig_bands",true);
					$all_bands = explode(',',$bands);
					$all_band_info = array();
					foreach($all_bands as $band){
						$band_data = get_page_by_title( $band, OBJECT, BAND_POSTTYPE );
						if(!empty($band_data->post_title)){
							$band_href = get_permalink($band_data->ID);
							$all_band_info[] = ' <a href="'. $band_href .'" title="'. $band_data->post_title .'">'. $band_data->post_title .'</a>';
						}
					}
					
					if(!empty($all_band_info)){
						echo '<i class="fa fa-microphone"></i> &nbsp;';
						echo implode(' / ',$all_band_info);
					}
				?>
				
				
				
			</span>
		<?
	}else{
		?>
		<span class="text-gray link-gray size-13 underdotted">
			<i class="fa fa-clock-o"></i>  <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
			&nbsp;&nbsp;&nbsp;
			<i class="fa fa-user-o"></i> By: <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><? the_author();?></a>
			
			
			<br/>
			
			<? 
			if(has_term('','category')){
				echo '<i class="fa fa-folder-open-o"></i> &nbsp; ';
				$categories = get_the_terms( $post->ID ,'category' ); 
				$genre_out = array();
				foreach ( $categories as $genre){
					$genre_out[] = '<a href="'. get_term_link($genre).'">'. $genre->name .'</a>';
				}
				echo implode(' / ',$genre_out);
			}?>
			
		</span>
		
		<?
	}
}


function xyr_standard_loop($_type = 'news',$_title=''){
	global $post;
	?>
	<section class=" noborder margin-bottom-60">
		<div class="container nopadding">
		
			<?=$_title;?>
			<?php if ( have_posts() ) : ?>
				<!-- the loop -->

				<?
				if (function_exists(xyr_smarty_pagination)) {
					echo '<div class="text-center">';
					xyr_smarty_pagination($custom_query->max_num_pages,"",$paged,'noradius');
					echo '</div>';
				}	?>
				
				<div class="post-data grey-onhover"> <div class="row margin-bottom-40">
				<?php while ( have_posts() ) : the_post(); 
				
				
					if($i % 3 == 0) {
						echo '</div><div class="row margin-bottom-40">';
					}
					$i++;
					
					
					single_column_three();
					
					
					?>
				<?php endwhile; ?>
				<!-- end of the loop -->
				
				</div>
				
				<div class="divider"> </div>
				<?
				if (function_exists(xyr_smarty_pagination)) {
					echo '<div class="text-center margin-top-40">';
					xyr_smarty_pagination($custom_query->max_num_pages,"",$paged,'noradius');
					echo '</div>';
				}	?>
				<? wp_reset_postdata(); ?>
				
				</div>

			<?php else:  ?>
				<header class="text-left"><p class="lead">Sorry, no article posts found.</p></header>
			<?php endif; ?>
						
			

		</div>
	</section>

	
	<?
}

add_action( 'init', 'xyren_smarty_change_wpajax' , 10 , 0 );
function xyren_smarty_change_wpajax(){
    add_rewrite_rule('^ajax/([^/]*)/?','wp-admin/admin-ajax.php?p=$matches[1]','top');
	//add_rewrite_rule('carpage/[/]?([a-zA-Z-]*)[/]?([a-zA-Z-]*)$', 'index.php?pagename=carpage&var1=$matches[1]&var2=$matches[2]');
	//add_rewrite_tag('%var1%', '[a-zA-Z]+');
	flush_rewrite_rules(false);
}


add_action( 'wp_ajax_xyr_eventjson', 'xyr_eventjson' );
add_action( 'wp_ajax_nopriv_xyr_eventjson', 'xyr_eventjson' );

function xyr_eventjson() {
	
	
	
	
	
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
	
	$_upcoming = array();
	
	if ( $gigsSlider->have_posts()) : while ( $gigsSlider->have_posts()) :  $gigsSlider->the_post(); 
 
		
		
		$gig_date=get_post_meta(get_the_ID(),"_gig_date",true); 
		$_gig_date = date("Y-m-d",strtotime($gig_date));
		$_gigsTime = get_post_meta(get_the_ID(),"_gig_time",true);
		
		if(!empty($_gigsTime)){
			// means 12.. instead of 12:30
			if(strlen( $_gigsTime) <= 2){
				$_gigsTime .= ':00';
			}
			
			
			$_timeStamp = get_post_meta($post->ID,"_gig_timestamp",true);
			/* if($_timeStamp == 'pm'){
				$_gigsTime .= 
			}else{
				
			} */
			$_gigsTime .= ' '.$_timeStamp;
		}else{
			//default of 4PM
			$_gigsTime = '16:00:00';
		}
		
		$gig_date .= $_gigsTime;
		$_gigsDate = date('U',strtotime($gig_date));
		$_endDate = date('U',strtotime('+3 hours',$_gigsDate));
		
		$_upcoming[] = array(
			"id" => get_the_ID(),
			"title" => $_gig_date .' - '.get_the_title(),
			"url" => get_the_permalink(),
			"class" => "event-danger",
			"start" => $_gigsDate."000",
			"end" =>   $_endDate."000" 
		);
	
	endwhile; endif;
	wp_reset_postdata();
			
	echo json_encode(array("success" => 1, "result" => $_upcoming) , JSON_PRETTY_PRINT);
	
	
	
	exit;
}




/* 

function xyren_smarty_eventjson_url_redirect() {
    if ( is_search() && !empty( $_GET['s'] ) ) {
		
		//echo 'wow';
        wp_redirect( home_url( "/events/json/" . urlencode( get_query_var( 's' ) ) .'/') );
        exit;
    }
}
add_action( 'template_redirect', 'xyren_smarty_eventjson_url_redirect' );
 */