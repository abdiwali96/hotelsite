<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">
</head>

<body class="index">

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

    <div class="head1">The Hotel Group</div>
    <div class="head2">Where Luxury stays</div>

<div class = "bodypart">
  <!-- Form seach -->
    <div class ="form-wrap">

          <form action="result.php" method = "post">
          <label for="SearchTitle">Check now: </label>


          <input type="date" id="startdate" name="startdate"
           value="2020-12-01"
           min="2020-11-30" max="2021-12-30">

          <label for="NoGuests">No. Guests:</label>
          <select id="NoGuests" name="NoGuests">
            <option value="1">1 Guest</option>
            <option value="2">2 Guests</option>
            <option value="3">3 Guests</option>
            <option value="4">4 Guests</option>
          </select>

          <label for="NoNights">No. Nights:</label>
          <select id="NoNights" name="NoNights">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
          </select>

          <input type="submit" name = "submit" value="submit">
         </form>
    </div>



    <!-- Body section -->


</div>




    <!-- Footer Section -->
    <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
 </center></footer>
</body>
</html>
