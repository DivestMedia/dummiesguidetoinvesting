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
					<div class="row cont-find-a-broker">
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Minimum-investment-deposit.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Minimum investment deposit</strong></h4>
													<label>Most brokerage firms will have minimum deposit requirements for opening an account, typically a number ranging from $500 to $2000 for online brokers, but some may require as much as $10,000.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Minimum investment deposit</strong></h4>
										<hr />
										<label>Most brokerage firms will have minimum deposit requirements for opening an account, typically a number ranging from $500 to $2000 for online brokers, but some may require as much as $10,000. Also, do they offer you the opportunity of opening a margin account? This is an account for the more experienced investor and it means that the broker will actually lend the investor money to purchase securities; this loan would be made into collateral by securities and cash, and, should the value of the stock drop sufficiently, the account holder may have to deposit more cash or sell some of the stock.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Interest-paid-on-deposit.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Interest paid on deposit</strong></h4>
													<label>You will usually have some cash left in your account at any given time. Some brokerage firms will offer you interest on that money, typically between 3-5%, while others won’t; any money not making money is dead money.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Interest paid on deposit</strong></h4>
										<hr />
										<label>You will usually have some cash left in your account at any given time. Some brokerage firms will offer you interest on that money, typically between 3-5%, while others won’t; any money not making money is dead money. Ideally, you’ll find a brokerage firm that ensures that your money is never sitting idle.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Commission-charged.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Commission charged</strong></h4>
													<label>Obviously this is of high importance. Whether it’s the commission fees charged per trade, or the maintenance management fees of your account, these charges are something which will vary from broker to broker and it is something you need to look at very closely.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Commission charged</strong></h4>
										<hr />
										<label>Obviously this is of high importance. Whether it’s the commission fees charged per trade, or the maintenance management fees of your account, these charges are something which will vary from broker to broker and it is something you need to look at very closely. Do they charge a set amount or a percentage? Do they charge more for margin account trades? However, don’t be fooled by low commission rates; look at the fine print and study it closely. In many cases, the fees will be higher for options or limit orders, or for any trades over the phone. Find out exactly what you’ll be charged in any situation.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Complicated-fee-structures.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Complicated fee structures</strong></h4>
													<label>As well as how much, dig deeper and find out how these fees are charged. Many brokers will have similar schedules but many will have very complex structures which make it easier to hide certain charges at first glance.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Complicated fee structures</strong></h4>
										<hr />
										<label>As well as how much, dig deeper and find out how these fees are charged. Many brokers will have similar schedules but many will have very complex structures which make it easier to hide certain charges at first glance. It’s important to look closely at the structure of the management fees and trade commissions, especially if they seem slightly unusual, make sure it’s all legitimate, and then make sure it suits your investment style. Take heed: if the rates seem too good to be true, check again.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Availability.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Availability</strong></h4>
													<label>How easy is it to reach your broker? How quickly can you issue orders? How long before your broker gets back to you? How fast is their internet site and are there any technical difficulties? </label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Availability</strong></h4>
										<hr />
										<label>How easy is it to reach your broker? How quickly can you issue orders? How long before your broker gets back to you? How fast is their internet site and are there any technical difficulties? These are all important since communication with your broker, especially for a novice investor, is paramount. Go online and do some dummy checks.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Customer-Service.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Customer Service</strong></h4>
													<label>As above, customer service from your brokerage firm is going to play a vital role at some point. Test it out; phone them up with an imaginary concern, problem or question, and see what their response time is, their manner, their solution to your problem.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Customer Service</strong></h4>
										<hr />
										<label>As above, customer service from your brokerage firm is going to play a vital role at some point. Test it out; phone them up with an imaginary concern, problem or question, and see what their response time is, their manner, their solution to your problem.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Alternative-means-of-trading.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Alternative means of trading</strong></h4>
													<label>In today’s day and age where everything revolves around a laptop and the web, this may seem superfluous but you never know when you’ll need to get in touch or make a trade when you’re not plugged in to the World Wide Web.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Alternative means of trading</strong></h4>
										<hr />
										<label>In today’s day and age where everything revolves around a laptop and the web, this may seem superfluous but you never know when you’ll need to get in touch or make a trade when you’re not plugged in to the World Wide Web. Find out if your broker and you can make trades in different ways, by fax ordering, touch-tone telephone trades, or, simply, over the phone, outdated though it may seem to some. Then find out if the charges for these alternative trades are different to the normal fees.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Brokers-background.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Broker’s background</strong></h4>
													<label>This is obvious. You need to check out your broker in as much detail as possible. What’s their investment record? What do other people have to say about them?</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Broker’s background</strong></h4>
										<hr />
										<label>This is obvious. You need to check out your broker in as much detail as possible. What’s their investment record? What do other people have to say about them? Are they experts on one particular area of investment or do they have an all-round knowledge covering every part of the investment spectrum? How long have they been trading? What is their policy on asset selection? How good are they at communication? Find out as much as you can before you put your trust in them.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Withdrawal.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Withdrawal</strong></h4>
													<label>Many brokers will charge you a fee to make a withdrawal from your account or they won’t let you take your money out if it means that your balance drops under a certain amount.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Withdrawal</strong></h4>
										<hr />
										<label>Many brokers will charge you a fee to make a withdrawal from your account or they won’t let you take your money out if it means that your balance drops under a certain amount. Make sure you check this thoroughly and understand all the regulations involved with taking money out of your account.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/Geography.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>Geography</strong></h4>
													<label>With the internet, this may not be as important as it might have been in the past, but it can still make a difference. First off, it would make sense to pick someone who speaks the same language as you as a first language.</label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>Geography</strong></h4>
										<hr />
										<label>With the internet, this may not be as important as it might have been in the past, but it can still make a difference. First off, it would make sense to pick someone who speaks the same language as you as a first language. We would also recommend that it might be prudent to have someone in roughly the same time zone, since communication will be key and you don’t want to be getting up at 4am in order to make contact with your broker who’s on the other side of the world.</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12 margin-bottom-30">
							<div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center">
								<div class="front">
									<div class="box1">
										<div class="box-icon-title">
											<figure>
												<img class="img-responsive" src="<?=CUSTOM_ASSETS?>find-a-broker/What-kind-of-investor-are-you.jpg" alt="" />
											</figure>
											<span class="section-content">
												<div class="text-left">
													<h4 class="title"><strong>What kind of investor are you?</strong></h4>
													<label>This is all-important although it might not be so easy to answer for a novice investor. Your choice of broker should be guided in part by what kind of investor you are. Are you a trader or a buy-and-hold investor? </label>
												</div>
											</span>
										</div>
									</div>
								</div>	
								<div class="back">
									<div class="box2">
										<h4><strong>What kind of investor are you?</strong></h4>
										<hr />
										<label>This is all-important although it might not be so easy to answer for a novice investor. Your choice of broker should be guided in part by what kind of investor you are. Are you a trader or a buy-and-hold investor? Traders make lots of executions and they’re interested in short-term price volatility, so they’ll ideally find a broker with low execution fees, while buy-and-hold passive investors, who are willing to wait a long time for their returns, should be more interested in finding brokers with no monthly fees. Work out who you are and how you will invest, and let that guide you to what you need from your broker.</label>
									</div>
								</div>
							</div>
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