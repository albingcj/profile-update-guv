<?php 
include("config.php");

if(isset($_POST['save_reg']))
{
	$name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
    $gender = mysqli_real_escape_string($db, $_POST['gen']);
    $code = mysqli_real_escape_string($db, $_POST['code']);
    $num = mysqli_real_escape_string($db, $_POST['num']);
    $date = mysqli_real_escape_string($db, $_POST['dob']);
    $pic = mysqli_real_escape_string($db, $_POST['img']);
	
    if($name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
	
    $query = "INSERT INTO reg (name, email, pwrd, gender, code, num, dob, pic) 
          VALUES ('$name', '$email', '$pass1', '$gender', '$code', '$num', '$date', '$pic')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
	
}
