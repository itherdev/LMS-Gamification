<?php
if (isset($nickname)) {

	$nickname = ucwords(strtolower($nickname));

	# ================================================
	# GET DATA PLAYER + PRODI
	# ================================================
	$s = "SELECT * from tb_player a 
	join tb_prodi b on a.id_prodi = b.id_prodi 
	where a.nickname = '$nickname'";
	$q = mysqli_query($cn, $s) or die("Error user_var Can't get data player");
	$d = mysqli_fetch_array($q);

	$admin_level  = $d['admin_level'];
	$id_prodi = $d['id_prodi'];
	$nama_player  = $d['nama_player'];
	$login_count  = $d['login_count'];
	$last_login  = $d['last_login'];
	$play_count  = $d['play_count'];
	$last_play  = $d['last_play'];
	$my_point  = $d['my_point'];
	$status_aktif  = $d['status_aktif'];
	$password  = $d['password'];
	$pass_hint1  = $d['pass_hint1'];
	$pass_hint2  = $d['pass_hint2'];
	$pass_hint3  = $d['pass_hint3'];
	$my_point1  = $d['my_point1'];
	$my_point2  = $d['my_point2'];
	$my_point3  = $d['my_point3'];
	$my_point4  = $d['my_point4'];
	$my_point5  = $d['my_point5'];
	$my_point6  = $d['my_point6'];
	$my_point7  = $d['my_point7'];
	$my_point8  = $d['my_point8'];
	$my_point9  = $d['my_point9'];
	$my_point10  = $d['my_point10'];
	$my_point11  = $d['my_point11'];
	$my_point12  = $d['my_point12'];
	$my_point13  = $d['my_point13'];
	$my_point14  = $d['my_point14'];
	$my_point15  = $d['my_point15'];
	$my_point16  = $d['my_point16'];

	$id_fakultas = $d['id_fakultas'];
	$id_kaprodi = $d['id_kaprodi'];
	$kode_nim  = $d['kode_nim'];
	$kode_pdpt  = $d['kode_pdpt'];
	$jenjang  = $d['jenjang'];
	$nama_prodi  = $d['nama_prodi'];
	$singkatan_prodi  = $d['singkatan_prodi'];
	$no_akred  = $d['no_akred'];
	$akred  = $d['akred'];
	$tanggal_berdiri  = $d['tanggal_berdiri'];




	# ================================================
	# GET ROOM LIST
	# ================================================
	$room_options = "";
	$room_list_headers = "";
	$room_creator = $nickname;

	// $s = "SELECT id_room,nama_room from tb_room where status_room = 1 and room_creator = '$room_creator'";
	$s = "SELECT id_room,nama_room from tb_room where status_room = 1";
	if ($debug_mode) {
		$q = mysqli_query($cn, $s) or die("Error #set_room: " . mysqli_error($cn) . " <br>SQL: $s");
	} else {
		$q = mysqli_query($cn, $s) or die("Error #set_room: Can't get room data");
	}
	while ($d = mysqli_fetch_array($q)) {
		$id_room_loop = $d['id_room'];
		$nama_room_loop = $d['nama_room'];
		$room_options .= "<option value='$id_room_loop'>$nama_room_loop</option>";
		$room_list_headers .= "<li><a href='#' id='change_room__$id_room_loop' class='change_room'>$nama_room_loop</a></li>";
	}








	# ================================================
	# GET RANK :: ALL ROOM
	# ================================================
	$s = "SELECT * from tb_player 
	WHERE status_aktif = 1 
	and id_prodi = $id_prodi 
	ORDER BY my_point DESC
	";
	// die($s);
	$q = mysqli_query($cn, $s) or die("Error #user_var1 Can't get room data");
	$jumlah_player_global = mysqli_num_rows($q);

	$player_global_rank = 0;
	while ($d = mysqli_fetch_array($q)) {
		$player_global_rank++;
		if (strtoupper($d['nickname']) == strtoupper($nickname)) break;
	}

	$player_global_rank_cap = "th";
	if ($player_global_rank % 10 == 1) $player_global_rank_cap = "st";
	if ($player_global_rank % 10 == 2) $player_global_rank_cap = "nd";
	if ($player_global_rank % 10 == 3) $player_global_rank_cap = "rd";











	# ================================================
	# UNDEFINED
	# ================================================
	$nama_badge = "Junior Programmer Level II";
	$jumlah_beaten_challenge = 13;
	$total_challenge = 54;
	$last_login_day = 4;
?>





	<input type="hidden" id="nickname" value="<?= strtolower($nickname) ?>">



<?php } ?>