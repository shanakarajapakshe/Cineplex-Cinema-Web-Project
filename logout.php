<?php
session_start();
session_unset();
session_destroy();

header("location:../cineplex/index.php");
?>