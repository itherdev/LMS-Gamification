<?php 
// die("1");
$debug_mode = 1;


$id_room_subjects = $_GET['id_room_subjects'];
$new_id_soal = $_GET['new_id_soal'];
$tipe_soal = $_GET['tipe_soal'];
$kalimat_soal = $_GET['kalimat_soal'];

$jawaban_tf = $_GET['jawaban_tf'];
$jawaban_isian = $_GET['jawaban_isian'];

$jawaban_pg_benar = $_GET['jawaban_pg_benar'];
$jawaban_pg_salah1 = $_GET['jawaban_pg_salah1'];
$jawaban_pg_salah2 = $_GET['jawaban_pg_salah2'];
$jawaban_pg_salah3 = $_GET['jawaban_pg_salah3'];
$jawaban_pg_salah4 = $_GET['jawaban_pg_salah4'];

$soal_creator = $_GET['nickname'];
$durasi_jawab = $_GET['durasi_jawab'];






function angka2huruf($a){
	switch ($a) {
		case 1: return "A"; break;
		case 2: return "B"; break;
		case 3: return "C"; break;
		case 4: return "D"; break;
		case 5: return "E"; break;
	}
}

$jawaban_pg = "";
$opsi_pg1 = "";
$opsi_pg2 = "";
$opsi_pg3 = "";
$opsi_pg4 = "";
$opsi_pg5 = "";

if($tipe_soal==2) $jawaban_isian="";
if($tipe_soal==3) $jawaban_tf="";
if($tipe_soal==1) {

	$jawaban_tf="";
	$jawaban_isian="";

	# ================================================
	# RANDOMIZE KUNCI JAWABAN
	# ================================================
	$jawaban_pg = angka2huruf(1 + rand()%5);

	$opsi_pg1 = $jawaban_pg_benar;
	$opsi_pg2 = $jawaban_pg_salah1;
	$opsi_pg3 = $jawaban_pg_salah2;
	$opsi_pg4 = $jawaban_pg_salah3;
	$opsi_pg5 = $jawaban_pg_salah4;

	switch ($jawaban_pg) {
		case "A": break;
		case "B": $opsi_pg2 = $jawaban_pg_benar; $opsi_pg1 = $jawaban_pg_salah1; break;
		case "C": $opsi_pg3 = $jawaban_pg_benar; $opsi_pg1 = $jawaban_pg_salah2; break;
		case "D": $opsi_pg4 = $jawaban_pg_benar; $opsi_pg1 = $jawaban_pg_salah3; break;
		case "E": $opsi_pg5 = $jawaban_pg_benar; $opsi_pg1 = $jawaban_pg_salah4; break;
	}

}


include "../config.php";
# ================================================
# JUMLAH QUESTIONS
# ================================================
$q = mysqli_query($cn,"
	SELECT id_soal from tb_soal where soal_creator = '$soal_creator' and verified >= 0
	") or die("Error #ajax tambah soal :: get id soal");
$jumlah_questions = mysqli_num_rows($q);


# ==================================================
# EARNED POINT FOR PLAYER AS CREATOR
# ==================================================
$lucky_point = rand()%6;
$point_len_soal = $durasi_jawab / 5;
$point_sum_soal = $jumlah_questions * 5/100;

$earned_point = $lucky_point + $point_len_soal + $point_sum_soal;






# ==================================================
# INSERT SQL
# ==================================================
$s = "INSERT into tb_soal (
id_soal,
id_room_subjects,
soal_creator,
tipe_soal,
kalimat_soal,
jawaban_tf,
jawaban_isian,
jawaban_pg,
opsi_pg1,
opsi_pg2,
opsi_pg3,
opsi_pg4,
opsi_pg5,
durasi_jawab,
earned_point
) values (
'$new_id_soal',
'$id_room_subjects',
'$soal_creator',
'$tipe_soal',
'$kalimat_soal',
'$jawaban_tf',
'$jawaban_isian',
'$jawaban_pg',
'$opsi_pg1',
'$opsi_pg2',
'$opsi_pg3',
'$opsi_pg4',
'$opsi_pg5',
'$durasi_jawab',
'$earned_point'
)";
if($debug_mode){
	$q = mysqli_query($cn,$s) or die("Error #ajax tambah data soal, SQL: $s");
}else{$q = mysqli_query($cn,$s) or die("0");}

# ==================================================
# QUESTION ADD POINT FOR PLAYER AS CREATOR
# ==================================================
# AFFECT DB:
# 1. my_point
# 2. room_point
# ==================================================
$q = mysqli_query($cn,"
	SELECT id_room from tb_room_subjects where id_room_subjects = '$id_room_subjects' 
	") or die("Error #ajax tambah question :: get id_room");
$d = mysqli_fetch_assoc($q);
$id_room = $d['id_room'];


# ==================================================
# UPDATE MY_POINT
$q = mysqli_query($cn,"
	UPDATE tb_player set my_point = my_point + $earned_point where nickname = '$soal_creator' 
	") or die("Error #ajax tambah question :: update my point player");

# ==================================================
# UPDATE MY_POINT
$q = mysqli_query($cn,"
	UPDATE tb_room_points set room_player_point = room_player_point + $earned_point where id_room = '$id_room' 
	") or die("Error #ajax tambah question :: update room point");

# ==================================================
# IF NOTHING ERROR SEND AJAX RESULT
echo "1__$earned_point";
