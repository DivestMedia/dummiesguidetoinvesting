<?php

global $post,$featureTitle,$featureButton,$featureNoMore;


$mainpost = $post;
$featuredcats = [
    [
        'category' => 'Board of Advisors',
        'title' => 'Kenyon Martin',
        'description' => 'How to be Dumbass',
        'link' => '/video/kenyon-martin/#all-videos',
    ],
    [
        'category' => 'Daily Stock Picks',
        'title' => 'Kenyon Martin',
        'description' => 'Daily Stock Picks',
        'link' => '/video/kenyon-martin/#all-videos',
    ],
    [
        'category' => 'Investment Tips',
        'title' => 'Bruce Curran',
        'description' => 'Investment Tips',
        'link' => '/video/kenyon-martin/#all-videos',
    ],
    [
        'category' => 'World News',
        'title' => 'Bruce Curran',
        'description' => 'World News',
        'link' => '/video/world-news/#all-videos',
    ],
    [
        'category' => 'Andy Penders',
        'title' => 'Headlines',
        'description' => 'Global Business News',
        'link' => '/video/andy-penders/#all-videos',
    ],
    [
        'category' => 'Business Animations',
        'title' => 'Business Animations',
        'description' => 'Business Animations',
        'link' => '/video/abusiness-animations/#all-videos',
    ]
];
$featuredvideos = [];
$excludevideoid = [];

// $featuredvids = get_posts([
//     'post_type'   => 'iod_video',
//     'post_status' => 'publish',
//     'posts_per_page' => 5,
//     'posts_per_archive_page' => 5,
//     'orderby' => 'date',
//     'order' => 'DESC',
//     'category__not_in' => [ 42 ],
//     // 'meta_key'   => '_is_featured',
//     // 'meta_value' => 1,
//     // 'post__not_in' => $excludevideoid,
//     'taxonomy'=>'iod_category',
//     'tax_query' => [
//         [
//             'taxonomy'  => 'iod_category',
//             'field'     => 'slug',
//             'terms'     => 'andy-penders', // exclude items media items in the news-cat custom taxonomy
//             'operator'  => 'NOT IN'
//         ]
//     ],
//     // 'term'=> $catobj->slug
// ]);

$limit = 5;
$featuredvids = json_decode(file_get_contents_curl(add_query_arg([
    'page' => 1,
    'per_page' => $limit,
    'status' => 'publish'
], ARTICLEBASEURL . 'wp-json/wp/v2/video')));


foreach ($featuredvids as $videohere) {

    $iod_video = '';
    $iod_video_thumbnail = '';
    if($videohere){
        // $videohere = $videohere[0];
        $excludevideoid[] = $videohere->id;
        // $iod_video = json_decode(get_post_meta( $videohere->ID, '_iod_video',true))->embed->url;
        $iod_video = $videohere->video_details->url;
        $iod_video_thumbnail = $videohere->video_details->thumb;
        // $ytpattern = '/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/';
        // if(preg_match($ytpattern,$iod_video,$vid_id)){
        //     $iod_video_thumbnail = 'http://img.youtube.com/vi/'.end($vid_id).'/mqdefault.jpg';
        // }else{
        //     $iod_video_thumbnail = 'http://www.askgamblers.com/uploads/original/isoftbet-2-5474883270a0f81c4b8b456b.png';
        // };

        // $video_cats = wp_get_post_terms($videohere->ID,'iod_category');
        //
        // $hascat = false;
        // $videocat = '';
        // $videocatlink = '';
        // if($video_cats){
        //     $hascat = true;
        //     if(count($video_cats)){
        //         $videocat = $video_cats[0]->name;
        //         $videocatlink = get_term_link($video_cats[0]->term_id,'iod_category');
        //     }
        //     foreach ($video_cats as $vidcat) {
        //         $vcats[] = '<a href="'.get_term_link($vidcat->term_id,'iod_category').'">'.$vidcat->name.'</a>';
        //     }
        // }

        $featuredvideos[] = [
            'title' => $videohere->video_details->cat ,
            'titlelink' => '#',
            'sec_title' => '',
            'description' => trim_text($videohere->title->rendered,40),
            'date' => $videohere->video_details->date,
            'thumbnail' => $iod_video_thumbnail,
            'link' => $iod_video ?: get_the_permalink($videohere->id)
        ];
    }
}

$post = $featuredvideos;


