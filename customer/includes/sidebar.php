<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Back &times;</button>
  <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
  <a href="?sign=out" class="w3-bar-item w3-button">Lagout</a>
</div>
<div id="main">
<div class="sidenav">
  <button id="openNav" class="glyphicon glyphicon-home" onclick="w3_open()">Home</button>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "20%";
  document.getElementById("mySidebar").style.width = "20%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
<?php include "signout.php"; ?>