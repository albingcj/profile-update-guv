<?php
include("config.php");
session_start();
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
    $equery = "SELECT * FROM reg where email=? ";
    $stm = mysqli_prepare($db, $equery);
    if ($stm) {
        mysqli_stmt_bind_param($stm, "s", $myemail);
        mysqli_stmt_execute($stm);
        $rest = mysqli_stmt_get_result($stm);

        if ($rest) {
            if (mysqli_num_rows($rest)  < 1) {
                $res = [
                    'status' => 422,
                    'message' => 'No User Exist'
                ];
                echo json_encode($res);
                return;
            }
        }
    }


    // Use parameter binding in the query
    $emquery = "SELECT * FROM reg where email=? AND pwrd=?";
    $stmt = mysqli_prepare($db, $emquery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $myemail, $mypassword);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['loggedin'] = true;
                $_SESSION['log'] = $myemail;

                if (isset($_POST['remember'])) {
                    setcookie('email_id', $myemail, time() + (60 * 60 * 24));
                    setcookie('password', $mypassword, time() + (60 * 60 * 24));
                } else {
                    setcookie('email_id', $myemail, time() - (60 * 60 * 24));
                    setcookie('password', $mypassword, time() - (60 * 60 * 24));
                }


                $res = [
                    'status' => 200,
                    'message' => 'Logged in Successfully'
                ];
            } else {
                $res = [
                    'status' => 422,
                    'message' => 'Check your email or password'
                ];
                session_destroy();
            }
        } else {
            // Error in executing query
            $res = [
                'status' => 500,
                'message' => 'Database error'
            ];
        }

        mysqli_stmt_close($stmt);
    } else {
        // Error in preparing statement
        $res = [
            'status' => 500,
            'message' => 'Database error'
        ];
    }

    echo json_encode($res);
    return;
}
