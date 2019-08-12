
<?php
if(isset($_POST['signupsubmit']))
{
    include_once 'dbh.php';
    
    $first = mysqli_real_escape_string($conn,$_POST['first']);
    $last = mysqli_real_escape_string($conn,$_POST['last']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);

         $sql = "SELECT * FROM users WHERE username='$username'";
         $result = mysqli_query($conn,$sql);
         $resultcheck = mysqli_num_rows($result);
          if($resultcheck>0)
          { header("Location: signup.php?signupo=usertaken");
              exit();
          }
          else
          {
             //hashing the password
              $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
            //INTO DATA BASE
              $sql= "INSERT INTO users( userfirst, userlast, username, useremail, mobileno, userpwd) VALUES ('$first', '$last', '$username', '$email', '$mobile','$hashpwd');";
                $result = mysqli_query($conn,$sql);
              $sql = "SELECT * FROM users WHERE username='$username'";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0)
              {
                  while($row = mysqli_fetch_assoc($result))
                  {
                      $userid = $row['userid'];
                      $sql = "INSERT INTO profileimg (userid,status) VALUES ('$userid',1)";
                      mysqli_query($conn,$sql);
                    }
        
              }
              
              
              header("Location: index.php?signup=sucess");
          }
        
}

else
{
    header("Location: signup.php");
    exit();
}
?>