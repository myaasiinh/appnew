<?php

require '../appnew/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $response = array();
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $check = "SELECT id_users, username, email, password FROM tbl_users WHERE email='$email' AND password='$password'";
        $result = mysqli_fetch_array(mysqli_query($connect, $check));

        if (isset($result)) {
            $response['value'] = 1;
            $response['message'] = "Login Berhasil";
            $response['username'] = $result['username'];
            $response['email'] = $result['email'];
            $response['id_users'] = $result['id_users'];
            echo json_encode($response);

        } else {
            $response['value'] = 0;
            $response['message'] = "Login Gagal";
            echo json_encode($response);
        }
    } else {
        $response['value'] = 0;
        $response['message'] = "Email tidak ditemukan";
        echo json_encode($response);
    }
}
?>