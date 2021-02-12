
<?php

include_once 'navbar.php'

?>

<div class="history">
    <table border='1'  style="height:100%;width:100%; position: relative; top: 0; bottom: 0; left: 0; right: 0;border:1px solid">
    <tr>
        <td>QUOTEID</td>
        <td>USERID</td>
        <td>Gallons</td>
        <td>Address</td>
        <td>Scheduled Date</td>
        <td>Suggested Price</td>
        <td>Total Cost</td>
    </tr>
    <?php
        require_once 'includes/dbh.inc.php';
        $result = mysqli_query($conn, "SELECT * FROM quotes WHERE USERID=".$_SESSION['USERID'].";");
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['QUOTEID'] . "</td>";
            echo "<td>" . $row['USERID'] . "</td>";
            echo "<td>" . $row['GALLONS'] . "</td>";
            echo "<td>" . $row['ADDRESS1'] . "</td>";
            echo "<td>" . $row['SCHEDDATE'] . "</td>";
            echo "<td>" . $row['SUGGESTED'] . "</td>";
            echo "<td>" . $row['TOTAL'] . "</td>";
            echo "</tr>";
        }

    ?>
    </table>
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
