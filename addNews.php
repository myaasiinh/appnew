<?php

require "../appnew/connect.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $description = $_POST['description'];
    $id_users = $_POST['id_users'];

    $image = date('dmYHis').str_replace(" ", "", basename($_FILES['image']['name']));
    $imagePath = "upload/".$image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

        $select = "SELECT * FROM tbl_news WHERE title = '$title' AND content = '$content' AND description = '$description' AND id_users = '$id_users'";
        $result = mysqli_query($connect, $select);
        if(mysqli_num_rows($result) > 0) {
            // The data already exists, return an error message or do nothing
            $response['value'] = 0;
            $response['message'] = "The data already exists";
            echo json_encode($response);
        } else {
            // The data does not exist, insert it into the database
            $insert = "INSERT INTO tbl_news VALUES(NULL, '$image', '$title', '$content', '$description', NOW(), '$id_users')";
            if (mysqli_query($connect,$insert)) {
                $response['value'] = 1;
                $response['message'] = "Add News Success";
                echo json_encode($response);
            } else {
                $response['value'] = 0;
                $response['message'] = "Add News Failed";
                echo json_encode($response);
            }
        }
    }


?>