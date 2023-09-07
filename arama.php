<?php
include 'header.php';

if (isset($_POST['aranan'])) {
	$aranan=$_POST['aranan'];

} else {
	$aranan=$_GET['aranan'];
}

if (strlen($aranan)==0) {
	Header("Location:index.php");
	exit;
}

$sorgu=$db->prepare("select * from icerik where icerik_keyword LIKE ?");
$sorgu->execute(array("%$aranan%"));
$say=$sorgu->rowCount();

?>

<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">

			<div class="col-md-9">

				<h1 class="mt-xl mb-none">Arama Sonuçları - <small><?php

				echo $say." dosya listelendi.";

				?></small></h1>

				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div class="row">

					<?php 
					if ($say==0) {?>

						<div class="col-md-12">
							<p><b><?php echo $aranan ?></b> kelimesi ile ilgili sonuç bulunamadı...</p>
						</div>
						
					<?php } 
					?>

					<?php

					$sayfada = 3; 
					// sayfada gösterilecek içerik miktarını belirtiyoruz.

					$sorgu=$db->prepare("select * from icerik");
					$sorgu->execute();

					$toplam_icerik = $sorgu->rowCount();

					$toplam_sayfa = ceil($toplam_icerik / $sayfada);

					// eğer sayfa girilmemişse 1 varsayalım.
					$sayfa= isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

					// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
					if($sayfa < 1) $sayfa = 1;

					// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
					if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

					$limit = ($sayfa - 1) * $sayfada;

					$iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit $limit,$sayfada");
					$iceriksor->execute();


					while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {
						if (strpos($icerikcek['icerik_keyword'], $aranan) !== false) {
        // İçeriği ekranda göster
    }
						?>
						
						<!-- Başla -->

						<div class="col-md-12">
							<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
								
								<span class="thumb-info-caption">
									<span class="thumb-info-caption-text">

										<div class="col-md-12">
											<div class="col-md-8" style="position: relative; right: -18px;">
												<h2 class="mb-md mt-xs"><a title="" class="text-dark" href="
													haber-<?=vfc($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><?php echo $icerikcek['icerik_ad'
													]; ?></a></h2>
												</div>

												<div class="col-md-4" style="position: relative; bottom: -18px;">
													<span class="post-meta">
														<span><strong><?php echo $icerikcek['icerik_zaman']; ?> | </strong><a style="" href="mailto:mail@example.com"><strong><?php echo $ayarcek['ayar_author']; ?></strong></a></span>
													</span>
												</div>

											</div>


											<span class="thumb-info-side-image-wrapper p-none">
												<a title="" href="haber-<?=vfc($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>">
													<img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="
													img-responsive" alt="" style="width: 120%;
													padding: 3px; padding-left: 22px; padding-bottom: 22px;">
												</a>
											</span>
											<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
												<p class="font-size-md"><?php echo substr($icerikcek['icerik_detay'],0,450); ?> ...</p>
											</div>
											<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="haber-<?=vfc($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><strong>Devamını Oku </strong><i class="fa fa-arrow-right"></i></a>
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

											<a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
										</a>

									</li>

								<?php } else {?>

									<li>

										<a href="haberler?sayfa=<?php echo $s; ?>"><?php echo $s; ?>
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