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
	<!-- Bootstrap Social Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" type="text/css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/styles.css" rel="stylesheet">
</head>

<body style="padding-top:75px;">

    <!-- Header -->
    <?php
      include 'includes/header.php';
    ?>
    <!--Header end-->

    <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <h2>What is Ct<span class="fa fa-inr"></span>l Transactions?</h2>
              <p>Control Transactions is a multi-user Basic Banking System
                wherein users present in the system can transfer virtual money 
                to each other and also can credit amount into their own account.
                This eases out transaction between multiple users and also they can view 
                their balance, transaction history and how frequent they are with their transactions.
              <br>
              <h2>What is GRIP?</h2>
                The Graduate Rotational Internship Program is an  unique offer for students and
                recent graduates to experience and join TSF. This program aims to enable students to be
                professionally capable, and entrepreneurial. Apart from skill specific tasks, they
                encourage interns to build a credible professional profile.
            <br>
                <h2>What is TSF?</h2>
                The Sparks Foundation is a not-for-profit organization
                registered in India and Singapore and operating globally.
                <a style="color:teal;" target="_blank" href="https://www.thesparksfoundationsingapore.org/"><b>Visit here.</b></a>  
              </p>
           </div>
           <div class="col-sm-6">
               <h2>FLOW :</h2>
               <p>Flow: Home Page > View all Customers > Select and View one Customer >
                Transfer Money > Select customer to transfer to > View all Customers .
               </p>
               <br>
               <h2>Created By: </h2>
               <h4>Nikita Emberi, an intern at Sparks Foundation.</h4>
               <p>
                  <a target="_blank" class="btn btn-social-icon btn-github" href="https://github.com/NikitaEmberi"><i class="fa fa-github"></i></a></button>
                  <a class="btn btn-social-icon btn-linkedin" target="_blank" href="https://www.linkedin.com/in/nikita-emberi-42a651200"><i class="fa fa-linkedin"></i></a>
                  <a target="_blank" href="https://www.instagram.com/nikitaemberi/"><img height=30 width=30 class="icons" src="https://www.flaticon.com/svg/static/icons/svg/1409/1409946.svg"></a>
	       </p>
           </div>
       </div>
    </div>
    <br><br><br>

    <!-- Footer -->
    <?php
      include 'includes/footer.php';
    ?>
    <!--Footer end-->

</body>
</html>
