<?php
session_start();
require 'connect.php';

// ambil data
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['password']);
$pass_confirm = htmlspecialchars($_POST['password_confirm']);


// Cek apakah password dan password confirm cocok
if ($pass !== $pass_confirm) {
    header("Location: ../login.php?error=pass_not_match");
    exit();
}

// cek apakah email sesuai
if (isset($email)) {
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql_update = "UPDATE user SET password = '$pass' WHERE email = '$email'";

        if ($conn->query($sql_update) === TRUE) {
            header("Location: ../login.php?reset=reset_success");
            exit();
        } else {
            header("Location: ../login.php?reset=reset_failed");
            exit();
        }
    } else {
        header("Location: ../login.php?reset=reset_failed");
        exit();
    }
} else {
    header("Location: ../login.php?reset=reset_failed");
    exit();
}
