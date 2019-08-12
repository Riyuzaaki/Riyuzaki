
<?php
if(isset($_POST['prdregsubmit']))
{
    session_start();
    include_once 'dbh.php';
    
    $userid = $_SESSION['u_id'];
    $Productname = mysqli_real_escape_string($conn,$_POST['Productname']);
    $Modelnumber = mysqli_real_escape_string($conn,$_POST['Modelnumber']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $Yearofpur = mysqli_real_escape_string($conn,$_POST['Yearofpur']);
    $Warranty = mysqli_real_escape_string($conn,$_POST['Warranty']);
    $Costperday = mysqli_real_escape_string($conn,$_POST['Costperday']);
    $Maximumdayvalid = mysqli_real_escape_string($conn,$_POST['Maximumdayvalid']);
    $Description = mysqli_real_escape_string($conn,$_POST['description']);
    $pdstatus = 0;
    
              $sql= "INSERT INTO product(userid, pdname, modelnum, pdtype, pdyop, pdwarranty, pdcost, pdmax, pddes, pdstatus) VALUES ( '$userid', '$Productname', '$Modelnumber', '$type', '$Yearofpur', '$Warranty', '$Costperday', '$Maximumdayvalid', '$Description', '$pdstatus');";
                $result = mysqli_query($conn,$sql);
                $_SESSION['regstat'] = 1;
             header("Location: productregiter.php?register=sucess");
        
}

else
{
    header("Location: productregiter.php");
    exit();
}
?>