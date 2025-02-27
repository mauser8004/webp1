<DOCTYPE html>
<html>
<head>
	<title>WebProgramozás I beadandó </title>
	 <link rel="stylesheet" href="/styles/website.css"> 
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<!-- komm -->
<head>
<body>
	<header>

<div class="topnav" id="myTopnav">
  <a href="" class="active">Főoldal</a>
  <a href="kepek">Képek</a>
  <a href="kapcsolat">Kapcsolat</a>
  <a href="uzenetek">Üzenetek</a>
  <a href="login">Bejelentkezés</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
	</header>

<?php
echo $_SERVER['QUERY_STRING'];
?>
<?php
$oldal = $_SERVER['QUERY_STRING'];
if($oldal=="") include("templates/index.tpl.php");
if($oldal=="kepek") include("templates/pages/gallery.tpl.php");
if($oldal=="kapcsolat") include("templates/pages/conntact.tpl.php");
if($oldal=="uzenetek") include("templates/pages/massages.tpl.php");
if($oldal=="bejelentkezes") include("templates/pages/login.tpl.php");?>
	<footer>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3060.083847739048!2d19.66604207669529!3d46.89513427113335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sNeumann%20J%C3%A1nos%20Egyetem%20GAMF%20M%C5%B1szaki%20%C3%A9s%20Informatikai%20Kar!5e1!3m2!1shu!2shu!4v1740400801110!5m2!1shu!2shu" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</footer>

</body>
</html>
