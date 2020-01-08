<?php 
$url = "../uploads/";
$folderName = $_POST['folderName'];
$url.=$folderName."/";
if (is_dir($url) === false) {
    mkdir($url);
    session_start();
    $_SESSION["folderName"] = $folderName;
    $path = "uploadFiles.php";
    header('Location: '.$path);
}
?>