<?php
session_start();
unset($_SESSION['ptgs']);

echo "<script>window.location='../login.php';</script>";
?> 