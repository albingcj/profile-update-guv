<?php
include("config.php");
session_start();

if (isset($_POST['save_reg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $gender = $_POST['gen'];
    $code = $_POST['code'];
    $num = $_POST['num'];
    $date = $_POST['dob'];

    //pic start
    $file_name = $_FILES['pic']['name'];
    $file_tmp = $_FILES['pic']['tmp_name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $file_name = $name . $num . "." . $ext;
    $filePath = "images/profile/" . $file_name;
    //pic end

    if (empty($name) || empty($email) || empty($pass1)) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    if ($pass1 != $pass2) {
        $res = [
            'status' => 422,
            'message' => 'Password does not match'
        ];
        echo json_encode($res);
        return;
    }

    $emquery = "SELECT email FROM reg WHERE email = ?";
    $stmt = mysqli_prepare($db, $emquery);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 0) {
        if (move_uploaded_file($file_tmp, $filePath)) {
            $query = "INSERT INTO reg (name, email, pwrd, gender, code, num, dob, pic) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($db, $query);
            mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $pass1, $gender, $code, $num, $date, $filePath);
            $query_run = mysqli_stmt_execute($stmt);

            if ($query_run) {
                $res = [
                    'status' => 200,
                    'message' => 'Details Updated Successfully'
                ];

                // JSON
                $jsonFilePath = 'data.json';

                //array added to the JSON file
                $newUserData = [
                    'name' => $name,
                    'email' => $email,
                    'password' => $pass1,
                    'dob' => $date,
                    'code' => $code,
                    'phone_number' => $num,
                    'gender' => $gender,
                    'secondary_mail' => 0,
                    'language' => 0,
                    'address1' => 0,
                    'address2' => 0,
                    'pincode' => 0,
                    'city' => 0,
                    'state' => 0,
                    'nation' => 0,
                ];

                $jsonString = file_get_contents($jsonFilePath);
                $jsonData = json_decode($jsonString, true);

                if ($jsonData === null) {
                    $jsonData = [];
                }

                $jsonData[] = $newUserData;

                $updatedJsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
                if (file_put_contents($jsonFilePath, $updatedJsonString)) {

                    echo json_encode($res);
                    return;
                } else {
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to update JSON file'
                    ];
                    echo json_encode($res);
                    return;
                }
            } else {
                $res = [
                    'status' => 500,
                    'message' => 'Details Not Updated'
                ];
                echo json_encode($res);
                return;
            }
            //end JSON

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

    mysqli_stmt_close($stmt);
}
