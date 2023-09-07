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

$uni = $val['uni'];
$deg = $val['deg'];
$str = $val['str'];
$start = $val['start'];
$end = $val['end'];
$cgpa = $val['cgpa'];


$comp = $val['comp'];
$role = $val['rolex'];
$s1 = $val['s1'];
$e1 = $val['e1'];
$month1 = $val['month1'];
$month2 = $val['month2'];
$desc = $val['descx'];



// age
$birthDate = new DateTime($dob);
$currentDate = new DateTime();
$interval = $birthDate->diff($currentDate);
$age = $interval->y;




// echo "<script>alert('$pic');</script>";

}
else {
    echo "<script>alert('error in email');</script>";
  }
?>