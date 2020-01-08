<?php
if (!session_id()) 
	session_start();
if (!$_SESSION['folderName']){ 
    header("Location:../index.html");
    die();
}
else{
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<style type="text/css">
	* {
		margin: 0;
		padding: 0;
		border: 0;
	}
	html, body {
	    height: 100%;
	}

	.wrapper { 
		display: flex;
		flex-direction: column;
		justify-content: center;
		height: 100%;
	}    
	#drop_file_zone {
		flex: 1 1 auto;
		background-color: #EEE;
		border: #999 4px dashed;
		font-size: 22px;
		margin: 20px 40px;
	}
	#drag_upload_file {
	    height: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	#drag_upload_file #selectfile {
		display: none;
	}
	.txt-center{
    	text-align: center;
	}

	.info-msg {
		color: white;
		display: none;
		position: absolute;
		bottom: 20px;
		background: green;
		width: 40%;
		margin: 0 auto;
		left: 0;
		right: 0;
		padding: 10px;
		font-size: small;
		word-wrap: break-word;
		border-radius: 4px;
	}

	.bottom-wrapper {
		margin-bottom: 20px;
	}

</style>
</head>
<body>
	<div class="wrapper">
		<h3 class="txt-center"> Upload in <i><?php echo $_SESSION['folderName']?></i> Folder </h3>
		<div class="txt-center" id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
			<div id="drag_upload_file">
				<div>Drop file here</div>
				<div style="margin: 10px 0;">or</div>
				<div><button class="btn btn-primary" onclick="file_explorer();">Select File</button></div>
				<input type="file" id="selectfile">
			</div>
		</div>
		<div class="txt-center bottom-wrapper">
			<a href="viewImage.php"><button class="btn btn-success">View</button></a>
			<a href="logout.php">
				<button type="submit" class="btn btn-warning"> Close</button>
			</a>
			<div class="info-msg" id="pop-up-msg"></div>
		</div>
	</div>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	var fileobj;
	function upload_file(e) {
		e.preventDefault();
		fileobj = e.dataTransfer.files[0];
		ajax_file_upload(fileobj);
	}

	function file_explorer() {
		document.getElementById('selectfile').click();
		document.getElementById('selectfile').onchange = function() {
		    fileobj = document.getElementById('selectfile').files[0];
			ajax_file_upload(fileobj);
		};
	}

	function ajax_file_upload(file_obj) {
		if(file_obj != undefined) {
		    var form_data = new FormData();                  
		    form_data.append('file', file_obj);
			$.ajax({
				type: 'POST',
				url: 'uploadAjax.php',
				contentType: false,
				processData: false,
				data: form_data,
				success:function(response) {
					var targetElement = document.getElementById("pop-up-msg");
					if (response === "true") {
						targetElement.innerHTML = 'File uploaded successfully.';
						targetElement.style.background = 'green'	
						
					} else {
						targetElement.innerHTML = 'File format error. Only images accepted.';
						targetElement.style.background = 'red'	
					}
					targetElement.style.display = "block";
					setTimeout(function(){
						targetElement.style.display = "none";
						targetElement.innerHTML = '';
		             },3000);

					$('#selectfile').val('');
				}
			});
		}
	}
</script>
</body>
</html>
<?php }?>