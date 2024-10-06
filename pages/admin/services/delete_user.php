<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE id_user = $id";
    $conn->query($sql);
    header("Location: ../users.php?deleted=success_delete");
    exit();
}
