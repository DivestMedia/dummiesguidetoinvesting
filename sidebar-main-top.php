

						<!-- RIGHT -->
						
												
						
						<div class="col-sm-3 col-md-3 col-lg-3 sidebar">
							
							<div class="row">
								
								<div class="col-sm-12 col-md-6 col-lg-12 link-black ">
									
									<div class="heading-title margin-bottom-0">
										<h4 class="weight-500">LATEST NEWS</h4>
									</div>
									<div class="divider margin-top-10 margin-bottom-10 block" style="clear:both"><!-- divider --></div>
									
							
									<div class="size-14">
									
										
										<?
											
										$the_query = new WP_Query(array( 'posts_per_page' => 5 ,'post_type' => 'news'/*, 'category_name'=>'Movies'  */));
										?>
										<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
											
											<div>
												<? if(has_post_thumbnail()) { ?>
													<figure class="pull-right margin-bottom-10 margin-left-10" style="width:70px">
														<? the_post_thumbnail('thumb-image',array('class' => 'img-responsive'));?>
													</figure>
													
												<? } ?>
												
												<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?=xyr_smarty_limit_chars(get_the_title(),48);?></a>
											</div>
											
											<div class="divider margin-top-10 margin-bottom-10  block" style="clear:both"><!-- divider --></div>
											
											
											
										<? 	
										endwhile;
										wp_reset_postdata();
										?>
										
									</div>
									
								
								</div>
							</div>
							
							
						</div>
						
						