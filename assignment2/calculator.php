
<?php

include_once 'navbar.php'

?>


<div class="calc">
  <form name="myForm" action="includes/calculator.inc.php" method="post">
    <label for="fname">Gallons Requested:</label>
    <br>
    <input id="id1" type="number" min="0" required="required" name="gallons">
    <br>
    <br>
    

    <label for="Daddress">Delivery Address:</label>
    <br>
    <?php
      require_once 'includes/dbh.inc.php';
      require_once 'includes/functions.inc.php';
      $address= getAddress($conn, $_SESSION['USERID']);
    ?>
    <input type="text" value="<?php echo $address ?>" class="field left" name="dAddress" readonly>
    <label for="Ddate">Date:</label>
    <br>
    <input type="date" id="deliverydate" name="deliverydate" required="required">
    <br>
    <br>

    <label for="suggsted">Suggested Price: </label>
    <br>
    <input type="number" id="suggested" name="suggestedprice" value="10" readonly>
    <br><br>

    <label for="TAmt">Total Amount Due</label>
    <br>
    <input id="TAmt" type="number" name="TAmtPrice" readonly>
    <br><br>

    <button type="submit" name="calcSubmit">Get Quote</button>

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
