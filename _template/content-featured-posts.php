<?php
global $featuredPost,$featuredTitle,$is_article;
// $featuredPost = [
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

?>

<section class="alternate padding-top-150" id="all-posts">
    <div class="container">
        <header class="text-center margin-bottom-10 tiny-line">
            <h2 class="font-proxima uppercase"><?=($featuredTitle)?></h2>
        </header>

        <!-- Tab v3 -->
        <div class="row tab-v3">

            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="planning">
                        <div class="row" id="news-row">

                            <?php
                            if(!empty($is_article)){
                                $mainpost = $post;
                                if(count($featuredPost['posts'])):
                                    foreach($featuredPost['posts'] as $post):
                                        $post = get_post($post);
                                        setup_postdata($post);
                                        ?>
                                        <div class="col-sm-4">
                                            <a href="<?=get_the_permalink()?>">
                                                <figure style="border-bottom: 5px solid #1ecd6e;background-image: url('<?=the_post_thumbnail_url()?>');background-size: cover;background-repeat: no-repeat;height: 150px;"></figure>
                                            </a>
                                            <h4 class="margin-top-20 size-14 weight-700 uppercase height-50" style="overflow:hidden;"><a href="<?=get_the_permalink($post->ID)?>"><?=xyr_smarty_limit_chars(get_the_title($post->ID),80)?></a></h4>
                                            <p class="text-justify height-100" style="overflow:hidden;"><?=trim_text($post->post_content,180)?></p>
                                            <ul class="text-left size-12 list-inline list-separator">
                                                <li>
                                                    <i class="fa fa-calendar"></i>
                                                    <?=get_the_date()?>&nbsp;<small><?=get_the_date('h:i a')?></small>
                                                </li>
                                            </ul>
                                        </div>
                                        <?php
                                    endforeach;
                                else:
                                    echo '<h4 class="text-center">No Articles yet</h4>';
                                endif;
                                $post = $mainpost;
                                wp_reset_postdata();
                                ?>

                                <?php }?>

                            </div>
                            <?php if(!empty($is_article)){?>
                                <div class="pagination block"><?=posts_pagination(12)?></div>
                                <?php }?>
                                <div class="row">
                                    <div class="pagination">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs hidden-sm">
                        <!-- side navigation -->
                        <div class="side-nav margin-top-50">

                            <?php
                            if(is_active_sidebar('sidebar-single'))
                            dynamic_sidebar('sidebar-single');
                            ?>
                        </div>
                        <!-- /side navigation -->
                    </div>
                </div>
                <!-- Tab v3 -->
            </div>
        </section>
