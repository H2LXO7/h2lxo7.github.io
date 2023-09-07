<?php 
include 'header.php';
$bolgelersor=$db->prepare("SELECT * from bolgeler where bolgeler_id=:bolgeler_id");
$bolgelersor->execute(array(
	'bolgeler_id' => $_GET['bolgeler_id']
));

$bolgelercek=$bolgelersor->fetch(PDO::FETCH_ASSOC);
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
											<h1 class="mb-md mt-xs"><?php echo $bolgelercek['bolgeler_ad'
											]; ?></a></h1>
										</div>


									<span class="thumb-info-side-image-wrapper p-none">

										<img src="<?php echo $bolgelercek['bolgeler_resimyol']; ?>" class="
										img-responsive" alt="" style="width: 100%; height: 100%;
										padding: 3px; padding-left: 22px; padding-bottom: 22px;">
									</span>

									<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
										<?php echo $bolgelercek['bolgeler_detay']; ?>
									</div>
									
									<a style="float: right; position: relative; top: -21px; left: -31px;" class="mt-md" href="bolgeler.php">
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


			<?php include'rightbar.php';  ?>


		</div>
	</div>
</div>

<?php include 'footer.php'; ?>