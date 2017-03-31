<?php
get_template_part( '_template/content', 'ads-footer' );
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


<?php if(!is_user_logged_in()): ?>
	<div id="modal-restrict" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-show="true" data-autoload-delay="200">
		<div class="modal-dialog modal-lg" style="max-width: 770px;">
			<div class="modal-content">
				<!-- body modal -->
				<div class="modal-body" style="padding: 0 15px;">
					<div class="row">
						<div class="col-md-3 padding-0" style="background-color: #d1d1d1;height: 100%;position: relative;">

							<figure style="background-image: url('<?=get_stylesheet_directory_uri();?>/assets/img/restrict.png');background-size: cover;background-repeat: no-repeat;height: 405px;background-position: center;"></figure>
							<div class="text-center" style="position: absolute;bottom: 10px;width: 100%;">
								<div style="background-color: rgba(0,0,0,.6);color:#fff;padding:15px 0;">
									<label class="margin-bottom-0">JOIN NOW!</label>
									<label class="size-70 margin-bottom-0 weight-700">FREE</label>
									<label class="margin-bottom-0">PRIVACY PROTECTION</label>
								</div>
								<div style="color: #000;border-bottom: 1px solid #000;border-top: 1px solid #000;margin-top: 14px;width: 75%;margin: 17px auto 0;">LIMITED TIME OFFER</div>
							</div>

						</div>
						<div class="col-md-9 padding-15">
							<div class="text-center">
								<h2 class="letter-spacing-2 margin-top-20 margin-bottom-0" style="color:#ee3f3f;">CONTENT RESTRICTED</h2>
								<p class="margin-bottom-40">CONTENT ONLY AVAILABLE TO OUR MEMBERS</p>
								<div style="width: 300px;margin:0 auto">
									<a href="<?=site_url('accounts/register')?>" class="btn btn-success btn-lg btn-block">SIGN UP NOW</a>
								</div>
								<div style="padding-top: 5px;width: 300px;margin:0 auto">
									<a href="<?=site_url('accounts/login')?>" class="btn btn-info btn-lg btn-block">ALREADY A MEMBER</a>
								</div>
								<div class="margin-top-20">
									<a href="<?=site_url()?>" class="btn btn-link">NO THANKS</a>
								</div>
							</div>
							<!-- <div class="margin-top-20" style="padding: 0 20px;">
							<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer orci nunc, auctor sed eros eget, efficitur rhoncus nibh. Suspendisse congue mauris nec dolor consectetur, venenatis fermentum erat semper.</small>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>


<div id="ask-advisor-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- header modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Ask Bruce Curran</h4>
			</div>

			<!-- body modal -->
			<div class="modal-body">

				<div class="row">

					<div class="col-sm-3">

						<img class="img-responsive" src="http://www.marketmasterclass.com/wp-content/uploads/sites/8/2016/09/bruce-curran-profile-3.png" alt="">

					</div>

					<div class="col-sm-9">

						<form class="validate nomargin" action="<?=admin_url('admin-ajax.php')?>" method="post" data-success="Thank you for your message!" data-toastr-position="top-center" novalidate="novalidate">

							<h4>Please leave your email and questions below and I will respond to it as soon as I can.</h4>
							<input type="hidden" name="action" value="save_advisor_message">
							<input type="hidden" name="contact[advisor]" value="Bruce Curran">
							<div class="fancy-form">
								<i class="fa fa-envelope"></i>
								<input type="email" class="form-control" name="contact[email]" placeholder="Your Email Address" required="">
							</div>

							<div class="fancy-form">
								<textarea rows="3" name="contact[message]" class="form-control word-count" data-maxlength="200" data-info="textarea-words-info" placeholder="Leave a message" required=""></textarea>

								<i class="fa fa-comments"><!-- icon --></i>

								<span class="fancy-hint size-11 text-muted">
									<strong>Hint:</strong> 200 words allowed!
									<span class="pull-right">
										<span id="textarea-words-info">0/200</span> Words
									</span>
								</span>

							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" id="submit-advisor-modal" class="btn btn-3d btn-teal pull-right margin-top-30" >
										Send Now
									</button>
								</div>
							</div>
							<input type="hidden" name="is_ajax" value="true"></form>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>


</div>


<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>
<!-- PRELOADER -->
<div id="preloader">
	<div class="inner">
		<span class="loader"></span>
	</div>
</div><!-- /PRELOADER -->

<?php
wp_footer();
global $_footers;
echo $_footers;
?>
<script type='text/javascript' src='<?=get_stylesheet_directory_uri();?>/js/main.js'></script>
<?php if(!is_user_logged_in()): ?>
	<script>
	$(function(){
		$('a[href$="accounts"],a[href$="glossary"]').click(function(e){
			e.preventDefault();
			$('#modal-restrict').modal('show');
			return false;
		});
	});
	</script>
<?php endif;?>
</body>
</html>
