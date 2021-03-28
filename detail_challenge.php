<?php
if (!isset($_GET['id_room']) or !isset($_GET['key'])) die("Error #chal_detail :: invalid key.");
$id_room = $_GET['id_room'];
$key = $_GET['key'];

include "config.php";

# ========================================================
# 1. GET ID_CHALLENGE
# ========================================================
$q = mysqli_query($cn, "SELECT id_chal from tb_challenge where id_room = '$id_room'")
	or die("Error #challenge detail #1 :: Get data challenge.");

$id_chal = "";
while ($d = mysqli_fetch_assoc($q)) {
	$id_chal = $d['id_chal'];
	if (md5("__$id_chal") == $key) {
		break;
	}
}

# ========================================================
# 2. GET DATA CHALLENGE BY ID_CHALLENGE
# ========================================================
$s = "
	SELECT * from tb_challenge a 
	join tb_challenge_level b on a.id_chal_level=b.id_chal_level 
	where a.id_chal = '$id_chal' 
	";
$q = mysqli_query($cn, $s) or die("Error #challenge detail #2 :: Get data challenge. $s");

$d = mysqli_fetch_assoc($q);

$id_chal_level = $d['id_chal_level'];
$chal_level_name = $d['chal_level_name'];
$chal_level_desc = $d['chal_level_desc'];
$chal_level_syarat_point = $d['chal_level_syarat_point'];
$chal_creator = $d['chal_creator'];
$chal_name = $d['chal_name'];
$chal_created = $d['chal_created'];
$chal_desc = $d['chal_desc'];
$chal_point = $d['chal_point'];









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
			<div class="col-md-6" style="margin-top: 15px">


























				<script type="text/javascript">
					$(document).ready(function() {


						set_tipe_chal_mode();



						function set_tipe_chal_mode() {
							var tipe_chal = $("#tipe_chal").val();
							$(".opsi_pg").hide();
							$(".opsi_isian").hide();
							$(".opsi_tf").hide();
							switch (tipe_chal) {
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


						$("#btn_simpan_chal").click(function() {
							alert("Mohon maaf, fitur Update belum siap.");
							return;
							if ($("#kalimat_chal").val() == "") {
								$("#pesan_error").text("Kalimat challenge masih kosong.");
								return;
							}


							var tipe_chal = $("#tipe_chal").val();

							switch (tipe_chal) {
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
							var tipe_chal = $("#tipe_chal").val();
							var kalimat_chal = $("#kalimat_chal").val();
							var jawaban_pg_benar = $("#jawaban_pg_benar").val();
							var jawaban_isian = $("#jawaban_isian").val();
							var jawaban_pg_salah1 = $("#jawaban_pg_salah1").val();
							var jawaban_pg_salah2 = $("#jawaban_pg_salah2").val();
							var jawaban_pg_salah3 = $("#jawaban_pg_salah3").val();
							var jawaban_pg_salah4 = $("#jawaban_pg_salah4").val();
							var new_id_chal = $("#new_id_chal").val();
							var jawaban_tf = $("#jawaban_tf").val();
							var id_room = $("#id_room").val();
							var durasi_jawab = $("#durasi_jawab").text();
							var jumlah_questions = $("#jumlah_questions").text();

							var link_ajax = "ajax/ajax_save_add_question.php" +
								"?id_room_subjects=" + id_room_subjects +
								"&new_id_chal=" + new_id_chal +
								"&tipe_chal=" + tipe_chal +
								"&kalimat_chal=" + kalimat_chal

								+
								"&jawaban_tf=" + jawaban_tf +
								"&jawaban_isian=" + jawaban_isian +
								"&jawaban_pg_benar=" + jawaban_pg_benar +
								"&jawaban_pg_salah1=" + jawaban_pg_salah1 +
								"&jawaban_pg_salah2=" + jawaban_pg_salah2 +
								"&jawaban_pg_salah3=" + jawaban_pg_salah3 +
								"&jawaban_pg_salah4=" + jawaban_pg_salah4

								+
								"&id_room=" + id_room +
								"&durasi_jawab=" + durasi_jawab +
								"&jumlah_questions=" + jumlah_questions;

							$.ajax({
								url: link_ajax,
								success: function(b) {
									var c = b.split("__");
									var a = c[0];
									var earned_point = c[1];


									if (a == "1") {
										alert("Simpan challenge baru berhasil.\n\nSelamat! Point Anda bertambah sebesar " + earned_point + " LP.\n\n Anda dapat input challenge lainnya, atau kembali ke My Questions");
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

						$(".link_chal").click(function() {
							var tid = $(this).prop("id");
							$(".trsub_chal").hide();
							switch (tid) {
								case "link_chal__persyaratan":
									$(".tr_persyaratan").show();
									break;
								case "link_chal__bobot":
									$(".tr_bobot").show();
									break;
								case "link_chal__beatenby":
									$(".tr_beatenby").show();
									break;
								case "link_chal__howto":
									$(".tr_howto").show();
									break;
							}
						})

						$("#link_bukti_chal").keyup(function() {
							if ($(this).val() == "") {
								$("#btn_beat_chal").prop("disabled", true);
							} else {
								$("#btn_beat_chal").prop("disabled", false);

							}
						})

						$("#btn_beat_chal").click(function() {
							var link_bukti_chal = $("#link_bukti_chal").val();
							alert("Maaf, fitur belum siap.\n\nLink bukti: " + link_bukti_chal);
						})


					})
				</script>
				<input type="hidden" id="tipe_chal" value="<?= $tipe_chal ?>">


























				<style type="text/css">
					.trsub_chal {
						display: none
					}
				</style>
				<span>Challenge Detail:</span>
				<hr>
				<h3><?= $chal_name ?></h3>
				<p><?= $chal_desc ?></p>

				<style type="text/css">
					#tbchal td {
						padding: 3px 10px
					}
				</style>
				<table width="100%" class="table-bordered" id="tbchal">
					<tr>
						<td colspan="2" align="center">Max Point : <span style="font-size: 35px;color: pink"><?= $chal_point ?></span> LP - <small>by: <?= $chal_creator ?></small></td>
					</tr>
					<tr>
						<td colspan="3" align="center" style="background-color: #bfb"><a href="#" class="link_chal" id="link_chal__persyaratan">Persyaratan</a></td>
					</tr>
					<tr class="trsub_chal tr_persyaratan">
						<td width="35%" align="right"><small><i>Syarat Level</i></small></td>
						<td><?= $chal_level_name ?></td>
					</tr>
					<tr class="trsub_chal tr_persyaratan">
						<td align="right"><small><i>Syarat Point</i></small></td>
						<td><?= $chal_level_syarat_point ?></td>
					</tr>
					<tr class="trsub_chal tr_persyaratan">
						<td align="right"><small><i>Syarat Challenges</i></small></td>
						<td><a href="#">Challenge #1</a>, <a href="#">Challenge #2</a>, <a href="#">Challenge #3</a></td>
					</tr>
				</table>

				<style type="text/css">
					#tbchal_bobot td {
						padding: 3px 10px
					}
				</style>
				<table width="100%" class="table-bordered" style="margin-top: 15px" id="tbchal_bobot">
					<tr>
						<td colspan="3" align="center" style="background-color: #bfb"><a href="#" class="link_chal" id="link_chal__bobot">Bobot Nilai</a></td>
					</tr>
					<tr class="trsub_chal tr_bobot">
						<td>1</td>
						<td>It's work!</td>
						<td>50%</td>
					</tr>
					<tr class="trsub_chal tr_bobot">
						<td>2</td>
						<td>Dilenkapi dengan CRUD PHP</td>
						<td>20%</td>
					</tr>
					<tr class="trsub_chal tr_bobot">
						<td>3</td>
						<td>Tampilan (CSS, JS)</td>
						<td>15%</td>
					</tr>
					<tr class="trsub_chal tr_bobot">
						<td>4</td>
						<td>Penjelasan Step-step Video Tutorial</td>
						<td>15%</td>
					</tr>
				</table>

				<style type="text/css">
					#tbchal_beatenby td {
						padding: 3px 10px
					}

					#tbchal_beatenby li,
					#tbchal_beatenby ul {
						padding-left: 15px
					}

					#td_tbchal_beatenby {
						font-size: 10pt
					}
				</style>
				<table width="100%" class="table-bordered" style="margin-top: 15px" id="tbchal_beatenby">
					<tr>
						<td align="center" style="background-color: #bfb"><a href="#" class="link_chal" id="link_chal__beatenby">Beaten by ...</a></td>
					</tr>
					<tr class="trsub_chal tr_beatenby">
						<td id="td_tbchal_beatenby">
							This challenge has been beaten by:
							<ul>
								<li>Ahmad Firdaus | 2334LP | <a href="#" target="_blank">link details</a></li>
								<li>Budi Cahyono | 2241LP | <a href="#" target="_blank">link details</a></li>
								<li>Charlie Candra | 1876LP | <a href="#" target="_blank">link details</a></li>
								<li>Diana Farida | 1025LP | <a href="#" target="_blank">link details</a></li>
							</ul>
							)* Andakah berikutnya?
						</td>
					</tr>
				</table>

				<style type="text/css">
					#tbchal_beat td {
						padding: 3px 10px
					}

					#tbchal_beat li,
					#tbchal_beat ul {
						padding-left: 15px
					}

					#td_tbchal_beat {
						font-size: 10pt
					}
				</style>
				<table width="100%" class="table-bordered" style="margin-top: 15px; margin-bottom: 50px" id="tbchal_beat">
					<tr>
						<td align="center" style="background-color: #bfb"><a href="#" class="link_chal" id="link_chal__howto">How to beat ?</a></td>
					</tr>
					<tr class="trsub_chal tr_howto">
						<td id="td_tbchal_beat">
							Tunjukan <span>bukti bahwa kamu sudah menguasainya</span>, dg cara memenuhi semua persyaratan challenge dan:
							<ul>
								<li>Memasukan link video Youtube tutorial challenge kamu; atau</li>
								<li>Memasukan link hosting file .PHP kamu</li>
								<li>Memasukan link GDrive file praktikum .PDF (guide step by step)</li>
							</ul>
							)* Setelah upload link akan ada notif ke GM untuk memverifikasinya. Setelah verifikasi akan ada notif buat kamu tentang besar point yang didapatkan.
							<hr>
							Masukan link kamu disini:
							<input type="text" class="form-control" id="link_bukti_chal" style="margin-bottom: 10px">
							<button class="btn btn-primary btn-block tombol" id="btn_beat_chal" disabled="">Beat this Challenge!</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</body>

</html>