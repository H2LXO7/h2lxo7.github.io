  <?php

  ob_start();
  session_start();

  include 'header.php';

  $kullanicisor=$db->prepare("select * from kullanici where kullanici_ad=:ad");
  $kullanicisor->execute(array(
    'ad' => $_SESSION['kullanici_ad']
  ));
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

  ?>

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Yönetim Paneli</h2>

                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <p>Sitenizi Sol Taraftaki Menüden Düzenleyebilirsiniz.</p>

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