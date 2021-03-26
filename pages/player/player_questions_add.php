<?php 
$debug_mode = 1; 

$kalimat_soal = "";
$jawaban_pg_benar = "";
$jawaban_isian = "";
$jawaban_pg_salah1 = "";
$jawaban_pg_salah2 = "";
$jawaban_pg_salah3 = "";
$jawaban_pg_salah4 = "";

if ($debug_mode) {
	$kalimat_soal = "Kalimat soal test";
	$jawaban_pg_benar = "Jawaban benar test";
	$jawaban_isian = "Jawaban singkat test";
	$jawaban_pg_salah1 = "Test opsi salah 1";
	$jawaban_pg_salah2 = "Test opsi salah 2";
	$jawaban_pg_salah3 = "Test opsi salah 3";
	$jawaban_pg_salah4 = "Test opsi salah 4";
}
?>












<script type="text/javascript">
	$(document).ready(function(){

		hitung_durasi_jawab();

		function clear_form(){
			$("#kalimat_soal").val("");
			$("#jawaban_pg_benar").val("");
			$("#jawaban_tf").val(1);
			$("#jawaban_isian").val("");
			$("#jawaban_pg_salah1").val("");
			$("#jawaban_pg_salah2").val("");
			$("#jawaban_pg_salah3").val("");
			$("#jawaban_pg_salah4").val("");
		}

		function set_new_id_soal(){
			var d = new Date();
			var e = d.getFullYear().toString().substr(-2);
			var f = ("0" + (d.getMonth()+1).toString()).slice(-2);
			var g = ("0" + d.getDate().toString()).slice(-2);
			var h = ("0" + d.getHours().toString()).slice(-2);
			var i = ("0" + d.getMinutes().toString()).slice(-2);
			var j = ("0" + d.getSeconds().toString()).slice(-2);

			$("#new_id_soal").val($("#nickname").val()+"_"+e+f+g+h+i+j);
		}

		function hitung_durasi_jawab(){
			var durasi_jawab = parseInt($("#durasi_jawab").text());
			var durasi_jawab_by_user = parseInt($("#durasi_jawab_by_user").val());
			var kalimat_soal_len = $("#kalimat_soal").val().length;
			var jawaban_pg_benar_len = $("#jawaban_pg_benar").val().length;
			var jawaban_pg_salah1_len = $("#jawaban_pg_salah1").val().length;
			var jawaban_pg_salah2_len = $("#jawaban_pg_salah2").val().length;
			var jawaban_pg_salah3_len = $("#jawaban_pg_salah3").val().length;
			var jawaban_pg_salah4_len = $("#jawaban_pg_salah4").val().length;
			var durasi_jawab_by_length = 0;

			var input_qadd_len = kalimat_soal_len 
			+ jawaban_pg_benar_len 
			+ jawaban_pg_salah1_len 
			+ jawaban_pg_salah2_len 
			+ jawaban_pg_salah3_len 
			+ jawaban_pg_salah4_len 
			;

			durasi_jawab_by_length = 20 + parseInt(input_qadd_len/5);
			durasi_jawab = durasi_jawab_by_user + durasi_jawab_by_length;

			$("#durasi_jawab_by_length").text(durasi_jawab_by_length);
			$("#durasi_jawab").text(durasi_jawab);
		}

		$("#tipe_soal").change(function(){
			var tipe_soal = $(this).val();
			$(".opsi_pg").hide();
			$(".opsi_isian").hide();
			$(".opsi_tf").hide();
			switch(tipe_soal){
				case "1": $(".opsi_pg").show(); break;
				case "2": $(".opsi_tf").show(); break;
				case "3": $(".opsi_isian").show(); break;
			}
			clear_form();
			hitung_durasi_jawab();

		})

		$("#btn_simpan_soal").click(function(){
			if($("#kalimat_soal").val()=="") {$("#pesan_error").text("Kalimat soal masih kosong.");return;}


			var tipe_soal = $("#tipe_soal").val();

			switch(tipe_soal){
				case "3": //Isian
					if($("#jawaban_isian").val()=="") {$("#pesan_error").text("Jawaban singkat masih kosong.");return;}
					break;
				case "2": //TF nothing todo with answer
					break;
				case "1": //Isian
					if($("#jawaban_pg_benar").val()=="") {$("#pesan_error").text("Jawaban benar masih kosong.");return;}
					if($("#jawaban_pg_salah1").val()=="") {$("#pesan_error").text("Jawaban salah ke-1 masih kosong.");return;}
					if($("#jawaban_pg_salah2").val()=="") {$("#pesan_error").text("Jawaban salah ke-2 masih kosong.");return;}
					if($("#jawaban_pg_salah3").val()=="") {$("#pesan_error").text("Jawaban salah ke-3 masih kosong.");return;}
					if($("#jawaban_pg_salah4").val()=="") {$("#pesan_error").text("Jawaban salah ke-4 masih kosong.");return;}
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

			var link_ajax = "ajax/ajax_save_add_question.php"
			+"?id_room_subjects="+id_room_subjects
			+"&new_id_soal="+new_id_soal
			+"&tipe_soal="+tipe_soal
			+"&kalimat_soal="+kalimat_soal

			+"&jawaban_tf="+jawaban_tf
			+"&jawaban_isian="+jawaban_isian
			+"&jawaban_pg_benar="+jawaban_pg_benar
			+"&jawaban_pg_salah1="+jawaban_pg_salah1
			+"&jawaban_pg_salah2="+jawaban_pg_salah2
			+"&jawaban_pg_salah3="+jawaban_pg_salah3
			+"&jawaban_pg_salah4="+jawaban_pg_salah4
			
			+"&nickname="+nickname
			+"&durasi_jawab="+durasi_jawab
			+"&jumlah_questions="+jumlah_questions
			;

			$.ajax({
				url:link_ajax,
				success:function(b){
					var c = b.split("__");
					var a = c[0];
					var earned_point = c[1];


					if(a=="1"){
						alert("Simpan soal baru berhasil.\n\nSelamat! Point Anda bertambah sebesar "+earned_point+" LP.\n\n Anda dapat input soal lainnya, atau kembali ke My Questions");
						clear_form();
						set_new_id_soal();
						var jumlah_questions = parseInt($("#jumlah_questions").text());
						jumlah_questions++;
						$("#jumlah_questions").text(jumlah_questions);
					}else if(a=="2"){
						alert("Updated berhasil.");
						clear_form();
						// set_new_id_soal();
						$("#player_questions_add").hide();
						$("#player_questions").show();

					}else{
						alert(a);
					}
				}
			})
		})

		$(".input_qadd").keyup(function(){
			$("#pesan_error").text("");

			// HITUNG durasi_jawab
			hitung_durasi_jawab();
		})

		$("#durasi_jawab_by_user").change(function(){
			hitung_durasi_jawab();
		})
	})
</script>











<!-- VIEW BLOCK ==================================================== -->
<section id="player_questions_add" class="player hideit">
	<div class="container">
		<div class="row">
			<div class="col-md-3">&nbsp;</div>
		  <div class="col-md-6">
		  	<h3>Add New Question</h3>
		  	<button class="btn-primary link_header" id="btn_back_to__player_questions" style="font-size: 10pt">Back to My Questions</button>
		  	<br><br>

		  	<div class="form-group">
		  	  <label>Sub-Bab Materi / Pertemuan Ke</label>
		  	  <select class="form-control" id="id_room_subjects">
		  	  	<?=$nama_subjects_options?>
		  	  </select>
		  	</div>

		  	<div class="form-group">
		  	  <label>Tipe Soal</label>
		  	  <select class="form-control" id="tipe_soal" onchange="return confirm('Mengubah Tipe Soal akan membuat Form kembali kosong. Anda Yakin??')">
		  	  	<option value="1">Pilihan Ganda</option>
		  	  	<option value="2">True/False</option>
		  	  	<option value="3">Isian Singkat</option>
		  	  </select>
		  	</div>

		  	<div class="form-group">
		  	  <label>Waktu untuk Menjawab</label><br>
		  	  <select class="input-sm" id="durasi_jawab_by_user">
		  	  	<?php for ($i=0; $i <=12 ; $i++) { $j=$i*5; echo "<option>$j</option>"; } ?>
		  	  </select> detik + <span id="durasi_jawab_by_length">32</span> detik = 
		  	  <span id="durasi_jawab">64</span> detik
		  	</div>

		  	<div class="form-group">
		  	  <label style="color: #3d3">Kalimat soal</label>
		  	  <textarea class="form-control input_qadd" rows="5" id="kalimat_soal" required style="color: #3d3"><?=$kalimat_soal?></textarea>
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
		  	  <input type="text" class="form-control" id="jawaban_isian" required style="color: #3d3" value="<?=$jawaban_isian?>">
		  	  <small>Usahakan hanya 1 kata dan tidak ada spasi atau karakter spesial.</small>
		  	</div>

		  	<div class="form-group opsi_benar opsi_pg">
		  	  <label style="color: #3d3">Jawaban Benar</label>
		  	  <input type="text" class="form-control input_qadd" id="jawaban_pg_benar" required style="color: #3d3;font-weight: bold" value="<?=$jawaban_pg_benar?>">
		  	  <small id="ket_jawaban_pg_benar" style="color: blue; display: none ">
		  	    <b>Perhatian !!</b> Pertanyaan dan jawaban harus benar. 
		  	    <br>Jika jawaban ngasal atau jawaban double maka akan memberikan point negatif. 
		  	    <br>Jawaban benar harus disertai 4 jawaban salah.
		  	  </small>
		  	</div>

		  	<div class="form-group opsi_salah opsi_pg">
		  	  <label>Opsi Salah ke-1</label>
		  	  <input type="text" class="form-control input_qadd" name="jawaban_pg_salah1" id="jawaban_pg_salah1" required value="<?=$jawaban_pg_salah1?>">
		  	</div>

		  	<div class="form-group opsi_salah opsi_pg">
		  	  <label>Opsi Salah ke-2</label>
		  	  <input type="text" class="form-control input_qadd" name="jawaban_pg_salah2" id="jawaban_pg_salah2" required value="<?=$jawaban_pg_salah2?>">
		  	</div>

		  	<div class="form-group opsi_salah opsi_pg">
		  	  <label>Opsi Salah ke-3</label>
		  	  <input type="text" class="form-control input_qadd" name="jawaban_pg_salah3" id="jawaban_pg_salah3" required value="<?=$jawaban_pg_salah3?>">
		  	</div>

		  	<div class="form-group opsi_salah opsi_pg">
		  	  <label>Opsi Salah ke-4</label>
		  	  <input type="text" class="form-control input_qadd" name="jawaban_pg_salah4" id="jawaban_pg_salah4" required value="<?=$jawaban_pg_salah4?>">
		  	</div>

		  	<div class="form-group">
		  	  <label>Media Soal Bergambar (Opsional)</label>
		  	  <input type="file" class="form-control" name="media_soal" id="media_soal">
		  	</div>

		  	<div class="form-group">
		  	  <button class="btn btn-primary btn-block tombol" id="btn_simpan_soal">Simpan Soal</button>
		  	  <p style="color: red;font-weight: bold" id="pesan_error"></p>
		  	</div>
		  </div>

		</div>

	</div>
</section>