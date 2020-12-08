<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SignUP</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">
</head>

<body class="others">

  <div class="menu">
      <a href="index.php"><img src="images/icons/logowebsitepng.png" style="height:45px;"></a>

      <a href="result.php" style="padding: 14px 16px;">SEARCH</a>

      <a href="report.html" style="padding: 14px 16px;">REPORT</a>

      <?php
          if (isset($_SESSION['UserID'])) {

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
          <form action="Signup.php" method = "post" class="signinform">
            <h2 class="signinFormHeading">SignUp:</h2>

            <input type="text" id = "FirstName" class="form-control" name="FirstName" placeholder="First Name" required="" autofocus="" />
            <input type="text" id = "LastName" class="form-control" name="LastName" placeholder="Last Name" required="" />

            <select id="Gender"  class="form-control" name="Gender" required="">
              <option value="" disabled selected>Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>

            </select>
            <input type="text" id = "Email" class="form-control" name="Email" placeholder="Email Address" required=""  />
            <input type="password" id = "Password" class="form-control" name="Password" placeholder="Password" required=""/>
            <input type="text" id = "Address" class="form-control" name="Address" placeholder="Address" required="" />
            <input type="text" id = "City" class="form-control" name="City" placeholder="City" required="" />
            <input type="text" id = "Postcode" class="form-control" name="Postcode" placeholder="Postcode" required="" />
            <input type="text" id = "Mobile" class="form-control" name="Mobile" placeholder="Mobile" required="" />
          </p>
            <input type="submit" name = "SignUp" value="SignUp"><a href="login.php"  style="text-decoration: none"> Already have an account? Login here...</a>
            <?php
            include "connection.php";
            if (isset($_POST['SignUp'])) {

              $FirstName = $_POST['FirstName'];
              $LastName  = $_POST['LastName'];
              $Gender  = $_POST['Gender'];
              $Email  = $_POST['Email'];
              $Password  = $_POST['Password'];
              $Address  = $_POST['Address'];
              $City  = $_POST['City'];
              $Postcode  = $_POST['Postcode'];
              $Mobile  = $_POST['Mobile'];
              $GlobalPrivileges  = 1;




              $sql = "INSERT INTO users (FirstName,LastName,Gender,Email,Password,Address,City,Postcode,Mobile,GlobalPrivileges
              ) VALUES ('$FirstName','$LastName','$Gender','$Email','$Password','$Address','$City','$Postcode','$Mobile','$GlobalPrivileges')";


              if ($con->query($sql) === TRUE) {
                echo '<script type="text/JavaScript">
                   alert("THANK YOU! NEW ACCOUNT CREATED!");
                   </script>' ;

              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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
