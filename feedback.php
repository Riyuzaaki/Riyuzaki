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
<link rel="stylesheet" href="feedbackstyle.css">
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
   <!------------------------------------head--------------------------------------> 
<?php
function setcomments($conn)
{
    if(isset($_POST['commentsubmit']))
    {   $date = $_POST['date'];
        $message = $_POST['message'];
        $name =$_SESSION['u_name'];
        $sql = "INSERT INTO comments(uid, date, message) VALUES('$name','$date','$message');";
        $result = mysqli_query($conn,$sql);
    }
    
}

function getcomments($conn)
{
    $sql = "SELECT * FROM comments;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
  { echo "<div class = 'comment-style-box'>";
    echo "<div class = 'commentusername'>";
    echo "<i class='fa fa-user'></i>  ".$row['uid']."<br>";
    echo "</div>";
    echo "<div class = 'commentdate'>";
    echo $row['date']."<br>";
    echo "</div>";
    echo "<div class = 'commenmessage'>";
    echo nl2br($row['message'])."<br><br>";
    echo "</div>";
    echo "</div>";
    }
}
?>



<div class="outerbox">
    <h1>Feedback</h1>

<?php
 echo "
 <form method='post' action='".setcomments($conn)."'>
<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'> 
<textarea name='message' placeholder='Your Feedback'></textarea><br><br>
<button name='commentsubmit' type='submit'>Submit</button>
</form>";
    
getcomments($conn)
?>
    </div>
<?php
include_once 'footer.php';
?>