<?php
include "connection.php";
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>TITLE</title>
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
    <h2>SINGLE PROFESSIONAL ROOM</h2>
<table style="width:80%">


  <tr>
    <th><div class="section" style="max-width:4000px"><img class="mySlides" src="images/homebg2.jpg" style="width:100%">
    <img class="mySlides" src="images/homebg1.jpg" style="width:100%">
    <img class="mySlides" src="images/homepagewallpaper.jpg" style="width:100%"></div></th>
    <th>test Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore </th>

  </tr>
</table>
<script>
var StartingNum = 0;
SlideshowFunc();
</script>


  </div>



</body>
<footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
</center></footer>
</html>