// $videos = [
// 	[
// 		'title' => 'KENYON MARTIN'
// 		'description' => 'HOW TO BE DUMBASS',
// 		'date' => 'August 31, 2016',
// 		'thumbnail' = 'http://marketmasterclass.btcglobaltrader.dev/wp-content/themes/mmcv2/img-temp/photo-1420655710207-b092e1b8abe3.jpg',
// 		'link' => '#'
// 	]
// ];

?>

<section class="featured-grid video-grid" >
    <div class="container">
        <header class="text-left margin-bottom-10">
            <h3 class="font-proxima uppercase"><?=($featureTitle ?: 'Divest Media <span>TV</span>')?></h3>
        </header>

        <div class="row">
            <!-- Col 1 -->
            <div class="col-md-6 video-big-wrapper">
                <?php if(isset($post[0])): $video = $post[0]; ?>
                    <div class="item-box item-box-big noshadow margin-bottom-10">
                        <figure>
                            <span class="item-hover">
                                <span class="overlay dark-5"></span>
                            </span>
                            <span class="item-description">
                                <span class="overlay primary-bg"></span>
                                <span class="inner margin-top-30">
                                    <h3>
                                        <em>
                                            <?php if(is_home()): ?>
                                                <a href="<?=($video['titlelink'])?>" class="text-white" style=" background: rgba(2, 119, 46, 0.92); padding: 3px 6px; margin-bottom: 5px; display: inline-block;"><?=($video['title']=='Daily Stock Picks' ? 'Kenyon Martin' : $video['title'])?></a>
                                            <?php endif; ?>
                                        </em>
                                        <?=$video['description']?>
                                        <?=!empty($video['sec_title'])?'<div class="size-12">'.$video['sec_title'].'</div>':''?>
                                        <small class="block text-white margin-top-10"><?=date('F j, Y',strtotime($video['date']))?></small>
                                    </h3>
                                    <span class="block size-11 text-center color-theme uppercase">
                                        <!-- <?=date('F j, Y',strtotime($video['date']))?> -->
                                    </span>
                                    <a class="pos-bottom block btn-sm btn secondary-bg text-center noradius weight-700 video-grid-play" href="<?=$video['link']?>"  data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}" style="color:#fff!important"><?=($featureButton ?: 'PLAY NOW')?></a>


                                </span>
                            </span>

                            <img class="img-responsive" src="<?=$video['thumbnail']?>" alt="" style="  min-height: 381px;">
                        </figure>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End Col 1 -->

            <!-- Col 2 -->
            <div class="col-md-3 col-sm-6 col-xs-6 col-2xs-12 video-grid-column-wrapper">
                <div class="item-box noshadow hover-box">
                    <?php if(isset($post[1])): $video = $post[1]; ?>
                        <figure>
                            <span class="item-hover">
                                <span class="overlay dark-5"></span>
                            </span>
                            <span class="item-description">
                                <span class="overlay primary-bg "></span>
                                <span class="inner padding-top-0">
                                    <h3>
                                        <em>
                                            <a href="<?=($video['titlelink'])?>" class="text-white" style=" background: rgba(29, 29, 29, 0.92); padding: 3px 6px; margin-bottom: 5px; display: inline-block;"><?=($video['title']=='Daily Stock Picks' ? 'Kenyon Martin' : $video['title'])?></a>
                                        </em>
                                        <?=$video['description']?>
                                        <?=!empty($video['sec_title'])?'<div class="size-12">'.$video['sec_title'].'</div>':''?>
                                        <small class="block text-white margin-top-10"><?=date('F j, Y',strtotime($video['date']))?></small>
                                    </h3>
                                    <span class="block size-11 text-center color-theme uppercase">
                                        <a class=" btn-sm btn primary-bg text-center noradius weight-700 video-grid-play" href="<?=$video['link']?>"   data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}"><?=($featureButton ?: 'PLAY NOW')?></a>
                                    </span>

                                </span>
                            </span>

                            <img class="img-responsive" src="<?=$video['thumbnail']?>" alt="">
                        </figure>
                    <?php endif; ?>
                </div>
                <div class="item-box noshadow hover-box margin-top-10">
                    <?php if(isset($post[2])): $video = $post[2]; ?>
                        <figure>
                            <span class="item-hover">
                                <span class="overlay dark-5"></span>
                            </span>
                            <span class="item-description">
                                <span class="overlay primary-bg "></span>
                                <span class="inner padding-top-0">
                                    <h3>
                                        <em>
                                            <a href="<?=($video['titlelink'])?>" class="text-white" style=" background: rgba(29, 29, 29, 0.92); padding: 3px 6px; margin-bottom: 5px; display: inline-block;"><?=($video['title']=='Daily Stock Picks' ? 'Kenyon Martin' : $video['title'])?></a>
                                        </em>
                                        <?=$video['description']?>
                                        <?=!empty($video['sec_title'])?'<div class="size-12">'.$video['sec_title'].'</div>':''?>
                                        <small class="block text-white margin-top-10"><?=date('F j, Y',strtotime($video['date']))?></small>
                                    </h3>
                                    <span class="block size-11 text-center color-theme uppercase">
                                        <a class=" btn-sm btn primary-bg text-center noradius weight-700 video-grid-play" href="<?=$video['link']?>"   data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}"><?=($featureButton ?: 'PLAY NOW')?></a>
                                    </span>

                                </span>
                            </span>

                            <img class="img-responsive" src="<?=$video['thumbnail']?>" alt="">
                        </figure>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End Col 2 -->

            <!-- Col 3 -->
            <div class="col-md-3 col-sm-6 col-xs-6 col-2xs-12 video-grid-column-wrapper">
                <div class="item-box noshadow hover-box">
                    <?php if(isset($post[3])): $video = $post[3]; ?>
                        <figure>
                            <span class="item-hover">
                                <span class="overlay dark-5"></span>
                            </span>
                            <span class="item-description">
                                <span class="overlay primary-bg "></span>
                                <span class="inner padding-top-0">
                                    <h3>
                                        <em>
                                            <a href="<?=($video['titlelink'])?>" class="text-white" style=" background: rgba(29, 29, 29, 0.92); padding: 3px 6px; margin-bottom: 5px; display: inline-block;"><?=($video['title']=='Daily Stock Picks' ? 'Kenyon Martin' : $video['title'])?></a>
                                        </em>
                                        <?=$video['description']?>
                                        <?=!empty($video['sec_title'])?'<div class="size-12">'.$video['sec_title'].'</div>':''?>
                                        <small class="block text-white margin-top-10"><?=date('F j, Y',strtotime($video['date']))?></small>
                                    </h3>
                                    <span class="block size-11 text-center color-theme uppercase">
                                        <a class=" btn-sm btn primary-bg text-center noradius weight-700 video-grid-play" href="<?=$video['link']?>"   data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}"><?=($featureButton ?: 'PLAY NOW')?></a>
                                    </span>

                                </span>
                            </span>

                            <img class="img-responsive" src="<?=$video['thumbnail']?>" alt="">
                        </figure>
                    <?php endif; ?>
                </div>
                <div class="item-box noshadow hover-box margin-top-10">
                    <?php if(isset($post[4])): $video = $post[4]; ?>
                        <figure>
                            <span class="item-hover">
                                <span class="overlay dark-5"></span>
                            </span>
                            <span class="item-description">
                                <span class="overlay primary-bg "></span>
                                <span class="inner padding-top-0">
                                    <h3>
                                        <em>
                                            <a href="<?=($video['titlelink'])?>" class="text-white" style=" background: rgba(29, 29, 29, 0.92); padding: 3px 6px; margin-bottom: 5px; display: inline-block;"><?=($video['title']=='Daily Stock Picks' ? 'Kenyon Martin' : $video['title'])?></a>
                                        </em>
                                        <?=$video['description']?>
                                        <?=!empty($video['sec_title'])?'<div class="size-12">'.$video['sec_title'].'</div>':''?>
                                        <small class="block text-white margin-top-10"><?=date('F j, Y',strtotime($video['date']))?></small>
                                    </h3>
                                    <span class="block size-11 text-center color-theme uppercase">
                                        <a class=" btn-sm btn primary-bg text-center noradius weight-700 video-grid-play" href="<?=$video['link']?>"   data-plugin-options="{&quot;type&quot;:&quot;iframe&quot;}"><?=($featureButton ?: 'PLAY NOW')?></a>
                                    </span>

                                </span>
                            </span>

                            <img class="img-responsive" src="<?=$video['thumbnail']?>" alt="">
                        </figure>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-9 video-grid-details">

            </div>
        </div>
    </div>
</section>


<?php

$post = $mainpost;
