<?php
global $post;

$mainpost = $post;

$latestnews = [];
// Get 5 Latest News for each category
// WP_Query arguments

$mainpost = $post;
$per_page = 10;
$tags =null;
$categories = 2;
$page = 1;


// $post = json_decode(file_get_contents_curl(add_query_arg([
//     'page' => $page,
//     'tags' => $tags,
//     'categories' => $categories,
//     'per_page' => $per_page,
//     'offset' => 10
// ], NEWSBASEURL . 'wp-json/wp/v2/posts')));

$post = get_posts([
        'posts_per_page'   => 10,
        'category'         => 14,
        'orderby'          => 'date',
        'order'            => 'DESC',
    ]);

foreach ($post as $key => $news) {

    $image ='';
    $image = get_the_post_thumbnail_url($news->ID,'mid-image');
    // if(!empty($news->post_thumbnail->{"mid-image"})){
    //     $image = $news->post_thumbnail->{"mid-image"}["0"];
    // }

    $latestnews[] = [
        'title' => '<a href="'.site_url('/category/news').'">News</a>',
        'description' => trim_text($news->post_title,40),
        'date' => $news->post_date,
        'thumbnail' => $image,
        'link' => get_permalink($news->ID),
    ];
}
if(!empty($latestnews)){
?>
<section id="featured-headlines">
    <div class="container">

        <a href="<?=NEWSBASEURL?>" class="btn btn-viewmore btn-lg uppercase btn-yellow noradius size-12 bold pull-right">VIEW MORE</a>
        <h4 class="uppercase size-25 bold">Featured Headlines</h4>
        <hr />

        <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over margin-top-50" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false, "stopOnHover": true }'>

            <?php foreach ($latestnews as $key => $p): ?>
                <div class="img-hover">
                    <a href="<?=$p['link']?>" class="image-hover">
                        <span class="image-hover-icon image-hover-dark">
                            <i class="fa fa-newspaper-o"></i>
                        </span>
                        <img src="<?=$p['thumbnail']?>" class="img-responsive">
                    </a>

                    <ul class="text-left size-12 list-inline list-separator margin-top-10 margin-bottom-10">
                        <li class="block">
                            <i class="fa fa-clock-o"></i>
                            <?=date('F j, Y',strtotime($p['date']))?>&nbsp;<small class="pull-right"><i class="fa fa-fw fa-eye margin-right-10"></i><?=human_time_diff(strtotime($p['date']))?></i></small>
                        </li>
                    </ul>

                    <h4 class="text-left height-50 post-title nomargin"><a href="<?=$p['link']?>"><?=$p['description']?></a></h4>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php }?>
