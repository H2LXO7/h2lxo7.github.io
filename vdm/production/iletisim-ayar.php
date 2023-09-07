<?php 
include 'header.php';

include '../vst/baglan.php';
$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

?>

<head>

  <script src="https://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

</head>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 style="color: #73879C;"><b>Ayarlar</b></h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" style="">
        <div class="x_panel" style="background-color: #D9DEE4; border-radius: 30px; text-align: center;">
          <div class="x_title">
            <h2 style="color: #73879C; text-align: left;"><b>İletişim Ayarları </b><small><?php
            if ($_GET['durum']=='✓') {?> 

              <b style="color: #1ABB9C;">Güncelleme Başarılı!</b>

            <?php } elseif ($_GET['durum']=='X') {?>

              <b style="color: #BA1414;">Güncelleme Başarısız!</b>

              <?php } ?></small> </h2>
              <ul class="nav navbar-right panel_toolbox">

              </ul>
              <div class="clearfix"></div>
            </div>

            <div class="x_content">

              <form action="../vst/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> İl <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="İl Bilginiz..." required="required"
                    name="ayar_il" value="<?php echo $ayarcek['ayar_il']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> İlçe <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="İlçe Bilginiz..." required="required"
                    name="ayar_ilce" value="<?php echo $ayarcek['ayar_ilce']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Açık Adres <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Açık Adresiniz..." required="required"
                    name="ayar_adres" value="<?php echo $ayarcek['ayar_adres']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Mail Adresi <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Mail Adresiniz..." required="required"
                    name="ayar_mail" value="<?php echo $ayarcek['ayar_mail']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group" style="display: flex; align-items: center;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Mesai Saatleri <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea  class="ckeditor" id="editor1" name="ayar_mesai"><?php echo $ayarcek['ayar_mesai']; ?></textarea>
                          </div>
                        </div>

                        <script type="text/javascript">
                          
                         CKEDITOR.replace( 'editor1',
                         {
                          filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                          filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                          filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                          filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                          filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                          filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                          forcePasteAsPlainText: true
                        } 
                        );

                      </script>

                      <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Telefon Numarası <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Telefon Numaranız..." required="required"
                    name="ayar_tel" value="<?php echo $ayarcek['ayar_tel']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> GSM Numarası <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="GSM Numaranız..." required="required"
                    name="ayar_gsm" value="<?php echo $ayarcek['ayar_gsm']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Faks Numarası <span class="required">*</span>
                  </label>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Faks Numaranız..." required="required"
                    name="ayar_faks" value="<?php echo $ayarcek['ayar_faks']; ?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <hr>

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                  <button type="submit" name="iletisimayarkaydet" class="btn btn-warning" style="color: #73879C; border-radius: 20px;"> Güncelle </button>

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