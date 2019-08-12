<?php
session_start();

if(isset($_POST['loginsubmit']))
{
    include 'dbh.php';
    $uid = mysqli_real_escape_string($conn,$_POST['username']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);

    //error handler
 if(empty($uid) || empty($pwd))
    {
        header("Location: login.php?login=empty");
        exit(); 
    }else
    {
        $sql = "SELECT * FROM users WHERE username='$uid' OR useremail='$uid';";
        $result = mysqli_query($conn,$sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck<1)
        {
             header("Location: login.php?login=invalidusername");
            exit(); 
        }
        else{
            if($row = mysqli_fetch_assoc($result))
            {   ///dehashing the password
                $hashedpwd = password_verify($pwd,$row['userpwd']);
                if($hashedpwd == false)
                {
                      header("Location: login.php?login=invalidpwd");
                        exit();
                } else if($hashedpwd == true)
                {
                    //loged in 
                    $_SESSION['u_id']= $row['userid'];
                    $_SESSION['u_first']= $row['userfirst'];
                    $_SESSION['u_last']= $row['userlast'];
                    $_SESSION['u_email']= $row['useremail'];
                    $_SESSION['u_name']= $row['username'];
                    $_SESSION['mobileno']= $row['mobileno'];
                     $_SESSION['regstat'] = 0;
                    header("Location: wall.php?login=sucess");
                    exit(); 
                }
                
            }
        }
    }
}
else
{
    header("Location: index.php?login=error");
    exit();
} 