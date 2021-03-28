<?php 
$debug_mode = 0;

$id_soal = $_GET['id_soal'];
$nickname = $_GET['nickname']; //cari siapa yg mengakses soal
$id_playedby = "$id_soal"."_by_$nickname";

include "../config.php";

// INSERT TB_PLAYED BY AGAR DIUPDATE SAAT PLAYER SUBMIT JAWABAN
$s = "INSERT into tb_soal_playedby (id_playedby, nickname, id_soal) values (
'$id_playedby',
'$nickname',
'$id_soal'
)";
$q = mysqli_query($cn,$s) or die("Error @ajax get question data: insert to soal playedby table");
// $q = mysqli_query($cn,$s);
// if(!$q){
// 	$s = "UPDATE tb_soal_playedby set date_load=CURRENT_TIMESTAMP WHERE id_playedby = '$id_playedby'";
// 	$q = mysqli_query($cn,$s) or die("Error @ajax get data soal :: Can't insert or update");
// }

$s = "SELECT 

soal_creator,
tipe_soal,
level_soal,
kalimat_soal,

opsi_pg1,
opsi_pg2,
opsi_pg3,
opsi_pg4,
opsi_pg5,

benar_count,
salah_count,
verified,
earned_point,
gm_point,
gm_comment,
count_reject,
count_report,
last_answered,
durasi_jawab


from tb_soal where id_soal='$id_soal'";

// die($s);

if($debug_mode){$q = mysqli_query($cn,$s) or die("Error #ajax tambah data soal, SQL: $s");}
else{$q = mysqli_query($cn,$s) or die("0");}

$jml_kolom = mysqli_num_fields($q);

$d = mysqli_fetch_array($q);

$output="@";
for($i=0; $i < $jml_kolom; $i++) { 
	// $output = $output."_,_".htmlspecialchars_decode($d[$i]);
	// $output = $output."_,_".$field[$i]."===".$d[$i];
	$output = $output."_,_".$d[$i];
}

$output = str_replace("@_,_", "", $output);
//$output = str_replace("_", "", $output);
echo $output;
?>