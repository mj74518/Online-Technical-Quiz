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
	
	$allowed=array('jpg','jpeg','png','JPEG');
	if(in_array($fileActualExt, $allowed)){
		if($fileError==0){
			if($fileSize<50000){ 
				$fileNameNew="profile".$_SESSION['username'].".".$fileActualExt;
				$fileDestination='uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
				$sql="UPDATE user SET pic_status=1 WHERE user_id='$id'";
				$result=mysqli_query($con,$sql);
				echo "<script> location.href = 'update_profile.php'; </script>";
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