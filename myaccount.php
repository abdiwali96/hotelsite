<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="Scripts/css/style.css">

</head>

<body class="others">

  <div class="menu">
      <a href="index.php"><img src="images/icons/logowebsitepng.png" style="height:45px;"></a>

      <a href="result.php" style="padding: 14px 16px;">SEARCH</a>

      <a href="report.html" style="padding: 14px 16px;">REPORT</a>

      <?php
          if (isset($_SESSION['UserID'] )) {

            $sql = "SELECT UserID, FirstName, LastName , Password, Email , Gender , City , Address, Postcode , Mobile , GlobalPrivileges FROM users where UserID = '{$_SESSION["UserID"]}' ";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                 $FirstName = $row["FirstName"];
                 $LastName = $row["LastName"];
                 $Email = $row["Email"];
                 $Password = $row["Password"];
                 $Gender = $row["Gender"];
                 $Address = $row["Address"];
                 $City = $row["City"];
                 $Postcode = $row["Postcode"];
                 $Mobile = $row["Mobile"];
                 $GlobalPrivileges = $row["GlobalPrivileges"];

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
      <?php
      if (isset($_SESSION["UserID"])) {
        echo '<div class="column2">
          <div class="card">

            <h3>ACCOUNT TYPE: ';


                  if ($GlobalPrivileges > '0') {
                    echo 'CUSTOMER' ;
                  }else {
                    echo 'STAFF' ;
                  }

            echo '</h3>
            <p>
              <center>
              <table style="width:80%">
                <tr>
                  <td colspan="3"><hr></td>
                </tr>
                  <tr>
                  <td>First Name:</td>
                  <td>'.$FirstName.'</td>
                  <td></td>
                  </tr>
                  <tr>
                  <td>LastName</td>
                  <td>'.$LastName.'</td>
                  </tr>
                  <tr>
                    <td>Gender:</td>
                    <td>'.$Gender.'</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td colspan="3"><hr></td>
                  </tr>

                  <tr>
                    <td>Email:</td>
                    <td>'.$Email.'
                    <div id="editinfo1">
                    <form method = "post" action = "myaccount.php">
                    <input type="text" name="Emailupdate" placeholder="NEW Email Address" required="" autofocus="" />
                    <input type="submit" name ="submit">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit'])) {

                          $Emailupdate = $_POST['Emailupdate'];

                          echo 'New Email:'.$Emailupdate.'' ;
                          $sql = "UPDATE users SET Email='$Emailupdate' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change1() {
                      var b = document.getElementById("editinfo1");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script>
                    </td>
                    <td><input type="image" src="images/icons/edit.png"style=" width:30px;height:30px;"  value="Change" onclick="change1()"></td>
                  </tr>
                  <tr>
                    <td>Password:</td>
                    <td>********
                    <div id="editinfo2">
                    <form method = "post" action = "myaccount.php">
                    <input type="password" name="Passwordupdate" placeholder="NEW password" required="" autofocus="" />
                    <input type="submit" name ="submit2">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit2'])) {

                          $Passwordupdate = $_POST['Passwordupdate'];

                          echo 'New Password: *********' ;
                          $sql = "UPDATE users SET Password='$Passwordupdate' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change2() {
                      var b = document.getElementById("editinfo2");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script>
                    </td>
                    <td><input type="image" src="images/icons/edit.png"style=" width:30px;height:30px;"  value="Change" onclick="change2()"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><hr></td>
                  </tr>

                  <tr>
                    <td>Address:</td>
                    <td>'.$Address.'
                    <div id="editinfo3">
                    <form method = "post" action = "myaccount.php">
                    <input type="text" name="Addressupdate" placeholder="NEW Address" required="" autofocus="" />
                    <input type="submit" name ="submit3">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit3'])) {

                          $Addressupdate = $_POST['Addressupdate'];

                          echo 'New Address:'.$Addressupdate.'' ;
                          $sql = "UPDATE users SET Address='$Addressupdate' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change3() {
                      var b = document.getElementById("editinfo3");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script>

                    </td>
                    <td><input type="image" src="images/icons/edit.png"style=" width:30px;height:30px;"  value="Change" onclick="change3()"></td>
                  </tr>
                  <tr>
                    <td>City:</td>
                    <td>'.$City.'
                    <div id="editinfo4">
                    <form method = "post" action = "myaccount.php">
                    <input type="text" name="Cityupdate" placeholder="NEW City" required="" autofocus="" />
                    <input type="submit" name ="submit4">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit4'])) {

                          $Cityupdate = $_POST['Cityupdate'];

                          echo 'New City:'.$Cityupdate.'' ;
                          $sql = "UPDATE users SET City='$Cityupdate' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change4() {
                      var b = document.getElementById("editinfo4");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script>

                    </td>
                    <td><input type="image" src="images/icons/edit.png"style=" width:30px;height:30px;"  value="Change" onclick="change4()"></td>
                  </tr>
                  <tr>
                    <td>Postcode:</td>
                    <td>'.$Postcode.'
                    <div id="editinfo5">
                    <form method = "post" action = "myaccount.php">
                    <input type="text" name="Postcodeupdate" placeholder="NEW Postcode" required="" autofocus="" />
                    <input type="submit" name ="submit5">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit5'])) {

                          $Postcodeupdate = $_POST['Postcodeupdate'];

                          echo 'New Postcode:'.$Postcode.'' ;
                          $sql = "UPDATE users SET Postcode='$Postcode' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change5() {
                      var b = document.getElementById("editinfo5");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script>
                    </td>
                    <td><input type="image" src="images/icons/edit.png"style=" width:30px;height:30px;"  value="Change" onclick="change5()"></td>
                  </tr>
                  <tr>
                    <td>Mobile:</td>
                    <td>'.$Mobile.'
                    <div id="editinfo6">
                    <form method = "post" action = "myaccount.php">
                    <input type="text" name="Mobileupdate" placeholder="NEW Mobile" required="" autofocus="" />
                    <input type="submit" name ="submit6">
                    </form>
                    </div>
                    ';
                        if(isset($_POST['submit6'])) {

                          $Mobileupdate = $_POST['Mobileupdate'];

                          echo 'New Mobile:'.$Mobileupdate.'' ;
                          $sql = "UPDATE users SET Mobile='$Mobileupdate' WHERE UserID='{$_SESSION["UserID"]}'";


                          if (mysqli_query($con, $sql)) {
                            echo ' - Please refresh page' ;
                            } else {
                              echo "Error updating record: " . mysqli_error($con);
                            }
                        }



                    echo '
                    <script>function change6() {
                      var b = document.getElementById("editinfo6");
                      if (b.style.display === "none") {
                        b.style.display = "block";
                      } else {
                        b.style.display = "none";
                      }
                    } </script></td>
                    <td><input type="image" src="images/icons/edit.png"style=" wsidth:30px;height:30px;"  value="Change" onclick="change6()"></td>
                  </tr>
                  </table>
                </center>
                  <br>
            </p>
            <p><input type="button" class="button1" value="Refresh Page" onClick="location.href=location.href"></p>
          </div>
        </div>
        ';
        if ($GlobalPrivileges > '0') {

        echo '
        <div class="column2">
          <div class="card">

            <h3>MY BOOKINGS:</h3>
            <p>
            <center>
            <table style="width:80%">
            <tr>
              <td colspan="3"><hr></td>
            </tr>
            ';

            $sql2 = "SELECT TransID, UserID,FirstName,LastName,Roomtype,Numberofguests,CheckIn,Price,NoNights FROM transaction where UserID = '{$_SESSION["UserID"]}' ";
            $result = $con->query($sql2);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {

                $CustomerRoom = $row["Roomtype"];
                $CheckInDate = $row["CheckIn"];
                $NoNightTotal = $row["NoNights"];
                $TotalPrice = $row["Price"];
                $TransID = $row["TransID"];

                    echo '

                      <tr>
                      <td> ';
                      if ($CustomerRoom == 'SINGLE PROFESSIONAL ROOM') {
                        echo '<img src="images/roomselect/single/main-single.jpg"  style="height:75px">';

                      }elseif  ($CustomerRoom == 'QUEEN PREMIUM ROOM') {

                        echo '<img src="images/roomselect/queen/main-queen.jpg"  style="height:75px">';

                      } elseif ($CustomerRoom == 'KING MASTER SUITE'){

                        echo '<img src="images/resultimage.jpg"  style="height:75px">';

                      }else {

                        echo '<img src="images/roomselect/king/main-king.jpeg"  style="height:75px">';

                      }

                    echo '

                      </td>
                      <td><h4>'.$CustomerRoom.'</h4>Check-In: '.$CheckInDate.'<br>Nights: '.$NoNightTotal.'</td>
                      <td><h2>£'.$TotalPrice.'</h2><form method= "post" action = "myaccount.php">

                      <input type="submit" name = "Cancel'; echo $TransID; echo'" value="Cancel" style = "background-color:red; color:white;" >
                      ';
                      if(isset($_POST['Cancel'.$TransID])) {
                        $sql3 = "DELETE FROM transaction WHERE TransID = '$TransID' ";

                          if ($con->query($sql3) === TRUE) {
                          echo "Record deleted successfully";

                          } else {
                          echo "Error deleting record: " . $con->error;
                          }
                      }
                      echo'

                      </form></td>
                      </tr>
                      <tr>
                        <td colspan="3"><hr></td>
                      </tr>



                    ';
              }
            }
            echo '
                </table>
                </center>
            </p>

          </div>
        </div>
        ';
      }else {

        echo '

        <div class="column2">
          <div class="card">

            <h3>STAFF CONTROL: SEARCH</h3>
            <p>
            <center>
            <div class="logincontainer">
            <form action="myaccount.php" method="POST" class="signinform"  >
            <input type="text" name="search" placeholder="Enter Transcation ID" class="form-control">
            <input type="submit" name="submit10" value="Search">
            </div>
            </form>
            ';
            if (isset($_POST['submit10'])) {

            $_SESSION["search_query"] = $_POST["search"];



            echo'
            <table style="width:80%">
            <tr>
              <td colspan="3"><hr></td>
            </tr>
            ';

            $sql5 = "SELECT TransID, UserID,FirstName,LastName,Roomtype,Numberofguests,CheckIn,Price,NoNights FROM transaction  where TransID = '{$_SESSION["search_query"]}' ";
            $result = $con->query($sql5);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $CustomerIDnum = $row["UserID"];
                $CustomerFname = $row["FirstName"];
                $CustomerLname = $row["LastName"];
                $CustomerRoom = $row["Roomtype"];
                $CheckInDate = $row["CheckIn"];
                $NoNightTotal = $row["NoNights"];
                $TotalPrice = $row["Price"];
                $TransID = $row["TransID"];

                    echo '

                      <tr>
                      <td>
                      ';

                        if ($CustomerRoom == 'SINGLE PROFESSIONAL ROOM') {
                          echo '<img src="images/roomselect/single/main-single.jpg"  style="height:75px">';

                        }elseif  ($CustomerRoom == 'QUEEN PREMIUM ROOM') {

                          echo '<img src="images/roomselect/queen/main-queen.jpg"  style="height:75px">';

                        } elseif ($CustomerRoom == 'KING MASTER SUITE'){

                          echo '<img src="images/resultimage.jpg"  style="height:75px">';

                        }else {

                          echo '<img src="images/roomselect/king/main-king.jpeg"  style="height:75px">';

                        }

                      echo '
                      </td>
                      <td><h4>'.$CustomerRoom.'</h4>Transcation No.'.$_SESSION["search_query"].'<br>CustomerID: '.$CustomerIDnum.'<br>Customer Name: '.$CustomerFname.' '.$CustomerLname.'<br>Check-In: '.$CheckInDate.'<br>Nights: '.$NoNightTotal.'</td>
                      <td><h2>£'.$TotalPrice.'</h2>
                      <form action = "delete.php "method = "POST">
                      <input type="hidden" name="searchcode" value="'. $_SESSION["search_query"] .'">
                      <input type="submit" name = "Cancel20" value="Cancel" style = "background-color:red; color:white;" >
                      </form>
                      ';



                      echo'

                      </form></td>
                      </tr>
                      <tr>
                        <td colspan="3"><hr></td>
                      </tr>



                    ';
              }
            } else {
              echo '<h3 style="color:red">NO MATCHING TRANSCATION ID FOUND...PLEASE TRY AGAIN</h3>';
            }

            echo '
                </table>
            ';}
            echo'
                </center>
            </p>

          </div>
        </div>
        ';

      }

      echo '



        ';
      }else {
        echo '<center><h3>ERROR, NEED TO LOGIN IN FIRST!</h3>
      <a href="login.php"><h3 style="color:red">Continue</h3></a>
        </form>
              ';
      }

        ?>






  </div>
</div>









    <!-- Footer Section -->
    <footer><center>MADE BY ABDIWALI ABDI<br> &copy;Copyright
    </center></footer>
</body>
</html>
