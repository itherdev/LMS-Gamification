<section id="info_absen_online" class="player hideit">
	<div class="container">


		<div class=" card card-body">
			<div class="alert alert-primary">
				<div class="alert-title">Primary</div>
				<h3>Online Presence</h3>

				<!-- AWAL PAGE ===================================== -->


				<div class="row">
					<div class="col-lg-2">
						Course
					</div>
					<div class="col-lg-3">
						<b>: <?= $nama_room ?></b>
					</div>
					<div class="col-lg-2">
						Course schedule
					</div>
					<div class="col-lg-3">
						<b>: <?php
								// Return date/time info of a timestamp; then format the output
								$mydate = getdate(date("U"));
								echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
								?></b>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-2">
						SKS Credit
					</div>
					<div class="col-lg-3">
						<b>: 3 SKS (Theory)</b>
					</div>
					<div class="col-lg-2">
						The time is
					</div>
					<div class="col-lg-3">
						<b> <?php
							echo ": " . date("h:i:sa");
							?></b>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-2">
						Lecturer
					</div>
					<div class="col-lg-3">
						<b>: Iin Sholihin, M.Kom</b>
					</div>
					<div class="col-lg-2">
						Meeting
					</div>
					<div class="col-lg-3">
						<b>: 5</b>
					</div>
				</div>
			</div>

			<br>

			<style type="text/css">
				.border1 {
					border: solid 1px #DC143C
				}

				.jdtabel {
					font-weight: bold;
					text-align: center;
					vertical-align: center;
				}

				.jd-small {
					font-size: 8pt;
					font-family: "Agency FB";
				}

				td {
					padding-top: 3px;
					padding-bottom: 0px;
					padding-left: 6px;
					padding-right: 6px;
					text-align: center;
				}

				.aleft {
					text-align: left;
				}

				.aright {
					text-align: right;
				}
			</style>

			<div class="alert alert-secondary">
				<div class="row">
					<div class="col-lg-12 py-3">
						<table class="table-bordered" width="100%">
							<tbody>
								<tr>
									<td rowspan="3" class="jdtabel">Rank<br>No</td>
									<td rowspan="3" class="jdtabel">Student Name</td>
									<td colspan="8" class="jdtabel">Meeting / Date</td>
									<td rowspan="3" class="jdtabel">Learning<br>Points</td>
								</tr>
								<tr>
									<td class="jdtabel">1</td>
									<td class="jdtabel">2</td>
									<td class="jdtabel">3</td>
									<td class="jdtabel">4</td>
									<td class="jdtabel">5</td>
									<td class="jdtabel">6</td>
									<td class="jdtabel">7</td>
									<td class="jdtabel">Mid Test</td>
								</tr>
								<tr>
									<td class="jdtabel jd-small">5/10</td>
									<td class="jdtabel jd-small">12/10</td>
									<td class="jdtabel jd-small">19/10</td>
									<td class="jdtabel jd-small">26/10</td>
									<td class="jdtabel jd-small">2/11</td>
									<td class="jdtabel jd-small">9/11</td>
									<td class="jdtabel jd-small">16/11</td>
									<td class="jdtabel jd-small">23/11</td>
								</tr>



								<tr>
									<td>1</td>
									<td class="aleft">Taufik Hidayat</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>10207</td>
								</tr>


								<tr>
									<td>2</td>
									<td class="aleft">Muhammad sayyid syafiq</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>4368</td>
								</tr>


								<tr>
									<td>3</td>
									<td class="aleft">Istiharoh</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>1326</td>
								</tr>


								<tr>
									<td>4</td>
									<td class="aleft">Bambang Pamungkas</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>1283</td>
								</tr>


								<tr>
									<td>5</td>
									<td class="aleft">Budi</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>720</td>
								</tr>


								<tr>
									<td>6</td>
									<td class="aleft">Rizky</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>50</td>
								</tr>


								<tr>
									<td>7</td>
									<td class="aleft">Kamal</td>
									<td><i class="fas fa-check-circle"></i></td>
									<td><i class="fas fa-check-circle"></i></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>0</td>
								</tr>


								<tr>
									<td colspan="2" class="aright">Daily login:</td>
									<td>10</td>
									<td>10</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>

							</tbody>
						</table>
					</div>
					</tbody>
					</table>

					<small>&nbsp;)* The attendance value is obtained from logging in, createing question and playying quiz.</small><br>
					<small>&nbsp;)* Learning Pointsare obtained from quiz points, presence and activeness in accessing the Brainy website.</small>

				</div>

				<div class="row">
					<div class="col-lg-9">
						&nbsp;
					</div>
					<div class="col-lg-3">
						<br><?php
							// Return date/time info of a timestamp; then format the output
							$mydate = getdate(date("U"));
							echo "$mydate[month] $mydate[mday], $mydate[year]";
							?><br>
						Lecturer,
						<br><br><br><br>
						<b><u>Iin Sholihin, M.Kom</u></b>
					</div>
				</div>


			</div>



			<!-- AKHIR PAGE ===================================== -->
		</div>
	</div>

	</div>
</section>