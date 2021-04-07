<?php
$debug_mode = 0;

$nickname = $_GET['nickname'];

include "../config.php";


$q = mysqli_query($cn, "
	SELECT * from tb_soal where soal_creator = '$nickname' and verified >= 0
	") or die("Error #ajax daftar pertanyaan.");

$o = "";
$i = 0;
while ($d = mysqli_fetch_assoc($q)) {
	$i++;
	$id_soal = $d['id_soal'];
	$tipe_soal = $d['tipe_soal'];
	$kalimat_soal = $d['kalimat_soal'];

	$jawaban_pg = $d['jawaban_pg'];
	$jawaban_tf = $d['jawaban_tf'];
	$jawaban_isian = $d['jawaban_isian'];
	$opsi_pg1 = $d['opsi_pg1'];
	$opsi_pg2 = $d['opsi_pg2'];
	$opsi_pg3 = $d['opsi_pg3'];
	$opsi_pg4 = $d['opsi_pg4'];
	$opsi_pg5 = $d['opsi_pg5'];

	$benar_count = $d['benar_count'];
	$salah_count = $d['salah_count'];
	$verified = $d['verified'];
	$earned_point = $d['earned_point'];
	$gm_point = $d['gm_point'];
	$gm_comment = $d['gm_comment'];
	$count_reject = $d['count_reject'];
	$count_report = $d['count_report'];
	$last_answered = $d['last_answered'];
	$durasi_jawab = $d['durasi_jawab'];

	$soal_played_count = $benar_count + $salah_count;

	$opsi_jawaban = "";
	$jawaban_pg_benar  = $opsi_pg1;
	$jawaban_pg_salah1 = $opsi_pg2;
	$jawaban_pg_salah2 = $opsi_pg3;
	$jawaban_pg_salah3 = $opsi_pg4;
	$jawaban_pg_salah4 = $opsi_pg5;

	if ($tipe_soal == 1) {
		$tipe_soal_cap = "Sentence Questions";

		switch ($jawaban_pg) {
			case "A":
				break;
			case "B":
				$jawaban_pg_benar = $opsi_pg2;
				$jawaban_pg_salah1 = $opsi_pg1;
				break;
			case "C":
				$jawaban_pg_benar = $opsi_pg3;
				$jawaban_pg_salah2 = $opsi_pg1;
				break;
			case "D":
				$jawaban_pg_benar = $opsi_pg4;
				$jawaban_pg_salah3 = $opsi_pg1;
				break;
			case "E":
				$jawaban_pg_benar = $opsi_pg5;
				$jawaban_pg_salah4 = $opsi_pg1;
				break;
		}

		$opsi_jawaban = "
		Jawaban benar: $jawaban_pg_benar
		<br>Opsi salah:
		<ul>
			<li>$jawaban_pg_salah1</li>
			<li>$jawaban_pg_salah2</li>
			<li>$jawaban_pg_salah3</li>
			<li>$jawaban_pg_salah4</li>
		</ul>
		";
	}

	if ($tipe_soal == 2) {
		$tipe_soal_cap = "T/F";
		if ($jawaban_tf == 1) {
			$jawaban_tf_cap = "True";
		} else {
			$jawaban_tf_cap = "False";
		}
		$opsi_jawaban = "Jawaban : $jawaban_tf_cap";
	}

	if ($tipe_soal == 3) {
		$tipe_soal_cap = "Isian";
		$opsi_jawaban = "Jawaban singkat: $jawaban_isian";
	}

	$key = md5("__" . $id_soal);

	$o .= "
	<div class='row table-bordered'>
		<div class='divisi col-md-12' style='padding: 15px'>
			<small>Tipe: $tipe_soal_cap</small>
			<p>
				<a href='soal_detail.php?nickname=$nickname&key=$key' target='_blank' style='color:#0046b7'>$i. $kalimat_soal</a>
			</p>
			<p style='padding-left: 20px'>
				$opsi_jawaban
			</p>
		</div>
	</div>
	";
}

echo "$o";
