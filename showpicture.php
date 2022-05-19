<?php
session_start();
$image=$_SESSION['image'];
echo $image;
session_destroy();
?>