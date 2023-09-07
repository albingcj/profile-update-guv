
<?php
// include("php/config.php");
include "value.php";

if ($_SESSION['loggedin']) {

    if (isset($_POST['save_up'])) {
        $updateFields = array();
        $updateFields2 = array();
        if (!empty($_POST['name'])) {
            $updateFields[] = "name='" . $_POST['name'] . "'";
            $updateFields2['name'] = $_POST['name'];
        }


        if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] == $pass) {
                if (($_POST['pass2']) == ($_POST['pass3']) and (!empty($_POST['pass2']) && !empty($_POST['pass3']))) {
                    $updateFields[] = "pwrd='" . $_POST['pass2'] . "'";
                    $updateFields2['password'] = $_POST['pass2'];
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
            $updateFields2['gender'] = $_POST['gen'];
        }
        if (!empty($_POST['code'])) {
            $updateFields[] = "code='" . $_POST['code'] . "'";
            $updateFields2['code'] = $_POST['code'];
        }
        if (!empty($_POST['num'])) {
            $updateFields[] = "num='" . $_POST['num'] . "'";
            $updateFields2['phone_number'] = $_POST['num'];
        }
        if (!empty($_POST['dob'])) {
            $updateFields[] = "dob='" . $_POST['dob'] . "'";
            $updateFields2['dob'] = $_POST['dob'];
        }
        if (!empty($_POST['smail'])) {
            $updateFields[] = "smail='" . $_POST['smail'] . "'";
            $updateFields2['secondary_mail'] = $_POST['smail'];
        }
        if (!empty($_POST['lang'])) {
            $updateFields[] = "lang='" . $_POST['lang'] . "'";
            $updateFields2['language'] = $_POST['lang'];
        }

        if (!empty($_FILES['pic2']['name'])) {
            $file_name = $_FILES['pic2']['name'];
            $file_tmp = $_FILES['pic2']['tmp_name'];

            $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($ext, $allowed_extensions)) {
                $file_name = $name . $num . "." . $ext;

                $filePath = "images/profile/" . $file_name;
                $updateFields[] = "pic='" . $filePath . "'";

                if (move_uploaded_file($file_tmp, $filePath)) {
                    // File moved successfully
                    // echo '<script>console.log(1)</script>';
                } else {
                    // Failed to move the file
                    // echo '<script>console.log(1)</script>';

                }
            } else {
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
            $updateFields2['address1'] = $_POST['address1'];
        }
        if (!empty($_POST['address2'])) {
            $updateFields[] = "ad2='" . $_POST['address2'] . "'";
            $updateFields2['address2'] = $_POST['address2'];
        }
        if (!empty($_POST['pin'])) {
            $updateFields[] = "pin='" . $_POST['pin'] . "'";
            $updateFields2['pincode'] = $_POST['pin'];
        }
        if (!empty($_POST['city'])) {
            $updateFields[] = "city='" . $_POST['city'] . "'";
            $updateFields2['city'] = $_POST['city'];
        }
        if (!empty($_POST['state'])) {
            $updateFields[] = "state='" . $_POST['state'] . "'";
            $updateFields2['state'] = $_POST['state'];
        }
        if (!empty($_POST['nation'])) {
            $updateFields[] = "nation='" . $_POST['nation'] . "'";
            $updateFields2['nation'] = $_POST['nation'];
        }

        $usercnfrm = $_SESSION['log'];
        $updateFieldsStr = implode(', ', $updateFields);

        $query = "UPDATE reg SET $updateFieldsStr WHERE email='$usercnfrm'";
        $result = mysqli_query($db, $query);

        if ($result) {
            $jsonFilePath = 'data.json';
            $jsonData = json_decode(file_get_contents($jsonFilePath), true);

            if (is_array($jsonData)) {
                foreach ($jsonData as &$user) {
                    if ($user['email'] === $usercnfrm) {
                        foreach ($updateFields2 as $key => $value) {
                            $user[$key] = $value;
                        }
                        break;
                    }
                }
                $updatedJsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
                if (file_put_contents($jsonFilePath, $updatedJsonString)) {
                    // JSON file updated successfully
                    $res = [
                        'status' => 200,
                        'message' => 'Details Updated Successfully'
                    ];
                    echo json_encode($res);
                    return;
                } else {
                    // Failed to update JSON
                    $res = [
                        'status' => 500,
                        'message' => 'Failed to update JSON file'
                    ];
                    echo json_encode($res);
                    return;
                }
            } else {
                // JSON data miss
                $res = [
                    'status' => 500,
                    'message' => 'Invalid JSON data'
                ];
                echo json_encode($res);
                return;
            }
        } else {
            // DBupdate failed
            $res = [
                'status' => 500,
                'message' => 'Database update failed'
            ];
            echo json_encode($res);
            return;
        }

    }

    //summary mod
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

    //edumod
    if (isset($_POST['save_edu'])) {
        if (!empty($_POST['deg']) && !empty($_POST['uni']) && !empty($_POST['str']) && !empty($_POST['end']) && !empty($_POST['start']) && !empty($_POST['cgpa'])) {
            $usercnfrm = $_SESSION['log'];
            $deg = mysqli_real_escape_string($db, $_POST['deg']);
            $uni = mysqli_real_escape_string($db, $_POST['uni']);
            $str = mysqli_real_escape_string($db, $_POST['str']);
            $end = mysqli_real_escape_string($db, $_POST['end']);
            $start = mysqli_real_escape_string($db, $_POST['start']);
            $cgpa = mysqli_real_escape_string($db, $_POST['cgpa']);

            $query = "UPDATE reg SET deg='$deg', uni='$uni', str='$str', end='$end', start='$start', cgpa='$cgpa' WHERE email='$usercnfrm'";

            $result = mysqli_query($db, $query);
            if ($result) {
                $res = [
                    'status' => 200,
                    'message' => 'Education Details Updated Successfully'
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
                'status' => 422,
                'message' => 'Fill All the Details'
            ];
            echo json_encode($res);
            return;
        }
    }

    if (isset($_POST['save_exp'])) {
        if (!empty($_POST['comp']) && !empty($_POST['role']) && !empty($_POST['s1']) && !empty($_POST['e1']) && !empty($_POST['month1']) && !empty($_POST['month2']) && !empty($_POST['desc'])) {
            $usercnfrm = $_SESSION['log'];
            $comp = mysqli_real_escape_string($db, $_POST['comp']);
            $role = mysqli_real_escape_string($db, $_POST['role']);
            $s1 = mysqli_real_escape_string($db, $_POST['s1']);
            $e1 = mysqli_real_escape_string($db, $_POST['e1']);
            $month1 = mysqli_real_escape_string($db, $_POST['month1']);
            $month2 = mysqli_real_escape_string($db, $_POST['month2']);
            $desc = mysqli_real_escape_string($db, $_POST['desc']);

            // SQL query to update
            $query = "UPDATE reg
        SET comp = '$comp', rolex = '$role', s1 = '$s1', e1 = '$e1', month1 = '$month1', month2 = '$month2', descx = '$desc' 
        WHERE email='$usercnfrm'";
            $result = mysqli_query($db, $query);
            if ($result) {
                $res = [
                    'status' => 200,
                    'message' => 'Education Details Updated Successfully '
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
                'status' => 422,
                'message' => 'Fill All the Details'
            ];
            echo json_encode($res);
            return;
        }
    }
}
