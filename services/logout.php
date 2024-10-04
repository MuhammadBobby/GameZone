<?php
session_start();

if (isset($_SESSION['login'])) {
    unset($_SESSION['email']);
    unset($_SESSION['login']);
    unset($_SESSION['id_user']);
    session_destroy();

    header("location: ../login.php");
}
