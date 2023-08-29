<?php
include("config.php");

if ($_SESSION['log']){
$email = $_SESSION['log'];
$sql = "SELECT * FROM reg WHERE email='$email'";
$x = mysqli_query($db, $sql);
$val = mysqli_fetch_assoc($x);
$name  = $val['name'];
$num  = $val['num'];
$dob  = $val['dob'];
$pic = $val['pic'];
}
else {
    echo "<script>alert('error in email');</script>";
  }
?>