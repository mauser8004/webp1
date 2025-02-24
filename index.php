<DOCTYPE html>
<html>
<head>
	<title>WebProgramozás I beadandó </title>
	<link rel="stylesheet" href="css/styles.css">
	<!-- komm -->
<head>
<body>
	<header>
	<nav class=menu>
		<ul>
			<li><a href="https://www.tutorialrepublic.com">Home</a></li>
			<li><a href="https://www.tutorialrepublic.com/about-us.php">About</a></li>
			<li><a href="https://www.tutorialrepublic.com/contact-us.php">Contact</a></li>
		</ul>
	</nav>
	</header>
	<?php include 'templates/index.tpl.php';?>
	<footer>
	<div id="googleMap" style="width:100%;height:400px;"></div>

	<script>
	function myMap() {
	var mapProp= {
	  center:new google.maps.LatLng(51.508742,-0.120850),
	  zoom:5,
	};
	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
	<footer>

</body>
</html>
