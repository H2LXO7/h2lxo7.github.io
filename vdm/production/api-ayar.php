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
                <h3 style="color: #73879C;"><b>Ayarlar</b></h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12" style="">
                <div class="x_panel" style="background-color: #D9DEE4; border-radius: 30px; text-align: center;">
                  <div class="x_title">
                    <h2 style="color: #73879C; text-align: left;"><b>Api Ayarları </b><small><?php
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Google Map Api <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="border-radius: 20px;" type="text" id="first-name" name="ayar_googlemap" class="form-control col-md-7 col-xs-12">
                          <hr>
                        </div>
                      </div>

                      <hr>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Google Analystic <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Google Analystic UA- İzleme Kimliğiniz..." name="ayar_analystic" value="<?php echo $ayarcek['ayar_analystic']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <hr>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" style="text-align: center; color: #F0AD4E;"> Google Recapctcha Api <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input style="border-radius: 20px;" type="text" id="first-name" placeholder="Google Recapctcha Apiniz..." name="ayar_recapctha" value="<?php echo $ayarcek['ayar_recapctha']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <hr>

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                          <button type="submit" name="apiayarkaydet" class="btn btn-warning" style="color: #73879C; border-radius: 20px;"> Güncelle </button>

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