<?php

Session_start();
ob_start();

Session_destroy();

header('location:Login.php');
die;

?>