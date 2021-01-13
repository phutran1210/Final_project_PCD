<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_oplung');
    if(!$conn) die('<h3>Fail</h3>');
    mysqli_query($conn, "SET NAME 'utf8'");
    mysqli_query($conn, "SET CHARATER SET 'utf8'");
    mysqli_set_charset($conn, "utf8");    
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $time = date("Y-m-d H:i:s");
?>