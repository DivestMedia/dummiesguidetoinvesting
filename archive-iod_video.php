<?php
global $wpdb,$post;
get_header();

$mainpost = $post;


$latestnews = [];
// Get 5 Latest News for each category
// WP_Query arguments

// $post = get_posts([
// 	'posts_per_page' => 5,
// 	'posts_per_archive_page' => 5,
// 	'paged' => get_query_var('paged') ?: 1,
// 	'post_type' => [
// 		'iod_video'
// 	],
// 	'orderby' => 'date',
// 	'order' => 'DESC',
// 	'post_status'      => 'publish',
// 	'taxonomy' => get_query_var('taxonomy'),
// 	'iod_category' => get_query_var('taxonomy')=='iod_category' ? get_query_var('iod_category') : false
// ]);


$limit = 5;
$videos = json_decode(file_get_contents_curl(add_query_arg([
    'page' => 1,
    'per_page' => $limit,
    'status' => 'publish'
], ARTICLEBASEURL . 'wp-json/wp/v2/video')));

foreach ($videos as $key => $video) {
	$vcats = [];
	$video_cats = wp_get_post_terms($video->id,'iod_category');
	$hascat = false;
	if($video_cats){
		$hascat = true;
		foreach ($video_cats as $vidcat) {
			$vcats[] = '<a href="'.get_term_link($vidcat->term_id,'iod_category').'">'.$vidcat->name.'</a>';
		}
	}

	$iod_video = '';
	$iod_video_thumbnail = '';
	if($video){
		// $video = $video[0];
		// $iod_video = json_decode(get_post_meta( $video->ID, '_iod_video',true))->embed->url;
		$iod_video = $video->video_details->url;
		// $ytpattern = '/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/';
		// if(preg_match($ytpattern,$iod_video,$vid_id)){
		// 	$iod_video_thumbnail = 'http://img.youtube.com/vi/'.end($vid_id).'/mqdefault.jpg';
		// }else{
		// 	$iod_video_thumbnail = 'http://www.askgamblers.com/uploads/original/isoftbet-2-5474883270a0f81c4b8b456b.png';
		// };
		$iod_video_thumbnail = $video->video_details->thumb;
	}

	$latestnews[] = [
		'title' => $hascat ? implode(',',$vcats) : 'Video',
		// 'description' => xyr_smarty_limit_chars($video->post_title,40),
		'description' => xyr_smarty_limit_chars($video->title->rendered,40),
		'date' => $video->video_details->date,
		'thumbnail' => $video->video_details->thumb,
		// 'thumbnail' => $iod_video_thumbnail,
		// 'link' => $iod_video ?: get_the_permalink($video->ID)
		'link' => $iod_video ?: $video->link
	];
}

if(count($latestnews)>=1):
	$post = $latestnews;
	$GLOBALS['featureTitle'] = 'Beginner&apos;s <span>Manual</span>';
	$GLOBALS['featureButton'] = 'PLAY NOW';
	$GLOBALS['featureNoMore'] = true;
	get_template_part( '_template/content', 'feature-videos' );
endif;
$post = $mainpost;


$video_cats = get_categories([
	'type'                     => 'iod_video',
	'child_of'                 => 0,
	'parent'                   => 0,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'exclude'                  => '1',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'iod_category',
	'pad_counts'               => false
]);


// Sorting channels
$sort = [
	'starting-out' => 0,
	'assets' => 1,
	'vehicles' => 2,
	'strategies' => 3,
	'how-to-videos' => 4,
];
$newvideocats = [[],[],[],[]];
foreach ($video_cats as $key => $cat) {
	if(isset($sort[$cat->slug]))
	$newvideocats[$sort[$cat->slug]] = $cat;
}

$video_cats = $newvideocats;


$featuredVidsCategories = [];
$featuredVidsCategories[] = [
	'id' => 0,
	'name' => 'All Videos',
	'active' => get_query_var('taxonomy')!='iod_category',
    'child' => [],
	'link' => '/videos'
];

foreach ($video_cats as $key => $cat) {

	$child = [];
	$child_cats = get_categories([
		'type'                     => 'iod_video',
		'parent'                   => $cat->term_id,
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 0,
		'hierarchical'             => 1,
		'exclude'                  => '1',
		'include'                  => '',
		'number'                   => '',
		'taxonomy'                 => 'iod_category',
		'pad_counts'               => false
	]);


	if(!empty($child_cats)){
		foreach ($child_cats as $kk => $cc) {
			$child_cats[$kk] = [
				'id' => $cc->term_id,
				'name' => $cc->name,
				'link' => get_term_link($cc->term_id,'iod_category'),
				'active' => get_query_var('iod_category')==$cc->slug
			];
		}
		$child = $child_cats;
	}

	$featuredVidsCategories[] = [
		'id' => $cat->term_id,
		'name' => $cat->name,
		'link' => get_term_link($cat->term_id,'iod_category'),
		'child' => $child,
		'active' => get_query_var('iod_category')==$cat->slug
	];

}

$args = [
	'posts_per_page' => 12,
	'posts_per_archive_page' => 12,
	'paged' => get_query_var('paged') ?: 1,
	'page' => get_query_var('paged') ?: 1,
	'post_type' => [
		'iod_video'
	],
	'showposts' => 12,
	'orderby' => 'date',
	'order' => 'DESC',

];
if(!empty(get_query_var('iod_category'))){
	$args['iod_category'] = get_query_var('taxonomy')=='iod_category' ? get_query_var('iod_category') : false;
	$args['taxonomy'] = 'iod_category';
}

query_posts($args);

$featuredVidsNews =  new WP_Query($args);

$featuredVids = [
	'categories' => $featuredVidsCategories,
	'posts' => $featuredVidsNews
];

$GLOBALS['featuredVids'] = $featuredVids;
$GLOBALS['featuredTitle'] = !empty(get_query_var('iod_category')) ? 'All '.(get_term_by( 'slug', get_query_var('iod_category'), 'iod_category')->name) : 'All Videos';

get_template_part( '_template/content', 'postsvids' );
// get_template_part( 'partials/content', 'investordivest' );
get_footer();
?>
