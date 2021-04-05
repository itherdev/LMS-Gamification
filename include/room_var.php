<?php
if (isset($id_room)) {

	# ================================================
	# GET DATA PLAYER + PRODI
	# ================================================
	$s = "SELECT * from tb_room a 
	where a.id_room = '$id_room'";
	$q = mysqli_query($cn, $s) or die("Error room_var1 Can't get data room");
	$d = mysqli_fetch_array($q);

	$id_semester = $d['id_semester'];
	$nama_room  = $d['nama_room'];
	$jumlah_player  = $d['jumlah_player'];
	$room_created  = $d['room_created'];
	$room_active_point  = $d['room_active_point'];





	# ================================================
	# SUBJECTS OF ROOM
	# ================================================
	$nama_subjects_options = "";

	$s = "SELECT * from tb_room_subjects a 
	join tb_room b on a.id_room = b.id_room  
	where b.id_room = '$id_room'";
	$q = mysqli_query($cn, $s) or die("Error room_var2 Can't get data room");

	if (mysqli_num_rows($q) > 0) {
		while ($d2 = mysqli_fetch_array($q)) {
			$nama_subjects = $d2['nama_subjects'];
			$id_room_subjects = $d2['id_room_subjects'];
			$nama_subjects_options .= "<option value='$id_room_subjects'>$nama_subjects</option>";
		}
	} else {
		$s = "INSERT INTO tb_room_subjects (id_room,nama_subjects) values ($id_room,'MATERI UMUM $nama_room')";
		$q = mysqli_query($cn, $s) or die("Error room_var3 Insert new room subjects");

		if ($q) {
			$s = "SELECT * from tb_room_subjects a 
			join tb_room b on a.id_room = b.id_room  
			where b.id_room = '$id_room'";
			$q = mysqli_query($cn, $s) or die("Error room_var4 Can't get data room");

			$d2 = mysqli_fetch_array($q);
			$nama_subjects = $d2['nama_subjects'];
			$id_room_subjects = $d2['id_room_subjects'];
			$nama_subjects_options .= "<option value='$id_room_subjects'>$nama_subjects</option>";
		}
	}






	# ================================================
	# GET RANK :: THIS ROOM
	# ================================================
	$player_rank = 0;

	$s = "SELECT a.nickname, b.nama_player, a.room_player_point from tb_room_points a 
	join tb_player b ON a.nickname = b.nickname 
	WHERE b.status_aktif = 1 
	and a.id_room = $id_room 
	and b.id_prodi = $id_prodi 
	ORDER BY a.room_player_point DESC
	";

	$q = mysqli_query($cn, $s) or die("Error #room_var1 Can't get room data");
	$jumlah_player = mysqli_num_rows($q);

	while ($d = mysqli_fetch_array($q)) {
		$player_rank++;
		if (strtoupper($d['nickname']) == strtoupper($nickname)) break;
	}

	$i = 0;
	$q = mysqli_query($cn, $s) or die("Error #room_var2 Can't get room data");
	while ($d = mysqli_fetch_array($q)) {
		$i++;
		$list_player[$i] = $d['nama_player'];
		$list_point[$i] = $d['room_player_point'];
		if ($i == 10) break;
	}

	$player_rank_cap = "th";
	if ($player_rank % 10 == 1) $player_rank_cap = "st";
	if ($player_rank % 10 == 2) $player_rank_cap = "nd";
	if ($player_rank % 10 == 3) $player_rank_cap = "rd";






	# ================================================
	# GET UNPLAYED QUESTIONS
	# ================================================
	$s = "SELECT a.id_soal from tb_soal a 
	join tb_room_subjects c on a.id_room_subjects = c.id_room_subjects 

	left join tb_soal_playedby b 
	on a.id_soal = b.id_soal and b.nickname = '$nickname' 

	WHERE c.id_room = '$id_room' 
	and a.soal_creator != '$nickname' 
	and b.id_soal is null

	ORDER BY rand()

	";
	// die($s);
	$q = mysqli_query($cn, $s) or die("Error room_var5 Get unplayed_questions");
	$unplayed_questions = mysqli_num_rows($q);


	$list_unplayed_questions = "";
	while ($d = mysqli_fetch_array($q)) {
		$list_unplayed_questions .= $d['id_soal'] . ",";
	}
	// $list_unplayed_questions.= "_";
	// $list_unplayed_questions = str_replace(",_", "", $list_unplayed_questions);











	# ================================================
	# JUMLAH QUESTIONS
	# ================================================
	$q = mysqli_query($cn, "
		SELECT id_soal from tb_soal where soal_creator = '$nickname' and verified >= 0
		") or die("Error #room_var6");
	$jumlah_questions = mysqli_num_rows($q);




	# ================================================
	# NEW ID SOAL
	# ================================================
	$new_id_soal = strtolower($nickname) . "_" . date("ymdHis");

?>

	<input type="hidden" id="id_room" value="<?= $id_room ?>">
	<input type="hidden" id="jumlah_questions" value="<?= $jumlah_questions ?>">
	<input type="hidden" id="new_id_soal" value="<?= $new_id_soal ?>">

<?php } ?>