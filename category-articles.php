<?php
 ini_set('display_errors', '1');

global $post;
get_header();
query_posts([
    'posts_per_page'   => 12,
	'posts_per_archive_page'   => 12,
	'paged' 			=> get_query_var('paged') ?: 1,
	'category_name'    	   => 'articles',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true,
]);
$featuredPostNews =  get_posts([
	'posts_per_page'   => 12,
	'posts_per_archive_page'   => 12,
	'paged' 			=> get_query_var('paged') ?: 1,
	'category_name'    	   => 'articles',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true,
]);

foreach ($featuredPostNews as $key => $postNews) {
	$featuredPostNews[$key] = $postNews->ID;
}

$featuredPost = [
	'posts' => $featuredPostNews
];
$GLOBALS['featuredPost'] = $featuredPost;

$GLOBALS['featuredTitle'] = (!empty($taghere)?get_cat_name($taghere):'All Articles');

$GLOBALS['is_article'] = true;

get_template_part( '_template/content', 'featured-posts' );

get_footer();
