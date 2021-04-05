<section id="player_dashboard" class="player dashboard ">
	<div class="container">
		<div class="card px-5 py-5 ">
			<h2>The Best Player Today !!</h2>
			<hr>

			<div class="row">

				<div class="col-lg-6">
					<h4 class="py-3">Your Dashboard</h4>
					<table class="table table-bordered table-hover" style="margin-bottom: 40px">
						<thead bgcolor="pink">
							<th style="text-align: center" colspan=2 height="80px">
								<a href="?p=pl_ldb"> Your Rank </a> :
								<span style="font-size: 28pt;color: blue"><?= $player_rank ?><sup><?= $player_rank_cap ?></sup></span> of <?= $jumlah_player ?> player
							</th>
						</thead>
						<tr>
							<td class="tddas">Learning Point</td>
							<td class="tddas"><?= $my_point ?> LP</td>
						</tr>
						<tr>
							<td class="tddas">Play Count</td>
							<td class="tddas"><?= $play_count ?> plays</td>
						</tr>
						<tr>
							<td class="tddas">Badges</td>
							<td class="tddas"><?= $nama_badge ?></td>
						</tr>
						<tr>
							<td class="tddas">Beat Challenge</td>
							<td class="tddas"><?= $jumlah_beaten_challenge ?> of <?= $total_challenge ?> Challenges</td>
						</tr>
						<tr>
							<td class="tddas">Global Rank</td>
							<td class="tddas"><?= $player_global_rank ?><sup><?= $player_global_rank_cap ?></sup> of <?= $jumlah_player_global ?> Mahasiswa</td>
						</tr>
						<tr>
							<td class="tddas">Last Login</td>
							<td class="tddas"><?= $last_login_day ?> days ago</td>
						</tr>
						<tr>
							<td class="tddas" colspan="2">
								<a href="?p=pl_riseup" class="btn btn-primary btn-block">Rise Up My Rank !!</a>
							</td>
						</tr>
					</table>
				</div>

				<div class="col-lg-6">

					<h4>Your Leaderboard</h4>
					<table class="table table-bordered table-hover" bgcolor="white">
						<thead>
							<th colspan="3" bgcolor="#00ffff" height="80px">
								<center>
									<h4>The Best of <b>
											<font color="brown"><?= $nama_room ?></font>
										</b></h4>
								</center>
							</th>
						</thead>

						<?php
						$img = "<img src='assets/img/icons/medal.png'>";
						$imgs = "";
						$bg = "#fdfdfd";
						$sty = "";
						$stytd = " style='color:blue;font-weight:bold;background-color:yellow;border:solid 3px; width: 20%;' ";
						for ($i = 1; $i <= $jumlah_player; $i++) {
							$sup = "th";
							if ($i == 1) $sup = "st";
							if ($i == 2) $sup = "st";
							if ($i == 3) $sup = "st";

							if ($i == 1) $imgs = "$img $img $img";
							if ($i == 2) $imgs = "$img $img";
							if ($i == 3) $imgs = "$img";
							if ($i > 3) $imgs = "";

							if ($i == 1) $bg = "pink";
							if ($i == 2) $bg = "lightblue";
							if ($i == 3) $bg = "#ccffcc";

							$sty = "";
							if (strtoupper($list_player[$i]) == strtoupper($nama_player)) $sty = $stytd;

							echo "
						<tr bgcolor='$bg' align='center'>
							<td $sty>$i<sup>$sup</sup></td>
							<td $sty>$imgs " . $list_player[$i] . "</td>
							<td $sty>" . $list_point[$i] . "</td>
						</tr>
						";
						}


						?>

						<tr>
							<td class="tdlead" colspan=3>
								<a href='?p=pl_riseup' class='btn btn-primary btn-block'>Rise Up My Rank !!</a>
							</td>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</section>