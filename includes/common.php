<?php
    $con = mysqli_connect("localhost", "root","", "banking_system") or die(mysqli_error($con));

    if(!isset($_SESSION)){
      session_start();
    }
?>
