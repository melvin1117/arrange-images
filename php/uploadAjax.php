<?php
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg','image/JPG'];
session_start();
$folderName = $_SESSION["folderName"];
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
	echo "false";
	return;
}
//  $file2 = "D:/SELECTED/".$_FILES["file"]["name"];
//  unlink($file2);
//  echo $file2."&nbsp;";
$url = "../uploads/".$folderName."/";
move_uploaded_file($_FILES['file']['tmp_name'], $url.$folderName."-".time().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
echo "true";
?>