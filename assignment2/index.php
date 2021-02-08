
<?php

include_once 'navbar.php'

?>

<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">
      <img src="images/logo.png"> 
    </div>
    <div class="Welcometext">
      Singh Oil Company
    </div>
    <img src="images/fuel3.png" style="width:100%">
    <div class="text"></div>
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext"><img src="images/logo.png"> </div>
    <div class="Welcometext">
      Singh Oil Company
    </div>
    <img src="images/fuel4.jpg" style="width:100%">
    <div class="text"></div>
  </div>
  
  <div class="mySlides fade">
    <div class="numbertext"><img src="images/logo.png"> </div>
    <div class="Welcometext">
      Singh Oil Company
    </div>
    <img src="images/fuel5.jpg" style="width:100%">
    <div class="text"></div>
  </div>


  </div>
  <br>

  <div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span> 
  </div>

  <h2>Meet The Team</h2>
  
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="images/bts1.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Kim Taehyung</h2>
          <p class="title">CEO &amp; Founder</p>
          <p>I love cats.</p>
          <p>PleaseGiveUsAnA@gmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="images/img2.jpg" alt="Mike" style="width:100%">
        <div class="container">
          <h2>Lee Chul San</h2>
          <p class="title">CFO &amp; Founder</p>
          <p>Funniest person you'll meet</p>
          <p>rajsinghisthebest@gmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="images/img3.jpg" alt="John" style="width:100%">
        <div class="container">
          <h2>Nam Do San</h2>
          <p class="title">CTO &amp; Founder</p>
          <p>Youngest Math Olympiad Gold Medalist</p>
          <p>samsantech@gmail.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  </div>


<script>
    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    function profileClick()
    {
      console.log(5 + 6);
    }
</script>
<script src="js/slideshow.js"></script>

</body>
</html> 
