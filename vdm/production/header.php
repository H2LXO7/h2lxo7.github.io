<?php
ob_start();
session_start();
include '../vst/baglan.php';

date_default_timezone_set('Europe/Istanbul');

$kullanicisor=$db->prepare("select * from kullanici where kullanici_ad=:ad");
$kullanicisor->execute(array(
  'ad' => $_SESSION['kullanici_ad']
));

  $say=$kullanicisor->rowCount();

  if ($say==0) {
    Header("Location:login.php?durum=izinsiz");
    exit;
  }

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $kullanicicek['kullanici_adsoyad']; ?> | Yönetim Paneli</title>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title text-center" style="color: white; border: 0; margin-top: 25px;">
            <a href="index.php" class="site_title"></i><span><?php echo $kullanicicek['kullanici_ad']; ?></span
              ></a>
              <br>

              <div style="background-color: #35495d; border-radius: 30px;">

                <?php 

                if ($kullanicicek['kullanici_yetki']==5) {

                  echo "Yetki: Yönetici";

                } ?>

              </div>

            </div>
            <br>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <br><br>
            <div class="profile clearfix">
              <div class="profile_pic">
                <img style="background-color: transparent;" src="../../<?php echo $kullanicicek['kullanici_resim']; ?>" alt="..."
                class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Yönetim Paneline</span>
                <h2>Hoşgeldiniz...</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->
            <br>
            <?php include 'sidebar.php'; ?>
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a href="login.php" data-toggle="tooltip" data-placement="top" title="Logout" name="loggout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../../<?php echo $kullanicicek['kullanici_resim']; ?>"><?php echo $_SESSION['kullanici_ad']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a href="kullanici-profil.php"> Kullanıcı Profili</a></li>

                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Çıkış Yap</a></li>

                  </ul>

                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->