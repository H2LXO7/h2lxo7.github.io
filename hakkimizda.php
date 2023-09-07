<?php 
include 'header.php'; 

$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>


<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-7">
				<h1 class="mt-xl mb-none"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h1>

				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
				<p><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></p>
			</div>

			</div>
			<div class="col-md-4 col-md-offset-1 text-center">

				<h4 class="mt-xl mb-none">Video Tanıtım</h4>

				<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
					<hr>
				</div>

				<div class="embed-responsive embed-responsive-16by9 mb-xl">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>

				<h4 class="mt-xlg">Vizyonumuz</h4>

				<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
					<hr>
				</div>

				<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
				</blockquote>

				<h4 class="mt-xlg">Misyonumuz</h4>

				<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
					<hr>
				</div>

				<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
				</blockquote>

			</div>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>