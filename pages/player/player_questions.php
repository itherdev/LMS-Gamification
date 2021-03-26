<script type="text/javascript">
	$(document).ready(function(){
		
		refresh_list_questions();

		function refresh_list_questions(){
			
			var nickname = $("#nickname").val();
			link_ajax = "ajax/ajax_list_questions.php?nickname="+nickname;

			$.ajax({
				url:link_ajax,
				success:function(a){
					$("#list_questions").html(a);
				}
			})
		}

		$("#btn_refresh_list_question").click(function(){
			refresh_list_questions();
			// $("#btn_refresh_list_question").hide();
		})
	})
</script>


<section id="player_questions" class="player hideit">
	<div class="container">

		<table width="100%">
			<tr>
				<td>
					<h3>My Questions</h3>
					<p>Room: <?=$nama_room?>
					<br><small><span id="jumlah_questions"><?=$jumlah_questions?></span> Questions</small></p>
				</td>
				<td align="right">
					<button class="btn-primary link_header" id="btnpq__player_questions_add" style="font-size: 10pt">Add Question</button>
				</td>
			</tr>
		</table>
		<button style="margin-bottom: 5px" id="btn_refresh_list_question">Refresh List</button>
		<div id="list_questions">
			
		</div>
	</div>
</section>