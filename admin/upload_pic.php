<?php
include_once('dbconfig/config.php');
	if(isset($_POST['submit_image']))
	{
	$file=$_FILES['file'];
	$id=$_SESSION['username'];
	$fileName=$_FILES['file']['name'];
	$fileTmpName=$_FILES['file']['tmp_name'];
	$fileSize=$_FILES['file']['size'];
	$fileError=$_FILES['file']['error'];
	$fileType=$_FILES['file']['type'];

	$fileExt=explode('.',$fileName);
	$fileActualExt=strtolower(end($fileExt));
	
	$allowed=array('jpg','jpeg','png','pdf','JPEG');
	if(in_array($fileActualExt, $allowed)){
		if($fileError==0){
			if($fileSize<50000){ 
				$fileNameNew="profile".$_SESSION['username'].".".$fileActualExt;
				$fileDestination='uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql="UPDATE admin SET pic_status=1 WHERE admin_id='$id'";
				$result=mysqli_query($con,$sql);
				header("location: profile.php?uploadsuccess");
				header("Refresh:0");
			}
			else{
				echo('The Uploaded Image is larger than expected. The maximum allowed image size should be less than 50kb');
			}
		}
		else{
				echo('Problem Uploading your Image');
		}
		
	}
	else{
		echo('not a perfect type');
	}
	}
	?>