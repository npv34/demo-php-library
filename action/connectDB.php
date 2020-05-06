<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=library-2','root','123456@Abc');
}catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}