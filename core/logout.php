<?php
session_start();
session_destroy();
header("Location: ../index.php");
 //header("Location: ../core/login.php");
exit();
?>