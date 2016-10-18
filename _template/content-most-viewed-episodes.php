<?php
global $post;
$mostviewed = query_posts([
    'posts_per_page' => 10,
    'posts_per_archive_page' => 10,
    'paged' => get_query_var('paged'),
    'post_type' => [
        'iod_video'
    ],
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status'      => 'publish',
]);?>

<section id="most-viewed">
    <div class="container">

                            <a href="<?=site_url('videos')?>" class="btn btn-viewmore btn-lg uppercase btn-yellow noradius size-12 bold pull-right">VIEW MORE</a>
        <h4 class="uppercase size-25 bold">Most Viewed Episodes</h4>
        <hr />

        <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over margin-top-50" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false, "stopOnHover": true }'>

            <?php foreach ($mostviewed as $key => $p):
                $iod_video = json_decode(get_post_meta( $p->ID, '_iod_video',true))->embed->url;
                $ytpattern = '/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/';
                if(preg_match($ytpattern,$iod_video,$vid_id)){
                    $vid_id = end($vid_id);
                    $iod_video_thumbnail = 'http://img.youtube.com/vi/'.$vid_id.'/mqdefault.jpg';
                }else{
                    $iod_video_thumbnail = 'http://www.askgamblers.com/uploads/original/isoftbet-2-5474883270a0f81c4b8b456b.png';
                };
                ?>
                <div class="img-hover">
                    <a href="http://youtube.com/watch?v=<?=$vid_id?>" class="image-hover video-play">
                        <span class="image-hover-icon image-hover-dark">
                            <i class="fa fa-play"></i>
                        </span>
                        <!-- <div class="embed-responsive embed-responsive-16by9"> -->
                            <img src="<?=$iod_video_thumbnail?>" class="img-responsive">
                            <!-- <figure style="background-image: url('<?=$iod_video_thumbnail?>');" class="lazyOwl" data-src="<?=$iod_video_thumbnail?>"></figure> -->
                        <!-- </div> -->
                    </a>

                    <ul class="text-left size-12 list-inline list-separator margin-top-10 margin-bottom-10">
                        <li class="block">
                            <i class="fa fa-clock-o"></i>
                            <?=get_post_meta($p->ID,'video-duration',true)?>&nbsp;<small class="pull-right"><i class="fa fa-fw fa-eye margin-right-10"></i><?=(get_post_meta($p->ID,'view-count',true) ?: 0)?></i></small>
                        </li>
                    </ul>

                    <h4 class="text-left height-50 post-title nomargin"><a href="http://youtube.com/watch?v=<?=$vid_id?>" class="video-play"><?=$p->post_title?></a></h4>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</section>
