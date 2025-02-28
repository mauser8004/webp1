<DOCTYPE html>
<html>
<head>
	<title>WebProgramozás I beadandó </title>
	 <link rel="stylesheet" href="styles/website.css"> 
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<!-- komm -->
<head>
<body>

<?php
echo $_SERVER['QUERY_STRING'];
include("templates/header.tpl.php");
$oldal = $_SERVER['QUERY_STRING'];
if($oldal=="") include("templates/index.tpl.php");
if($oldal=="kepek") include("templates/pages/gallery.tpl.php");
if($oldal=="kapcsolat") include("templates/pages/conntact.tpl.php");
if($oldal=="uzenetek") include("templates/pages/massages.tpl.php");
if($oldal=="login") include("templates/pages/login.tpl.php");
include("templates/footer.tpl.php");?>
</body>
</html>
