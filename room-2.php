<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Room2</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">
    <script src="Scripts/js/javascriptslideshow.js"></script>
</head>

<body class="others">

  <div class="menu">
      <a href="index.php"><img src="images/icons/logowebsitepng.png" style="height:45px;"></a>

      <a href="result.php" style="padding: 14px 16px;">SEARCH</a>

      <a href="report.html" style="padding: 14px 16px;">REPORT</a>

      <?php
          if (isset($_SESSION['UserID'] )) {

            $sql = "SELECT UserID, FirstName, LastName , Password, Email FROM users where UserID = '{$_SESSION["UserID"]}' ";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                 $FirstName = $row["FirstName"];

              }
            }

            echo '<div class="menu-log">
                <a href="myaccount.php" style="padding: 14px 16px;">

              Welcome '.$FirstName.'
              <a href="checkout.php" style="padding: 14px 16px;"><img src="images/icons/basketicon.png" style="width:15px;height:15px;"></a>
              <a href="signout.php" style="padding: 14px 16px;"><img src="images/icons/logouticon.png" style="width:15px;height:15px;"></a>

                </a>
            </div>';


          }else {

            echo '<div class="menu-log">
                      <a href="Login.php" style="padding: 14px 16px;">LOGIN</a>
                  </div>';
          }
       ?>


  </div>

  <div class = "main">


 <div class="row">
   <div class="column2">
     <div class="card">
       <div class="section" style="max-width:4000px"><img class="mySlides" src="images/roomselect/queen/main-queen.jpg" style="width:100%">
       <img class="mySlides" src="images/roomselect/1.jpg" style="width:100%">
       <img class="mySlides" src="images/roomselect/2.jpg" style="width:100%">
       <img class="mySlides" src="images/roomselect/3.jpg" style="width:100%">
       <img class="mySlides" src="images/roomselect/4.jpeg" style="width:100%">
     </div>

       <script>
       var StartingNum = 0;
       SlideshowFunc();
       </script>


     </div>
   </div>


   <div class="column2">
     <div class="card">
   <h3>QUEEN PREMIUM ROOM</h3>
   <h4>
    <p style="text-align: left">
        This is a luxury queen room in the heart of London! Incredible views, Stunning Food and at an affordable price. We have top quality furniture that will not dissapoint! SO WHAT ARE YOU WAITING FOR! <br><br>
     </p>
     <h2 style="color:green">
     <br> FREE WIFI <img src="images/icons/wifi.png" style="height:20px;">
     <br> FREE POOL <img src="images/icons/hot-pool.png" style="height:20px;">
     <br> FREE PARKING <img src="images/icons/parking.png" style="height:20px;">
     <br> FREE GARDEN <img src="images/icons/acacia.png" style="height:20px;">
     <br>
     <br><br><br><br>
   </h2>
   </h4>
 <h3 style="color:blue"> <a href="result.php"  style="text-decoration: none">CLICK HERE TO BOOK NOW!</a></h3>
  </div>
</div>



  </div>
  </div>



  <!-- Footer Section -->
  <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
</center></footer>
</body>
</html>
