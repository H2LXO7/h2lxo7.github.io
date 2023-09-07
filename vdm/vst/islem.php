<?php 
ob_start();
session_start();
include 'baglan.php';

if (isset($_POST['loggin'])) {
	$kullanici_ad=$_POST['kullanici_ad'];
	$kullanici_password=md5($_POST['kullanici_password']);

	if ($kullanici_ad && $kullanici_password) {

		$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_ad=:ad and kullanici_password=:password");
		$kullanicisor->execute(array(
			'ad' => $kullanici_ad,
			'password' => $kullanici_password
		));

		$say=$kullanicisor->rowCount();

		if ($say>0) {
			$_SESSION['kullanici_ad'] = $kullanici_ad;

			header('Location:../production/index.php');

		} else {

			header('Location:../production/login.php?durum=no');

		}
	}
}

if(isset($_POST['arama'])) {

  $aranan=$_POST['aranan'];

    if ($_GET['durum']=='✓') {
        // İşlem başarılı mesajı
    } elseif ($_GET['durum']=='X') {
        // İşlem başarısız mesajı
    }
}

if(isset($_POST['etiketler'])) {

  $etiketler=explode(', ',$icerikcek['icerik_keyword']);
  
    if ($_GET['durum']=='✓') {
        // İşlem başarılı mesajı
    } elseif ($_GET['durum']=='X') {
        // İşlem başarısız mesajı
    }
}


if (isset($_POST['genelayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_siteurl=:siteurl,
		ayar_title=:title,
		ayar_description=:description,
		ayar_keywords=:keywords,
		ayar_author=:author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'siteurl' => $_POST['ayar_siteurl'],
		'title' => $_POST['ayar_title'],
		'description' => $_POST['ayar_description'],
		'keywords' => $_POST['ayar_keywords'],
		'author' => $_POST['ayar_author'],
	));

	if ($update) {

		Header("Location:../production/genel-ayar.php?durum=✓");

	} else {

		Header("Location:../production/genel-ayar.php?durum=X");
	}
}

if (isset($_POST['iletisimayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:tel,
		ayar_gsm=:gsm,
		ayar_faks=:faks,
		ayar_mail=:mail,
		ayar_adres=:adres,
		ayar_ilce=:ilce,
		ayar_il=:il,
		ayar_mesai=:mesai
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'tel' => $_POST['ayar_tel'],
		'gsm' => $_POST['ayar_gsm'],
		'faks' => $_POST['ayar_faks'],
		'mail' => $_POST['ayar_mail'],
		'adres' => $_POST['ayar_adres'],
		'ilce' => $_POST['ayar_ilce'],
		'il' => $_POST['ayar_il'],
		'mesai' => $_POST['ayar_mesai'],
	));

	if ($update) {

		Header("Location:../production/iletisim-ayar.php?durum=✓");

	} else {

		Header("Location:../production/iletisim-ayar.php?durum=X");
	}
}

if (isset($_POST['apiayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_recapctha=:recapctha,
		ayar_googlemap=:googlemap,
		ayar_analystic=:analystic
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'recapctha' => $_POST['ayar_recapctha'],
		'googlemap' => $_POST['ayar_googlemap'],
		'analystic' => $_POST['ayar_analystic'],
	));

	if ($update) {

		Header("Location:../production/api-ayar.php?durum=✓");

	} else {

		Header("Location:../production/api-ayar.php?durum=X");
	}
}

if (isset($_POST['sosyalayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_facebook=:facebook,
		ayar_twitter=:twitter,
		ayar_youtube=:youtube,
		ayar_google=:google
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'facebook' => $_POST['ayar_facebook'],
		'twitter' => $_POST['ayar_twitter'],
		'youtube' => $_POST['ayar_youtube'],
		'google' => $_POST['ayar_google'],
	));

	if ($update) {

		Header("Location:../production/sosyal-ayar.php?durum=✓");

	} else {

		Header("Location:../production/sosyal-ayar.php?durum=X");
	}
}

