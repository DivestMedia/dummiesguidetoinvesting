<?php

global $wpdb,$post;

$mainpost = $post;


$latestnews = [];
// Get 5 Latest News for each category
// WP_Query arguments

$mainpost = $post;
$per_page = 5;
$tags =null;
$categories = 2;
$page = 1;


$post = json_decode(file_get_contents_curl(add_query_arg([
	'page' => $page,
	'tags' => $tags,
	'categories' => $categories,
	'per_page' => $per_page
], NEWSBASEURL . 'wp-json/wp/v2/posts')));

foreach ($post as $key => $news) {

	$image ='';

	if(!empty($news->post_thumbnail->{"mid-image"})){
		$image = $news->post_thumbnail->{"mid-image"}["0"];
	}

	$latestnews[] = [
		'title' => '<a href="'.site_url('/category/news').'">News</a>',
		'description' => trim_text($news->title->rendered,40),
		'date' => $news->date,
		'thumbnail' => $image,
		'link' => $news->link
	];
}

$post = $latestnews;
$GLOBALS['featureTitle'] = 'Latest <span>News</span>';
$GLOBALS['featureButton'] = 'READ MORE';
get_template_part( '_template/content', 'featured-grid' );
$post = $mainpost;
