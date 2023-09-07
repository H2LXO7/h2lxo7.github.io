<footer class="short" id="footer">
	<div class="container">
		<div class="row">

			<div class="col-xl-12 text-center">
			<div class="col-md-4 text-center">
				<a href="<?php echo $ayarcek['ayar_siteurl']; ?>" class="logo mb-md">
					<img style="display: block; margin: 0 auto;" alt="<?php echo $ayarcek['ayar_title']; ?> logosu" class="img-responsive" width="256" height="128" src="<?php echo $ayarcek['ayar_logo']; ?>">
				</a>
				<p style="border-right: 0px; text-align: center; color: black;"><?php echo substr($ayarcek['ayar_description'],0,115); ?></p>
			</div>

			<div class="col-md-4 text-center">
				<h5 style="color: black;" class="mb-sm">ADRES BİLGİLERİMİZ</h5>
				<ul style="color: black;" class="list list-icons mt-xl">
					<li>
						<i style="position: flex; left: 10px; color: black;" class="fa fa-map-marker"></i> <strong>Adres:</strong> <?php echo $ayarcek['ayar_adres']; ?><br><?php echo $ayarcek['ayar_ilce']; ?> / <?php echo $ayarcek['ayar_il']; ?>
					</li>
				</ul>
			</div>

			<div class="col-md-4 text-center">
				<h5 style="color: black;" class="mb-sm">BİZE ULAŞIN</h5>
				<br>
				<span style="color: black;" class="phone"><?php echo $ayarcek['ayar_tel']; ?></span>

				<ul style="color: black;" class="list list-icons mt-xl">
					<li>
						<i style="position: flex; left: 45px; color: black;" class="fa fa-envelope"></i> <strong>Mail:</strong> <a href="mailto:mail@example.com"><?php echo $ayarcek['ayar_mail']; ?></a>
					</li>
				</ul>

				<ul style="font-size: 21px;" class="social-icons mt-lg">
					<li class="social-icons-facebook"><a href="<?php echo $ayarcek['ayar_facebook']; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li class="social-icons-twitter"><a href="<?php echo $ayarcek['ayar_twitter']; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li class="social-icons-youtube"><a href="<?php echo $ayarcek['ayar_youtube']; ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
					<li class="social-icons-google"><a href="<?php echo $ayarcek['ayar_google']; ?>" target="_blank" title="Google"><i class="fa fa-google"></i></a></li>
				</ul>
				
			</div>
			</div>

		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p style="color: black;">©2023 Vipot Reklam Tarafından Kodlanmıştır.  | <a href="https://www.vipotreklamdanismanlik.com" target="_blank"><?php echo $ayarcek['ayar_author']; ?></a></p>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<!-- Vendor -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/common/common.min.js"></script>
<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="vendor/isotope/jquery.isotope.min.js"></script>
<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="vendor/vide/vide.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Current Page Vendor and Views -->
<script src="js/views/view.contact.js"></script>

<!-- Demo -->
<script src="js/demos/demo-law-firm.js"></script>	

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>




		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', <?php echo $ayarcek['ayar_analiystic']; ?>, 'auto');
			ga('send', 'pageview');
		</script>

</body>
</html>
