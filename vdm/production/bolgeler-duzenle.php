<?php 
include 'header.php';
include '../vst/baglan.php';

$bolgelersor=$db->prepare("SELECT * from bolgeler where bolgeler_id=:bolgeler_id");
$bolgelersor->execute(array(
  'bolgeler_id' => $_GET['bolgeler_id']
));
$bolgelercek=$bolgelersor->fetch(PDO::FETCH_ASSOC);

?>

<head>

  <script src="https://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

</head>

<!-- page content --> 
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3 style="color: #73879C;"><b>Bölgeleri İşlemleri</b></h3>
      </div>

              <!--<div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Anahtar Sözcüğü" style="font-weight: bold;">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" style="font-weight: bold; color: #F0AD4E;">Ara!</button>
                    </span>
                  </div>
                </div>
              </div>-->
              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="background-color: #D9DEE4; border-radius: 30px; text-align: center;">
                  <div class="x_title">
                    <div align="left" class="col-md-6">
                      <h2>Bölgeleri Düzenle <small><?php
                      if ($_GET['durum']=='✓') {?> 

                        <b style="color: #1ABB9C;"><strong>İşlem Başarılı!</strong></b>

                      <?php } elseif ($_GET['durum']=='X') {?>

                        <b style="color: #BA1414;"><strong>İşlem Başarısız!</strong></b>

                        <?php } ?></small></h2><br>
                      </div>
                      <div align="right" class="col-md-6">
                        <a href="bolgeler.php"> <button style="display: flex; justify-content: center; border-radius: 20px;" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"> Geri Dön</i></button></a>
                      </div>

                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                      <form action="../vst/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">

                        <input type="hidden" name="bolgeler_id" value="<?php echo $bolgelercek['bolgeler_id']; ?>">

                        <input type="hidden" name="bolgeler_resimyol" value="<?php echo $bolgelercek['bolgeler_resimyol']; ?>">

                        <div class="form-group" style="display: flex; align-items: center;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E; line-height: 131px;">Yüklü Resim <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <img width="69%" height="350" src="../../<?php echo $bolgelercek['bolgeler_resimyol']; ?>">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Resim Seç <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="first-name" required="required" name="bolgeler_resimyol" value="<?php echo $bolgelercek['bolgeler_resimyol']; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Bölgeleri Adı <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input style="border-radius: 20px;" type="text" id="first-name" required="required"
                            name="bolgeler_ad" value="<?php echo $bolgelercek['bolgeler_ad']; ?>" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group" style="display: flex; align-items: center;">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Bölgeleri <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea  class="ckeditor" id="editor1" name="bolgeler_detay"><?php echo $bolgelercek['bolgeler_detay']; ?></textarea>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Bölgeleri Durum <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select style="border-radius: 20px;" id="heard" class="form-control" name="bolgeler_durum" required>

                            <?php

                            if ($bolgelercek['bolgeler_durum']==1) {?>

                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>

                            <?php } else {?>

                              <option value="0">Pasif</option>
                              <option value="1">Aktif</option>

                            <?php } ?>


                          </select>
                        </div>
                      </div>

                      <hr>

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="bolgelerduzenle" class="btn btn-warning" style="color: #FFFFFF; border-radius: 20px;"> Güncelle </button>

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