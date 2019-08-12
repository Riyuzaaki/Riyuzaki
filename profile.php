<?php
session_start();
include_once 'dbh.php';
if(!isset($_SESSION['u_id']))
{
    header("Location: index.php");
    exit();  
}
?>
<html>
<head>
<title>Riyuzaki</title>
<link rel="stylesheet" href="profilestyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    
<!------------------------------------head-------------------------------------->
    <section id="header">
    <nav class="navbar navbar-light">
    <div class="heading"><h1><i class="fa fa-bug"></i> Riyuzaki</h1>    </div>
        <div class="searchbar"><form method="post" action="search.php">
            <input type="text" name="search" placeholder="Search">
            <button type="submit" name="searchsubmit"><i class="fa fa-search"></i></button>  
            </form></div>
        <div class="menu">
<ul>
<li><a href="wall.php">Home</a></li>
<li><a href="">Notification</a></li>
<li><a href="">Orders</a></li>
<li><a href="productregiter.php">Products</a></li>
<li><a href="profile.php">Profile</a></li>
<li><a href="feedback.php">Feedback</a></li>
</ul>
</div>
         <div class="userdetail">
        <?php
        echo"<p>";
        echo "<i class='fa fa-user-circle'></i>";
        echo " Hello ".$_SESSION['u_name'];
        echo "</p>";
        echo "<br>";
        echo "<form method='post' action='logout.php'>
        <button type='submit' name='logoutsubmit'>Logout</button>
        </form>";
        ?>
    </div>
</nav>
</section>
<!-------------------------------------profile---------------------------------->
<section id="welcome">
    <div class="container">
        <div class="welcome text-center">
               <section id="about">
                   <div class="container">
                       <div class="row">
                           <div class="col-md-6 text-center">
                                            <?php 
                                                     $id = $_SESSION['u_id'];
                                                     $sqlimg = "SELECT * FROM profileimg WHERE userid='$id'";
                                                        $resultimg = mysqli_query($conn,$sqlimg);
                                                     while($rowimg = mysqli_fetch_assoc($resultimg))
                                                     { 
                                                              if($rowimg['status']==0)
                                                              {
                                                                    $filename = "images/profile".$id."*";
                                                                 $fileinfo = glob($filename);
                                                                    $fileext = explode(".", $fileinfo[0]);
                                                                   $fileactualext = $fileext[1];
                                                                    echo "<img src='images/profile".$id.".". $fileactualext."?".mt_rand()."' width=300px height=300px >";
                                                             }
                                                          else
                                                         {
                                                               echo "  <img src='images/defaultprofilepic.png'>";
                                                         }
                
                                                     }
                                                 
                                             ?>
                             
                                       
                           </div>
                           <div class="col-md-6 text-justify">
                               <?php
                               echo "<h1>".$_SESSION['u_name']."</h1>";
                               echo "<p> ".$_SESSION['u_first']." ". $_SESSION['u_last']."</p><br>";
                               echo "<p><i class='fa fa-envelope'></i> ".$_SESSION['u_email']."</p><br>";
                               echo "<p><i class='fa fa-phone'></i> ".$_SESSION['mobileno']."</p>";
                               ?>
                             <p>Edit Profile Pic</p>
                                <form action='upload.php' method='post' enctype='multipart/form-data'>
                                            <input type='file' name='file' placeholder="upload">
                                            <button type='submit' name='uploadsubmit'>Upload/Update</button>
                                             <button type='submit' name='deletesubmit'>Delete</button>
                                </form>
                                    
                           </div>
                       </div>
                   </div>
            </section> 
        </div>
        </div>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
 <!-------------------------------------profile---------------------------------->   
</body>
</html>