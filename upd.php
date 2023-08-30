
<?php
// include("php/config.php");
include "value.php";

if ($_SESSION['loggedin']) {

    if (isset($_POST['save_up'])) {
        $updateFields = array();

        if (!empty($_POST['name'])) {
            $updateFields[] = "name='" . $_POST['name'] . "'";
        }


        if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] == $pass) {
                if (($_POST['pass2']) == ($_POST['pass3']) and (!empty($_POST['pass2']) && !empty($_POST['pass3']))) {
                    $updateFields[] = "pwrd='" . $_POST['pass2'] . "'";
                } else {
                    $res = [
                        'status' => 422,
                        'message' => 'Passwords does not match'
                    ];
                    echo json_encode($res);
                    return;
                }
            } else {
                $res = [
                    'status' => 422,
                    'message' => 'Wrong password inserted'
                ];
                echo json_encode($res);
                return;
            }
        }

        if (!empty($_POST['gen'])) {
            $updateFields[] = "gender='" . $_POST['gen'] . "'";
        }
        if (!empty($_POST['code'])) {
            $updateFields[] = "code='" . $_POST['code'] . "'";
        }
        if (!empty($_POST['num'])) {
            $updateFields[] = "num='" . $_POST['num'] . "'";
        }
        if (!empty($_POST['dob'])) {
            $updateFields[] = "dob='" . $_POST['dob'] . "'";
        }
        if (!empty($_POST['smail'])) {
            $updateFields[] = "smail='" . $_POST['smail'] . "'";
        }


        if (!empty($_FILES['pic2']['name'])) {
            $file_name = $_FILES['pic2']['name'];
            $file_tmp = $_FILES['pic2']['tmp_name'];

            // Get the file extension
            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Allowed image extensions
            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($ext, $allowed_extensions)) {
                // Generate a unique file name
                $file_name = $name . $num . "." . $ext;

                $filePath = "images/profile/" . $file_name;
                $updateFields[] = "pic='" . $filePath . "'";

                // Move the uploaded file to the destination directory
                if (move_uploaded_file($file_tmp, $filePath)) {
                    // File moved successfully
                } else {
                    // Failed to move the file
                }
            } else {
                // Invalid file extension
                $res = [
                    'status' => 422,
                    'message' => 'Invalid file extension'
                ];
                echo json_encode($res);
                return;
            }
        }




        if (!empty($_POST['address1'])) {
            $updateFields[] = "address='" . $_POST['address1'] . "'";
        }
        if (!empty($_POST['address2'])) {
            $updateFields[] = "ad2='" . $_POST['address2'] . "'";
        }
        if (!empty($_POST['pin'])) {
            $updateFields[] = "pin='" . $_POST['pin'] . "'";
        }
        if (!empty($_POST['city'])) {
            $updateFields[] = "city='" . $_POST['city'] . "'";
        }
        if (!empty($_POST['state'])) {
            $updateFields[] = "state='" . $_POST['state'] . "'";
        }
        if (!empty($_POST['nation'])) {
            $updateFields[] = "nation='" . $_POST['nation'] . "'";
        }

        $usercnfrm = $_SESSION['log'];
        $updateFieldsStr = implode(', ', $updateFields);

        $query = "UPDATE reg SET $updateFieldsStr WHERE email='$usercnfrm'";

        $result = mysqli_query($db, $query);
        if ($result) {
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
    }





    if (isset($_POST['save_sum'])) {

        if (!empty($_POST['sumin'])) {
            $usercnfrm = $_SESSION['log'];
            $ts = $_POST['sumin'];
            $query = "UPDATE reg SET summary = '$ts' WHERE email='$usercnfrm'";

            $result = mysqli_query($db, $query);
            if ($result) {
                $res = [
                    'status' => 200,
                    'message' => 'Summary Updated Successfully'
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
                'message' => 'No Changes Made'
            ];
            echo json_encode($res);
            return;
        }
    }
}
