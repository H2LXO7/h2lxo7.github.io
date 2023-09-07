<?php 

include 'header.php';
$menusor=$db->prepare("SELECT * from menu where menu_id=:menu_id");
$menusor->execute(array(
	'menu_id' => $_GET['menu_id']
));

$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

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

									


									<span class="thumb-info-side-image-wrapper p-none">

										<img src="<?php echo $menucek['menu_resimyol']; ?>" class="
										img-responsive" alt="" style="width: 100%; height: 100%;
										padding: 3px; padding-left: 22px; padding-bottom: 22px; margin-top: 15px;">

									</span>

									<div class="col-md-12" style="text-align: center;">
										<h1 class="mb-md mt-xs"><?php echo $menucek['menu_ad'
										]; ?></a></h1>
									</div>

									<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
										<?php echo $menucek['menu_detay']; ?>
									</div>

								</span>
							</span>
						</span>

					</div>

					<!-- Bitiş -->

				</div>

			</div>


			<!-- Slidebar -->

			<?php include 'rightbar.php';  ?>

		</div>

	</div>
</div>

<?php include 'footer.php'; ?>