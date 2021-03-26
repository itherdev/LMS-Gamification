<section id="tambah_room" class="gm">
	<div class="container">

		<h3>Tambah Room</h3>

		<div class="row">
		  <div class="col-md-6">
		    <form method="post">

		    	<input type="hidden" class="form-control" name="id_room" id="id_room" value="21">
		    	<input type="hidden" class="form-control" name="microtime" id="microtime" value="abi_201225045956">

		      <div class="form-group">
		        <label>Prodi</label>
		        <select class="form-control">
		        	<option value="0">--Pilih--</option>
		        	<option>Teknik Informatika</option>
		        	<option>Rekayasa Perangkat Lunak</option>
		        	<option>Desain Komunikasi Visual</option>
		        </select>
		      </div>

		      <div class="form-group">
		        <label>Room Name / Nama MK</label>
		        <input type="text" class="form-control" name="" id="" required>
		      </div>

		      <div class="form-group">
		        <label>Deskripsi MK</label>
		        <textarea class="form-control" rows="5" name="soal" id="soal" required style="color: #3d3"></textarea>
		        <small id="ket_kalimat_soal" style="color: red; display: none "><b>Perhatian !!</b> Submit soal asal-asalan hanya akan memberikan point negatif. <br>Point tambahan/point negatif akan ditambahkan setelah diverifikasi oleh dosen.</small>
		      </div>

		      <div class="form-group">
		        <label>Goal UTS</label>
		        <input type="text" class="form-control" name="" id="" required>
		      </div>

		      <div class="form-group">
		        <label>Goal UAS</label>
		        <input type="text" class="form-control" name="" id="" required>
		      </div>

		      <div class="form-group">
		        <label>Berlaku Tanggal ... s.d ...</label>
		        <div class="row">
		        	<div class="col-md-6">
		        		<input type="date" class="form-control" name="" id="" required style="margin-bottom: 8px">
		        	</div>
		        	<div class="col-md-6">
		        		<input type="date" class="form-control" name="" id="" required>
		        	</div>
		        </div>
		      </div>

		      <div class="form-group">
		        <label>Sub Materi / Pertemuan Ke</label>
		        <div class="row">
		        	<div class="col-md-10">
		        		<input type="text" class="form-control" name="" id="" required>
		        	</div>
		        	<div class="col-md-2">
		        		<button class="btn btn-primary btn-block">+</button>
		        	</div>
		        </div>
		        <div class="roaw" class="table-bordered">
		        	<table class="table table-bordered table-hover table-striped" style="margin-top: 8px">
		        		<?php for ($i=1; $i < 5; $i++) { ?>
		        		<tr>
		        			<td style="text-align: center">
		        				<?=$i?>
		        			</td>
		        			<td>
		        				Definisi Sistem Operasi
		        			</td>	
		        			<td style="text-align: right;">
		        				<button class="btn-danger btn-sm" style="padding: 0px 6px 0px 6px">Delete</button>
		        			</td>
		        		</tr>
		        		<?php } ?>
		        	</table>

		        </div>
		      </div>

		      <div class="form-group">
		        <button class="btn btn-primary btn-block" name="btn_simpan_soal" id="btn_simpan_soal" disabled="">Simpan Room</button>

		      </div>

		    </form>


		  </div>

		</div>

	</div>
</section>