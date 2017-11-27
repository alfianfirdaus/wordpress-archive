<html>
<head>
	<title>Indigo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="assets/style2.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />	
</head>
<body>
<div class="loading">
	<img src="assets/loading-bar.gif" alt="Loading Bar">
</div>	
	
<div class="bg">
	<img src="assets/main-bg-1.jpg" class="satu" alt="Indigo">
	<img src="assets/main-bg-2.jpg" class="dua" alt="Indigo">
	<div class="overlay"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 logo">
			<img src="assets/logo-indigo.png" alt="">
		</div>

		<div class="col-xs-12 col-sm-10 col-sm-offset-1 content">
			<div class="col-xs-12 col-sm-12 opening">
				<h2>Opening Hours</h2>
				<div class="day">
					Monday - Saturday <br>
					6.30 - 10.30 PM <br>
					Sunday Closed
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 contact">
				<h2>Contact</h2>
				<p><span>A.</span> Jl. Pantai Berawa No.7A, Canggu, Kuta Utara, Kabupaten Badung, Bali 80361</p>
				<p><span>T.</span> <a href="tel:+6281998888018">0819-9888-8018</a></p>
			</div>

			<div class="col-xs-12 col-sm-12 socials">
				<h2>Visit Us</h2>
				<a href="#"><img src="assets/ig.svg" alt="Indigo Instagram"></a>
				<a href="#"><img src="assets/fb.svg" alt="Indigo Facebook"></a>
				<br>
				<a href="#">@indigocanggu</a>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	$(window).load(function(){
		setTimeout(function(){
			$('.loading').hide();
		}, 1000);

		var number = 1;
		setInterval(function() {
			if (number == 1)
			{
				$('.satu').hide("slow");
				$('.dua').fadeIn(1000);
				number = 2;
			}
			else
			{
				$('.dua').hide("slow");
				$('.satu').fadeIn(1000);
				number = 1;
			}
		}, 3000);
	})
</script>

</body>
</html>