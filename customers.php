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
                <div class="col-sm-6 col-sm-offset-5">
                     <h1>USERS</h1>
                </div>
                <div class="col-sm-10 col-sm-offset-1">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color:teal;">
                                <th>Sr. No.</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Balance (in Rs.)</th>
                                <th>View</th>
                                <th>Action</th>
                                <th>Last Credited</th>
                            </tr>
                        </thead>
                        <?php
                           $sr_no=0;
                           $query="Select * from customers";
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
                              <td><?php echo $row['current_balance']; ?></td>
                              <td><a href="view.php?id=<?php echo $row["id"]; ?>"><button>View</button></a></td>
                              <td>
                                <a data-toggle='modal' data-target='#form'><button type="button">Credit</button></a>              
                                    <div id='form' class='modal fade' role='dialog'>
                                        <div class="modal-dialog modal-lg" role="content">
                                            <div class='modal-header' style="background-color:teal;">
                                                <h3 class='modal-title' id='form'><b>Fill in the Details</b>
                                                <button type='button' class='close' data-dismiss='modal' style="font-size:50px;" aria-label=<span aria-hidden='true'>&times;</span></button></h3>
                                            </div>
                                        </div>
                                        <div class='modal-content col-sm-8 col-sm-offset-2'>
                                            <form action="credit.php?id=<?php echo $row["id"]; ?>" method="POST">
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
                              </td>
                              <td><?php echo $row['last_credited']; ?></td>
                           </tr>
                        </tbody>
                        <?php
                           }
                        ?>
                    </table>
                </div>
             </div>
        </div>
        <br><br><br>

        
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