<?php
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    $myemail = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['upwd']);
    
    if ($myemail == NULL or $mypassword == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
    
    $query = "SELECT * FROM reg where email='$myemail' AND pwrd='$mypassword'";
    
    $check = mysqli_num_rows(mysqli_query($db, $emquery));
    if ($check == 0) { //check if existing user
        $res = [
            'status' => 500,
            'message' => 'Check your email or password'
        ];
        echo json_encode($res);
        return;
    }
    else{
        $res = [
            'status' => 200,
            'message' => 'Logged in Successfully'
        ];
        echo json_encode($res);
        return;
    }
}


?>