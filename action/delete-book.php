<?php
$idBook = $_REQUEST['id'];


include_once "connectDB.php";

//xoa sach
$sql = 'DELETE FROM books WHERE code = ?';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $idBook);
$stmt->execute();

header('location: ../books/list.php');

