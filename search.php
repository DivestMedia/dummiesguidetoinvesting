<?php 
  get_header();  
  $_tag = $wp_query->query;
  $paged = empty($paged) ? 1 : $paged; 
  $per_page = get_option('posts_per_page',10);
  $args = array(
    'showposts' => $per_page,
    'post_type'  =>  array('iod_video'),
    'paged'      =>  $paged,
  );
  
  $resultCategory = array_merge((array)$args, (array)$_tag);
  query_posts( $resultCategory );
?>
<section class="dark" style="background-color: #3b3b3b;">
  <div class="container">
    <div class="left-content align-left">
      <div class="row">
          <div class="col-md-12">
            <h4><?=number_format(count(get_posts($resultCategory)))?> result/s found for: "<?php printf( __( '%s', 'simply-loud' ), get_search_query()  ); ?>"</h4>
          </div>
      </div>
     
      <div class="row">
        <? 
        if(have_posts()):
          while ( have_posts() ) : the_post();
            if(!empty($post->ID)){
              $iod_video = json_decode(get_post_meta( $post->ID, '_iod_video',true))->embed->url;
              $ytpattern = '/^.*(?:(?:youtu\.be\/|v\/|vi\/|u\/\w\/|embed\/)|(?:(?:watch)?\?v(?:i)?=|\&v(?:i)?=))([^#\&\?]*).*/';
              if(preg_match($ytpattern,$iod_video,$vid_id)){
                $iod_video_thumbnail = 'http://img.youtube.com/vi/'.end($vid_id).'/mqdefault.jpg';
              }
              ?>
              <div class="margin-bottom-20 col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-3 col-sm-3 col-xs-3" style="padding: 0;">
                  <a href="<?=$post->guid?>">
                    <img class="img-responsive episode-thumbnail" src="<?=$iod_video_thumbnail?>" alt="<?=$post->post_title; ?>" />
                  </a>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9 cont-episode-details">
                  <a href="<?=$post->guid?>" title="<?=$post->post_title; ?>" class="title size-17"><strong><?=$post->post_title; ?></strong></a>
                  <label><i class="fa fa-eye fa-fw"></i><?=InvestOrDivestWidget::count_postviews($post->ID,true)?> views</label>
                  <label><i class="fa fa-comments fa-fw"></i><?=$post->comment_count?> comments</label>
                  <p></i><?=mb_strimwidth(strip_tags($post->post_content), 0, 230, '...')?></p>
                </div>
              </div>
              <?php
            }
          endwhile;
        else:
          ?>
          <div class="col-md-12"><h3>No results found</h3></div>        
        <?php
        endif;
      ?>
      </div>
    </div>
    <br class="clear"/>
  </div>
</section>
<section>
  <div class="container">
    <div class="row cont-ads-long">
      <div class="col-md-12">
        <img class="img-responsive" src="<?=CUSTOM_ASSETS?>ads.jpg" alt="">
      </div>
    </div>  
    <?php include_once('_template/world-news-slider.php');?>
  </div>
</section>


<?php get_footer(); 

