<section id="info_uas" class="player hideit">
	<div class="container">

		<div class="alert alert-light">

			<div class="alert alert-primary alert-has-icon">
				<div class="alert-icon"></div>
				<div class="alert-body">
					<div class="alert-title">
						<h3><i class="far fa-lightbulb"></i> Mid Test <strong><?= $nama_room ?></strong></h3>
					</div>
					<p></p>
					<p></p>
					<p>This repeat will take place on <strong>Juni 01, 2021 </strong> </p>
					<button class="badge badge-primary" id="demo"></button>
				</div>
			</div>

			<div class="card-body">
				<h5>Technical do the test</h5>
				<p>1. Learn and understand the content of the material</p>
				<p>2. Download the test questions on the button below</p>
				<p>3. Answer the questions correctly</p>
				<p>4. Send your answers in .pdf format to email: brainy@gmail.com</p>


				<figure>
					<figcaption class="blockquote-footer pt-5">
						<cite title="Source Title">Have a great time doing it</cite>
					</figcaption>
				</figure>
			</div>

			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-2">
					<button class="btn btn-primary disabled">Download Test</button>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<script>
	// Set the date we're counting down to
	var countDownDate = new Date("Jun 1, 2021 15:37:25").getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Display the result in the element with id="demo"
		document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
			minutes + "m " + seconds + "s ";

		// If the count down is finished, write some text
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		}
	}, 1000);
</script>