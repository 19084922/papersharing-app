<?php
session_start();
$_SESSION['student_id']=="";
session_unset();
header("location:index.php");
?>