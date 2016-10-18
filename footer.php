<?php
get_template_part( '_template/content', 'vip-subscribers' );
?>
<!-- FOOTER -->
<footer id="footer">
	<div class="container padding-20 margin-bottom-10">
		<div class="text-center">
			<a href="<?=site_url()?>" class="text-white underline">
				<img src="<?=get_stylesheet_directory_uri();?>/assets/dummies-logo-footer.png" class="width-250">
			</a>
			<!-- Social Icons -->
			<div class="text-center margin-top-0">
				<a href="https://www.facebook.com/marketmasterclasscom-1657855544470731/" target="_blank" class="social-icon social-icon-round social-icon-border social-facebook noborder" data-toggle="tooltip" data-placement="top" title="Facebook">

					<i class="icon-facebook"></i>
					<i class="icon-facebook"></i>
				</a>

				<a href="https://twitter.com/MyMarketMaster" target="_blank" class="social-icon social-icon-round social-icon-border social-twitter noborder" data-toggle="tooltip" data-placement="top" title="Twitter">
					<i class="icon-twitter"></i>
					<i class="icon-twitter"></i>
				</a>

				<a href="https://pinterest.com/MyMarketMaster" class="social-icon social-icon-round social-icon-border social-gplus noborder" data-toggle="tooltip" data-placement="top" title="Pinterest">
					<i class="fa fa-pinterest "></i>
					<i class="fa fa-pinterest "></i>
				</a>

				<a href="https://instagram.com/MyMarketMaster" class="social-icon social-icon-round social-icon-border social-instagram noborder" data-toggle="tooltip" data-placement="top" title="Instagram">
					<i class="icon-instagram"></i>
					<i class="icon-instagram"></i>
				</a>

				<a href="https://www.youtube.com/channel/UCI4UNi7DBZMHRYoaszF_CdA" target="_blank" class="social-icon social-icon-round social-icon-border social-youtube noborder" data-toggle="tooltip" data-placement="top" title="Youtube">
					<i class="icon-youtube"></i>
					<i class="icon-youtube"></i>
				</a>
				<!--


				<a href="#" class="social-icon social-icon-round social-icon-border social-rss noborder" data-toggle="tooltip" data-placement="top" title="Rss">
				<i class="icon-rss"></i>
				<i class="icon-rss"></i>
			</a> -->

		</div>
		<!-- /Social Icons -->

		<p>
			 DummiesGuidetoInvesting.com is part of the <a href="http://www.divestmedia.com" style="color: #0072bc;font-weight: bold;">Divest Media Network</a>
		</p>
	</div>

	<hr/>
	<div class="row ">
		<div class="col-sm-6">
			&copy; 2016 DummiesGuidetoInvesting.com. All rights reserved
		</div>
		<div class="col-sm-6 text-right">
			<?php
			if(!empty(wp_get_nav_menu_items('Footer Menu'))){
				$footer_menu = [];
				foreach (wp_get_nav_menu_items('Footer Menu') as $f) {
					array_push($footer_menu , '<a href="'.$f->url.'">'.$f->title.'</a>');
				}
			}
			print_r(implode(' | ', $footer_menu));
			?>
		</div>


	</div>

</div>
<div class="copyright">
	<div class="container size-12 text-center">
		Dummies Guide to Investing is a financial publisher that does not offer any personal financial advice, or advocate the purchase or sale of any security or investment for any specific individual. Members should be aware that investment markets have inherent risks, and past performance does not assure future results. In accordance with FTC guidelines, Investor Junkie has financial relationships with some of the products and services mentioned on this web site, and Market MasterClass may be compensated if consumers choose to click these links in our content and ultimately sign up for them. For more information please visit our disclaimer web page.
	</div>
</div>

</footer>
			<!-- /FOOTER -->
		</div>
		<!-- /wrapper -->

		<!-- PRELOADER -->
		<!-- <div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div> -->
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
