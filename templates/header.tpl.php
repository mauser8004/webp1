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
