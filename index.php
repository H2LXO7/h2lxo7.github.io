<?php 
include 'header.php';
include 'slider.php';
include 'vdm/vst/baglan.php';

$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
?>



<section class="section section-default section-no-border mt-none">
	<div class="container">
		<div class="row mb-xl" style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
			<div class="col-md-7">
				<h2 class="mt-xl mb-none"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h2>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<p class="mt-lg"><?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,450); ?> ...</p>

				<a class="mt-md" href="hakkimizda">Daha fazla bilgi edin <i class="fa fa-long-arrow-right"></i></a>
			</div>

			<?php

			$sayi=rand(1,4);
			if ($sayi<=2) {?>

				<div class="col-md-4 col-md-offset-1 text-center">
					<h4 class="mt-xl mb-none">Vizyonumuz</h4>

					<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
						<hr>
					</div>

					<p class="mt-lg"><?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,275); ?> ...</p>
				</div>

			<?php } elseif ($sayi>=3) {?>

				<div class="col-md-4 col-md-offset-1 text-center">
					<h4 class="mt-xl mb-none">Misyonumuz</h4>

					<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
						<hr>
					</div>

					<p class="mt-lg"><?php echo substr($hakkimizdacek['hakkimizda_icerik'],0,275); ?> ...</p>
				</div>

			<?php } ?>

		</div>
	</div>
</section>




<div class="container" id="practice-areas">
	<div class="row">
		<div class="col-md-12 center">
			<h2 class="mt-xl mb-none">Hizmet Alanları</h2>
			<div class="divider divider-primary divider-small divider-small-center mb-xl">
				<hr>
			</div>
		</div>
	</div>

	<div class="row mt-lg">

		<?php

			$sayfada = 25; 
					// sayfada gösterilecek içerik miktarını belirtiyoruz.

			$sorgu=$db->prepare("select * from alanlar");
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

			$alanlarsor=$db->prepare("select * from alanlar order by alanlar_ad ASC limit 6");
			$alanlarsor->execute();


			while ($alanlarcek=$alanlarsor->fetch(PDO::FETCH_ASSOC)) {
				?>

		<div class="col-md-4">
			<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
				<div class="feature-box-icon">
					<img width="55" height="55" style="border-radius: 30px;" src="<?php echo $alanlarcek['alanlar_resimyol']; ?>" alt="" />
				</div>
				<div class="feature-box-info ml-md">
					<h4 class="mb-sm text-center"><?php echo $alanlarcek['alanlar_ad']; ?></h4>
					<p><?php echo substr($alanlarcek['alanlar_detay'],0,82); ?>...</p>
					<a class="mt-md" href="alanlar-<?=vfc($alanlarcek["alanlar_ad"]).'-'.$alanlarcek["alanlar_id"]?>"><strong> Devamını Oku </strong><i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>

	<?php }?>
	</div>
</div>




<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 p-none">
			<section class="section section-primary match-height mt-xl" style="background-image: url(img/patterns/fancy.jpg);">
				<div class="row">
					<div style="padding-top: 50px; padding-right: 150px;" class="col-half-section col-half-section-right text-center">
						<h2 class="mb-none"><strong>Önem Verdiğimiz Görüşler</strong></h2>
						<div class="divider divider-light divider-small mb-xl mx-auto" style="width: 7%;">
							<hr>
						</div>

						<div class="owl-carousel owl-theme" data-plugin-options='{"items": 1, "margin": 10, "loop": false, "nav": false, "dots": true}'>
							<div>
								<div class="testimonial testimonial-style-3 testimonial-trasnparent-background testimonial-alternarive-font text-center">
									<blockquote>
										<p class="text-light">Kalite asla tesadüf değildir; akıllı çaba sonucudur.</p>
									</blockquote>
									<div class="testimonial-author">
										<p style="text-align: center;"><strong>John Ruskin</strong></p>
									</div>
								</div>
							</div>

							<div>
								<div class="testimonial testimonial-style-3 testimonial-trasnparent-background testimonial-alternarive-font text-center">
									<blockquote>
										<p class="text-light">Başarı, başkalarının başarısızlığından değil, kendi yeteneklerinizden kaynaklanır.</p>
									</blockquote>
									<div class="testimonial-author">
										<p style="text-align: center;"><strong>Albert Einstein</strong></p>
									</div>
								</div>
							</div>

							<div>
								<div class="testimonial testimonial-style-3 testimonial-trasnparent-background testimonial-alternarive-font text-center">
									<blockquote>
										<p class="text-light">Müşteri memnuniyeti, müşterinin markanızla olan ilişkisini nasıl algıladığına ve bu ilişkinin ona ne kadar değer verdiğinizi gösterdiğine bağlıdır.</p>
									</blockquote>
									<div class="testimonial-author">
										<p style="text-align: center;"><strong>Kevin Stirtz</strong></p>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</section>
		</div>
		<div class="col-md-6 p-none visible-md visible-lg">
			<section class="parallax section section-parallax match-height mt-xl" data-plugin-parallax data-plugin-options='{"speed": 1.5, "horizontalPosition": "100%"}' data-image-src="vmg/arkaplan/0.png" style="min-height: 450px;">
			</section>
		</div>
	</div>
