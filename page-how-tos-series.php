<?php
global $post;
get_header();
query_posts([
    'posts_per_page' => 1,
    'posts_per_archive_page' => 1,
    'paged' => get_query_var('paged'),
    'post_type' => [
        'iod_video'
    ],
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status'      => 'publish',
]);
// $limit = 5;
// $video = json_decode(file_get_contents_curl(add_query_arg([
//     'page' => 1,
//     'per_page' => $limit,
//     'status' => 'publish'
// ], ARTICLEBASEURL . 'wp-json/wp/v2/video')));


?>
<section class="dark video-episodes nopadding" style="background-color: #101010;">
    <div class="container">
        <?php
        // $iod = new InvestOrDivestWidget();

        $bigvideo = array_shift($video);
        ?>
        <div class="row grid-color">
            <div class="col-md-12">
                <h4 class="uppercase size-25 bold"><strong>H</strong>ow <strong>T</strong>o Series</h4>
                <hr style="border-bottom: 5px solid #0072bb;"/>
            </div>
            <div class="col-md-8 col-sm-12 padding-top-20 video-episode-feature">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="embed-responsive embed-responsive-16by9">
                        <?php
                        $iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
                        // $iod_video = $bigvideo->video_details->url;
                        echo wp_oembed_get($iod_video, '');
                        ?>
                        <div></div>
                    </div>
                    <a href="http://marketmasterclass.com/videos/" target="_blank" style="
                    text-transform: uppercase;
                    color: #fff;
                    font-size: 12px;
                    "><marquee>For more investment videos, visit www.marketmasterclass.com or click this link now.</marquee></a>
                    <header class="margin-bottom-30 video-details">
                        <h3><?=$bigvideo->title->rendered?></h3>
                    </header>

                    <small>Published on <?=$bigvideo->video_details->date?></small>
                    <p><?=$bigvideo->content->rendered?></p>
                    <div class="toggle toggle-transparent">
                        <div class="toggle">
                            <div class="toggle-content nopadding">
                                <p><?=$bigvideo->content->rendered?></p>
                            </div>
                            <label>Show</label>
                        </div>
                    </div>
                <?php endwhile; ?>
                <? wp_reset_postdata(); ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="col-md-12 col-sm-12 cont-more-episodes margin-top-20" style="max-height: 570px; overflow: auto;">
                    <h4>More Episodes</h4>
                    <hr>
                    <?php

                    $limit=20;
                    $exclude = $post->ID;
                    // $category = '';

                    $type = 'iod_video';
                    $video = get_posts([
                        'post_type'   => $type,
                        'post_status' => 'publish',
                        'posts_per_page' => $limit,
                        'posts_per_archive_page' => $limit,
                        'orderby' => 'rand',
                        'exclude' => $exclude,
                        'taxonomy'=>'iod_category',
                        'term'=> $category
                    ]);

                    // http://www.marketmasterclass.com/wp-json/wp/v2/video?page=1&per_page=1&status=publish

                    if( !empty($video)) {
                        foreach ($video as $p) {
                            $iod_video = json_decode(get_post_meta( $p->ID, '_iod_video',true))->embed->url;
                            // $iod_video = $p->video_details->url;
                            $ytpattern = '/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/';
                            if(preg_match($ytpattern,$iod_video,$vid_id)){
                                $vid_id = end($vid_id);
                                $iod_video_thumbnail = 'http://img.youtube.com/vi/'.$vid_id.'/mqdefault.jpg';
                            }else{
                                $iod_video_thumbnail = 'http://www.askgamblers.com/uploads/original/isoftbet-2-5474883270a0f81c4b8b456b.png';
                            };

                            ?>
                            <div class="video-item margin-bottom-20 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-md-5 col-sm-5 col-xs-6" style="padding: 0;">
                                    <a href="<?=$iod_video?>">
                                        <img class="img-responsive episode-thumbnail" src="<?=$iod_video_thumbnail?>" alt="<?=$p->post_title?>" />
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-6 cont-episode-details" data-desc="<?=$p->post_content?>">
                                    <a href="<?=$iod_video?>" title="<?=$p->post_title?>" class="title"><strong><?=$p->post_title?></strong></a>
                                    <label><i class="fa fa-clock-o"></i> <?=get_post_meta($p->ID,'video-duration',true)?></label>
                                    <label><i class="fa fa-fw fa-eye margin-right-10"></i><?=(get_post_meta($p->ID,'view-count',true) ?: 0)?></i> views</label>
                                </div>
                            </div>

                            <?php
                        }
                    }else{
                        ?>
                        <label class="text-center margin-bottom-20 size-14 block ">No more episodes yet</label>
                        <?php
                    }
                    ?>

                    <!-- <a href="<?=site_url('videos')?>" class="btn btn-viewmore btn-lg uppercase btn-yellow noradius size-12 bold">VIEW MORE</a> -->
                </div>
            </div>
        </div>
        <br>
    </div>
</section>

<?php
get_footer();
?>
