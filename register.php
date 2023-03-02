<?php

require "../appnew/connect.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check = "SELECT * FROM tbl_users WHERE username='$username' OR email='$email'";
    $result = mysqli_fetch_array(mysqli_query($connect,$check));

    if (isset($result)) {
        $response['value'] = 2;
        $response['message'] = "Username or Email already exist";
        echo json_encode($response);
    } else {

        $insert = "INSERT INTO tbl_users VALUES(NULL, '$username', '$email', '$password', '1', NOW())";
        if (mysqli_query($connect,$insert)) {
            $response['value'] = 1;
            $response['message'] = "Success";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Failed";
            echo json_encode($response);
        }

    }

}

?>