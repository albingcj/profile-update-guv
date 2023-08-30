
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
        // if (!empty($_POST['pic'])) {
        //     $file_name = $_FILES['pic']['name'];
        // $file_tmp =$_FILES['pic']['tmp_name'];
        // $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        // $file_name = $name.$num.".".$ext;
        // $filePath="images/profile/".$file_name;
        //     $updateFields[] = "pic='" . $filePath . "'";
        // }

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
