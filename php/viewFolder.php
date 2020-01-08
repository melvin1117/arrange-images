<?php 
$url = "../uploads/";
$folderName = $_GET['folderName'];
$url.=$folderName."/";
session_start();
$_SESSION["folderName"] = $folderName;
$path = "uploadFiles.php";
header('Location: '.$path);    
?>