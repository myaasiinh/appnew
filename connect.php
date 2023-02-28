<?php

$connect = new mysqli("localhost", "root", "", "app_news");

if ($connect) {
    echo "Successfully Connected";
} else {
    echo "Not Connected";
}


?>