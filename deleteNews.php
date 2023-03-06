<?php

require "../appnew/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = array();
    $id_news = $_POST['id_news'];

  
        $select = " DELETE FROM tbl_news WHERE id_news = '$id_news'";
        if(mysqli_query($connect, $select)) {
            // The data already exists, return an error message or do nothing
            $response['value'] = 1;
            $response['message'] = "Delete News Success";
            echo json_encode($response);
        } else {
            $response['value'] = 0;
            $response['message'] = "Delete News Failed";
            echo json_encode($response);
               
        } 
    }

?>