<!-- FEATURES -->
<section id="features">
    <div class="container">
        <header class="text-center margin-bottom-30">
            <h2 class="section-title">Featured Articles</h2>
        </header>

        <!-- FEATURED BOXES 3 -->
        <div class="row cont-featured-article">
            <div class="col-md-3 col-sm-6 margin-bottom-10">
                <?php
                $_curcategory = 'rogue-trader';
                $_curlimit = 1;
                $_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
                $_posts = json_decode($_posts);
                $_post = $_posts[0];
                $_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
                $_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
                ?>
                <figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
                <span class="section-content">
                    <div class="text-left">
                        <a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
                        <label><?=$_postcontent?></label>
                    </div>
                    <a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 margin-bottom-10">
                <?php
                $_curcategory = 'our-offshore-experts';
                $_curlimit = 1;
                $_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
                $_posts = json_decode($_posts);
                $_post = $_posts[0];
                $_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
                $_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
                ?>
                <figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
                <span class="section-content">
                    <div class="text-left">
                        <a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
                        <label><?=$_postcontent?></label>
                    </div>
                    <a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 margin-bottom-10">
                <?php
                $_curcategory = 'starting-out';
                $_curlimit = 1;
                $_posts =  do_shortcode( '[CGP_GENERATE_POSTS limit="'.$_curlimit.'" category="'.$_curcategory.'"]' );
                $_posts = json_decode($_posts);
                $_post = $_posts[0];
                $_postcontent = mb_strimwidth(strip_tags($_post->post_excerpt), 0, 145, '...');
                $_custom_url = esc_url(home_url( '/' ).'featured-article/'.$_curcategory.'/'.$_post->ID.'/'.$CustomPageTemplate->seoUrl($_post->post_title));
                ?>
                <figure style="background-image:url(<?=$_post->featured_image?>)"></figure>
                <span class="section-content">
                    <div class="text-left">
                        <a href="<?=$_custom_url?>" alt="<?=$_post->post_title?>" title="<?=$_post->post_title?>"><h4 class="title"><strong><?=$_post->post_title?></strong></h4></a>
                        <label><?=$_postcontent?></label>
                    </div>
                    <a href="<?=$_custom_url?>"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">READ MORE</button></a>
                </span>
            </div>
            <div class="col-md-3 col-sm-6 margin-bottom-10">
                <div class="owl-carousel buttons-autohide controlls-over" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": false, "pagination": false, "transitionStyle":"fadeUp"}'>
                    <div>
                        <img class="img-responsive" src="<?=CUSTOM_ASSETS?>images/demo/shop/banners/off_2.png" alt="">
                    </div>
                    <div>
                        <img class="img-responsive" src="<?=CUSTOM_ASSETS?>images/demo/shop/banners/off_1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- /FEATURED BOXES 3 -->
        <div class="row cont-ads-long">
            <div class="col-md-12">
                <img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
            </div>
        </div>
        <?php include_once('_template/world-news-slider.php');?>
    </div>
</section>
<!-- /FEATURES -->
