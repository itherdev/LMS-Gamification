<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-12 d-flex align-items-center justify-content-between">
        <!-- <h1 class="logo"><a href="index.php">Brainy</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->

        <nav class="navbar">
          <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <?php if (!$is_login) { ?>

                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About Brain</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#team">Team</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#faq">FAQ</a>
                </li>


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
          </div>
        </nav>

        <?php if (!$is_login) { ?>
          <a id="linkhd__login" href="#" class="link_header get-started-btn scrollto">Login</a>
        <?php } elseif ($is_login and $admin_level == 1) { ?>
          <a id="linkhd__kuis_play" href="#" class="link_header get-started-btn scrollto">Let's Play</a>
        <?php } elseif ($is_login and $admin_level == 2) { ?>
          <a id="linkhd__kuis_manage" href="#" class="link_header get-started-btn scrollto">Let's Manage</a>
        <?php } ?>

        <a href="#" onclick="toggle($('#sidebar'));"><i class="fa fa-bars custom-icon"></i>toggle navbar</a>

      </div>
    </div>

  </div>
</header>