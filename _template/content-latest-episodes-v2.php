<?php
global $post;
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
]);?>
<section class="dark video-episodes nopadding" style="background-color: #101010;">
    <div class="container">
        <?php
        $iod = new InvestOrDivestWidget();
        ?>
        <div class="row grid-color">
            <div class="col-md-8 col-sm-12 padding-top-20 video-episode-feature">
                <?php while ( have_posts() ) : the_post(); ?>

                    <div class="embed-responsive embed-responsive-16by9">
                        <?php
                        $iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
                        echo wp_oembed_get($iod_video, '');
                        ?>
                        <div></div>
                    </div>
                    <header class="margin-bottom-30 video-details">
                        <h3><?=$post->post_title?></h3>
                    </header>

                    <small>Published on <?=date('M d, Y',strtotime($post->post_date))?></small>
                    <p><?=$post->post_content?></p>
                    <div class="toggle toggle-transparent">
                        <div class="toggle">
                            <div class="toggle-content nopadding">
                                <p><?=$post->post_content?></p>
                            </div>
                            <label>Show</label>
                        </div>
                    </div>
                <?php endwhile; ?>
                <? wp_reset_postdata(); ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="col-md-12 col-sm-12 cont-more-episodes">
                    <h4>More Episodes</h4>
                    <hr>
                    <?php

                    $limit=6;
                    $exclude = $post->ID;
                    $category = '';

                    $type = 'iod_video';
                    $posts = get_posts([
                        'post_type'   => $type,
                        'post_status' => 'publish',
                        'posts_per_page' => $limit,
                        'posts_per_archive_page' => $limit,
                        'orderby' => 'rand',
                        'exclude' => $exclude,
                        'taxonomy'=>'iod_category',
                        'term'=> $category
                    ]);

                    if( !empty($posts)) {
                        foreach ($posts as $p) {
                            $iod_video = json_decode(get_post_meta( $p->ID, '_iod_video',true))->embed->url;
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
                                    <a href="http://youtube.com/watch?v=<?=$vid_id?>">
                                        <img class="img-responsive episode-thumbnail" src="<?=$iod_video_thumbnail?>" alt="<?=$p->post_title?>" />
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-6 cont-episode-details">
                                    <a href="http://youtube.com/watch?v=<?=$vid_id?>" title="<?=$p->post_title; ?>" class="title"><strong><?=$p->post_title; ?></strong></a>
                                    <label><i class="fa fa-eye fa-fw"></i><?=$iod->count_postviews($p->ID,true)?> views</label>
                                    <label><i class="fa fa-comments fa-fw"></i><?=$p->comment_count?> comments</label>
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

                    <a href="<?=site_url('videos')?>" class="btn btn-viewmore btn-lg uppercase btn-yellow noradius size-12 bold">VIEW MORE</a>
                </div>
            </div>
        </div>
        <br>
    </div>
</section>
