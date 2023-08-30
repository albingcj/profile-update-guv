<?php
include("config.php");
session_start();
if (isset($_POST['save_reg'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($db, $_POST['pass2']);
    $gender = mysqli_real_escape_string($db, $_POST['gen']);
    $code = mysqli_real_escape_string($db, $_POST['code']);
    $num = mysqli_real_escape_string($db, $_POST['num']);
    $date = mysqli_real_escape_string($db, $_POST['dob']);
    // $pic = mysqli_real_escape_string($db, $_POST['pic']);
    //pic start
    $file_name = $_FILES['pic']['name'];
	$file_tmp =$_FILES['pic']['tmp_name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$file_name = $name.$num.".".$ext;
	$filePath="images/profile/".$file_name;
    //pic end

    if ($name == NULL or $email == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    if ($pass1 != $pass2){
        $res = [
            'status' => 422,
            'message' => 'Password does not match'
        ];
        echo json_encode($res);
        return;
    }

    $emquery = "SELECT email FROM reg WHERE email='$email'";
    $check = mysqli_num_rows(mysqli_query($db, $emquery));

    if ($check == 0) { // check for existing user
        // Move the uploaded file to the desired location


        if (move_uploaded_file($file_tmp, $filePath)) {
            // File was successfully moved, proceed with inserting the user details into the database
            $query = "INSERT INTO reg (name, email, pwrd, gender, code, num, dob, pic) 
            VALUES ('$name', '$email', '$pass1', '$gender', '$code', '$num', '$date', '$filePath')";

            $query_run = mysqli_query($db, $query);
    
            if ($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'Details Updated Successfully'
                ];
                echo json_encode($res);
                return;
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Details Not Updated'
                ];
                echo json_encode($res);
                return;
            }
        } else {
            $res = [
                'status' => 500,
                'message' => 'Failed to move uploaded file'
            ];
            echo json_encode($res);
            return;
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Already existing user'
        ];
        echo json_encode($res);
        return;
    }
    
}
?>

