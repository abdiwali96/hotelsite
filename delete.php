<?php
include "connection.php";
session_start();
echo'PROCESS DELETION: ';

if(isset($_POST['Cancel20'])) {
  $_SESSION["admindelete"] = $_POST['searchcode'];
  
  $sql6 = "DELETE FROM transaction WHERE TransID = '{$_SESSION["admindelete"]}' ";

    if ($con->query($sql6) === TRUE) {
    echo "Record deleted successfully";
    header("Location: myaccount.php");

    } else {
    echo "Error deleting record: " . $con->error;
    header("Location: myaccount.php");
    }
}


 ?>
