<script type="text/javascript">
	$(document).ready(function() {

		refresh_list_questions();

		function refresh_list_questions() {

			var nickname = $("#nickname").val();
			link_ajax = "ajax/ajax_list_questions.php?nickname=" + nickname;

			$.ajax({
				url: link_ajax,
				success: function(a) {
					$("#list_questions").html(a);
				}
			})
		}

		$("#btn_refresh_list_question").click(function() {
			refresh_list_questions();
			$("#btn_refresh_list_question").hide();
		})
	});
</script>


<section id="player_questions" class="player hideit">
	<div class="container">
		<div class="row container ">
			<div class="ol-12 col-md-12 col-lg-12">
				<div class="card py-5 px-3">
					<div class="card-body">
						<h3 class="card-title">My Questions </h3>
						<h5><?= $nama_room ?></h5>
						<h5 class="card-subtitle mb-2 text-muted"><small><span id="jumlah_questions"><?= $jumlah_questions ?></span> Questions</small></h5>
						<br>
						<div class="row">
							<div class="col-md-12 py-3">
								<button type="button" class="btn btn-light btn-sm" id="btn_refresh_list_question">Refresh List</button>
								<button type="button" class="btn btn-primary link_header  float-right " id="btnpq__player_questions_add">Add Question</button>
							</div>
							<div class="col-md-12">
								<div id="list_questions">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>



	</div>
</section>