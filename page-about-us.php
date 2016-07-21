<?

get_header();

?>


	
				<div>
					<img class="img-responsive" src="<?=CUSTOM_ASSETS?>samplebannerabout.png" alt="">
				</div>
			<!-- FEATURES -->
			<section id="features" class="section-about">
				<div class="container">
					<header class="text-center margin-bottom-30">
						<h2 class="section-title">Congratulations!</h2>
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
				</div>
			</section>
			<!-- /FEATURES -->
			<section class="section-ourteam">
				<div class="container">
					<header class="text-center margin-bottom-20">
						<h2 class="section-title white">Our Team</h2>
					</header>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>daniel.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Daniel Stracey</strong></h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
									<br><br>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>cameron.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Cameron Clark</strong></h4>
								<p>
									Cameron has been involved in the investment world since the early 1980’s when he started out a career in investment consultancy, providing expert advice in corporate off shore investment. He moved over to Zurich Financial Services where he became a specialized broker consultant, dealing with IFA’s, accountants and solicitors and bringing in corporate business in both on and off shore, and also dealing with group pensions. He moved to Asia in 2003 where he moved to the sales side of the business, before then investing his money in various stocks and commodities and eventually breaking out and becoming an independent investor forging his own path. He has a wealth of experience in both investing and business management, as well as sales and marketing. He has been making his money grow through investments for the last two decades.
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>lem.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Dimitri Leemon</strong></h4>
								<p>
									Editorial Director
<br><br>
Dimitri has worked across many industries in his peripatetic life and has spent most of his time leading editorial teams of one kind or another in a variety of different fields. He has written and provided content, under various pen names, for several magazines and websites , he has been an editor in both printed publications and online websites, he has led advertising and marketing campaigns, and he has also been part of an event organizing team.
<br><br>
He has lived in the UK, France, Germany and Spain, and has been living in Asia since 2008, settling in the Philippines after spending a few months in Thailand and India. He has a passion for hiking and scuba diving, and he has invested a portion of his earnings throughout most of his life, always leaning on the conservative side.
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>anwar.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Anwar Ratag</strong></h4>
								<p>
									Creative Director
<br><br>
Anwar has more than two decades of experience in Visual/Creative and Multimedia Design, as well as over ten years of involvement in Web Design and Development, and he has worked for various Network, Multimedia, Ad Agency and Online Gaming companies.
<br><br>
An artist since birth, with exceptional skills in traditional and digital arts, he loves drawing, sketching and painting, and is also highly skilled in photography and videography and 3-D animation, as well as being well versed in HTML and CSS, and with extensive knowledge in PHP and Java. Also an avid fan of heavy metal music and video games. He just loves anything computer-related.
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>shaun.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Shaun Hurley</strong></h4>
								<p>
									Sales Director
<br><br>
Shaun started off in sales at a very young age, trading in the markets before moving into insurance and pensions. Fresh out of his teens he took a bold decision to take his future into his own hands and invested some money in stocks, managing to make a good profit in the process. He then left England while still in his early twenties and moved to Europe where he lived in several different countries while engaging in his favorite pastime; gambling. He eventually became a full-time gambler and spent a few years living the hectic life of a punter, before moving to Asia and deciding to step out of the gambling circuit in order to settle down, stepping back into sales with the safe gamble of Divest Media. He loves making nothing into something and turning ideas into money.
								</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 margin-bottom-20">
							<img class="pull-left img-responsive team-member" src="<?=CUSTOM_ASSETS?>charlie.jpg" alt="" />
							<div class="cont-description">
								<h4 class="title"><strong>Charlie Apostol</strong></h4>
								<p>
									Business Manager
<br><br>
Charlie brings more than a decade of experience in overall business operations including training and evaluation, budget forecasting and control, and overseeing general business functions such as Customer Service, Payment, Fraud Control, and Risk Management. He has successfully set up online casinos, spearheaded the creation of company documents, and formulated business continuity plans. If it’s anything to do with running a business, he’s been there, done that, and overseen the design of the t-shirt.
<br><br>
Motivated through inspiring others to perform above and beyond expectations, he spreads enthusiasm and promotes inventive thinking while keeping it all structured and on track. Also ardent on both the music and culinary world, he ventured into music-inspired bistros. Good food, good music. Just a few things he loves about life.
								</p>
							</div>
						</div>
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
	


<?

get_footer();

			