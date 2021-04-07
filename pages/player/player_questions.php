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
			<div class="col-12 col-md-12 col-lg-12">
				<div class="card card-hero">
					<div class="card-header">
						<div class="card-icon">
							<i class="far fa-question-circle"></i>
						</div>
						<h4>My Questions </h4>
						<div class="card-description px-3"><strong><?= $nama_room ?></strong>
							<div class="badge badge-success"><span id="jumlah_questions"><?= $jumlah_questions ?></span> Questions</div>
						</div>
						<div class="row">
							<div class="col-md-12 py-3">

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 py-3">
							<div class="row">
								<div class="col-md-9">

								</div>
								<div class="col-md-3">
									<button type="button" class="badge badge-info" id="btn_refresh_list_question">Refresh List</button>
									<button type="button" class="badge badge-primary link_header  float-right " id="btnpq__player_questions_add">Add Question</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="card-body px-5" id="list_questions">
						</div>
					</div>

				</div>



			</div>
</section>