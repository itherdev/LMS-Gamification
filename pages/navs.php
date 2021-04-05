<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <?php if (!$is_login) { ?>
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Brainy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#features">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#team">Team</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#faq">FaQ</a>
        </li>

      <?php } elseif ($is_login and $admin_level == 1) { ?>

        <li><a href="#" id="link__player_dashboard" class="link_header"><?= $nickname ?> Dashboard</a></li>
        <li class="drop-down"><a href="#">Player</a>
          <ul>
            <li><a href="#" class="link_header" id="link__player_profile">My Profile</a></li>
            <li><a href="#" class="link_header" id="link__player_questions">My Questions</a></li>
            <li><a href="#" class="link_header" id="link__player_badges">My Badges</a></li>
            <li><a href="#" class="link_header" id="link__player_scores">My Scores</a></li>
          </ul>
        </li>
        <li class="drop-down"><a href="#">Info</a>
          <ul>
            <li><a href="#" id="link__info_materi_kuliah" class="link_header">Materi Kuliah</a></li>
            <li><a href="#" id="link__info_challenges" class="link_header">Challenge</a></li>
            <li><a href="#" id="link__info_uts" class="link_header">UTS</a></li>
            <li><a href="#" id="link__info_uas" class="link_header">UAS</a></li>
            <li><a href="#" id="link__info_absen_online" class="link_header">Absen Online</a></li>
            <li><a href="#" id="link__info_nilai_akhir" class="link_header">Nilai Akhir</a></li>
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
  </div>
</nav>

<?php if (!$is_login) { ?>
  <a id="linkhd__login" href="#" class="link_header get-started-btn scrollto">Play</a>
<?php } elseif ($is_login and $admin_level == 1) { ?>
  <!-- <a id="linkhd__kuis_play" href="#" class="link_header get-started-btn scrollto">Let's Play</a> -->
<?php } elseif ($is_login and $admin_level == 2) { ?>
  <a id="linkhd__kuis_manage" href="#" class="link_header get-started-btn scrollto">Let's Manage</a>
<?php } ?>