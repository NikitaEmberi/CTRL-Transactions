<?php
// This page updates the user password
require("includes/common.php");


$old_pass = $_POST['old_password'];
$old_pass = mysqli_real_escape_string($con, $old_pass);

$new_pass = $_POST['new_password'];
$new_pass = mysqli_real_escape_string($con, $new_pass);

$rep_pass = $_POST['repnew_password'];
$rep_pass = mysqli_real_escape_string($con, $rep_pass);

$query = "SELECT account_password FROM customers WHERE account_password ='$old_pass'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);

$orig_pass = $row['account_password'];

//check old password and password taken from db
if ($new_pass != $rep_pass) {
    header('location: settings.php?error=The two passwords don\'t match.');
} else {
    if ($old_pass === $orig_pass) {
        $query1 = "UPDATE  customers SET account_password = '" . $new_pass . "' WHERE account_password = '$old_pass'";
        if(mysqli_query($con, $query1)){
        echo "<script>alert('Password Updated Successfully')</script>";
        echo "<script>location.href='index.php'</script>";
        }else{
            echo "<script>alert('Something went wrong! Please try again')</script>";
        }

    } else{
        echo "<script>alert('Wrong Old Password')</script>";
        echo "<script>location.href='settings.php'</script>";
    }
}
?>