
<?php

include_once 'navbar.php'

?>

<form class="modal-content" action="includes/signup.inc.php" method="post">
          <div class="container">
              <h1>Sign Up</h1>
              <p>Please fill in this form to create an account.</p>
              <hr>
              <label for="username"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>
      
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw"  minlength="4" required>
      
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" placeholder="Repeat Password" name="psw-repeat"  minlength="4" required>
              
        
      
              <div class="container" style="background-color:white">
              <button type="submit" class="signupbtn" name="submit">Sign Up</button>
              </div>
          </div>
          </form>


<script>
    // Get the modal
    var modal = document.getElementById('id02');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
</script>


</body>
</html> 
