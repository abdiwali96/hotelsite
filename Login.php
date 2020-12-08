<?php
include "connection.php";
session_start();
?><!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
          <form class="signinform" method = "post" action = "Login.php">
            <h2 class="signinFormHeading">Login:</h2>

            <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
          <p>
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
          </p>
            <input type="submit" name = "Login" value="Login" ><a href="SignUp.php"  style="text-decoration: none"> or create a new account...</a>

            <?php

            if (isset($_POST['Login'])) {

              $Email = $_POST['username'];
              $Password  = $_POST['password'];


              $sql = "SELECT UserID, FirstName, LastName , Password, Email FROM users where Email = '$Email' and Password ='$Password' ";
              $result = $con->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  /*
                  echo $row["FirstName"];
                  echo $row["LastName"];
                  echo $row["Email"];
                  */

                  $_SESSION["UserID"] = $row["UserID"];
                  echo $_SESSION["UserID"] ;

                  echo '<script language="javascript">';
                  echo 'alert("YOU HAVE SUCCESFULLY LOGGED IN")';
                  echo '</script>';

                  header("Location: myaccount.php");

                }
              }else {
                echo "NO MATCH, PLEASE TRY AGAIN";
                session_destroy();
              }

            }else {


            }
             ?>
          </form>
        </div>











        <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
     </center></footer>
</body>
</html>
