<?php 
include 'header.php';

include '../vst/baglan.php';
$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 style="color: #73879C;"><b>Kullanıcı Profil İşlemleri</b></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" style="">
        <div class="x_panel" style="background-color: #D9DEE4; border-radius: 30px; text-align: center;">
          <div class="x_title">
            <h2 style="color: #73879C; text-align: left;"><b><?php echo $kullanicicek['kullanici_adsoyad']; ?> ile ilgili profil düzenlemesi yapılıyor...</b><small><?php
            if ($_GET['durum']=='✓') {?> 

              <b style="color: #1ABB9C;">Güncelleme Başarılı!</b>

            <?php } elseif ($_GET['durum']=='X') {?>

              <b style="color: #BA1414;">Güncelleme Başarısız!</b>

              <?php } ?></small></h2>
              <ul class="nav navbar-right panel_toolbox">

              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

             <form action="../vst/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">
              <div class="form-group" style="display: flex; align-items: center;">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Kullanıcı Resmi<span class="required"> *</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php
                  if (strlen($kullanicicek['kullanici_resim'])>0) {?>
                    <img width="31%" src="../../<?php echo $kullanicicek['kullanici_resim']; ?>">
                  <?php } else {?>
                    <img width="31%" src="../../vmg/profil_yok.png">
                  <?php } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Resim Seç<span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name" name="kullanici_resim" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_resim']; ?>">
              <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="presimduzenle" class="btn btn-warning" style="color: #73879C; border-radius: 20px;"> Güncelle </button>
              </div>
            </form>
            <hr>
            <form action="../vst/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Kullanıcı Adı <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input style="border-radius: 20px;" type="text" id="first-name" required="required" disabled="" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <hr>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Kullanıcı Ad Soyad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input style="border-radius: 20px;" type="text" id="first-name" required="required" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <hr>

              <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Kullanıcı Şifre <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input style="border-radius: 20px;" type="password" id="first-name" required="required" name="kullanici_password" value="<?php echo $kullanicicek['kullanici_password']; ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <hr>
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="kullaniciprofilkaydet" class="btn btn-warning" style="color: #73879C; border-radius: 20px;"> Güncelle </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include 'footer.php'; ?>