<?php
require("includes/common.php");

$id=$_GET['id'];

$amount=$_POST['amount'];
$amount=mysqli_real_escape_string($con,$amount);

$password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);

$query="SELECT current_balance,account_password from customers where id='$id'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$account_password=$row['account_password'];
$current_balance=$row['current_balance'];
$updated_balance=$current_balance+$amount;

$query1="UPDATE customers set current_balance='$updated_balance' where id='$id'";
if($account_password===$password){
    if(mysqli_query($con,$query1)){
        echo "<script>alert('Amount Credited Successfully!')</script>";
        echo "(<script>location.href='customers.php'</script>)";
    }else{
        echo "<script>alert('Something went wrong! Please try again later')</script>";
        echo "(<script>location.href='customers.php'</script>)";
    }    
}else{
    echo "<script>alert('Please Enter Correct Password')</script>";
    echo "(<script>location.href='customers.php'</script>)";
}
?>