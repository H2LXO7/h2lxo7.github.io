<?php
include 'header.php';

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">Referanslar</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php


					$sayfada = 6; 
					// sayfada gösterilecek içerik miktarını belirtiyoruz.

					$sorgu=$db->prepare("select * from referans");
					$sorgu->execute();

					$toplam_referans = $sorgu->rowCount();

					$toplam_sayfa = ceil($toplam_referans / $sayfada);

					// eğer sayfa girilmemişse 1 varsayalım.
					$sayfa= isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
					if($sayfa < 1) $sayfa = 1;

					// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
					if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;

					$referanssor=$db->prepare("select * from referans order by referans_ad DESC limit $limit,$sayfada");
					$referanssor->execute();


					while ($referanscek=$referanssor->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<!-- Başla -->

						<div class="col-md-6">
							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">

										<div class="col-md-12">
											<span class="thumb-info-side-image-wrapper p-none">
												<a title="" href="referans-<?=vfc($referanscek["referans_ad"]).'-'.$referanscek["referans_id"]?>">
													<img src="<?php echo $referanscek['referans_resimyol']; ?>" class="
													img-responsive" alt="" style="width: 400px; height: 200px; margin-left: 10px; margin-top: 20px; margin-bottom: 10px;">
												</a>
											</span>
										</div>

										<div class="mb-md mt-xs text-center">
										<h2><a title="" class="text-dark" href="
											referans-<?=vfc($referanscek["referans_ad"]).'-'.$referanscek["referans_id"]?>"><?php echo $referanscek['referans_ad'
											]; ?></a></h2>
											</div>

											<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; margin-top: -60px; text-align: justify;">
												<p class="font-size-md"><?php echo substr($referanscek['referans_icerik'],0,127); ?>...</p>
											</div>
											<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="referans-<?=vfc($referanscek["referans_ad"]).'-'.$referanscek["referans_id"]?>"><strong>Daha Fazla </strong><i class="fa fa-arrow-right"></i></a>
										</span>
									</span>
								</span>

							</div>

							<!-- Bitiş -->

						<?php } ?>

						<div class="col-md-12" align="center">
							<ul class="pagination">

								<?php

								$s=0;

								while ($s < $toplam_sayfa) {

									$s++; ?>

									<?php

									if ($s==$sayfa) {?>

										<li class="active">

											<a href="referanslar?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
										</a>

									</li>

								<?php } else {?>

									<li>

										<a href="referanslar?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
									</a>

								</li>

							<?php }

						}

						?>

					</ul>
				</div>

			</div>

		</div>


		<!-- Slidebar -->

		<?php include 'rightbar.php' ?>

	</div>
</div>

</div>
</div>

<?php include 'footer.php'; ?>