<?php	
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from user");
	while($row_1 = $result_1->fetch_assoc())
	{ 
		if($row_1['user_id']==$_SESSION['username']){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE TECHNICAL QUIZ</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />  
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

	<style>
.avatar3{ 
	width:50%;
	border-radius : 50% ;
	margin: 0 0 0 35px;
}

.pfimage{
	width: 200px;
	padding: 10px;
	margin-left: 50px;
	overflow: hidden;
	}
	
.pfimage img {
	width: 100px;
}
</style>
</head>

  <body >

  <section id="container" >
      
      <?php
		include('index_nav.php');
	  ?>		
	  
		<section class="wrapper">
		<div class="row">
		<div class="col-lg-12 main-chart">

		<form  action="#" method = "post" style="width:50%; border-radius:3px; margin: 0 auto; background-color:#fff;" enctype="multipart/form-data">
			<table class="table-condensed" width="90%;" style="margin: 0 auto; background-color:#fff;">
			<thead>
			
			<th colspan="4">
				<center><h2><b>Update Profile</b></h2></center>
			</th>
			</thead>

			<tbody>
			<tr><td colspan ="4"><h3>Basic Details- <hr/></h3></td></tr>
			<tr>
			<td colspan="1"><label>Username:</label></td>
			<td colspan="2"><input name="username" type="text" class="form-control" value="<?php echo $row_1['user_id']; ?>" disabled="disabled"/></td>
			<td class="visible-md visible-lg" rowspan="3" colspan="1" style="visible-lg visible-md">
				<div class="pfimage" style="visible-lg visible-md">
				<?php
						if($row_1['pic_status']==1){
							echo"<img src='uploads/profile".$_SESSION['username'].".jpg?'".mt_rand().">";
						}
						else{
							echo"<img src='uploads/profiledefault.jpg'>";
						}
				?>
				</div>
			</td>
			</tr>
			
			<tr>
			<td colspan="1"><label>Name:</label></td>
			<td colspan="2"><input name="fullname" type="text" class="form-control" value="<?php echo $row_1['full_name']; ?>"  ></td>
			</tr>

			<tr>
			<td colspan="1">Contact no.:&nbsp;&nbsp;<b>+91</td>
			<td colspan="2"><input name="contact" type="text" class="form-control" maxlength="10" value="<?php echo $row_1['contact']; ?>" /></td>
			</tr>

			<tr>
			 <td colspan="1"><label>Email Id :</label></td>
			<td colspan="2">
			<input name="email" type="email" class="form-control" maxlength="80" value="<?php echo $row_1['email']; ?>" />
			</td>
			</tr>
			<tr>
			<td colspan="3"></td>
			<td class="input-group">
				<span class="input-group-btn">
				<input type="file" class="btn btn-primary" name="file">
				</span><br>
			</td>
			
			</tr>
			<tr>
				<td colspan="4">
				<button type="submit" class="btn btn-primary" style="float:right;" name="submit_image" title="Upload" ><span class="glyphicon glyphicon-upload"></span>&nbsp;Upload</button></td>
			</tr>
			<?php
				include('upload_pic.php');				
			?>
								
			<tr><td colspan="4"><h3>Educational Qualification- <hr></h3></td></tr>
			<tr>
			<td colspan="1"><label>Highest Qualification:&nbsp;</label></td>
			<td colspan="2">
			<select name="edu_name" class="form-control">
				<?php
				$user_id=$row_1['user_id'];
				$quer=mysqli_query($con,"SELECT edu_name,year_of_passing FROM education_qualification WHERE user_id='$user_id'");
				while($r=mysqli_fetch_assoc($quer)){
				$options=$r['edu_name'];
				?>
				<option value="High School" <?php if($options=="High School") echo'selected="selected"';?>>High School</option>
				<option value="Intermediate" <?php if($options=="Intermediate") echo'selected="selected"';?>>Intermediate</option>
				<option value="Graduate" <?php if($options=="Graduate") echo'selected="selected"';?>>Graduate</option>
				<option value="Post Graduate" <?php if($options=="Post Graduate") echo'selected="selected"';?>>Post Graduate</option>
			</select>
			</td>

			
			<td><input name="year_of_passing" type = "number" class = "form-control" placeholder="Year of Passing" 
			maxlength="4" value="<?php if($r['year_of_passing']!=0){
				echo $r['year_of_passing']; 
			}
			else{
				echo "";
				
				} 
				} ?>" /></td>
			</tr>

			<tr>
			<td><label for="city">City :</label></td> 
			<td colspan="2"><input name="city" type="text" class="form-control" maxlength="40" value="<?php echo $row_1['city_name']; ?>" /></td>
			</tr>

			<tr>
			<td class="visible-md visible-lg" ><label>Address :</label></td>
			<td colspan="2" ></td>
			</tr>
			<tr><td colspan="4"><center>
			<input type = "submit" value="Update" name="update" class="btn btn-success" /></center>
			</td></tr>

		</tbody>
		</table>
		</form>	
		</div>
		</div>
		</section>
	
				<?php
				include('supdatequery.php');
				?>	
				</section>
	<script>
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	</script><script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
</body>
<?php 
	}
	}
		}
		else
		{
			header('Location:logout.php');
		}

		?>
</html>
