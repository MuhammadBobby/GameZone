<?php
if (!isset($_SESSION['login']) && !isset($_SESSION['email'])) {
    header("Location: ../login.php");
    exit();
}
