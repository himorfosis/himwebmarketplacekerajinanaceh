<?php
session_start();
unset($_SESSION['adm']);

echo "<script>window.location='../login.php';</script>";
?> 