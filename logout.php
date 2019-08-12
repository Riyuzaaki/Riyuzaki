<?php
  if(isset($_POST['logoutsubmit']))
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?loggedout");
        exit();
    }
?>