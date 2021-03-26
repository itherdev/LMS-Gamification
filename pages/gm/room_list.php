<section id="room_list" class="gm">
	<div class="container">

		<h3>Room List</h3>

		<div class="row">
		  <div class="col-md-6">


		  		<input type="hidden" class="form-control" name="id_room" id="id_room" value="21">
		  		<input type="hidden" class="form-control" name="microtime" id="microtime" value="abi_201225045956">

		  	  <div class="form-group">
		  	    <label>Prodi</label>
		  	    <select class="form-control">
		  	    	<option value="0">--All--</option>
		  	    	<option>Teknik Informatika</option>
		  	    	<option>Rekayasa Perangkat Lunak</option>
		  	    	<option>Desain Komunikasi Visual</option>
		  	    </select>
		  	  </div>

		  	  <div class="row">
		  	  	<div class="col-sm-6">
		  	  		<div class="form-group">
		  	  		  <label>Kepemilikan</label>
		  	  		  <select class="form-control">
		  	  		  	<option>My Rooms</option>
		  	  		  	<option>Not My Rooms</option>
		  	  		  	<option>All Rooms</option>
		  	  		  </select>
		  	  		</div>
		  	  		
		  	  	</div>
		  	  	<div class="col-sm-6">
		  	  		<div class="form-group">
		  	  		  <label>Room Status</label>
		  	  		  <select class="form-control">
		  	  		  	<option>Active</option>
		  	  		  	<option>Not Active</option>
		  	  		  	<option>All Rooms</option>
		  	  		  </select>
		  	  		</div>
		  	  		
		  	  	</div>
		  	  </div>




		  	  <div class="form-group">
		  	    <div class="" class="table-bordered">
		  	    	<table class="table table-bordered table-hover table-striped" style="margin-top: 8px">
		  	    		<?php 
		  	    		$room = ["Sistem Operasi","Matriks dan Aljabar Linier","Secure Programming","Pemrograman Web"];
		  	    		$room_point = ["123.654","66.432","42.312","31.233","9.804"];
		  	    		for ($i=1; $i < 5; $i++) { 
		  	    		?>
		  	    		<tr>
		  	    			<td style="text-align: center">
		  	    				<?=$i?>
		  	    			</td>
		  	    			<td>
		  	    				<a href="#"><?=$room[$i-1]?></a>
		  	    			</td>	
		  	    			<td style="text-align: right;">
		  	    				<small><?=$room_point[$i-1]?> Point</small>

<!-- 		  	    				<a href="#"><img src="assets/img/icons/edit_small.png" height="20px" style="border: solid 1px #fff;"></a>
		  	    				<a href="#"><img src="assets/img/icons/list_small.png" height="20px" style="border: solid 1px #fff;"></a>
		  	    				<a href="#"><img src="assets/img/icons/delete_small.png" height="20px" style="border: solid 1px #fff;"></a> -->
		  	    			</td>
		  	    		</tr>
		  	    		<?php } ?>
		  	    	</table>

		  	    </div>
		  	  </div>

		  	  <div class="form-group">
		  	    <button class="btn btn-primary btn-block" id="">Tambah Room</button>
		  	  </div>		  
		  	</div>
		</div>
	</div>
</section>