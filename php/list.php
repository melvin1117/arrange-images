<?php 
$directory = "../uploads/";

$files = glob($directory . "*");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<div class="container" style="margin-top: 20px;">
		<h1> List of Existing Folders </h1>
		<div class="table-responsive">          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Directory Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach($files as $file)
{
 //check to see if the file is a folder/directory
 if(is_dir($file))
 {
  $data = explode("/", $file);
  echo '<tr> 
  <td>'.$data[2].'</td>
  <td><a href="viewFolder.php?folderName='.$data[2].'"><button class="btn btn-primary"> Upload</button></a></td>
  </tr>';
 }
}?>

    </tbody>
  </table>
  </div>
	</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>