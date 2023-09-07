<?php
include 'header.php';

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">Hizmet Bölgeleri</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php


					$sayfada = 6; 
					// sayfada gösterilecek içerik miktarını belirtiyoruz.

					$sorgu=$db->prepare("select * from bolgeler");
					$sorgu->execute();

					$toplam_bolgeler = $sorgu->rowCount();

					$toplam_sayfa = ceil($toplam_bolgeler / $sayfada);

					// eğer sayfa girilmemişse 1 varsayalım.
					$sayfa= isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
					if($sayfa < 1) $sayfa = 1;

					// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
					if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;

					$bolgelersor=$db->prepare("select * from bolgeler order by bolgeler_ad DESC limit $limit,$sayfada");
					$bolgelersor->execute();


					while ($bolgelercek=$bolgelersor->fetch(PDO::FETCH_ASSOC)) {
						?>
						
						<!-- Başla -->

						<div class="col-md-4">
							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">

										<div class="mb-md mt-xs text-center">
										<h2><a title="" class="text-dark" href="
											bolgeler-<?=vfc($bolgelercek["bolgeler_ad"]).'-'.$bolgelercek["bolgeler_id"]?>"><?php echo $bolgelercek['bolgeler_ad'
											]; ?></a></h2>
											</div>

										<div class="col-md-12">
											<span class="thumb-info-side-image-wrapper p-none">
												<a title="" href="bolgeler-<?=vfc($bolgelercek["bolgeler_ad"]).'-'.$bolgelercek["bolgeler_id"]?>">
													<img src="<?php echo $bolgelercek['bolgeler_resimyol']; ?>" class="
													img-responsive" alt="" style="width: 400px; height: 131px; margin-left: 10px; margin-top: -30px; margin-bottom: 10px;">
												</a>
											</span>
										</div>

										

											<div class="mb-md mt-xs" style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; margin-top: -60px; text-align: justify;">
												<p class="font-size-md"><?php echo substr($bolgelercek['bolgeler_detay'],0,127); ?>...</p>
											</div>
											<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="bolgeler-<?=vfc($bolgelercek["bolgeler_ad"]).'-'.$bolgelercek["bolgeler_id"]?>"><strong>Daha Fazla </strong><i class="fa fa-arrow-right"></i></a>
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

											<a href="bolgeler?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
										</a>

									</li>

								<?php } else {?>

									<li>

										<a href="bolgeler?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
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

		<div class="col-md-3 text-center">
			<aside class="sidebar">
				<div id="combinationFilters" class="filters">

					<h4 class="mt-xl mb-none">Video Tanıtım</h4>

					<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
						<hr>
					</div>

					<div class="embed-responsive embed-responsive-16by9 mb-xl">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $bilgicek['bilgi_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					</div>

					<h4 class="mt-xlg">Bilgilendirme</h4>

					<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
						<hr>
					</div>

					<blockquote class="blockquote-secondary">
						<p class="font-size-lg"><?php echo $bilgicek['bilgi_not']; ?></p>
					</blockquote>

				</div>

			</aside>
		</div>

	</div>
</div>

</div>
</div>

<?php include 'footer.php'; ?>