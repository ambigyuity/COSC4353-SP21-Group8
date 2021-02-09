
<?php

include_once 'navbar.php'

?>

<div class="profile">
    <h3>
        Profile Details
    </h3>
        <?php
            require_once 'includes/dbh.inc.php';
            $result = mysqli_query($conn,"SELECT * FROM profiles where USERID=".$_SESSION['USERID'].";");

            while($row= mysqli_fetch_array($result))
            {

                echo "Full Name: " . $row['FULLNAME'] . "";
                echo "<br>";
                echo "Address 1: " . $row['ADDRESS1'] . "";
                echo "<br>";
                echo "Address 2: " . $row['ADDRESS2'] . "";
                echo "<br>";
                echo "City: " . $row['CITY'] . "";
                echo "<br>";
                echo "State: " . $row['ST'] . "";
                echo "<br>";
                echo "Zip Code: " . $row['ZIP'] . "";
                echo "<br>";
                echo "<br>";
       
            }
            echo "</table>";
        ?>

    <button id="profileButton">Edit Profile</button>
    <form id="profileForm" name="myForm" action="includes/profile.inc.php" method="post">
        <label for="fname">Full name:</label>
        <br>
        <input type="text" id="fname" name="fname" required="required" maxlength="50">
        <br>
        <label for="address1">Address 1:</label>
        <br>
        <input type="text" id="address1" name="address1" required="required"  maxlength="100">
        <br>
        <label for="address2">Address 2 (Optional) :</label>
        <br>
        <input type="text" id="address2" name="address2"  maxlength="100">
        <br>
        <label for="city">City:</label>
        <br>
        <input type="text" id="city" name="city"  maxlength="100" required="required">
        <br>
        <label for="state">State:</label>
        <br>
        <div class="custom">
        <select name="state" id="state" required="required">
            <option value="AL">AL</option>
            <option value="AK">AK</option>
            <option value="AR">AR</option>	
            <option value="AZ">AZ</option>
            <option value="CA">CA</option>
            <option value="CO">CO</option>
            <option value="CT">CT</option>
            <option value="DC">DC</option>
            <option value="DE">DE</option>
            <option value="FL">FL</option>
            <option value="GA">GA</option>
            <option value="HI">HI</option>
            <option value="IA">IA</option>	
            <option value="ID">ID</option>
            <option value="IL">IL</option>
            <option value="IN">IN</option>
            <option value="KS">KS</option>
            <option value="KY">KY</option>
            <option value="LA">LA</option>
            <option value="MA">MA</option>
            <option value="MD">MD</option>
            <option value="ME">ME</option>
            <option value="MI">MI</option>
            <option value="MN">MN</option>
            <option value="MO">MO</option>	
            <option value="MS">MS</option>
            <option value="MT">MT</option>
            <option value="NC">NC</option>	
            <option value="NE">NE</option>
            <option value="NH">NH</option>
            <option value="NJ">NJ</option>
            <option value="NM">NM</option>			
            <option value="NV">NV</option>
            <option value="NY">NY</option>
            <option value="ND">ND</option>
            <option value="OH">OH</option>
            <option value="OK">OK</option>
            <option value="OR">OR</option>
            <option value="PA">PA</option>
            <option value="RI">RI</option>
            <option value="SC">SC</option>
            <option value="SD">SD</option>
            <option value="TN">TN</option>
            <option value="TX">TX</option>
            <option value="UT">UT</option>
            <option value="VT">VT</option>
            <option value="VA">VA</option>
            <option value="WA">WA</option>
            <option value="WI">WI</option>	
            <option value="WV">WV</option>
            <option value="WY">WY</option>
        </select>		
        <br>
        <br>
        <label for="zip">Zip:</label>
        <br>
        <input type="text" id="zip" name="zip"  minlength="5" maxlength="9" required="required">
        <br>
        <button type="submit" name="profilesubmit">Submit</button>
    </form>
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
    
</script>
<script type="text/javascript">
    document.getElementById('profileForm').style.visibility='hidden'
    var theButton = document.getElementById('profileButton');
    
    theButton.onclick = function() { 
        document.getElementById('profileForm').style.visibility='visible';   
    }
    
</script>


</body>
</html> 
