<?php
include "connection.php";
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Process</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">
</head>

<body class="others">

  <div class="menu">
      <a href="index.php"><img src="images/icons/logowebsitepng.png" style="height:45px;"></a>

      <a href="result.php" style="padding: 14px 16px;">SEARCH</a>

      <a href="REPORT.HTML" style="padding: 14px 16px;">REPORT</a>

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


  <?php
  if (isset($_POST['Checkout'])) {


    $sql2 = "INSERT INTO transaction (UserID,FirstName,LastName,Roomtype,Numberofguests,CheckIn,Price,NoNights
    ) VALUES ('{$_SESSION["UserID"]}','{$_SESSION["FirstName1"]}','{$_SESSION["LastName1"]}','{$_SESSION["Room"]}','{$_SESSION["NoGuests"]}','{$_SESSION["startdate"]}','{$_SESSION["Totalprice"]}','{$_SESSION["NoNights"]}')";

    if ($con->query($sql2) === TRUE) {
      echo 'WORKED' ;
      header("Location: myaccount.php");



    } else {
      echo "Error: " . $sql2 . "<br>" . $con->error;
    }
  }

    ?>

</body>
</html>
