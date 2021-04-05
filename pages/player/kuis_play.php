<?php
//zzz debug var
$tipe_soal
?>





















<style type="text/css">
	#kuis_play .trcount {
		background-color: #eee;
		color: #333
	}

	#kuis_play .trhead {
		background-color: #eee;
	}

	#kuis_play .trsoal {
		background-color: #aaffaa;
	}

	#kuis_play .tropsi_pg,
	#kuis_play .tropsi_tf,
	#kuis_play .tropsi_isian {
		background-color: #ddffff;
	}

	#kuis_play tr:hover {
		background-color: white;
	}

	#kuis_play .tdopsil {
		text-align: right;
		width: 30px;
	}

	#kuis_play .tdopsir {
		text-align: left;
	}

	#kuis_play .tdcenter {
		text-align: center;
	}

	#kuis_play td {
		font-size: 10pt;
		padding: 5px 8px 5px 8px;
	}
</style>
<section id="kuis_play" class="player hideita">
	<div class="container">

		<div class="row ">
			<div class="col-12 col-md-12 col-lg-12">
				<div class="card py-5 px-5">
					<!-- =================================================== -->
					<!-- READY PLAY BLOCK  -->
					<!-- =================================================== -->
					<div id="blok_ready_play" class="hideita text-center pt-3">
						<h3 class="text-center">Beat Your Friend's Questions</h3>
						<br>

						<?php
						$disabled_ready_play = "disabled";
						$btn_ready_play_ket_hide_style = "";
						$sty_soal_habis = "";
						$sty_soal_available = "display:none";

						if ($unplayed_questions > 0) {
							$disabled_ready_play = "";
							$btn_ready_play_ket_hide_style = "hideit";
							$sty_soal_habis = "display:none";
							$sty_soal_available = "";
						}
						?>
						<div id="pengantar_soal_habis" style="<?= $sty_soal_habis ?>">
							<p>Ooppsss...</p>
							<a href='#' class='link_header' id='img__player_questions_add'>
								<img id='img_play_kuis' src='assets/img/soal_habis.png' height='150px' style='margin: 15px'>
							</a>
						</div>
						<div id="pengantar_soal_available" style="<?= $sty_soal_available ?>">
							<p>Read carefully your friend's question then You can:</p>
							<div class="row row justify-content-md-center">
								<div class="col-md-4 ">
									<img id='img_play_kuis' src='assets/img/yes.png' height='150px' style='margin: 15px'>

								</div>

								<div class="col-md-4">
									<img id='img_play_kuis' src='assets/img/no.png' height='150px' style='margin: 15px'>

								</div>
							</div>
							<div class="row row justify-content-md-center">
								<div class="col-md-3 ">

									<p style="color: black;">Answer IT</p>
								</div>
								<div class="col-md-1">

									<p style="color: black;">OR</p>
								</div>


								<div class="col-md-3">

									<p style="color: black;">Reject IT</p>
								</div>
							</div>
							<img id='img_play_kuis' src='assets/img/answer_or_reject.png' height='150px' style='margin: 15px'>
						</div>
						<button id="btn_ready_play" class="btn-primary btn-block tombol col-md-8 offset-2" <?= $disabled_ready_play ?>>Ready Play!</button>
						<hr>



						<!-- =================================================== -->
						<!-- TIDAK ADA SOAL  -->
						<!-- =================================================== -->
						<small id="btn_ready_play_ket" class="<?= $btn_ready_play_ket_hide_style ?>">
							Wow sorry,<span style="color: yellom; font-weight: bold">there are no questions that you can play.</span>. Tell your friends to make questions or you can <a href="#" id="link_qplay__player_questions_add" class="link_header">make questions</a> for your friends!
						</small>


					</div>







					<!-- =================================================== -->
					<!-- PLAY BLOCK  -->
					<!-- =================================================== -->
					<input type="hidden" id="list_unplayed_questions" value="<?= $list_unplayed_questions ?>">
					<input type="hidden" size="4" id="rows_point" placeholder="rows_point" value="0">
					<input type="hidden" size="1" id="jawaban_terpilih" value="">
					<input type="hidden" size="5" id="id_soal" value="">
					<div id="blok_play" class="hideit">
						<table border=1 class='table table-bordered'>
							<tr class="trhead">
								<td colspan="2">
									<div class="row">
										<div class="col-md-3">Rows: <span id="show_rows_point"></span></div>
										<div class="col-md-6">by: <span id="soal_creator"></span></div>
										<div class="col-md-3">Level: <span id="level_soal"></span></div>
									</div>
								</td>
							</tr>
							<tr class="trsoal">
								<td colspan=2 id="show_kalimat_soal">Kalimat Soal: ...</td>
							</tr>
							<tr class="tropsi_pg tropsi" id="tropsi_pg__A">
								<td class="tdopsil">a</td>
								<td class="tdopsir" id="show_opsi_pg1">Opsi A: ...</td>
							</tr>
							<tr class="tropsi_pg tropsi" id="tropsi_pg__B">
								<td class="tdopsil">b</td>
								<td class="tdopsir" id="show_opsi_pg2">Opsi B: ...</td>
							</tr>
							<tr class="tropsi_pg tropsi" id="tropsi_pg__C">
								<td class="tdopsil">c</td>
								<td class="tdopsir" id="show_opsi_pg3">Opsi C: ...</td>
							</tr>
							<tr class="tropsi_pg tropsi" id="tropsi_pg__D">
								<td class="tdopsil">d</td>
								<td class="tdopsir" id="show_opsi_pg4">Opsi D: ...</td>
							</tr>
							<tr class="tropsi_pg tropsi" id="tropsi_pg__E">
								<td class="tdopsil">e</td>
								<td class="tdopsir" id="show_opsi_pg5">Opsi E: ...</td>
							</tr>
							<tr class="tropsi_tf tropsi" id="tropsi__tf">
								<td class="tdopsir" colspan="2">
									<select class="form-control" id="input_jawaban_tf">
										<option value="1">Benar</option>
										<option value="0">Salah</option>
									</select>
								</td>
							</tr>
							<tr class="tropsi_isian tropsi" id="tropsi__isian">
								<td class="tdopsir" colspan="2">
									<input type="text" class="form-control" id="input_jawaban_isian">
								</td>
							</tr>
							<tr class="trhead">
								<td colspan="2" class="tdcenter"><span id="sisa_waktu" style="font-size: 50px">0</span></td>
							</tr>
							<tr class="trhead">
								<td colspan="2">
									<button class="btn btn-primary btn-block" id="btn_submit_jawaban" disabled>Submit Jawaban</button>
								</td>
							</tr>
							<tr class="trhead">
								<td colspan="2">
									<div class="row">
										<div class="col-sm-6" style="margin-bottom: 8px ">
											<button class="btn btn-warning btn-block">Skip Soal</button>
										</div>
										<div class="col-sm-6">
											<button class="btn btn-danger btn-block">Reject Soal</button>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>








					<!-- =================================================== -->
					<!-- HASIL KUIS -->
					<!-- =================================================== -->
					<div id="blok_hasil_kuis" class="hideit">
						<table border=1 class='table table-bordered'>
							<tr class="trhead">
								<td colspan="2">
									Hasil Kuis
								</td>
							</tr>
							<tr class="trsoal">
								<td colspan=2 class="tdcenter">
									<h1 id="show_hasil_kuis">Anda Benar/Salah !!</h1>
								</td>
							</tr>
							<tr class="trhead">
								<td colspan="2">
									<span id="hasil_kuis_show_soal"></span>
									<hr>
									<table width="100%">
										<tr>
											<td width="50%">
												Kamu menjawab: <span id="hasil_kuis_jawaban_terpilih">C</span>
											</td>
											<td width="50%">
												Jawaban benar: <span id="hasil_kuis_jawaban_db">D</span>
											</td>
										</tr>
										<tr>
											<td>Your Points: <span id="show_player_point">-</span> LP</td>
											<td>Creator Points: <span id="show_creator_point">-</span> LP</td>
										</tr>
										<tr>
											<td>Your Room Point: <span id="show_new_room_player_point">-</span> LP</td>
											<td>Your Global Point: <span id="show_new_my_point">-</span> LP</td>
										</tr>
									</table>


								</td>
							</tr>
							<tr class="trhead">
								<td colspan="2">
									<div class="row">
										<div class="col-sm-6" style="margin-bottom: 8px ">
											<button class="btn btn-success btn-block" id="btn_accept_point">Accept Points</button>
										</div>
										<div class="col-sm-6">
											<button class="btn btn-danger btn-block" id="btn_laporkan_soal">Laporkan Soal</button>
										</div>
									</div>
								</td>
							</tr>

						</table>
					</div>











					<!-- =================================================== -->
					<!-- LAPORKAN SOAL -->
					<!-- =================================================== -->
					<div id="blok_laporkan_soal" class="hideit">
						<table border=1 class='table table-bordered'>
							<tr class="trhead">
								<td colspan="2">
									<h4>Laporkan Soal</h4>
									<p style="color: #322"><small>Soal ini akan segera di banned, dan seluruh point pada soal ini akan dialihkan dari pembuat soal kepada pelapor jika sudah terverifikasi GM sebagai "<i>bad question</i>".</small></p>
									<label><input type="radio" class="lapor_soal_alasan" name="alasan" id="alasan__1" checked=""> Jawaban Salah Posisi</label><br>
									<label><input type="radio" class="lapor_soal_alasan" name="alasan" id="alasan__2"> Jawaban Ganda</label><br>
									<label><input type="radio" class="lapor_soal_alasan" name="alasan" id="alasan__3"> Tidak ada Jawaban</label><br>
									<label><input type="radio" class="lapor_soal_alasan" name="alasan" id="alasan__4"> Alasan Lainnya</label><br>
									<input type="text" id="lapor_soal_alasan_lainnya" class="form-control" disabled="">
									<div class="row" style="margin-top: 15px">
										<div class="col-sm-6" style="margin-bottom: 8px ">
											<button class="btn btn-success btn-block">Cancel</button>
										</div>
										<div class="col-sm-6">
											<button class="btn btn-danger btn-block">Laporkan !!</button>
										</div>
									</div>

								</td>
							</tr>
						</table>
					</div>










				</div>
				<div class="col-md-3">&nbsp;</div>
			</div>

		</div>
