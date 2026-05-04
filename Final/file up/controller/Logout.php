<?php
session_start();
session_destroy();
Header("Location: ../view/Login.php");
?>