<?php
$idBook = $_REQUEST['id'];


include_once "connectDB.php";

$sql = "UPDATE `books` SET `name`= ?,`author`=?,`price`=?,`category_id`=?,`status`=? WHERE code = ?";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_REQUEST['name']);
$stmt->bindParam(2, $_REQUEST['author']);
$stmt->bindParam(3, $_REQUEST['price']);
$stmt->bindParam(4, $_REQUEST['category']);
$stmt->bindParam(5, $_REQUEST['status']);
$stmt->bindParam(6, $idBook);
$stmt->execute();

header('location: ../books/list.php');