</section>








<script type="text/javascript">
	$(document).ready(function() {

		$("#btn_ready_play").click(function() {

			// NORMALIZE FORM
			$("#jawaban_terpilih").val("-");
			$(".tropsi_pg").prop("style", "background-color:#ddffff")

			// GET LIST SOAL AND RANDOMIZE IT
			var nickname = $("#nickname").val();
			var unplayed_questions = parseInt($("#unplayed_questions").val());
			var list_unplayed_questions = $("#list_unplayed_questions").val();
			var arr_unplayed_questions = list_unplayed_questions.split(",");
			var id_soal = arr_unplayed_questions[0];
			var new_list = list_unplayed_questions.replace(id_soal + ",", "");

			unplayed_questions--;

			if (unplayed_questions < 1) {
				$("#btn_ready_play").prop("disabled", true);
				$("#btn_ready_play_ket").show();
				$("#pengantar_soal_habis").show();
				$("#pengantar_soal_available").hide();
			} else {
				$("#pengantar_soal_habis").hide();
				$("#pengantar_soal_available").show();
			}

			$("#unplayed_questions").text(unplayed_questions);
			$("#list_unplayed_questions").val(new_list);
			$("#id_soal").val(id_soal);


			// ===================================================
			// FILL FORM SOAL
			// ===================================================
			var link_ajax = "ajax/ajax_get_data_soal.php?id_soal=" + id_soal + "&nickname=" + nickname;

			$.ajax({
				url: link_ajax,
				success: function(a) {
					// alert(a)
					var r = a.split("_,_");

					var is_ok = r[0];
					if (is_ok != "1") {
						alert("Error; ajax result: " + a);
						return;
					}

					var soal_creator = r[1];
					var tipe_soal = r[2];
					var level_soal = r[3];
					var show_kalimat_soal = r[4];

					var show_opsi_pg1 = r[5];
					var show_opsi_pg2 = r[6];
					var show_opsi_pg3 = r[7];
					var show_opsi_pg4 = r[8];
					var show_opsi_pg5 = r[9];

					var benar_count = r[10];
					var salah_count = r[11];
					var verified = r[12];
					var earned_point = r[13];
					var gm_point = r[14];
					var gm_comment = r[15];
					var count_reject = r[16];
					var count_report = r[17];
					var last_answered = r[18];
					var durasi_jawab = r[19];

					$("#soal_creator").text(soal_creator);
					$("#level_soal").text(parseInt(level_soal));

					$("#show_kalimat_soal").text(show_kalimat_soal);
					$("#show_opsi_pg1").text(show_opsi_pg1);
					$("#show_opsi_pg2").text(show_opsi_pg2);
					$("#show_opsi_pg3").text(show_opsi_pg3);
					$("#show_opsi_pg4").text(show_opsi_pg4);
					$("#show_opsi_pg5").text(show_opsi_pg5);
					$("#sisa_waktu").text(durasi_jawab);

					$("#hasil_kuis_show_soal").html(show_kalimat_soal +
						"<br><span style='padding-left:15px;'>a. " + show_opsi_pg1 + "</span>" +
						"<br><span style='padding-left:15px;'>b. " + show_opsi_pg2 + "</span>" +
						"<br><span style='padding-left:15px;'>c. " + show_opsi_pg3 + "</span>" +
						"<br><span style='padding-left:15px;'>d. " + show_opsi_pg4 + "</span>" +
						"<br><span style='padding-left:15px;'>e. " + show_opsi_pg5 + "</span>"
					);

					// ===================================================
					// SWITCH TIPE SOAL
					// ===================================================
					$(".tropsi").hide();
					switch (tipe_soal) {
						case "1":
							$(".tropsi_pg").show();
							break;
						case "2":
							$(".tropsi_tf").show();
							break;
						case "3":
							$(".tropsi_isian").show();
							break;
					}


					var x = setInterval(function() {
						var sisa_waktu = parseInt($("#sisa_waktu").text());
						if (sisa_waktu <= 0) {
							clearInterval(x);
							$("#btn_submit_jawaban").click();
						} else {
							sisa_waktu--;
						}
						$("#sisa_waktu").text(sisa_waktu);
					}, 1000)

				}
			})

			$("#blok_ready_play").hide();
			$("#blok_play").fadeIn();
		})



		$("#btn_submit_jawaban").click(function() {
			var nickname = $("#nickname").val();
			var id_soal = $("#id_soal").val();
			var id_room = $("#id_room").val();
			var jawaban_terpilih = $("#jawaban_terpilih").val();
			var rows_point = $("#rows_point").val();
			var sisa_waktu = $("#sisa_waktu").text();
			$("#sisa_waktu").text(0);

			var link_ajax = "ajax/ajax_submit_jawaban.php" +
				"?id_soal=" + id_soal +
				"&id_room=" + id_room +
				"&jawaban_terpilih=" + jawaban_terpilih +
				"&sisa_waktu=" + sisa_waktu +
				"&rows_point=" + rows_point +
				"&nickname=" + nickname;

			$.ajax({
				url: link_ajax,
				success: function(a) {
					// alert(a);
					var b = a.split(",");
					var is_ok = b[0].trim();
					if (is_ok != "1") {
						alert("Error; b[0]=" + b[0] + " ajax result: " + a);
						return;
					}
					var dijawab_benar = b[1];
					var jawaban_db = b[2];
					var player_point = b[3];
					var creator_point = b[4];
					var rows_point = b[5];
					var new_room_player_point = b[6];
					var new_my_point = b[7];

					if (parseInt(dijawab_benar) == 1) {
						$("#show_hasil_kuis").text("Anda Benar !!");
						$("#show_hasil_kuis").prop("style", "color:blue");
					} else {
						$("#show_hasil_kuis").text("Anda Salah !");
						$("#show_hasil_kuis").prop("style", "color:red");
					}

					$("#hasil_kuis_jawaban_terpilih").text($("#jawaban_terpilih").val());
					$("#hasil_kuis_jawaban_db").text(jawaban_db);

					$("#show_player_point").text(player_point);
					$("#show_creator_point").text(creator_point);
					$("#show_new_room_player_point").text(new_room_player_point);
					$("#show_new_my_point").text(new_my_point);
					$("#rows_point").val(rows_point);

					$("#blok_play").hide();
					$("#blok_hasil_kuis").fadeIn();
				}
			})
		})

		$("#btn_accept_point").click(function() {
			$("#blok_hasil_kuis").hide();
			$("#blok_ready_play").fadeIn();
		})



		$(".tropsi_pg").click(function() {
			var tid = $(this).prop("id");
			var rid = tid.split("__");
			var id = rid[1];
			$("#btn_submit_jawaban").prop("disabled", false);
			$("#jawaban_terpilih").val(id);
			$(".tropsi_pg").prop("style", "background-color:#ddffff")
			$(this).prop("style", "background-color:#aaffaa")
		})

		$("#input_jawaban_tf").change(function() {
			$("#jawaban_terpilih").val($(this).val());
		})
		$("#input_jawaban_isian").keyup(function() {
			$("#jawaban_terpilih").val($(this).val());
		})
	})
</script>