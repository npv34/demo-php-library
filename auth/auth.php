<?php
session_start();
if (!isset($_SESSION['userLogin'])) {
    header('location: auth/login.php');
}