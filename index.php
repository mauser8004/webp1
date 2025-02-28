<DOCTYPE html>
<html>
<head>
	<title>WebProgramozás I beadandó </title>
	 <link rel="stylesheet" href="styles/website.css"> 
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<!-- komm -->
<head>
<body>
	<header>

<div class="topnav" id="myTopnav">
  <a href="/" class="active">Főoldal</a>
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
if($oldal=="login") include("templates/pages/login.tpl.php");
include("templates/footer.tpl.php");?>
</body>
</html>
