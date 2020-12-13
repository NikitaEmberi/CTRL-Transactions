<?php
    $con = mysqli_connect("localhost", "root", "Nikita@123", "banking_system")
    //$con = mysqli_connect("epiz_27040946_exp_manager", "epiz_27040946", "niki_3003", "epiz_27040946_exp_manager")
    or die(mysqli_error($con));
    if(!isset($_SESSION)){
      session_start();
    }
?>