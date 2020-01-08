<?php 
session_start();
session_destroy();
$home_url = '../index.html';
header('Location: ' . $home_url);
?>