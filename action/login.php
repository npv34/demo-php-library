<?php
session_start();
//su ly su kien submit login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    // ket noi csdl
    include_once "connectDB.php";
    // xu ly login

    $sql = 'SELECT * FROM users WHERE email = ? AND password = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $password);
    $stmt->execute();

    $result = $stmt->fetch();
    if ($result) {
        //cho phep di tiep
        $_SESSION['userLogin'] = $result;
        header('location: ../index.php');
    } else {
        //quay lai form login vs dua ra thong  bao
        $_SESSION['error-login'] = 'Tai khoan hoac password khong dung';
        header('location: ../auth/login.php');
    }


}