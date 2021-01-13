<!DOCTYPE html>
<html>
<title>personal library</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  body, html {
    height: 100%;
    font-family: "Inconsolata", sans-serif;
  }
  
  .bgimg {
    background-position: center;
    background-size: cover;
    background-image: url("image/banner-3.jpg");
    min-height: 75%;
  }
  
  .menu {
    display: none;
  }
</style>
<!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="#" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="#about" class="w3-button w3-block w3-black">ABOUT</a>
    </div>
    <div class="w3-col s3">
      <a href="#books" class="w3-button w3-block w3-black">BOOKS</a>
    </div>
    <div class="w3-col s3">
      <a href="#where" class="w3-button w3-block w3-black">WHERE</a>
    </div>
  </div>
  <div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</div>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-center w3-padding-large w3-hide-small">
    <span class="w3-tag">Open from 6am to 5pm</span>
  </div>
  <div class="w3-display-middle w3-center">
    <span class="w3-text-white" style="font-size:90px">The<br>Library</span>
  </div>
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">Andorson-road,hathazari,chittagong</span>
  </div>
</header>

<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">

<!-- About Container -->
<div class="w3-container" id="about">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">ABOUT THE Library</span></h5>
    <p>Libraries help the students to develop good reading and study habits. Public officials use libraries for research and public issues. The libraries provide information and services that are essential for learning and progress.</p>
    <p>Libraries play a very healthy role throughout our life. Libraries provide the students very healthy environment for learning as well as making notes or completing an assignment. Library provides a very calm and disciplined atmosphere which helps students to maintain a good concentration on their studies</p>
    <div class="w3-panel w3-leftbar w3-light-grey">
      <p><i>"Acceleration To search discovery to shape a better future."</i></p>
      <p>Today's research, Tomorrow's innovation.</p>
    </div>
    <img src="image/30-Classic-Home-Library-Design-Ideas-17.jpg" style="width:100%;max-width:1000px" class="w3-margin-top">
    <p><strong>Opening hours:</strong> everyday from 6am to 5pm.</p>
    <p><strong>Address:</strong>Andorson-road,hathazari,chittagong.</p>
  </div>
</div>

<!-- books Container -->
<div class="w3-container" id="books">
  <div class="w3-content" style="max-width:700px">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Books</span></h5>
  
    <div class="w3-row w3-center w3-card w3-padding">
      <a href="javascript:void(0)" onclick="openMenu(event, 'latest books');" id="myLink">
        <div class="w3-col s6 tablink">latest books</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'popular books');">
        <div class="w3-col s6 tablink">popular books</div>
      </a>
    </div>

    <div id="latest books" class="w3-container menu w3-padding-48 w3-card">
      <h5>M.s Marks</h5>
      <p class="w3-text-grey">My Dark Vanessa: A Novel $68.9</p><br>
    
      <h5>John adr</h5>
      <p class="w3-text-grey">Transcendent Kingdom: A Novel $78.00</p><br>
    
      <h5>Jonas ball</h5>
      <p class="w3-text-grey">Death in Her Hands: A Novel $97.50</p><br>
    
      <h5>Harry Win</h5>
      <p class="w3-text-grey"> Wow, No Thank You.: Nobel $50.00</p><br>
    
      <h5>Emma Watson</h5>
      <p class="w3-text-grey"> The Death of Vivek Oji: A Novel $18.50</p>
    </div>

    <div id="popular books" class="w3-container menu w3-padding-48 w3-card">
      <h5>Silba Crop</h5>
      <p class="w3-text-grey"> Long Bright River: A Novel $32.50</p><br>
    
      <h5>jampa pee</h5>
      <p class="w3-text-grey"> Darling Rose Gold $24.50</p><br>
    
      <h5>Harry son</h5>
      <p class="w3-text-grey"> Recollections of My Nonexistence: A Memoir $55.00</p><br>
    
      <h5>piter pop</h5>
      <p class="w3-text-grey"> Topics of Conversation: A novel $93.00</p><br>
    
      <h5>siza chy</h5>
      <p class="w3-text-grey"> A Long Petal of the Sea: A Novel $102.50</p>
    </div>  
    <img src="image/library-shades-of-oak-mellow-oak1.jpg" style="width:100%;max-width:1000px;margin-top:32px;">
  </div>
</div>

<!-- Contact/Area Container -->
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">WHERE TO FIND US</span></h5>
    <p>Find us at some address at some place.</p>
    <img src="image/map.jpg" class="w3-image" style="width:100%">
    <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs.</p>
    <p><strong>Reserve</strong>  books, ask for today's special or just send us a message:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many books" required name="books"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-black" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Personal library.All Rights Reserved</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-dark-grey";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
