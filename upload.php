<?php
session_start();
include_once 'dbh.php';
$id = $_SESSION['u_id'];
if(isset($_POST['uploadsubmit']))
{
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $filetype =  $_FILES['file']['type'];
    $filetemp =  $_FILES['file']['tmp_name'];
    $fileerror =  $_FILES['file']['error'];
    $filesize =  $_FILES['file']['size'];
    $fileext = explode('.',$filename);
    $fileactualext = strtolower(end($fileext));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileactualext,$allowed))
    { if($fileerror === 0)
        { 
            if($filesize <= 1000000)
            {
              $filenewname = "profile".$id.".".$fileactualext;
                $filedestination = 'images/'.$filenewname;
                move_uploaded_file($filetemp,$filedestination);
                $sql = "UPDATE profileimg SET status=0 WHERE userid='$id';";
                $result = mysqli_query($conn,$sql);
                header("Location: profile.php?uploaded");
            } 
            else
            {
                header("Location: profile.php?filetoobig");
            }
        }
     else
     {
          header("Location: profile.php?erroruploading");
     }
        
    }
    else
    {
        header("Location: profile.php?invalidformat");
    }
   
}
else if(isset($_POST['deletesubmit']))
    {   
    $sessionid = $_SESSION['u_id'];
    $filename = "images/profile".$sessionid."*";
    $fileinfo = glob($filename);
    $fileext = explode(".", $fileinfo[0]);
    $fileactualext = $fileext[1];
    $file = "images/profile".$sessionid.".".$fileactualext;

    if(!unlink($file))
    {
    echo "error";
    } 
    $sql = "UPDATE profileimg SET status=1 WHERE userid='$sessionid';";
    mysqli_query($conn, $sql);
    header("Location: profile.php?profileimgdeleted");

    
    }
else
{
    header("Location: index.php?error");
}

?>