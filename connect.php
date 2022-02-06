<?php
$host ="localhost";
$dbname ="multi_upload";
$username="root";
$password="";
try{
    $conn = new PDO("mysql:host={$host};
                    dbname={$dbname};
                    charset=utf8",
                    $username,
                    $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $exception){
    echo "ไม่สามารถเชื่อมฐานข้อมูลได้:" . $exception->getMessage();
    exit();
}

?>