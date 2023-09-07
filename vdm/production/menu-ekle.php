<?php 

include 'header.php';
include '../vst/baglan.php';

$ayarsor=$db->prepare("select * from ayar where ayar_id=?");
$ayarsor->execute(array(0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$uploads_dir= '../../vmg/menu';
    $upload_file = $uploads_dir . basename($_FILES["fileToUpload"]["name"]); // Hedef dosya adı
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_file); // Dosyayı taşıma işlemi

    ?>

    <head>

      <script src="https://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>

      <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">

    </head>

    <!-- page content --> 
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3 style="color: #73879C;"><b>Menü İşlemleri</b></h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12" style="">
                <div class="x_panel" style="background-color: #D9DEE4; border-radius: 30px; text-align: center;">
                  <div class="x_title">
                    <h2 style="color: #73879C; text-align: left;"><b>Menü Ekle</b><small><?php
                    if ($_GET['durum']=='✓') {?> 

                      <b style="color: #1ABB9C;">Güncelleme Başarılı!</b>

                    <?php } elseif ($_GET['durum']=='X') {?>

                      <b style="color: #BA1414;">Güncelleme Başarısız!</b>

                      <?php } ?></small> </h2>
                      <ul class="nav navbar-right panel_toolbox">

                        <div align="right" class="col-md-6">
                          <a href="menu.php"> <button style="display: flex; justify-content: center; border-radius: 20px;" class="btn btn-warning"><i class="fa fa-undo" aria-hidden="true"> Geri Dön</i></button></a>
                        </div>

                      </ul>
                      <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                      <form action="../vst/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Üst Menü Seç <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="select2_single form-control" required="required" name="menu_ust" tabindex="-1">
                              <option></option>

                              <option value="0">Üst Menü</option>

                              <?php 
                              $menusor=$db->prepare("select * from menu where menu_ust=:menu_ust  order by menu_sira ASC limit 25");
                              $menusor->execute(array(
                                'menu_ust' => 0
                              ));

                              while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                <option value="<?php echo $menucek['menu_id']; ?>"><?php echo $menucek['menu_ad']; ?></option>

                              <?php } ?>

                            </select>
                          </div>
                        </div>

                        <hr>

                        <form action="../vst/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" style="margin: auto; width: 111%;">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Menü Adı <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input style="border-radius: 20px;" type="text" id="first-name" required="required" name="menu_ad" placeholder="Menü adını giriniz..." class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <hr>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Menü Url <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input style="border-radius: 20px;" type="text" id="first-name" name="menu_url" placeholder="Menü url'sini giriniz..." class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <hr>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Resim Seç <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="file" id="first-name"
                              name="menu_resimyol" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <hr>

                          <div class="form-group" style="display: flex; align-items: center;">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Menü Detay <span class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea  class="ckeditor" id="editor1" name="menu_detay"></textarea>
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Menü Sıra <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input style="border-radius: 20px;" type="text" id="first-name" required="required" name="menu_sira" value="0" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>

                        <hr>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;">Menü Durum <span class="required">*</span>
                          </label>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select style="border-radius: 20px;" id="heard" class="form-control" name="menu_durum" required>
                              <option value="1">Aktif</option>
                              <option value="0">Pasif</option>
                            </select>
                          </div>
                        </div>

                        <hr>

                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="submit" name="menukaydet" class="btn btn-warning" style="color: #73879C; border-radius: 20px;"> Kaydet </button>

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

        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>

        <!-- Select2 -->
        <script>
          $(document).ready(function() {
            $(".select2_single").select2({
              placeholder: "Select a state",
              allowClear: true
            });
            $(".select2_group").select2({});
            $(".select2_multiple").select2({
              maximumSelectionLength: 4,
              placeholder: "With Max Selection limit 4",
              allowClear: true
            });
          });
        </script>
        <!-- /Select2 -->



        <!-- footer content -->
        <?php include 'footer.php'; ?>