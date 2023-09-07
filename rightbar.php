<?php 

$hakkimizdasor=$db->prepare("select * from hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(0));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<div class="col-md-3 text-center">
	<aside class="sidebar">
		<div id="combinationFilters" class="filters">

			<h4 style="" class="mt-xl mb-md"><?php echo $hakkimizdacek['hakkimizda_baslik']; ?></h4>
			<div style="width: 100%; border-right: 0px; padding-left: 15px; padding-right: 15px; text-align: justify;">
			<p><?php echo substr($icerikcek['icerik_detay'],0,217); ?></p>
			</div>

			<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
				<hr>
			</div>

			<div class="embed-responsive embed-responsive-16by9 mb-xl">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek['hakkimizda_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
			</div>

			<h4 class="mt-xl mb-md">Vizyonumuz</h4>

			<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
				<hr>
			</div>

			<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></p>
				</blockquote>

			<h4 class="mt-xl mb-md">Misyonumuz</h4>

			<div class="divider divider-primary divider-small mb-xl mx-auto" style="width: 15%;">
				<hr>
			</div>

			<blockquote class="blockquote-secondary">
					<p class="font-size-lg"><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></p>
				</blockquote>

		</div>

	</aside>
</div>