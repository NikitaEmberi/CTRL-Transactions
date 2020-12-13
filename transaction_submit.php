<?php
require("includes/common.php");

$id=$_GET['id'];
 
$choose=$_POST['choose'];
$choose=mysqli_real_escape_string($con,$choose);

$amount=$_POST['amount'];
$amount=mysqli_real_escape_string($con,$amount);

$password=$_POST['password'];
$password=mysqli_real_escape_string($con,$password);

$query="SELECT * from customers where name='$choose'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$receiver_id=$row['id'];
$receiver_balance=$row['current_balance'];

$query1="INSERT INTO transfers(sender,receiver,amount,transferred_on) VALUES ('$id','$receiver_id','$amount',CURRENT_TIMESTAMP)";

$query2="SELECT current_balance,account_password from customers where id='$id'";
$result2=mysqli_query($con,$query2) or die(mysqli_error($con));
$row2=mysqli_fetch_array($result2);

$account_password=$row2['account_password'];

$current_balance=$row2['current_balance'];
$updated_balance=$current_balance-$amount;
$increased_balance=$receiver_balance+$amount;

$query3="UPDATE customers set current_balance='$updated_balance' where id='$id'";
$query4="UPDATE customers set current_balance='$increased_balance' where id='$receiver_id'";

if($account_password===$password){
    if(mysqli_query($con,$query1) && mysqli_query($con,$query3) && mysqli_query($con,$query4)){
        echo "<script>alert('Transaction Done Successfully!')</script>";
        echo "(<script>location.href='customers.php'</script>)";
    }else{
        echo "<script>alert('Something went wrong! Please try again later')</script>";
        echo "(<script>location.href='customers.php'</script>)";
    }    
}else{
    echo "<script>alert('Please Enter Correct Password')</script>";
    echo "(<script>location.href='view.php?id=$id'</script>)";
}
?>