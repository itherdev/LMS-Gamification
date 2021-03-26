<section id="manage_room" class="gm">
	<div class="container">

		<h3>Manage Peserta Room :: <?=$nama_room?></h3>

		<div class="row">
		  <div class="col-md-6">
		    <form method="post">

		    	

		      <div class="form-group">
		        <label>Jumlah Peserta: 67 players + 3 GM</label>
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

		    </form>


		  </div>

		</div>

	</div>
</section>