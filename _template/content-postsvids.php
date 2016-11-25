<?php
global $featuredVids,$featuredTitle;
// $featuredVids = [
// 	'categories' => [
// 		[
// 			'name' => 'All Articles',
// 			'link' => '#',
// 			'active' => true
// 		],
// 		[
// 			'name' => 'Some Article',
// 			'link' => '#'
// 		]
// 	],
// 	'posts' => [
// 		295419,
// 		295415,
// 		295412
// 	]
// ];

$categories = [
    [
        'name' => 'All Videos',
        'slug' => 'all',
        'cat' => null,
    ],
    [
        'name' => 'Starting Out',
        'slug' => 'starting-out',
        'cat' => 143,
    ],
    [
        'name' => 'Assets',
        'slug' => 'investment-assets',
        'cat' => 143,
    ],
    [
        'name' => 'Vehicles',
        'slug' => 'investment-vehicles',
        'cat' => 145,
    ],
    [
        'name' => 'Strategies',
        'slug' => 'investment-strategies',
        'cat' => 151,
    ],
    [
        'name' => 'How to Videos',
        'slug' => 'how-to-videos',
        'cat' => 146,
    ]
]

?>

<style>
.nav-tabs.nav-alternate>li.active>a{
    background: transparent;
    color: #c5a700!important;
}
</style>
<section id="all-videos" class="alternate">
    <div class="container">
        <header class="text-center margin-bottom-10 tiny-line">
            <h2 class="font-proxima uppercase"><?=($featuredTitle)?></h2>
        </header>

        <!-- Tab v3 -->
        <div class="row tab-v3">
            <div class="col-sm-3 hidden-xs hidden-sm">

                <!-- side navigation -->
                <div class="side-nav margin-top-50">

                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>CATEGORIES</h4>
                    </div>
                    <ul class="list-group list-unstyled nav nav-tabs nav-stacked nav-alternate uppercase">
                        <?php foreach($categories as $cat): ?>
                            <li class="list-group-item <?=($cat['slug']=='all' ? 'active' : '')?> ">
                                <a href="#<?=$cat['slug']?>" data-toggle="tab"><?=$cat['name']?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /side navigation -->
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    <?php foreach($categories as $cat): ?>
                        <div class="tab-pane fade <?=($cat['slug']=='all' ? 'in active' : '')?>" id="<?=$cat['slug']?>" data-page="1" data-cat="<?=$cat['slug']?>">
                            <div class="row">
                                <?php
                                $mainpost = $post;
                                $args = [
                                    'page' => 1,
                                    'per_page' => 12,
                                    'status' => 'publish'
                                ];

                                if($cat['slug']!=='all'){
                                    $args['filter[taxonomy]'] = 'iod_category';
                                    $args['filter[iod_category]'] = $cat['slug'];
                                }else{
                                    // $args['filter[tax_query][taxonomy]'] = 'iod_category';
                                    // $args['filter[tax_query][field]'] = 'slug';
                                    // $args['filter[tax_query][terms]'] = implode(',',['investment-assets']);
                                    // $args['filter[tax_query][operator]'] = 'IN';
                                    // var_dump(add_query_arg($args, ARTICLEBASEURL . 'wp-json/wp/v2/video'));
                                    $args['filter[taxonomy]'] = 'iod_category';
                                    $args['filter[iod_category]'] = implode(',',['investment-assets','starting-out','investment-vehicles','investment-strategies']);
                                }



                                $videos = json_decode(file_get_contents_curl(add_query_arg($args, ARTICLEBASEURL . 'wp-json/wp/v2/video')));
                                if(count($videos)):
                                    // if ( $featuredVids['posts']->have_posts() ) :

                                    foreach($videos as $post):
                                        $iod_title = '';
                                        $_c_margin_top = '';
                                        $iod_video = '';
                                        $iod_video_thumbnail = '';
                                        if($post){
                                            $iod_video = $post->video_details->url;
                                            $iod_video_thumbnail = $post->video_details->thumb;
                                            $iod_title = $post->title->rendered;
                                        }

                                        ?>
                                        <div class="col-sm-4 margin-bottom-20">
                                            <div class="item-box noshadow hover-box margin-top-10">
                                                <figure>
                                                    <span class="item-hover">
                                                        <span class="overlay dark-5"></span>
                                                    </span>
                                                    <span class="item-description">
                                                        <span class="overlay primary-bg "></span>
                                                        <span class="inner padding-top-0">
                                                            <h3>
                                                                <em>
                                                                    <a href="#" style="color:#fff"></a>
                                                                </em>
                                                                <?=$iod_title?>
                                                                <small class="block text-white margin-top-10"><?=($post->video_details->date)?></small>
                                                            </h3>
                                                            <span class="block size-11 text-center color-theme uppercase">
                                                                <a class=" btn-sm btn primary-bg text-center noradius weight-700 video-grid-play" href="<?=($post->video_details->url)?>" data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}">PLAY NOW</a>
                                                            </span>

                                                        </span>
                                                    </span>

                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <img class="img-responsive embed-responsive-item" src="<?=($iod_video_thumbnail)?>" alt="">
                                                    </div>
                                                </figure>
                                            </div>

                                        </div>

                                        <?php
                                    endforeach;
                                    if(count($videos)==12):
                                        ?>
                                        <div class="col-sm-12">
                                            <button class=" btn-sm btn primary-bg text-center noradius weight-700 btn-loadmore" style=" display: block; margin: 0 auto; ">Show more</button>
                                        </div>
                                            <?php
                                        endif;
                                    else:
                                        ?>
                                        <h4>No Videos yet.</h4>
                                        <?php
                                    endif;

                                    $post = $mainpost;

                                    ?>

                                </div>

                                <?php

                                wp_reset_postdata();
                                wp_reset_query();
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- Tab v3 -->

        </div>
    </section>
