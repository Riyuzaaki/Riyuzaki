<?php
include_once 'header.php';
include 'remove.php';
?>
    
<section id="services">
    <div class="container">
        <div class="row">
            
     <?php 
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
           
            echo "<div class='col-md-4'>";
                if($row['pdtype']=='DSLR')
                { echo "<div class='imgf'><i class='fa fa-camera fa-5x'></i></div>";}
                else if($row['pdtype']=="Bike")
                { echo "<div class='imgf'><i class='fa fa-motorcycle fa-5x'></i></div>";}
                else if($row['pdtype']=="Car")
                { echo "<div class='imgf'><i class='fa fa-car fa-5x'></i></div>";}
                else
                { echo "<div class='imgf'><i class='fa fa-question fa-5x'></i></div>";}
                
            echo "<h4>".$row['pdname']."</h4>";
             echo "<h6>Model Number: ".$row['modelnum']."</h6>";
             echo "<h6><i class='fa fa-inr'></i> ".$row['pdcost']." perday</h6>";
            echo "<h6>Availabe for maximum ".$row['pdmax']." days</h6>";
            echo "<p>".$row['pddes']."</p>";
            if ( $_SESSION['u_id']== $row['userid'])
             {  $pdid = $row['productid'];
                $_SESSION['uid'] = $row['productid'];
                echo "<form method='post' action='remove.php'> <button type='submit' name='remove'>Remove</button></form></div>"; 
            }
            else
               { echo "<form><button type='submit' name='request'>Request</button></form></div>"; } 
        }
    }
?>
        </div>
        </div>
    </section>
<?php
include_once 'footer.php';
?>

