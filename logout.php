<?php
session_start();
session_destroy();
unset($_COOKIE);
setcookie('usuario', '');
setcookie('email', '');
header('Location: login.php');
?>