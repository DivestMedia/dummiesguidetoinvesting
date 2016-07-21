<?
get_header();
?>
				<div>
					<img class="img-responsive" src="<?=CUSTOM_ASSETS?>samplebannerfindabroker.png" alt="">
				</div>
			<!-- FEATURES -->
			<section id="features" class="section-findabroker">
				
				<div class="container">
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">Find a Broker</h2>
					</header>
					<div class="row">
						<div class="col-md-12">
							<?php
								while ( have_posts() ) : the_post();
									echo the_content();
								endwhile;
							?>
						</div>
					</div>
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">What to look for a broker?</h2>
					</header>

					<!-- FEATURED BOXES 3 -->
					<div class="row">
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<figure class="">
									<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Minimum-investment-deposit.jpg" alt="" />
								</figure>
								<span class="section-content">
									<div class="text-left">
										<h4 class="title"><strong>Minimum investment deposit</strong></h4>
										<label>Most brokerage firms will have minimum deposit requirements for opening an account, typically a number ranging from $500 to $2000 for online brokers, but some may require as much as $10,000. Also, do they offer you the opportunity of opening a margin account? This is an account for the more experienced investor </label>
									</div>
								</span>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Interest-paid-on-deposit.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Interest paid on deposit</strong></h4>
									<label>Chocolate bar sugar plum wafer. Candy tootsie roll dragée apple pie pie dragée. Chocolate oat cake tart jelly beans apple pie gummies icing sesame snaps.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Commission-charged.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Commission charged</strong></h4>
									<label>Gingerbread cake gummies cotton candy. Caramels fruitcake cotton candy danish gummi bears ice cream cookie carrot cake muffin. Caramels I love I love.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Complicated-fee-structures.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Complicated fee structures</strong></h4>
									<label>Sweet roll chocolate bar pudding lollipop powder. Danish jujubes tootsie roll cotton candy. Wafer cake sweet roll liquorice pudding carrot cake.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Availability.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Availability</strong></h4>
									<label>Sweet roll chocolate bar pudding lollipop powder. Danish jujubes tootsie roll cotton candy. Wafer cake sweet roll liquorice pudding carrot cake.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Customer-Service.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Customer Service</strong></h4>
									<label>Chocolate bar sugar plum wafer. Candy tootsie roll dragée apple pie pie dragée. Chocolate oat cake tart jelly beans apple pie gummies icing sesame snaps.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Alternative-means-of-trading.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Alternative means of trading</strong></h4>
									<label>Gingerbread cake gummies cotton candy. Caramels fruitcake cotton candy danish gummi bears ice cream cookie carrot cake muffin. Caramels I love I love.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Brokers-background.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Broker’s background</strong></h4>
									<label>Sweet roll chocolate bar pudding lollipop powder. Danish jujubes tootsie roll cotton candy. Wafer cake sweet roll liquorice pudding carrot cake.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Withdrawal.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Withdrawal</strong></h4>
									<label>Sweet roll chocolate bar pudding lollipop powder. Danish jujubes tootsie roll cotton candy. Wafer cake sweet roll liquorice pudding carrot cake.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Geography.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>Geography</strong></h4>
									<label>Chocolate bar sugar plum wafer. Candy tootsie roll dragée apple pie pie dragée. Chocolate oat cake tart jelly beans apple pie gummies icing sesame snaps.</label>
								</div>
							</span>
						</div>
						<div class="col-md-4 col-sm-6 margin-bottom-30">
							<figure class="">
								<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/What-kind-of-investor-are-you.jpg" alt="" />
							</figure>
							<span class="section-content">
								<div class="text-left">
									<h4 class="title"><strong>What kind of investor are you?</strong></h4>
									<label>Gingerbread cake gummies cotton candy. Caramels fruitcake cotton candy danish gummi bears ice cream cookie carrot cake muffin. Caramels I love I love.</label>
								</div>
							</span>
						</div>
						
					</div>
					<!-- /FEATURED BOXES 3 -->
				</div>
			</section>
			<!-- /FEATURES -->

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
<?
get_footer();