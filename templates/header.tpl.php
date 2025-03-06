<header>
<?php include("includes/config.inc.php");?>
<div class="topnav" id="myTopnav">
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
							<?= (($oldal == $keres) ? ' class="active"' : '') ?>
							<a href="<?= ($url == '/') ? '.' : $url ?>">
							<?= $oldal['szoveg'] ?></a>
							
						<?php } ?>
					<?php } ?>

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
