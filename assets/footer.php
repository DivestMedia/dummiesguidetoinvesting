



		<!-- FOOTER -->
			<footer id="footer">
				<div class="container padding-20 margin-bottom-10">
					<div class="logo-social padding-20 ">
						<div class="row">
							<div class="col-sm-6 border-side-right text-right">
								<div class="padding-top-20 padding-bottom-20">
									<a href="<?=site_url();?>" class="text-white underline">
									<img src="<?=get_stylesheet_directory_uri();?>/assets/dv-media.png" class="width-150 desaturate">
									</a>
								</div>
							</div>
							<div class="col-sm-6">
								<!-- Social Icons -->
							<div class="margin-top-20">
								<a href="#" class="social-icon social-icon-round social-icon-border social-facebook pull-left noborder" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon social-icon-round social-icon-border social-twitter pull-left noborder" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon social-icon-round social-icon-border social-gplus pull-left noborder" data-toggle="tooltip" data-placement="top" title="Google plus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>

								<a href="#" class="social-icon social-icon-round social-icon-border social-instagram pull-left noborder" data-toggle="tooltip" data-placement="top" title="Instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>
								
								<a href="#" class="social-icon social-icon-round social-icon-border social-youtube pull-left noborder" data-toggle="tooltip" data-placement="top" title="Youtube">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>
								
								

								<a href="#" class="social-icon social-icon-round social-icon-border social-rss pull-left noborder" data-toggle="tooltip" data-placement="top" title="Rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
					
							</div>
							<!-- /Social Icons -->
							</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-6">
							&copy; <?=date('Y');?> <? bloginfo();?>. All rights reserved
						</div>
						<div class="col-sm-6 text-right">
							
							
							<a href="<?=site_url('/privacy-policy');?>">Privacy Policy</a>
							&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
							<a href="<?=site_url('/terms-and-conditions');?>">Terms and Conditions</a>
							&nbsp;&nbsp;&bullet;&nbsp;&nbsp;
							<a href="<?=site_url('/sitemap');?>">Sitemap</a>
							<?
							//Footer navigation should be here

								$items = wp_get_nav_menu_items('main');
								
								
								//print_r($items);
								
								/* 
								
								foreach($items as $item): ?>
							<a class="topnav" id="<?php echo $counter; ?>" href="<?php echo $item->url; ?>">WP Page <?php echo $counter; ?> :: <?php echo $item->title; ?></a>
							<?php 
endforeach;
								 */
								?>
								
						</div>
						
					
					</div>
						
				</div>
				<div class="copyright">
					<div class="container size-12 text-center">
						The Divest Media group is an independent team of disparate intellects made up of former finance and online gambling professionals who are 
						encouraged to voice their frank opinions; in fact, we’re urged to shout them from the rooftops. We are not your average content providing team, 
						we are different; we’re forthright, we’re honest, we’re completely autonomous, and we are absolutely not ruled by any outside influences. 
						Furthermore, and more importantly, we promise to stay that way. We are not an advertising-driven entity and we are not under anyone’s control.
					</div>
				</div>
				
			</footer>
			<!-- /FOOTER -->

	

		</div>
		<!-- /wrapper -->




		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>
		
		

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-76666609-1', 'auto');
  ga('send', 'pageview');

</script>

 
 
<?
		
		
		wp_footer();
		global $_footers;

		echo $_footers;
		?>	
		
	</body>
</html>