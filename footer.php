	<!-- FOOTER -->
			<footer id="footer">
				<div class="full-container">
					<div class="row cont-sub-footer">
						<div class="col-md-4 margin-bottom-10">
							<!-- Footer Logo -->
							<a href="<?=home_url('/')?>"><img src="<?=CUSTOM_ASSETS?>dummies-to-investing.png" alt="" class="custom-logo"></a>
							<?php 
							if(is_active_sidebar('footer-about-us-min'))
								dynamic_sidebar('footer-about-us-min');
							?>
						</div>
						<div class="col-md-4 text-center margin-bottom-10">
							<label class="lbl-custom white">SPECIAL OFFER</label>
							<label class="lbl-custom yellow">FREE PREMIUM SUBSCRIPTION</label>
							<div class="margin-top-20">
								<a href="<?=home_url('/subscribe')?>" title="Subcribe now"><button type="button" class="btn btn-warning btn-sm btn-custom yellow">SUBSCRIBE NOW</button></a>
							</div>
						</div>
						<div class="col-md-4 text-center margin-bottom-10">
							<label class="lbl-custom white">STAY CONNECTED</label>
							<label class="lbl-custom yellow">SUBSCRIBE TO OUR SOCIAL MEDIA CHANNELS</label>
							<div class="social-icon-container">
								<a href="#" class="social-icon social-icon-round social-icon-border social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon social-icon-round social-icon-border social-twitter" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon social-icon-round social-icon-border social-instagram" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>
								<a href="#" class="social-icon social-icon-round social-icon-border social-youtube" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>
								<a href="#" class="social-icon social-icon-round social-icon-border social-rss" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="copyright">
					<div class="full-container">
						<div class="row cont-footer">
							<div class="col-md-12">
								<div class="lbl-copyright">
									<div class="pull-left footer-nav col-md-7 col-sm-12">
									<?php
										if(!empty(wp_get_nav_menu_items('Footer Menu'))){
											$footer_menu = [];
											foreach (wp_get_nav_menu_items('Footer Menu') as $f) {
												array_push($footer_menu , '<a href="'.$f->url.'">'.strtoupper($f->title).'</a>');
											}
										}
										print_r(implode(' | ', $footer_menu));
									?>
									</div>
									<div class="col-md-5 col-sm-12">
										<label class="pull-right">DummiesGuidetoInvesting.com - a Divest Media Publication | All Rights Reserved © 2016</label>
									</div>
								</div>
							</div>
							<br>
							<div class="col-md-12  margin-top-20">
								<div class="text-center lbl-disclaimer">
		Dummies Guide to Investing is a financial publisher that does not offer any personal financial advice, or advocate the purchase or sale of any security or investment for any specific individual. Members should be aware that investment 
		markets have inherent risks, and past performance does not assure future results. In accordance with FTC guidelines, Investor Junkie has financial relationships with some of the products and services mentioned on this web site, 
		and Market MasterClass may be compensated if consumers choose to click these links in our content and ultimately sign up for them. For more information please visit our disclaimer web page.
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->
		</div>
		<!-- /wrapper -->

		<!-- PRELOADER -->
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div>
		<!-- /PRELOADER -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>
<?
		wp_footer();
		global $_footers;
		echo $_footers;
		?>	
		<script type='text/javascript' src='<?=get_stylesheet_directory_uri();?>/js/main.js'></script>
	</body>
</html>