if (isset($_POST['mailayarkaydet'])) {
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:smpthost,
		ayar_smtpuser=:smtpuser,
		ayar_smtppassword=:smtppassword,
		ayar_smtpport=:smtpport
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute(array(
		'smpthost' => $_POST['ayar_smtphost'],
		'smtpuser' => $_POST['ayar_smtpuser'],
		'smtppassword' => $_POST['ayar_smtppassword'],
		'smtpport' => $_POST['ayar_smtpport'],
	));

	if ($update) {

		Header("Location:../production/mail-ayar.php?durum=✓");

	} else {

		Header("Location:../production/mail-ayar.php?durum=X");
	}
}





if (isset($_POST['hakkimizdakaydet'])) {
	$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:baslik,
		hakkimizda_icerik=:icerik,
		hakkimizda_video=:video,
		hakkimizda_vizyon=:vizyon,
		hakkimizda_misyon=:misyon
		WHERE hakkimizda_id=0");

	$update=$hakkimizdakaydet->execute(array(
		'baslik' => $_POST['hakkimizda_baslik'],
		'icerik' => $_POST['hakkimizda_icerik'],
		'video' => $_POST['hakkimizda_video'],
		'vizyon' => $_POST['hakkimizda_vizyon'],
		'misyon' => $_POST['hakkimizda_misyon']
	));

	if ($update) {

		Header("Location:../production/hakkimizda.php?durum=✓");

	} else {

		Header("Location:../production/hakkimizda.php?durum=X");
	}
}



if (isset($_POST['bilgikaydet'])) {
	$bilgikaydet=$db->prepare("UPDATE bilgi SET
		bilgi_baslik=:baslik,
		bilgi_icerik=:icerik,
		bilgi_video=:video,
		bilgi_not=:not
		WHERE bilgi_id=0");

	$update=$bilgikaydet->execute(array(
		'baslik' => $_POST['bilgi_baslik'],
		'icerik' => $_POST['bilgi_icerik'],
		'video' => $_POST['bilgi_video'],
		'not' => $_POST['bilgi_not']
	));

	if ($update) {

		Header("Location:../production/bilgi.php?durum=✓");

	} else {

		Header("Location:../production/bilgi.php?durum=X");
	}
}




if (isset($_POST['sliderkaydet'])) {

	$uploads_dir= '../../vmg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:ad,
		slider_link=:link,
		slider_sira=:sira,
		slider_durum=:durum,
		slider_resimyol=:resimyol
		");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['slider_ad'],
		'link' => $_POST['slider_link'],
		'sira' => $_POST['slider_sira'],
		'durum' => $_POST['slider_durum'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=✓");

	} else {

		Header("Location:../production/slider-ekle.php?durum=X");
	}
}

if (isset($_POST['sliderduzenle'])) {

	if($_FILES['slider_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol
			WHERE slider_id={$_POST['slider_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
		));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider.php?slider_id=$slider_id&durum=✓");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=X");
		}

	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum
			WHERE slider_id={$_POST['slider_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
		));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider.php?slider_id=$slider_id&durum=✓");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=X");
		}

	}

}

if ($_GET['slidersil']=="✓") {

	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['slider_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/slider.php?durum=✓");

	} else {

		Header("Location:../production/slider.php?durum=X");
	}
}




