<?php
@session_start();
session_destroy();
header("Location: loginSUBE.php");
?>
