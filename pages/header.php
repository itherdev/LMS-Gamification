<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12 d-flex align-items-center justify-content-between">
        <!-- <h1 class="logo"><a href="index.php">Brainy</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <?php if (!$is_login) { ?>

              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="#about">About Brainy</a></li>
              <li><a href="#features">Features</a></li>
              <li><a href="#team">Team</a></li>
              <li><a href="#faq">FAQ</a></li>

            <?php } elseif ($is_login and $admin_level == 1) { ?>

              <li><a href="#" id="link__player_dashboard" class="link_header"><?= $nickname ?> Dashboard</a></li>
              <li class="drop-down"><a href="#">Player</a>
                <ul>
                  <li><a href="#" class="link_header" id="link__player_profile">My Profile</a></li>
                  <li><a href="#" class="link_header" id="link__player_questions">My Questions</a></li>
                  <li><a href="#" class="link_header" id="link__player_scores">My Scores</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Info</a>
                <ul>
                  <li><a href="#" id="link__info_materi_kuliah" class="link_header">Course</a></li>
                  <li><a href="#" id="link__info_challenges" class="link_header">Challenge</a></li>
                  <li><a href="#" id="link__info_uts" class="link_header">Mid Test</a></li>
                  <li><a href="#" id="link__info_uas" class="link_header">Final Test</a></li>
                  <li><a href="#" id="link__info_absen_online" class="link_header">Presensi Online</a></li>

                </ul>
              </li>
              <li class="drop-down"><a href="#">Rooms</a>
                <ul>
                  <?= $room_list_headers ?>
                </ul>
              </li>

            <?php } elseif ($is_login and $admin_level == 2) { ?>

              <!-- MENU UNTUK GM -->







            <?php }
            if ($is_login) { ?>

              <li><a id="link__player_logout" href="#" class="link_header">Logout</a></li>

            <?php } ?>










          </ul>
        </nav>



        <?php if (!$is_login) { ?>
          <a id="linkhd__login" href="#" class="link_header get-started-btn scrollto">Login</a>
        <?php } elseif ($is_login and $admin_level == 1) { ?>
          <a id="linkhd__kuis_play" href="#" class="link_header get-started-btn scrollto">Let's Play</a>
        <?php } elseif ($is_login and $admin_level == 2) { ?>
          <a id="linkhd__kuis_manage" href="#" class="link_header get-started-btn scrollto">Let's Manage</a>
        <?php } ?>

      </div>
    </div>

  </div>
</header>

<!-- <header id="header" class="header fixed-top d-flex align-items-center ">
  <div class="container d-flex align-items-center justify-content-between">

    <div class="logo">
      <h1><a href="index.html">Selecao</a></h1>
    </div>

    <nav id="navbar" class="navbar">
      <ul>
        <?php if (!$is_login) { ?>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto " href="#about">About Brainy</a></li>
          <li><a class="nav-link scrollto " href="#features">Features</a></li>
          <li><a class="nav-link scrollto " href="#team">Team</a></li>
          <li><a class="nav-link scrollto " href="#faq">F.A.Q</a></li>


          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>

            </ul>
          </li>


        <?php } elseif ($is_login and $admin_level == 1) { ?>
          <li><a href="#" id="link__player_dashboard" class="nav-link scrollto link_header"><?= $nickname ?> Dashboard</a></li>
          <li class="dropdown"><a href="#">Player<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="#" class="nav-link scrollto link_header" id="link__player_profile">My Profile</a></li>
              <li><a href="#" class="nav-link scrollto link_header" id="link__player_questions">My Questions</a></li>
              <li><a href="#" class="nav-link scrollto link_header" id="link__player_scores">My Scores</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#">Info<i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="#" id="link__info_materi_kuliah" class="nav-link scrollto link_header">Course</a></li>
              <li><a href="#" id="link__info_challenges" class="nav-link scrollto link_header">Challenge</a></li>
              <li><a href="#" id="link__info_uts" class="nav-link scrollto link_header">Mid Test</a></li>
              <li><a href="#" id="link__info_uas" class="nav-link scrollto align-content-centerlink_header">Final Test</a></li>
              <li><a href="#" id="link__info_absen_online" class="nav-link scrollto link_header">Presensi Online</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#">Rooms<i class="bi bi-chevron-right"></i></a>

            <ul>
              <?= $room_list_headers ?>
            </ul>
          </li>
        <?php } elseif ($is_login and $admin_level == 2) { ?>

          <!-- MENU UNTUK GM -->







<?php }
        if ($is_login) { ?>

  <li><a id="link__player_logout" href="#" class="nav-link scrollto link_header">Logout</a></li>

<?php } ?>

</ul>
<i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
<?php if (!$is_login) { ?>
  <a id="linkhd__login" href="#" class="nav-link scrollto link_header get-started-btn scrollto">Login</a>
<?php } elseif ($is_login and $admin_level == 1) { ?>
  <a id="linkhd__kuis_play" href="#" class="nav-link scrollto link_header get-started-btn scrollto">Let's Play</a>
<?php } elseif ($is_login and $admin_level == 2) { ?>
  <a id="linkhd__kuis_manage" href="#" class="" nav-link scrollto link_header get-started-btn scrollto">Let's Manage</a>
<?php } ?>

</div>
</header> -->