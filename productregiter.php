<?php
include_once 'header.php';
?>

<div>
<div class="container">
<h1>Product Registration</h1><br>
    <?php
 if ( $_SESSION['regstat'] == 1)
 { echo "<h3>Product Registered Sucessfully <i class='fa fa-check-circle-o fa-1x'></i></h3>";
   $_SESSION['regstat'] = 0;
 }
?> 
<form method="post" action="pdrgdata.php">
<input type="text" name="Productname" placeholder="Product Name"><br><br>
<input class="con" type="text" name="Modelnumber" placeholder="Model Number"><br><br>
<select name="type">
<option value="DSLR">DSLR</option>
<option value="Bike">Bike</option>
<option value="Car">Car</option>
<option value="Shoe">Shoe</option>
</select>
<br><br>
<input type="text" name="Yearofpur" placeholder="Year of purchase"><br><br>
<select name="Warranty">
<option value='1'>Under Warranty</option>
<option value='0'>Out of Warranty</option>
</select><br><br>
<input type="text" name="Costperday" placeholder="Cost for 24hrs"><br><br>
<input type="text" name="Maximumdayvalid" placeholder="Maximum Day valid"><br><br>
<textarea name='description' placeholder='Description'></textarea><br><br>
<button type="submit" name="prdregsubmit">Register</button>
</form>
</div>
</div>
<?php
include_once 'footer.php';
?>