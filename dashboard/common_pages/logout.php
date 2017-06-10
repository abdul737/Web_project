<?php
session_start();

session_destroy();
unset($_COOKIE);
header("Location: ../login.php");
exit;
?>