if (isset($_POST['referanskaydet'])) {

	$uploads_dir= '../../vmg/referans';
	@$tmp_name = $_FILES['referans_resimyol']["tmp_name"];
	@$name = $_FILES['referans_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO referans SET
		referans_ad=:ad,
		referans_icerik=:icerik,
		referans_link=:link,
		referans_sira=:sira,
		referans_durum=:durum,
		referans_resimyol=:resimyol
		");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['referans_ad'],
		'icerik' => $_POST['referans_icerik'],
		'link' => $_POST['referans_link'],
		'sira' => $_POST['referans_sira'],
		'durum' => $_POST['referans_durum'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/referans.php?durum=✓");

	} else {

		Header("Location:../production/referans.php?durum=X");
	}
}

if (isset($_POST['referansduzenle'])) {

	if($_FILES['referans_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/referans';
		@$tmp_name = $_FILES['referans_resimyol']["tmp_name"];
		@$name = $_FILES['referans_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE referans SET
			referans_ad=:ad,
			referans_icerik=:icerik,
			referans_link=:link,
			referans_sira=:sira,
			referans_durum=:durum,
			referans_resimyol=:resimyol
			WHERE referans_id={$_POST['referans_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['referans_ad'],
			'icerik' => $_POST['referans_icerik'],
			'link' => $_POST['referans_link'],
			'sira' => $_POST['referans_sira'],
			'durum' => $_POST['referans_durum'],
			'resimyol' => $refimgyol
		));

		$referans_id=$_POST['referans_id'];

		if ($update) {

			$resimsilunlink=$_POST['referans_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/referans.php?referans_id=$referans_id&durum=✓");

		} else {

			Header("Location:../production/referans-duzenle.php?durum=X");
		}

	} else {

		$duzenle=$db->prepare("UPDATE referans SET
			referans_ad=:ad,
			referans_icerik=:icerik,
			referans_link=:link,
			referans_sira=:sira,
			referans_durum=:durum
			WHERE referans_id={$_POST['referans_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['referans_ad'],
			'icerik' => $_POST['referans_icerik'],
			'link' => $_POST['referans_link'],
			'sira' => $_POST['referans_sira'],
			'durum' => $_POST['referans_durum']
		));

		$referans_id=$_POST['referans_id'];

		if ($update) {

			Header("Location:../production/referans.php?referans_id=$referans_id&durum=✓");

		} else {

			Header("Location:../production/referans-duzenle.php?durum=X");
		}

	}

}



if ($_GET['referanssil']=="✓") {

	$sil=$db->prepare("DELETE from referans where referans_id=:referans_id");
	$kontrol=$sil->execute(array(
		'referans_id' => $_GET['referans_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['referans_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/referans.php?durum=✓");

	} else {

		Header("Location:../production/referans.php?durum=X");
	}
}





if (isset($_POST['icerikkaydet'])) {

	$uploads_dir= '../../vmg/icerik';
	@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
	@$name = $_FILES['icerik_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$tarih=$_POST['icerik_tarih'];
	$saat=$_POST['icerik_saat'];
	$zaman= $tarih." ".$saat;

	$kaydet=$db->prepare("INSERT INTO icerik SET
		icerik_ad=:ad,
		icerik_detay=:detay,
		icerik_keyword=:keyword,
		icerik_sira=:sira,
		icerik_durum=:durum,
		icerik_resimyol=:resimyol,
		icerik_zaman=:zaman
		");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['icerik_ad'],
		'detay' => $_POST['icerik_detay'],
		'keyword' => $_POST['icerik_keyword'],
		'sira' => $_POST['icerik_sira'],
		'durum' => $_POST['icerik_durum'],
		'resimyol' => $refimgyol,
		'zaman' => $zaman
	));

	if ($insert) {

		Header("Location:../production/icerik.php?durum=✓");

	} else {

		Header("Location:../production/icerik.php?durum=X");
	}
}

if (isset($_POST['icerikduzenle'])) {

	if($_FILES['icerik_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/icerik';
		@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];
		@$name = $_FILES['icerik_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$tarih=$_POST['icerik_tarih'];
		$saat=$_POST['icerik_saat'];
		$zaman= $tarih." ".$saat;

		$duzenle=$db->prepare("UPDATE icerik SET
			icerik_ad=:ad,
			icerik_detay=:detay,
			icerik_keyword=:keyword,
			icerik_sira=:sira,
			icerik_durum=:durum,
			icerik_resimyol=:resimyol,
			icerik_zaman=:zaman
			WHERE icerik_id={$_POST['icerik_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['icerik_ad'],
			'detay' => $_POST['icerik_detay'],
			'keyword' => $_POST['icerik_keyword'],
			'sira' => $_POST['icerik_sira'],
			'durum' => $_POST['icerik_durum'],
			'resimyol' => $refimgyol,
			'zaman' => $zaman
		));

		$icerik_id=$_POST['icerik_id'];

		if ($update) {

			$resimsilunlink=$_POST['icerik_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/icerik.php?icerik_id=$icerik_id&durum=✓");

		} else {

			Header("Location:../production/icerik-duzenle.php?durum=X");
		}

	} else {

		$tarih=$_POST['icerik_tarih'];
		$saat=$_POST['icerik_saat'];
		$zaman= $tarih." ".$saat;

		$duzenle=$db->prepare("UPDATE icerik SET
			icerik_ad=:ad,
			icerik_detay=:detay,
			icerik_keyword=:keyword,
			icerik_sira=:sira
			icerik_durum=:durum,
			icerik_zaman=:zaman
			WHERE icerik_id={$_POST['icerik_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['icerik_ad'],
			'detay' => $_POST['icerik_detay'],
			'keyword' => $_POST['icerik_keyword'],
			'sira' => $_POST['icerik_sira'],
			'durum' => $_POST['icerik_durum'],
			'zaman' => $zaman
		));

		$icerik_id=$_POST['icerik_id'];

		if ($update) {

			Header("Location:../production/icerik.php?icerik_id=$icerik_id&durum=✓");

		} else {

			Header("Location:../production/icerik-duzenle.php?durum=X");
		}

	}

}



if ($_GET['iceriksil']=="✓") {

	$sil=$db->prepare("DELETE from icerik where icerik_id=:icerik_id");
	$kontrol=$sil->execute(array(
		'icerik_id' => $_GET['icerik_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['icerik_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/icerik.php?durum=✓");

	} else {

		Header("Location:../production/icerik.php?durum=X");
	}
}








if (isset($_POST['alanlarkaydet'])) {

	$uploads_dir= '../../vmg/alanlar';
	@$tmp_name = $_FILES['alanlar_resimyol']["tmp_name"];
	@$name = $_FILES['alanlar_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO alanlar SET
		alanlar_ad=:ad,
		alanlar_detay=:detay,
		alanlar_video=:video,
		alanlar_not=:not,
		alanlar_durum=:durum,
		alanlar_resimyol=:resimyol
		");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['alanlar_ad'],
		'detay' => $_POST['alanlar_detay'],
		'video' => $_POST['alanlar_video'],
		'not' => $_POST['alanlar_not'],
		'durum' => $_POST['alanlar_durum'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/alanlar.php?durum=✓");

	} else {

		Header("Location:../production/alanlar.php?durum=X");
	}
}

if (isset($_POST['alanlarduzenle'])) {

	if($_FILES['alanlar_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/alanlar';
		@$tmp_name = $_FILES['alanlar_resimyol']["tmp_name"];
		@$name = $_FILES['alanlar_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE alanlar SET
			alanlar_ad=:ad,
			alanlar_detay=:detay,
			alanlar_video=:video,
			alanlar_not=:not,
			alanlar_durum=:durum,
			alanlar_resimyol=:resimyol
			WHERE alanlar_id={$_POST['alanlar_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['alanlar_ad'],
			'detay' => $_POST['alanlar_detay'],
			'video' => $_POST['alanlar_video'],
			'not' => $_POST['alanlar_not'],
			'durum' => $_POST['alanlar_durum'],
			'resimyol' => $refimgyol
		));

		$alanlar_id=$_POST['alanlar_id'];

		if ($update) {

			$resimsilunlink=$_POST['alanlar_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/alanlar.php?alanlar_id=$alanlar_id&durum=✓");

		} else {

			Header("Location:../production/alanlar-duzenle.php?durum=X");
		}

	} else {

		$duzenle=$db->prepare("UPDATE alanlar SET
			alanlar_ad=:ad,
			alanlar_detay=:detay,
			alanlar_video=:video,
			alanlar_not=:not,
			alanlar_durum=:durum
			WHERE alanlar_id={$_POST['alanlar_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['alanlar_ad'],
			'detay' => $_POST['alanlar_detay'],
			'video' => $_POST['alanlar_video'],
			'not' => $_POST['alanlar_not'],
			'durum' => $_POST['alanlar_durum']
		));

		$alanlar_id=$_POST['alanlar_id'];

		if ($update) {

			Header("Location:../production/alanlar.php?alanlar_id=$alanlar_id&durum=✓");

		} else {

			Header("Location:../production/alanlar-duzenle.php?durum=X");
		}

	}

}



if ($_GET['alanlarsil']=="✓") {

	$sil=$db->prepare("DELETE from alanlar where alanlar_id=:alanlar_id");
	$kontrol=$sil->execute(array(
		'alanlar_id' => $_GET['alanlar_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['alanlar_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/alanlar.php?durum=✓");

	} else {

		Header("Location:../production/alanlar.php?durum=X");
	}
}



if (isset($_POST['bolgelerkaydet'])) {

	$uploads_dir= '../../vmg/bolgeler';
	@$tmp_name = $_FILES['bolgeler_resimyol']["tmp_name"];
	@$name = $_FILES['bolgeler_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet=$db->prepare("INSERT INTO bolgeler SET
		bolgeler_ad=:ad,
		bolgeler_detay=:detay,
		bolgeler_durum=:durum,
		bolgeler_resimyol=:resimyol
		");

	$insert=$kaydet->execute(array(
		'ad' => $_POST['bolgeler_ad'],
		'detay' => $_POST['bolgeler_detay'],
		'durum' => $_POST['bolgeler_durum'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/bolgeler.php?durum=✓");

	} else {

		Header("Location:../production/bolgeler.php?durum=X");
	}
}

if (isset($_POST['bolgelerduzenle'])) {

	if($_FILES['bolgeler_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/bolgeler';
		@$tmp_name = $_FILES['bolgeler_resimyol']["tmp_name"];
		@$name = $_FILES['bolgeler_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE bolgeler SET
			bolgeler_ad=:ad,
			bolgeler_detay=:detay,
			bolgeler_durum=:durum,
			bolgeler_resimyol=:resimyol
			WHERE bolgeler_id={$_POST['bolgeler_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['bolgeler_ad'],
			'detay' => $_POST['bolgeler_detay'],
			'durum' => $_POST['bolgeler_durum'],
			'resimyol' => $refimgyol
		));

		$bolgeler_id=$_POST['bolgeler_id'];

		if ($update) {

			$resimsilunlink=$_POST['bolgeler_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/bolgeler.php?bolgeler_id=$bolgeler_id&durum=✓");

		} else {

			Header("Location:../production/bolgeler-duzenle.php?durum=X");
		}

	} else {

		$duzenle=$db->prepare("UPDATE bolgeler SET
			bolgeler_ad=:ad,
			bolgeler_detay=:detay,
			bolgeler_durum=:durum
			WHERE bolgeler_id={$_POST['bolgeler_id']}");

		$update=$duzenle->execute(array(
			'ad' => $_POST['bolgeler_ad'],
			'detay' => $_POST['bolgeler_detay'],
			'durum' => $_POST['bolgeler_durum']
		));

		$bolgeler_id=$_POST['bolgeler_id'];

		if ($update) {

			Header("Location:../production/bolgeler.php?bolgeler_id=$bolgeler_id&durum=✓");

		} else {

			Header("Location:../production/bolgeler-duzenle.php?durum=X");
		}

	}

}



if ($_GET['bolgelersil']=="✓") {

	$sil=$db->prepare("DELETE from bolgeler where bolgeler_id=:bolgeler_id");
	$kontrol=$sil->execute(array(
		'bolgeler_id' => $_GET['bolgeler_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['bolgeler_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/bolgeler.php?durum=✓");

	} else {

		Header("Location:../production/bolgeler.php?durum=X");
	}
}




if (isset($_POST['menukaydet'])) {

	$uploads_dir= '../../vmg/menu';
	@$tmp_name = $_FILES['menu_resimyol']["tmp_name"];
	@$name = $_FILES['menu_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$tarih=$_POST['menu_tarih'];
	$saat=$_POST['menu_saat'];
	$zaman= $tarih." ".$saat;

	$kaydet=$db->prepare("INSERT INTO menu SET
		menu_ust=:ust,
		menu_ad=:ad,
		menu_url=:url,
		menu_detay=:detay,
		menu_sira=:sira,
		menu_durum=:durum,
		menu_resimyol=:resimyol
		");

	$insert=$kaydet->execute(array(
		'ust' => $_POST['menu_ust'],
		'ad' => $_POST['menu_ad'],
		'url' => $_POST['menu_url'],
		'detay' => $_POST['menu_detay'],
		'sira' => $_POST['menu_sira'],
		'durum' => $_POST['menu_durum'],
		'resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/menu.php?durum=✓");

	} else {

		Header("Location:../production/menu.php?durum=X");
	}
}


if (isset($_POST['menuduzenle'])) {

	if($_FILES['menu_resimyol']["size"] > 0) {

		$uploads_dir= '../../vmg/menu';
		@$tmp_name = $_FILES['menu_resimyol']["tmp_name"];
		@$name = $_FILES['menu_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$tarih=$_POST['menu_tarih'];
		$saat=$_POST['menu_saat'];
		$zaman= $tarih." ".$saat;

		$duzenle=$db->prepare("UPDATE menu SET
			menu_ust=:ust,
			menu_ad=:ad,
			menu_url=:url,
			menu_detay=:detay,
			menu_sira=:sira,
			menu_durum=:durum,
			menu_resimyol=:resimyol
			WHERE menu_id={$_POST['menu_id']}");

		$update=$duzenle->execute(array(
			'ust' => $_POST['menu_ust'],
			'ad' => $_POST['menu_ad'],
			'url' => $_POST['menu_url'],
			'detay' => $_POST['menu_detay'],
			'sira' => $_POST['menu_sira'],
			'durum' => $_POST['menu_durum'],
			'resimyol' => $refimgyol
		));

		$menu_id=$_POST['menu_id'];

		if ($update) {

			$resimsilunlink=$_POST['menu_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/menu.php?menu_id=$menu_id&durum=✓");

		} else {

			Header("Location:../production/menu-duzenle.php?durum=X");
		}

	} else {

		$tarih=$_POST['menu_tarih'];
		$saat=$_POST['menu_saat'];
		$zaman= $tarih." ".$saat;

		$duzenle=$db->prepare("UPDATE menu SET
			menu_ust=:ust,
			menu_ad=:ad,
			menu_url=:url,
			menu_detay=:detay,
			menu_sira=:sira,
			menu_durum=:durum
			WHERE menu_id={$_POST['menu_id']}");

		$update=$duzenle->execute(array(
			'ust' => $_POST['menu_ust'],
			'ad' => $_POST['menu_ad'],
			'url' => $_POST['menu_url'],
			'detay' => $_POST['menu_detay'],
			'sira' => $_POST['menu_sira'],
			'durum' => $_POST['menu_durum']
		));

		$menu_id=$_POST['menu_id'];

		if ($update) {

			Header("Location:../production/menu.php?menu_id=$menu_id&durum=✓");

		} else {

			Header("Location:../production/menu-duzenle.php?durum=X");
		}

	}

}



if ($_GET['menusil']=="✓") {

	$sil=$db->prepare("DELETE from menu where menu_id=:menu_id");
	$kontrol=$sil->execute(array(
		'menu_id' => $_GET['menu_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_POST['menu_resimyol'];
		unlink("../../../../$resimsilunlink");


		Header("Location:../production/menu.php?durum=✓");

	} else {

		Header("Location:../production/menu.php?durum=X");
	}
}




if (isset($_POST['logoduzenle'])) {

	$uploads_dir= '../../vmg';
	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		WHERE ayar_id=0");

	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=✓");

	} else {

		Header("Location:../production/genel-ayar.php?durum=X");
	}

}



if (isset($_POST['presimduzenle'])) {

	$uploads_dir= '../../vmg/kullanici';
	@$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
	@$name = $_FILES['kullanici_resim']["name"];

	$benzersizsayi=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$duzenle=$db->prepare("UPDATE kullanici SET
		kullanici_resim=:resim
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$duzenle->execute(array(
		'resim' => $refimgyol
	));

	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/kullanici-profil.php?durum=✓");

	} else {

		Header("Location:../production/kullanici-profil.php?durum=X");
	}

}


if (isset($_POST['kullaniciprofilkaydet'])) {

	$kullanici_password=md5($_POST['kullanici_password']);

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:adsoyad,
		kullanici_password=:password
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'adsoyad' => $_POST['kullanici_adsoyad'],
		'password' => $kullanici_password
	));

	if ($update) {

		Header("Location:../production/kullanici-profil.php?durum=✓");

	} else {

		Header("Location:../production/kullanici-profil.php?durum=X");
	}
}

?>