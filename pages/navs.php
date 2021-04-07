<nav id="navbar" class="navbar">
  <ul>
    <?php if (!$is_login) { ?>

      <li><a class="nav-link scrollto " href="index.php">Home</a></li>
      <li><a class="nav-link scrollto" href="#about">About</a></li>
      <li><a class="nav-link scrollto" href="#features">Features</a></li>
      <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>

    <?php } elseif ($is_login and $admin_level == 1 and $id_room != 0) { ?>

      <li><a href="#" id="link__player_dashboard" class="link_header nav-link scrollto"><?= $nickname ?> Dashboard</a></li>
      <li><a href="#" id="linkhd__kuis_play" class="link_header nav-link scrollto" style="color: yellow">Beat Questions <span style="color: white; background-color: red; padding: 3px;border-radius: 5px; border: 1px solid #73AD21;" id="unplayed_questions_label">0</span></a></li>
      <li class="dropdown"><a href="#">Player</a>
        <ul>
          <li><a href="#" class="link_header" id="link__player_profile">My Profile</a></li>
          <li><a href="#" class="link_header" id="link__player_questions">My Questions</a></li>
          <li><a href="#" class="link_header" id="link__player_badges">My Badges</a></li>
          <li><a href="#" class="link_header" id="link__player_scores">My Scores</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#">Info</a>
        <ul>
          <li><a href="#" id="link__info_materi_kuliah" class="link_header">Materi Kuliah</a></li>
          <li><a href="#" id="link__info_challenges" class="link_header">Challenge</a></li>
          <li><a href="#" id="link__info_uts" class="link_header">UTS</a></li>
          <li><a href="#" id="link__info_uas" class="link_header">UAS</a></li>
          <li><a href="#" id="link__info_absen_online" class="link_header">Absen Online</a></li>
          <li><a href="#" id="link__info_nilai_akhir" class="link_header">Nilai Akhir</a></li>
        </ul>
      </li>
      <li class="dropdown"><a href="#">Rooms</a>
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
  <a id="linkhd__login" href="#" class="link_header get-started-btn scrollto">Play</a>
<?php } elseif ($is_login and $admin_level == 1) { ?>
  <a id="linkhd__kuis_play" href="#" class="link_header get-started-btn scrollto">Let's Play</a>
<?php } elseif ($is_login and $admin_level == 2) { ?>
  <a id="linkhd__kuis_manage" href="#" class="link_header get-started-btn scrollto">Let's Manage</a>
<?php } ?>