<section id="player_scores" class="player hideit">
	<div class="container">

		<div class="card px-5 py-5">
			<div class="alert alert-primary alert-has-icon">
				<div class="alert-icon"></div>
				<div class="alert-body">
					<div class="alert-title">
						<h3>My Score</h3>
					</div>

				</div>
			</div>

			<div class="row ">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<div class="card card-statistic-2">
						<div class="card-icon shadow-light bg-light">
							<img src="assets/img/avatar1.png" alt="" style="width: 70%;">

						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4><?= $nama_room ?></h4>
							</div>
							<div class="card-body">
								<?= $nickname ?>
							</div>
						</div>
						<div class="card-chart">
							<canvas id="balance-chart" height="40"></canvas>
						</div>


					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="card card-statistic-2">
						<div class="card-stats">
							<div class="card-stats-title">Order Statistics -

							</div>
							<div class="card-stats-items">
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $my_point ?> LP</div>
									<div class="card-stats-item-label">Learning Point</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $jumlah_beaten_challenge ?> of <?= $total_challenge ?></div>
									<div class="card-stats-item-label">Beat Challenge</div>
								</div>
								<div class="card-stats-item">
									<div class="card-stats-item-count"><?= $player_rank ?><sup><?= $player_rank_cap ?></sup></span> of <?= $jumlah_player ?> player</div>
									<div class="card-stats-item-label">Rank</div>
								</div>
							</div>
						</div>
						<div class="card-icon shadow-primary bg-primary">
							<i class="fas fa-archive"></i>
						</div>
						<div class="card-wrap">
							<div class="card-header">
								<h4>Badge</h4>
							</div>
							<div class="card-body">
								<?= $nama_badge ?>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
</section>