<?php 

include 'header.php'; 

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-12">
				<div class="col-md-6 text-center">
					<br><br>
					<h1 class="mt-xl mb-none">Adres & İletişim</h1>
					<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 13%;">
						<hr>
					</div>
					<div>
						<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
							<li>
								<i style="position: flex; left: 5%" class="fa fa-map-marker"></i> <strong>Adres:</strong><b><?php echo $ayarcek['ayar_adres']; ?> <?php echo $ayarcek['ayar_ilce']; ?> / <?php echo $ayarcek['ayar_il']; ?></b></li>
								<li>
									<i style="position: flex; left: 33%;" class="fa fa-phone"></i> <strong>Telefon:</strong><b><?php echo $ayarcek['ayar_tel']; ?></b>
								</li>
								<li>
									<i style="position: flex; left: 22%;" class="fa fa-envelope"></i> <strong>Mail:</strong><a href="mailto:"><b><?php echo $ayarcek['ayar_mail']; ?></b></a>
								</li>
							</ul>
						</div>
					</div>
					<br>

					<div class="col-md-6 text-center">
						<h1 class="mt-xl mb-none">Çalışma Saatleri</h1>
						<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 10%;">
							<hr>
						</div>
						<?php echo $ayarcek['ayar_mesai']; ?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div style="height: 500px;" id="googlemaps" class="google-map google-map-footer">

		<iframe width="100%" height="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $ayarcek['ayar_googlemap']; ?>&q=<?php echo $ayarcek['ayar_adres']; ?>"></iframe>


	</div>

	<?php 

	include 'footer.php'; 

	?>



