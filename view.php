<?php
require("includes/common.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome | Ctrl Transactions</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Font Awesome-->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" type="text/css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/styles.css" rel="stylesheet">
</head>
<body style="padding-top: 70px;">

       <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--Header end-->

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-4">
                     <h1><u>Your Transactions</u></h1>
                     <?php
                        $id=$_GET['id'];
                        $query="SELECT * from customers where id='$id'";
                        $result=mysqli_query($con, $query)or die(mysqli_error($con));
                        $query1="SELECT * FROM `transfers` WHERE (sender=$id or receiver=$id) and transfer_id=(select max(transfer_id) from transfers)";
                        $result1=mysqli_query($con, $query1)or die(mysqli_error($con));
                        $row = mysqli_fetch_array($result);
                        $row1=mysqli_fetch_array($result1);
                        $var1=$row['last_credited'];
                        $var2=$row1['transferred_on'];
                        if($var1>$var2){
                            $last_time=$var1;
                        }else{
                            $last_time=$var2;
                        }
                        $current_time=strftime('%F');
                        $datediff = strtotime($current_time) - strtotime($last_time);
                        $days = abs(floor($datediff/(86400)));

                     ?>
                     <h2>Balance: <span class="fa fa-inr"></span><?php echo $row['current_balance']; ?>.</h2>
                     <h2>Transaction Done: <?php echo $days; ?> Day(s) ago.</h2>
                </div>
                <div class="col-sm-12">
                    <h1 style="color:teal;">Transferred</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color:teal;">
                                <th>Sr. No.</th>
                                <th>Transferred to</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Amount (in Rs.)</th>
                                <th>On</th>
                            </tr>
                        </thead>
                        <?php
                           $id=$_GET['id'];
                           $sr_no=0;
                           $query="SELECT * FROM `transfers` t inner join customers c on t.receiver=c.id where sender='$id'";
                           $result=mysqli_query($con, $query)or die($mysqli_error($con));
                           while ($row = mysqli_fetch_array($result)) {
                               $sr_no++;
                        ?>
                        <tbody>
                           <tr>
                              <td><?php echo $sr_no; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['contact']; ?></td>
                              <td><?php echo $row['amount']; ?></td>
                              <td><?php echo $row['transferred_on']; ?></td>
                           </tr>
                        </tbody>
                        <?php
                           }
                        ?>
                    </table>
                </div>
                <div class="col-sm-12">
                     <hr>
                    <h1 style="color:teal;">Received</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color:teal;">
                                <th>Sr. No.</th>
                                <th>Received From</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Amount (in Rs.)</th>
                                <th>On</th>
                            </tr>
                        </thead>
                        <?php
                           $id=$_GET['id'];
                           $sr_no=0;
                           $query="SELECT * FROM `transfers` t inner join customers c on t.sender=c.id where receiver='$id'";
                           $result=mysqli_query($con, $query)or die($mysqli_error($con));
                           while ($row = mysqli_fetch_array($result)) {
                               $sr_no++;
                        ?>
                        <tbody>
                           <tr>
                              <td><?php echo $sr_no; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['contact']; ?></td>
                              <td><?php echo $row['amount']; ?></td>
                              <td><?php echo $row['transferred_on']; ?></td>
                           </tr>
                        </tbody>
                        <?php
                           }
                        ?>
                    </table>
                    <hr>
                </div>
                <div class="col-sm-6 col-sm-offset-5">
                    <a data-toggle='modal' data-target='#form'><button type="button" class="btn btn-lg">Transfer Money</button></a>              
                    <div id='form' class='modal fade' role='dialog'>
                        <div class="modal-dialog modal-lg" role="content">
                            <div class='modal-header' style="background-color:teal;">
                                <h3 class='modal-title' id='form'><b>Fill in the Details</b>
                                <button type='button' class='close' data-dismiss='modal' style="font-size:50px;" aria-label=<span aria-hidden='true'>&times;</span></button></h3>
                            </div>
                        </div>
                        <div class='modal-content col-sm-8 col-sm-offset-2'>
                            <?php
                                $id=$_GET['id'];
                                $query0="SELECT current_balance from customers where id='$id'";
                                $result0=mysqli_query($con,$query0); 
                                $row0 = mysqli_fetch_array($result0);
                                if($row0['current_balance']>0){
                            ?>
                            <form action="transaction_submit.php?id=<?php echo $id; ?>" method="POST">
                                <label for="amount" style="color:teal; font-size:24px">Transfer To:</label>
                                <div class="form-group">
                                    <?php 
                                        $query="SELECT * FROM `customers` WHERE id not in ('$id')";
                                        $result=mysqli_query($con,$query); 
                                    ?>
                                    <select class="form-control" name="choose" required>
                                    <option value="" disabled selected>Select the User you want to transfer money to:</option>
                                    <?php while($row = mysqli_fetch_array($result)):;?>
                                        <option name="option"><?php echo $row["name"];?></option>
                                    <?php endwhile;?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="amount" style="color:teal; font-size:24px">Enter Amount: </label>
                                    <input type="number" class="form-control" id="amount" name="amount" 
                                    placeholder="Enter Amount (in Rs.)" min="50" max="<?php echo $row0['current_balance']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" style="color:teal; font-size:24px">Enter Your Password: </label>
                                    <input type="password" class="form-control" id="password" name="password" 
                                    placeholder="Enter your account password" required>
                                    <input type="checkbox" id="checkbox" onclick="Toggle()" class="text-white border-gray-900 focus:outline-none"><label style="color:teal;">Show Password</label>
                                </div>
                                <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-block btn-link">TRANSFER<a style="text-decoration:none;" href="transaction_submit.php?id=<?php echo $id; ?>"></a></button>
                                </div>
                            </form>
                            <?php
                                }else{
                            ?>
                            <h3 style='color:teal;'>You have 0 balance amount. Please credit some amount before you do any transaction.</h3>
                            <a data-toggle='modal' data-target='#form1'><button type="button" class="btn btn-lg">Credit</button></a>              
                                    <div id='form1' class='modal fade' role='dialog'>
                                        <div class="modal-dialog modal-lg" role="content">
                                            <div class='modal-header' style="background-color:teal;">
                                                <h3 class='modal-title' id='form1'><b>Fill in the Details</b>
                                                <button type='button' class='close' data-dismiss='modal' style="font-size:50px;" aria-label=<span aria-hidden='true'>&times;</span></button></h3>
                                            </div>
                                        </div>
                                        <div class='modal-content col-sm-8 col-sm-offset-2'>
                                            <form action="credit.php?id=<?php echo $id; ?>" method="POST">
                                                <div class="form-group">
                                                    <label for="amount" style="color:teal; font-size:24px">Enter Amount: </label>
                                                    <input type="number" class="form-control" id="amount" name="amount" 
                                                    placeholder="Enter Amount (in Rs.)" min="50" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" style="color:teal; font-size:24px">Enter Your Password: </label>
                                                    <input type="password" class="form-control" id="password" name="password" 
                                                    placeholder="Enter your account password" required>
                                                    <input type="checkbox" id="checkbox" onclick="Toggle()" class="text-white border-gray-900 focus:outline-none"><label style="color:teal;">Show Password</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn btn-block btn-link">CREDIT<a style="text-decoration:none;" href="credit.php?id=<?php echo $row['id']; ?>"></a></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <br><br><br><br>

        <!--Footer-->
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->
        
<script> 
// Change the type of input to password or text 
    function Toggle() { 
        var temp = document.getElementById("password"); 
        if (temp.type === "password") { 
            temp.type = "text"; 
        } 
        else { 
            temp.type = "password"; 
        } 
    } 
</script> 

</body>
</html>