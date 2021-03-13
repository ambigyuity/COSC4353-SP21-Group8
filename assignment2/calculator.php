
<?php

include_once 'navbar.php';

?>


<div class="calc">
  <form name="myForm" action="includes/calculator.inc.php" method="post">

  <?php
      require_once 'includes/dbh.inc.php';
      require_once 'includes/functions.inc.php';
      $address= getAddress($conn, $_SESSION['USERID']);
      if(isset($_SESSION['gallons']))
      {
        $defaultGallons=$_SESSION['gallons'];
      }
      else
      {
        $defaultGallons=0;
      }

      if(isset($_SESSION['dDate']))
      {
        $defaultDate=$_SESSION['dDate'];
      }
      else
      {
        $defaultDate=date("Y-m-d");
      }
    ?>
    <label for="fname">Gallons Requested:</label>
    <br>
    <input id="id1" type="number" min="0" required="required" value="<?php echo $defaultGallons ?>" name="gallons">
    <br>
    <br>
    

    <label for="Daddress">Delivery Address:</label>
    <br>
    <input type="text" value="<?php echo $address ?>" class="field left" name="dAddress" readonly>
    <label for="Ddate">Date:</label>
    <br>
    <input type="date" id="deliverydate" name="deliverydate" value="<?php echo $defaultDate ?>" required="required">
    <br>
    <br>

    <?php
      require_once 'includes/dbh.inc.php';
      require_once 'includes/functions.inc.php';
      if(isset($_SESSION['suggestedPrice']))
      {
        $suggestedP=  $_SESSION['suggestedPrice'];
      }
      else
      {
        $suggestedP=  0;
      }

      if(isset($_SESSION['totalPrice']))
      {
        $totalP= $_SESSION['totalPrice'];
      }
      else
      {
        $totalP= 0;
      }
    ?>
    
    <label for="suggsted">Suggested Price: </label>
    <br>
    <input type="number" id="suggested" name="suggestedprice" value="<?php echo $suggestedP ?>" readonly>
    <br><br>

    <label for="TAmt">Total Amount Due</label>
    <br>
    <input id="TAmt" type="number" name="TAmtPrice" value="<?php echo $totalP ?>" readonly>
    <br><br>

    
    <button type="submit" name="getPrices">Get Quote</button>
    <button type="submit" name="calcSubmit">Submit Quote</button>

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
    
    function profileClick()
    {
      console.log(5 + 6);
    }
</script>

</body>
</html> 
