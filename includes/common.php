<?php
    $con = mysqli_connect("localhost", "root","", "banking_system")
    if(!isset($_SESSION)){
      session_start();
    }
?>
