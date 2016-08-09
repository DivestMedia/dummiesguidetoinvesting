<?php
global $post,$wp_query;
$video_taxonomy = $wp_query->query_vars['taxonomy'];
$video_category = $wp_query->query_vars['iod_category'];
query_posts([
    'posts_per_page' => 1,
    'posts_per_archive_page' => 1,
    'paged' => get_query_var('paged'),
    'post_type' => 'iod_video',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status'      => 'publish',
    'taxonomy'=>$video_taxonomy,
    'term'=> $video_category
]);
if(class_exists('InvestOrDivestWidget'))
{
    $invest = new InvestOrDivestWidget();
    $invest->count_postviews($post->ID);;
}

get_header();
?>
<?php if ( have_posts() ) : ?>
    <section class="dark sec-invest-or-divest">
        <div class="container">
            <header class="text-center margin-bottom-30 section-title-container">
                <h3>Invest or Divest Latest Episodes</h3>
            </header>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php
                            $iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
                            echo wp_oembed_get($iod_video, '');
                            ?>
                            <div></div>
                        </div>
                        <header class="margin-bottom-30">
                            <h3><?=$post->post_title?></h3>
                        </header>
                    <?php endwhile; ?>
                    <div class="text-right"><?=posts_pagination()?></div>
                    <? wp_reset_postdata(); ?>
                </div>
                <div class="col-md-4 col-sm-12">
                    <?=InvestOrDivestWidget::generate_side_widget(6,[$post->ID],$video_category)?>
                </div>
            </div>
            <br>
            <header class="text-center margin-bottom-30">
                <h3>More from Our Channels</h3>
            </header>
            <!-- Featured Videos -->
            <?=InvestOrDivestWidget::generate_featured_videos(4)?>
            <header class="text-center margin-top-40">
                <h4 class="margin-bottom-10">Don't miss out on the latest Dummies Guide to Investing videos!</h4>
                <button type="button" class="btn btn-warning btn-sm btn-custom yellow">SUBSCRIBE NOW</button>
            </header>
        </div>
    </section>
<?php endif; ?>
    <!-- FEATURES -->
    <section id="features">
        <div class="container">

            <div class="row cont-ads-long">
                <div class="col-md-12">
                    <img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
                </div>
            </div>  
            <?php include_once('_template/world-news-slider.php');?>
        </div>
    </section>
    <!-- /FEATURES -->
<?php


get_footer();
