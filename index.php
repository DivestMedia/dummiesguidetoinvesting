<?
global $post;

get_header();
// get_template_part('_template/content','slider');
// get_template_part('_template/content','latest-episodes');
get_template_part('_template/content','latest-episodes-v2');
get_template_part('_template/content','popular-channels');
get_template_part('_template/content','latest-headlines');
get_template_part('_template/content','ads');
get_template_part('_template/content','most-viewed-episodes');
get_template_part('_template/content','featured-articles');
get_template_part('_template/content','comingsoon');

get_footer();
