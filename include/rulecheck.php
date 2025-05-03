<?php
require_once 'include/session.php';
if (!isset($_SESSION['email']) || $_SESSION['rule'] != 1) {
    header("Location: home.php");
    exit();
}
?>