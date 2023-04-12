<?php
    $server_name = 'localhost';
    $database_name = 'joshua_gatto_syscbook.sql';
    $username = 'root';
    $password = '';
    
    define("DATABASE_LOCAL", "localhost");
    define("DATABASE_NAME", "joshua_gatto_syscbook");
    define("DATABASE_USER", "root");
    define("DATABASE_PASSWD", "");

    $conn = new mysqli(DATABASE_LOCAL, DATABASE_USER, DATABASE_PASSWD, DATABASE_NAME);
    if ($conn->connect_error) {
        echo "Error";
        die("Connection failed: " . $conn->connect_error);
    }else{}
?>