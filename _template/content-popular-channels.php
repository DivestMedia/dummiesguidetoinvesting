<?php

$channels = [];

$channels = get_terms([
    'taxonomy' => 'iod_category',
    'hide_empty' => false
]);

// Sorting channels
$sort = [
    'starting-out' => 0,
    'assets' => 1,
    'vehicles' => 2,
    'strategies' => 3,
];
$newchannels = [[],[],[],[]];
foreach ($channels as $key => $channel) {
    $newchannels[$sort[$channel->slug]] = $channel;
}

$channels = $newchannels;
?>

<section id="popular-channels">
    <div class="container">
        <h4 class="uppercase size-25 bold">Popular Channels</h4>
        <hr>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="text-center">
                <div class="owl-carousel nomargin buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "4", "autoPlay": 3500, "navigation": true, "pagination": false}'>

                    <?php $catThumbs = get_option('taxonomy_image_plugin');
                    foreach ($channels as $key => $channel):
                        $img = wp_get_attachment_image_src( $catThumbs[$channel->term_id], 'mid-image', false );
                        ?>
                        <!-- item -->
                        <div class="item-box">
                            <figure>
                                <span class="item-hover">
                                    <span class="overlay dark-7"></span>
                                    <span class="inner">
                                        <a href="<?=site_url('video/'.$channel->slug)?>">
                                            <h4 class="uppercase size-25 bold"><?=($channel->name)?></h4>
                                            <hr>
                                        </a>
                                    </span>
                                </span>
                                <img class="img-responsive" src="<?=$img[0]?>" alt="">
                            </figure>
                        </div>
                        <!-- /item -->

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