</div>

<br>

<div class="container">
	<div class="row">
		<div class="col-md-12 center">
			<h2 class="mt-xl mb-none">Haberler</h2>
			<div class="divider divider-primary divider-small divider-small-center mb-xl">
				<hr>
			</div>
		</div>
	</div>
	<div class="row mt-xl">

		<div class="owl-carousel owl-theme owl-team-custom show-nav-title" data-plugin-options='{"items": 2, "margin": 10, "loop": false, "nav": true, "dots": false}'>

			<?php

			$sayfada = 25; 
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

			$iceriksor=$db->prepare("select * from icerik order by icerik_zaman DESC limit 25");
			$iceriksor->execute();


			while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {
				?>


				<div class="col-xl-12">
					<span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
						<span class="thumb-info-side-image-wrapper p-none">
							<img src="<?php echo $icerikcek['icerik_resimyol']; ?>" class="img-responsive" alt="" style="width: 295px; height: 200px; padding-left: 20px; padding-top: 20px;">
						</span>

						<span class="thumb-info-caption">
							<span class="thumb-info-caption-text">
								<h2 style="text-align: center; padding-top: 15px;" class="mb-md mt-xs"><?php echo $icerikcek['icerik_ad']; ?></h2>

								<div style="width: 100%; border-right: 0px;text-align: justify; position: relative; margin-top: -45px;">
									<p><?php echo substr($icerikcek['icerik_detay'],0,227); ?> ... 
										<a class="mt-md" href="haber-<?=vfc($icerikcek["icerik_ad"]).'-'.$icerikcek["icerik_id"]?>"><strong> Devamını Oku </strong><i class="fa fa-arrow-right"></i></a></p>
									</div>

								</span>
							</span>
						</span>

					</div>

				<?php } ?>

			</div>

		</div>

	</div>

	<br>

	<div class="container">
		<div class="row">
			<div class="col-md-12 center">
				<h2 class="mt-xl mb-none">Referanslar</h2>
				<div class="divider divider-primary divider-small divider-small-center mb-xl">
					<hr>
				</div>
			</div>
		</div>
		<div class="row mt-xl">

			<div class="owl-carousel owl-theme owl-team-custom show-nav-title" data-plugin-options='{"items": 2, "margin": 10, "loop": false, "nav": true, "dots": false}'>

				<?php

				$sayfada = 25; 
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

				$referanssor=$db->prepare("select * from referans order by referans_durum DESC limit 25");
				$referanssor->execute();

				while ($referanscek=$referanssor->fetch(PDO::FETCH_ASSOC)) {
					?>

					<div class="col-xl-12">
						<span class="thumb-info thumb-info-side-image thumb-info-zoom mt-xl">
							<span class="thumb-info-side-image-wrapper p-none">
								<a href="referans-<?=vfc($referanscek["referans_ad"]).'-'.$referanscek["referans_id"]?>">
									<img src="<?php echo $referanscek['referans_resimyol']; ?>" class="img-responsive" alt="" style="width: 295px; height: 200px; margin-left: 10px; margin-top: 10px; padding-bottom: 10px;">
								</a>
							</span>
						</span>

						<span class="thumb-info-caption">
							<span class="thumb-info-caption-text">
								<a href="referans-<?=vfc($referanscek["referans_ad"]).'-'.$referanscek["referans_id"]?>">
									<h2 style="text-align: center;" class="mb-md mt-xs"><?php echo $referanscek['referans_ad']; ?></h2>
								</a>
							</span>
						</span>

					</div>

				<?php } ?>

			</div>

		</div>

	</div>

</div>
<?php include 'footer.php'; ?>