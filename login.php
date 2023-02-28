<?php

require '../appnew/connect.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $response = array();
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $check = "SELECT * FROM tbl_users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connect, $check);

    if (isset($result)) {
        $response['value'] = 1;
        $response['message'] = "Login Berhasil";
        echo json_encode($response);

    } else {
        $response['value'] = 0;
        $response['message'] = "Login Gagal";
        echo json_encode($response);
    }
}

?>
