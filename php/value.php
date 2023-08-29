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


// Create a DateTime object from the date of birth
$birthDate = new DateTime($dob);
// Get the current date
$currentDate = new DateTime();
// Calculate the difference between the current date and the date of birth
$interval = $birthDate->diff($currentDate);
// Get the years from the interval
$age = $interval->y;




// echo "<script>alert('$pic');</script>";

}
else {
    echo "<script>alert('error in email');</script>";
  }
?>