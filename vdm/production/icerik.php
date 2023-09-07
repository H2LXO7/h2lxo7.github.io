<?php 
include 'header.php'; 

if(isset($_POST['arama'])) {

  $aranan=$_POST['aranan'];

  $iceriksor=$db->prepare("select * from icerik where icerik_ad LIKE '%$aranan%' order by icerik_durum DESC, icerik_sira ASC limit 25");
  $iceriksor->execute();
  $say=$iceriksor->rowCount();

} else {

  $iceriksor=$db->prepare("select * from icerik order by icerik_durum DESC, icerik_sira ASC limit 25");
  $iceriksor->execute();
  $say=$iceriksor->rowCount();
}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">

    </div>

    <div class="col-md-12">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          
          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Ara!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <div align="left" class="col-md-6">
                <h2>İçerik İşlemleri <small>

                  <?php
                  
                  echo $say." dosya listelendi";

                  if ($_GET['durum']=='✓') {?> 

                    <b style="color: #1ABB9C;"><strong>İşlem Başarılı!</strong></b>

                  <?php } elseif ($_GET['durum']=='X') {?>

                    <b style="color: #BA1414;"><strong>İşlem Başarısız!</strong></b>

                    <?php } ?></small></h2><br>
                  </div>
                  <div align="right" class="col-md-6">
                    <a href="icerik-ekle.php"> <button style="border-radius: 20px;" class="btn btn-warning"><i class="fa fa-plus" aria-hidden="true"> Yeni Ekle</i></button></a>
                  </div>

                  <div class="clearfix"></div>
                </div>

                <div class="x_content">
                  <div class="table-responsive" style="border-radius: 20px;">
                    <table class="table table-striped jambo_table bulk_action">
                      
                      <thead>
                        <tr class="headings">
                          <th class="column-title" style="font-size: 20px;">İçerik Resim </th>
                          <th width="231" class="column-title text-center" style="font-size: 20px;">İçerik Tarih </th>
                          <th class="column-title text-center" style="font-size: 20px;">İçerik Ad </th>
                          <th class="column-title text-center" style="font-size: 20px;">İçerik Sıra </th>
                          <th class="column-title text-center" style="font-size: 20px;">İçerik Durum </th>
                          <th width="100" class="column-title"></th>
                          <th width="80" class="column-title"></th>
                        </tr>
                      </thead>
                      
                      <tbody>

                        <?php

                        while ($icerikcek=$iceriksor->fetch(PDO::FETCH_ASSOC)) {
                          ?>

                          <tr>

                            <td class=" "><img width="325" height="150" src="../../<?php echo $icerikcek['icerik_resimyol']; ?>"></td>
                            <td class="text-center" style="vertical-align: middle; font-size: 20px; font-weight: bold;"><?php echo $icerikcek['icerik_zaman']; ?></td>
                            <td class="text-center" style="vertical-align: middle; font-size: 24px;"><?php echo $icerikcek['icerik_ad']; ?></td>
                            <td class="text-center" style="vertical-align: middle; font-size: 24px;"><?php echo $icerikcek['icerik_sira']; ?></i></td>
                            <td class="text-center" style="vertical-align: middle; font-size: 24px;"><?php 

                            if ($icerikcek['icerik_durum']=="1") {

                              echo "Aktif";
                            } else{

                              echo "Pasif";
                            }

                            ?></td>

                            <td class=" " style="vertical-align: middle;"><a href="icerik-duzenle.php?icerik_id=<?php echo $icerikcek['icerik_id']; ?>" button style="width: 120px; text-align: center; border-radius: 20px;" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"> Düzenle</button></td>

                              <td class=" " style="vertical-align: middle;"><a href="../vst/islem.php?iceriksil=✓&icerik_id=<?php echo $icerikcek['icerik_id']; ?>" button style="width: 80px; border-radius: 20px;" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"> Sil</button></a></td>

                              </tr>

                            <?php } ?>

                          </tbody>

                        </table>
                      </div>
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