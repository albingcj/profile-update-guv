<?php
// session_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include("config.php");
// include_once "session.php";



if ($_SESSION['loggedin']){
$email = $_SESSION['log'];
$sql = "SELECT * FROM reg WHERE email='$email'";
$x = mysqli_query($db, $sql);
$val = mysqli_fetch_assoc($x);

$pic = $val['pic'];
$name  = $val['name'];
$pass = $val['pwrd'];
$gen = $val['gender'];
$code = $val['code'];

$num  = $val['num'];
$dob  = $val['dob'];
$smail = $val['smail'];
$ad1 = $val['address'];
$ad2 = $val['ad2'];
$pin = $val['pin'];
$city = $val['city'];
$lang = $val['lang'];
$nation = $val['nation'];


$sum = $val['summary'];



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