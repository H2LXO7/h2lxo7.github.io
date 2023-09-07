<?php 
include 'header.php';
$iceriksor=$db->prepare("SELECT * from icerik where icerik_id=:icerik_id");
$iceriksor->execute(array(
	'icerik_id' => $_GET['icerik_id']
));

$icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-9">
				<div class="row">

					<!-- Başla -->
					<div class="col-md-12">
						<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
							<span class="thumb-info-caption">
								<span class="thumb-info-caption-text">

									<div class="col-md-12">
										<div class="col-md-8" style="position: relative; right: -18px;">
											<h1 class="mb-md mt-xs"><?php echo $icerikcek['icerik_ad'
											]; ?></a></h1>
										</div>

										<div class="col-md-4" style="position: relative; bottom: -18px;">
											<span class="post-meta">
												<span><strong><?php echo $icerikcek['icerik_zaman']; ?> | </strong><a style="" href="mailto:mail@example.com"><strong><?php echo $ayarcek['ayar_author']; ?></strong></a></span>
											</span>
										</div>
									</div>

									<span class="thumb-info-side-image-wrapper p-none">

										<img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="
										img-responsive" alt="" style="width: 100%; height: 100%;
										padding: 3px; padding-left: 22px; padding-bottom: 22px;">
									</span>

									<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
										<?php echo $icerikcek['icerik_detay']; ?>
									</div>
									<br>

									<div class="col-md-6" style="float: left;position: relative;top: -14px;">
										<p style="font-size: 14px;"><b>Anahtar Kelimeler: </b>

											<?php

											$etiketler=explode(', ',$icerikcek['icerik_keyword']);

											foreach ($etiketler as $etiketbas) {?>

												<a href="arama? aranan=<?php echo $etiketbas; ?>"><button style="border-radius: 25px; font-size: 14px;" class="btn btn-primary btn-xs"><?php echo $etiketbas; ?></button></a>

											<?php }

											?>

										</p>

									</div>

									<div class="col-md-6">
										<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="haberler.php">
											<strong>Geri Dön </strong>
											<i class="fa fa-undo"></i>
										</a>
									</div>

								</span>
							</span>
						</span>

					</div>

					<!-- Bitiş -->

				</div>
			</div>


			<?php include'rightbar.php';  ?>


		</div>
	</div>
</div>

<?php include 'footer.php'; ?>