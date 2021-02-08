
<?php

include_once 'navbar.php'

?>

<form class="modal-content animate" action="includes/login.inc.php" method="post">
    
            <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
    
            <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>
    
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw"  minlength="4"required>
                
            <button type="submit" name="LIsubmit">Login</button>
   
            </div>
    
            <div class="container" style="background-color:#f1f1f1">
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
