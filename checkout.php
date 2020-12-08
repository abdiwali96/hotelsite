<?php
include "connection.php";
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
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


<div class="logincontainer">

    <form class="signinform" method = "post" action = "proccess.php">
      <?php
      if (isset($_SESSION["UserID"])) {
        echo'
      <h2 class="cartFormHeading">CART <img src="images/icons/basketicon.png" style="width:30px;"></h2>
                <table style="width:100%">
                ';
                   $_SESSION["Room"] = $_POST['BOOKINGROOM'];
                   echo'
                  <tr>
                    <th rowspan="2"><img src="images/resultimage.jpg"  style="height:80px" ></th>
                    <td><h3>'.$_SESSION["Room"].'</h3></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr></td>
                  </tr>
                  <tr>
                  ';
                  $sql = "SELECT UserID, FirstName, LastName , Password, Email FROM users where UserID = '{$_SESSION["UserID"]}' ";
                  $result = $con->query($sql);

                  if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $_SESSION["FirstName1"] = $row["FirstName"];
                        $_SESSION["LastName1"] = $row["LastName"];

                      }
                    }

                  echo '
                  <td>First Name:</td>
                  <td>'.$_SESSION["FirstName1"].'</td>
                  <td></td>
                  </tr>
                  <tr>
                  <td>LastName</td>
                  <td>'.$_SESSION["LastName1"].'</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr></td>
                  </tr>
                  <tr>
                  <td>Number of Nights: </td>
                  <td>'.$_SESSION["NoNights"].' Nights</td>
                  </tr>
                  <tr>
                  <td>CheckIn Date: </td>
                  <td>'.$_SESSION["startdate"].'</td>
                  </tr>
                  <tr>
                    <td>Number of Guests: </td>
                    <td>X '.$_SESSION["NoGuests"].'</td>
                  </tr>
                  <tr>
                    <td>Cost Per Night: </td>
                    <td>£99.99</td>
                  </tr>
                  <tr>
                    <td colspan="2"><hr></td>
                  </tr>
                  <tr>
                    <td>SUB-TOTAL: </td>
                    <td>£';
                        $Total = 99 * $_SESSION["NoNights"] ;
                        $_SESSION["Totalprice"] = $Total ;
                        echo $_SESSION["Totalprice"] ;

                     echo'</td>
                  </tr>
                </table>





      <br>

        <input type="submit" name = "Checkout" value="Checkout" >

        ';
      }else {
          echo '
                <center><h3>ERROR, NEED TO LOGIN IN FIRST!</h3>
              <a href="login.php"><h3 style="color:red">Continue</h3></a>
                </form>
                ';
        }
        ?>

      </form>






  </div>










  <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
</center></footer>
</body>
</html>
