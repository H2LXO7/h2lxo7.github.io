<?php 
include 'header.php';
$alanlarsor=$db->prepare("SELECT * from alanlar where alanlar_id=:alanlar_id");
$alanlarsor->execute(array(
	'alanlar_id' => $_GET['alanlar_id']
));

$alanlarcek=$alanlarsor->fetch(PDO::FETCH_ASSOC);
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


										<div class="col-md-12 text-center" style="position: relative; right: -18px;">
											<h1 class="mb-md mt-xs"><?php echo $alanlarcek['alanlar_ad'
											]; ?></a></h1>
										</div>


									<span class="thumb-info-side-image-wrapper p-none">

										<img src="<?php echo $alanlarcek['alanlar_resimyol']; ?>" class="
										img-responsive" alt="" style="width: 100%; height: 100%;
										padding: 3px; padding-left: 22px; padding-bottom: 22px;">
									</span>

									<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
										<?php echo $alanlarcek['alanlar_detay']; ?>
									</div>
									
									<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="alanlar.php">
										<strong>Geri Dön </strong>
										<i class="fa fa-undo"></i>
									</a>

								</span>
							</span>
						</span>

					</div>

					<!-- Bitiş -->

				</div>
			</div>


			<div class="col-md-3">
				<aside class="sidebar">
					<div id="combinationFilters" class="filters">

						<h4 class="mt-xl mb-none">Öğretici Video</h4>

						<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
							<hr>
						</div>

						<div class="embed-responsive embed-responsive-16by9 mb-xl">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $alanlarcek['alanlar_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
						</div>

						<h4 class="mt-xlg">Bilgilendirme</h4>

						<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
							<hr>
						</div>

						<blockquote class="blockquote-secondary" style="text-align: justify; font-size: 13px;">
							<p class="font-size-lg"><?php echo substr($alanlarcek['alanlar_not'],0,323); ?></p>
						</blockquote>

					</div>

				</aside>
			</div>


		</div>
	</div>
</div>

<?php include 'footer.php'; ?>