<?php
session_start();
$debug_mode = 0;
$is_login = 0;
$admin_level = 0;
$id_room = 0;

include "config.php";

// if ($debug_mode) echo (var_dump($_SESSION));

if (isset($_POST['btn_submit_login'])) {
  $nickname = filter_var(strtolower(trim($_POST['nickname2'])));
  $password = filter_var(trim($_POST['password2']));

  $s = "SELECT admin_level from tb_player where nickname = '$nickname' and password != '$password'";
  $q = mysqli_query($cn, $s) or die("Error #index Can't get data player");
  $d = mysqli_fetch_array($q);
  $admin_level  = $d['admin_level'];

  $_SESSION['nickname'] = $nickname;
  // $_SESSION['admin_level'] = $admin_level;
  $_SESSION['admin_level'] = 1;
} else {
  if ($debug_mode) echo "<hr>Not POST Login detected<hr>";
}

if (isset($_POST['btn_submit_id_room'])) {
  $_SESSION['id_room'] = $_POST['id_room'];
} else {
  if ($debug_mode) echo "<hr>Not POST id_room detected<hr>";
}


// if(!isset($_SESSION['nickname'])) $_SESSION['nickname'] = "isholihin87@gmail.com";
// if(!isset($_SESSION['admin_level'])) $_SESSION['admin_level'] = 2;

if (isset($_SESSION['nickname'])) {
  $is_login = 1;
  $nickname = $_SESSION['nickname'];
}
if (isset($_SESSION['admin_level'])) $admin_level = $_SESSION['admin_level'];
if (isset($_SESSION['id_room'])) $id_room = $_SESSION['id_room'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Brainy | Gamification of Digital Learning </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.css">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>




  <link href="assets/css/style.css" rel="stylesheet">

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="brainy.js"></script>
  <link href="brainy.css" rel="stylesheet">

</head>

<body>

  <?php
  include "include/form_var.php";
  include "include/user_var.php";
  include "pages/header.php";
  ?>

  <main id="main">

    <?php

    if (isset($_POST['btn_submit_logout'])) {
      session_destroy();
      include "pages/logout_sukses.php";
    } else {

      if ($is_login) {

        if ($id_room == 0) {
          include "pages/set_room.php";
        } else {
          include "include/room_var.php";

          if ($admin_level == 1) {
            include "pages/player/player.php";
          } elseif ($admin_level == 2) {
            include "pages/gm/gm.php";
          }
        }
      } else {
        include "pages/visitor/visitor.php";
      }
    }



    ?>

  </main>

  <?php include "pages/footer.php"; ?>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"></a>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->

  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>