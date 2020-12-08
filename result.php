<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>RESULTS</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">
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
    <div class ="form-wrap2">
      <center>

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
       </center>
    </div><br>
  <?php
 if (isset($_POST['submit'])) {

   $_SESSION["startdate"] = $_POST['startdate'];
   $_SESSION["NoGuests"]  = $_POST['NoGuests'];
   $_SESSION["NoNights"]  = $_POST['NoNights'];



   echo "<center style=' font-size:20px; border: 1px'> Results for a Room, starting on the :<u style ='color:red;'>" . $_SESSION["startdate"] . "</u> for <u style ='color:red;'>" . $_SESSION["NoNights"] . " nights</u> for <u style ='color:red;'>" . $_SESSION["NoGuests"] . " guests</u></center>";
   echo '
   <br>

   <center>
   <div class ="form-wrap2">
   <form action="checkout.php" method = "post">
   <label for="BOOKINGROOMTitle">BOOK NOW: </label>

   <label for="BOOKINGROOM">ROOM TYPE:</label>
   <select id="BOOKINGROOM" name="BOOKINGROOM">
     <option value="SINGLE PROFESSIONAL ROOM">SINGLE PROFESSIONAL ROOM</option>
     <option value="QUEEN PREMIUM ROOM">QUEEN PREMIUM ROOM</option>
     <option value="KING MASTER SUITE">KING MASTER SUITE</option>
   </select>



   <input type="submit" name = "submit" value="submit">
   </form>
   </div>
   </center>

   ' ;


   }
  ?>
  <br>

 <div class="row">
   <div class="column">
     <div class="card">
       <img src="images/roomselect/single/main-single.jpg" style="max-width:85%; height:200px;">

       <h3>SINGLE PROFESSIONAL ROOM</h3>
       <p>
         <center>
         <table style="width:60%">
           <tr>
             <a href="room-1.php"  style="text-decoration: none">Click here to see more images</a>

           </tr><br>
           <tr>
             <th><img src="images/icons/locationicon.png"  style="width:30px;height:30px;"></th>
             <td>Location: London</td>
           </tr>
           <tr>
             <th><?php


            if (isset($_POST['submit'])) {

                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='SINGLE PROFESSIONAL ROOM'";
                   $result = $con->query($sql);

                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                    $t = $row["AvailableRooms"];


                   }
                 }else {
                     $t = 0 ;
                 }


                  if ($t > 0) {
                      echo'<img src="images/icons/greentickicon.png"  style="width:30px;height:30px;">';

                  } else {
                    echo'<img src="images/icons/redtickicon.png"  style="width:30px;height:30px;">';

                  }
                }
                  ?></th>
             <td>
               <?php
                 if (isset($_POST['submit'])) {
                   echo 'Availability:';
                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='SINGLE PROFESSIONAL ROOM'";
                   $result = $con->query($sql);
                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                      echo ''.$row["AvailableRooms"].'/'.$row["NumberOfRooms"].' Rooms';


                   }
                 }else {
                   echo "NO ROOMS MATCHS";
                 }
           }
             ?>
           </td>
           </tr>


         </table>

       </center>
       </p>
       <p><?php
       if (isset($_POST['submit'])) {
          if ($t > 0) {
             echo '<h3 style="color:green">AVAILABLE</h3>';



         } else {
           echo '<h3 style="color:red">NOT AVAILABLE</h3>';

         }

       }
       ?>


     </p>
     </div>
   </div>

   <div class="column">
     <div class="card">
       <img src="images/roomselect/queen/main-queen.jpg" style="max-width:85%; height:200px;">
       <h3>QUEEN PREMIUM ROOM</h3>
       <p>
         <center>
         <table style="width:60%">
           <tr>
             <a href="room-2.php"  style="text-decoration: none">Click here to see more images</a>

           </tr><br>
           <tr>
             <th><img src="images/icons/locationicon.png"  style="width:30px;height:30px;"></th>
             <td>Location: London</td>
           </tr>
           <tr>
             <th><?php


            if (isset($_POST['submit'])) {

                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='QUEEN PREMIUM ROOM'";
                   $result = $con->query($sql);

                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                    $t = $row["AvailableRooms"];


                   }
                 }else {
                     $t = 0 ;
                 }


                  if ($t > 0) {
                      echo'<img src="images/icons/greentickicon.png"  style="width:30px;height:30px;">';

                  } else {
                    echo'<img src="images/icons/redtickicon.png"  style="width:30px;height:30px;">';

                  }
                }
                  ?></th>
             <td>
               <?php
                 if (isset($_POST['submit'])) {
                   echo 'Availability:';
                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='QUEEN PREMIUM ROOM'";
                   $result = $con->query($sql);
                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                      echo ''.$row["AvailableRooms"].'/'.$row["NumberOfRooms"].' Rooms';


                   }
                 }else {
                   echo "NO ROOMS MATCHS";
                 }
           }
             ?>
           </td>
           </tr>


         </table>

       </center>
       </p>
       <p><?php
       if (isset($_POST['submit'])) {
         if ($t > 0) {
           echo '<h3 style="color:green">AVAILABLE</h3>';






         } else {
           echo '<h3 style="color:red">NOT AVAILABLE</h3>';

         }

       }
       ?>

     </p>
     </div>
   </div>

   <div class="column">
     <div class="card">
       <img src="images/roomselect/king/main-king.jpeg" style="max-width:85%; height:200px;">
       <h3>KING MASTER SUITE</h3>
       <p>
         <center>
         <table style="width:60%">
           <tr>
             <a href="room-3.php"  style="text-decoration: none">Click here to see more images</a>

           </tr><br>
           <tr>
             <th><img src="images/icons/locationicon.png"  style="width:30px;height:30px;"></th>
             <td>Location: London</td>
           </tr>
           <tr>
             <th><?php


            if (isset($_POST['submit'])) {

                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='KING MASTER SUITE'";
                   $result = $con->query($sql);

                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                    $t = $row["AvailableRooms"];


                   }
                 }else {
                     $t = 0 ;
                 }


                  if ($t > 0) {
                      echo'<img src="images/icons/greentickicon.png"  style="width:30px;height:30px;">';

                  } else {
                    echo'<img src="images/icons/redtickicon.png"  style="width:30px;height:30px;">';

                  }
                }
                  ?></th>
             <td>
               <?php
                 if (isset($_POST['submit'])) {
                   echo 'Availability:';
                   $sql = "SELECT ID, roomtype, descrip , NumberOfRooms , AvailableRooms FROM hotels WHERE roomtype ='KING MASTER SUITE'";
                   $result = $con->query($sql);
                   if ($result->num_rows > 0) {
                   while($row = $result->fetch_assoc()) {

                      echo ''.$row["AvailableRooms"].'/'.$row["NumberOfRooms"].' Rooms';


                   }
                 }else {
                   echo "NO ROOMS MATCHS";
                 }
           }
             ?>
           </td>
           </tr>


         </table>

       </center>
       </p>
       <p><?php
       if (isset($_POST['submit'])) {
         if ($t > 0) {
           echo '<h3 style="color:green">AVAILABLE</h3>';



         } else {
           echo '<h3 style="color:red">NOT AVAILABLE</h3>';

         }

       }
       ?>


     </p>

     </div>

   </div>


  </div>
</div>






  <!-- Footer Section -->
  <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
</center></footer>
</body>
</html>
