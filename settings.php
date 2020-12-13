<?php
	require "includes/common.php";
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
<body style="padding-top:100px;">

    <!-- Header -->
    <?php
      include 'includes/header.php';
    ?>
    <!--Header end-->

    <div class="container-fluid panel-margin" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Change Password</h3>
                        </div>
                        <div class="panel-body">
                        <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input type="password" id="old_password" class="form-control" name="old_password" pattern=".{6,}" placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" class="form-control" name="new_password" pattern=".{6,}" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="repnew_password">Confirm New Password</label>
                            <input type="password" id="repnew_password" class="form-control" name="repnew_password" pattern=".{6,}" placeholder="Re-type New Password" required>
                        </div>
                        <div>
                            <input type="checkbox" id="checkbox" onclick="Toggle()" class="text-white border-gray-900 focus:outline-none"><label style="color:teal;">Show Password</label>
                        </div>

                        <div>
                        <b>
                        <?php
                        if(isset($_GET["error"])){
                          echo $_GET['error'];
                        }
                        ?>
                      </b></div>
                      <br>
                        <div class="panel-footer">
                            <button type="submit" name="submit" class="btn btn-block btn-link">Change<a style="text-decoration:none;" href="settings.php"></a></button>
                         </div>
                    </form>
                </div>
                </div>
                </div>
            </div>
        </div>


        <!--Footer-->
        <?php
        include 'includes/footer.php';
        ?>
        <!--Footer end-->

        <script> 
        // Change the type of input to password or text 
            function Toggle() { 
                var temp = document.querySelectorAll(".form-control");
                for(let i=0;i<temp.length;i++) {
                    if (temp[i].type === "password") { 
                        temp[i].type = "text"; 
                    } 
                    else { 
                        temp[i].type = "password"; 
                    } 
                }
            } 
        </script> 

</body>
</html>