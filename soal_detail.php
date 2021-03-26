<?php
if (!isset($_GET['nickname']) or !isset($_GET['key'])) die("Error #soal_detail :: invalid key.");
$nickname = $_GET['nickname'];
$key = $_GET['key'];

include "config.php";

# ========================================================
# 1. GET ID_SOAL
# ========================================================
$s = "SELECT id_soal from tb_soal where soal_creator = '$nickname' and verified >= 0";
$q = mysqli_query($cn, $s) or die("Error #soal detail #1 :: Get data soal.");

$id_soal = "";
while ($d = mysqli_fetch_assoc($q)) {
	$id_soal = $d['id_soal'];
	if (md5("__" . $id_soal) == $key) {
		break;
	}
}

# ========================================================
# 2. GET DATA SOAL BY ID_SOAL
# ========================================================
$q = mysqli_query($cn, "
	SELECT * from tb_soal where id_soal = '$id_soal'
	") or die("Error #soal detail #2 :: Get data soal.");

$d = mysqli_fetch_assoc($q);

$id_room_subjects = $d['id_room_subjects'];
$tipe_soal = $d['tipe_soal'];
// $tipe_soal = 3;
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


# ========================================================
# 3. GET ID_ROOM
# ========================================================
$q = mysqli_query($cn, "
	SELECT a.id_room from tb_room_subjects a 
	join tb_soal b on a.id_room_subjects=b.id_room_subjects 
	where b.id_soal = '$id_soal'
	") or die("Error #soal_detail #1 Get id_room");
if (mysqli_num_rows($q) != 1) die("Error #soal_detail #2 Get id_room");
$d = mysqli_fetch_assoc($q);
$id_room = $d['id_room'];


# ========================================================
# 4. GET ROOM SUBJECT LISTS
# ========================================================
$s = "SELECT * from tb_room_subjects a 
join tb_room b on a.id_room = b.id_room  
where b.id_room = '$id_room'";
$q = mysqli_query($cn, $s) or die("Error #soal_detail Can't get data room subjects");

$nama_subjects_options = "";
if (mysqli_num_rows($q) > 0) {
	while ($d2 = mysqli_fetch_array($q)) {
		$nama_subjects_loop = $d2['nama_subjects'];
		$id_room_subjects_loop = $d2['id_room_subjects'];
		$selected = "";
		if ($id_room_subjects == $id_room_subjects_loop) $selected = "selected";
		$nama_subjects_options .= "<option value='$id_room_subjects_loop' $selected>$nama_subjects_loop</option>";
	}
} else {
	die("Error. Room have no room subjects.");
}








?>













<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Soal Detail</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<link href="assets/img/favicon.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->

	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">

	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="dingo.js"></script>
	<link href="dingo.css" rel="stylesheet">

</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">&nbsp;</div>
			<div class="col-md-6">









				<script type="text/javascript">
					$(document).ready(function() {


						set_tipe_soal_mode();



						function set_tipe_soal_mode() {
							var tipe_soal = $("#tipe_soal").val();
							$(".opsi_pg").hide();
							$(".opsi_isian").hide();
							$(".opsi_tf").hide();
							switch (tipe_soal) {
								case "1":
									$(".opsi_pg").show();
									break;
								case "2":
									$(".opsi_tf").show();
									break;
								case "3":
									$(".opsi_isian").show();
									break;
							}
						}


						$("#btn_simpan_soal").click(function() {
							alert("Mohon maaf, fitur Update belum siap.");
							return;
							if ($("#kalimat_soal").val() == "") {
								$("#pesan_error").text("Kalimat soal masih kosong.");
								return;
							}


							var tipe_soal = $("#tipe_soal").val();

							switch (tipe_soal) {
								case "3": //Isian
									if ($("#jawaban_isian").val() == "") {
										$("#pesan_error").text("Jawaban singkat masih kosong.");
										return;
									}
									break;
								case "2": //TF nothing todo with answer
									break;
								case "1": //Isian
									if ($("#jawaban_pg_benar").val() == "") {
										$("#pesan_error").text("Jawaban benar masih kosong.");
										return;
									}
									if ($("#jawaban_pg_salah1").val() == "") {
										$("#pesan_error").text("Jawaban salah ke-1 masih kosong.");
										return;
									}
									if ($("#jawaban_pg_salah2").val() == "") {
										$("#pesan_error").text("Jawaban salah ke-2 masih kosong.");
										return;
									}
									if ($("#jawaban_pg_salah3").val() == "") {
										$("#pesan_error").text("Jawaban salah ke-3 masih kosong.");
										return;
									}
									if ($("#jawaban_pg_salah4").val() == "") {
										$("#pesan_error").text("Jawaban salah ke-4 masih kosong.");
										return;
									}
									break;
							}

							var id_room_subjects = $("#id_room_subjects").val();
							var tipe_soal = $("#tipe_soal").val();
							var kalimat_soal = $("#kalimat_soal").val();
							var jawaban_pg_benar = $("#jawaban_pg_benar").val();
							var jawaban_isian = $("#jawaban_isian").val();
							var jawaban_pg_salah1 = $("#jawaban_pg_salah1").val();
							var jawaban_pg_salah2 = $("#jawaban_pg_salah2").val();
							var jawaban_pg_salah3 = $("#jawaban_pg_salah3").val();
							var jawaban_pg_salah4 = $("#jawaban_pg_salah4").val();
							var new_id_soal = $("#new_id_soal").val();
							var jawaban_tf = $("#jawaban_tf").val();
							var nickname = $("#nickname").val();
							var durasi_jawab = $("#durasi_jawab").text();
							var jumlah_questions = $("#jumlah_questions").text();

							var link_ajax = "ajax/ajax_save_add_question.php" +
								"?id_room_subjects=" + id_room_subjects +
								"&new_id_soal=" + new_id_soal +
								"&tipe_soal=" + tipe_soal +
								"&kalimat_soal=" + kalimat_soal

								+
								"&jawaban_tf=" + jawaban_tf +
								"&jawaban_isian=" + jawaban_isian +
								"&jawaban_pg_benar=" + jawaban_pg_benar +
								"&jawaban_pg_salah1=" + jawaban_pg_salah1 +
								"&jawaban_pg_salah2=" + jawaban_pg_salah2 +
								"&jawaban_pg_salah3=" + jawaban_pg_salah3 +
								"&jawaban_pg_salah4=" + jawaban_pg_salah4

								+
								"&nickname=" + nickname +
								"&durasi_jawab=" + durasi_jawab +
								"&jumlah_questions=" + jumlah_questions;

							$.ajax({
								url: link_ajax,
								success: function(b) {
									var c = b.split("__");
									var a = c[0];
									var earned_point = c[1];


									if (a == "1") {
										alert("Simpan soal baru berhasil.\n\nSelamat! Point Anda bertambah sebesar " + earned_point + " LP.\n\n Anda dapat input soal lainnya, atau kembali ke My Questions");
										var jumlah_questions = parseInt($("#jumlah_questions").text());
										jumlah_questions++;
										$("#jumlah_questions").text(jumlah_questions);
									} else if (a == "2") {
										alert("Updated berhasil.");
										$("#player_questions_add").hide();
										$("#player_questions").show();

									} else {
										alert(a);
									}
								}
							})
						})

						$(".input_qadd").keyup(function() {
							$("#pesan_error").text("");
						})
					})
				</script>
				<input type="hidden" id="tipe_soal" value="<?= $tipe_soal ?>">










				<h3>Question Detail</h3>

				<div class="form-group">
					<label>Sub-Bab Materi / Pertemuan Ke</label>
					<select class="form-control" id="id_room_subjects">
						<?= $nama_subjects_options ?>
					</select>
				</div>

				<div class="form-group">
					<label style="color: #3d3">Kalimat soal</label>
					<textarea class="form-control input_qadd" rows="5" id="kalimat_soal" required style="color: #3d3"><?= $kalimat_soal ?></textarea>
					<small id="ket_kalimat_soal" style="color: red; display: none "><b>Perhatian !!</b> Submit soal asal-asalan hanya akan memberikan point negatif. <br>Point tambahan/point negatif akan ditambahkan setelah diverifikasi oleh dosen.</small>
				</div>

				<div class="form-group hideit opsi_tf">
					<label style="color: #3d3">Jawaban True/False</label>
					<select class="form-control" id="jawaban_tf">
						<option value="1" style="color: green">Benar</option>
						<option value="0" style="color: red">Salah</option>
					</select>
				</div>

				<div class="form-group  hideit opsi_isian">
					<label style="color: #3d3">Jawaban Singkat</label>
					<input type="text" class="form-control" id="jawaban_isian" required style="color: #3d3" value="<?= $jawaban_isian ?>">
					<small>Usahakan hanya 1 kata dan tidak ada spasi atau karakter spesial.</small>
				</div>

				<div class="form-group opsi_benar opsi_pg">
					<label style="color: #3d3">Jawaban Benar</label>
					<input type="text" class="form-control input_qadd" id="jawaban_pg_benar" required style="color: #3d3;font-weight: bold" value="<?= $jawaban_pg_benar ?>">
					<small id="ket_jawaban_pg_benar" style="color: blue; display: none ">
						<b>Perhatian !!</b> Pertanyaan dan jawaban harus benar.
						<br>Jika jawaban ngasal atau jawaban double maka akan memberikan point negatif.
						<br>Jawaban benar harus disertai 4 jawaban salah.
					</small>
				</div>

				<div class="form-group opsi_salah opsi_pg">
					<label>Opsi Salah ke-1</label>
					<input type="text" class="form-control input_qadd" name="jawaban_pg_salah1" id="jawaban_pg_salah1" required value="<?= $jawaban_pg_salah1 ?>">
				</div>

				<div class="form-group opsi_salah opsi_pg">
					<label>Opsi Salah ke-2</label>
					<input type="text" class="form-control input_qadd" name="jawaban_pg_salah2" id="jawaban_pg_salah2" required value="<?= $jawaban_pg_salah2 ?>">
				</div>

				<div class="form-group opsi_salah opsi_pg">
					<label>Opsi Salah ke-3</label>
					<input type="text" class="form-control input_qadd" name="jawaban_pg_salah3" id="jawaban_pg_salah3" required value="<?= $jawaban_pg_salah3 ?>">
				</div>

				<div class="form-group opsi_salah opsi_pg">
					<label>Opsi Salah ke-4</label>
					<input type="text" class="form-control input_qadd" name="jawaban_pg_salah4" id="jawaban_pg_salah4" required value="<?= $jawaban_pg_salah4 ?>">
				</div>

				<div class="form-group">
					<label>Media Soal Bergambar (Opsional)</label>
					<input type="file" class="form-control" name="media_soal" id="media_soal">
				</div>

				<div class="form-group">
					<table width="100%">
						<tr>
							<td width="50%">
								<button class="btn btn-primary btn-block tombol" id="btn_simpan_soal">Update Soal</button>

							</td>
							<td width="50%">
								<button class="btn btn-danger btn-block tombol" id="btn_delete_soal">Delete Soal</button>

							</td>
						</tr>
					</table>
				</div>

				<p style="color: red;font-weight: bold" id="pesan_error"></p>
			</div>

		</div>

	</div>
</body>

</html>