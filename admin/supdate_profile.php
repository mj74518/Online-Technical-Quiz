<?php
 session_start();
 ob_start();
 include('dbconfig/config.php');	
	if($_SESSION['username'])
{	
	$result_1 = $con->query("Select * from admin");
	while($row_1 = $result_1->fetch_assoc())
	{ 
		if($row_1['admin_id']==$_SESSION['username']){
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Placement Portal</title>
    
	<!-- BOOTSTRAP STYLES-->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style>
	#banner {
		color: #fff;
		text-shadow: 0 0 0.5px rgba(255, 255, 255, 0.25);
		text-align: center;
		background-image:url("images/bg.jpg");
		width:100%;
		padding: 1em 0 0em 0;
		margin: 0;	
	}
	#headingnew{
	font-family:Comic Sans MS; 
	color:white; 
	font-size:685%;
	text-align:center;
	padding:0px;
	margin-bottom:0px;
	margin-top:0px;
}

#main-wrap{
        width:63%;
       background:white;
	   border-radius: 10px;
	   font-size:130%;
	   border: 2px solid #2c3e50;
	   margin:0 auto;
}
.footer{
	padding-top:15px;
	height:150px;
	left:0px;
	bottom:0px;
	position:fixed;
	width:100%;
	background-color:#000000; 
	color:white;
	text-align:center;
	font-family:comic sans ms;
}
.avatar3{ 
	width:50%;
	border-radius : 50% ;
	margin: 0 0 0 35px;
}
.h2{
	font-family:Comic Sans MS; 
	color:white; 
	font-size:200%;
	text-align:right;
	padding-right:15px;
	margin-bottom:0px;
	margin-top:0px;
}

.pfimage{
	width: 200px;
	padding: 10px;
	
	margin-left: 50px;
	overflow: hidden;	
	}
	
.pfimage img {
	width: 150px;
}

		.navbar-default{
		opacity: .9;
		}
		.dropdown:hover .dropdown-menu {
		display: block;
		}
		.panel-default{
		opacity: .9;
		}
		hr.message-inner-separator
{
    clear: both;
    margin-top: 10px;
    margin-bottom: 13px;
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
    background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
    background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}

		</style>
			<style type="text/css">
.styled-button-8 {
	background: #25A6E1;
	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	width:100px;
	height:40px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:18px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
}        </style>
</head>

<body style="background-image:url('images/15.jpg'); background-size:100%;">

		<section id="banner">
		
			<header>
					<table cellspacing="0" border="0" style="margin-top:20px;">
					
						<tr>
						<td rowspan="3" width="16%">
						<img src="imgs/logo.jpeg" class="avatar3"/>
						</td>
						</tr>
					
						<tr>
						<td width="84%">
						<h1 id="headingnew">Amrapali Group Of Institutes </h1>
						</td>
						</tr>
						
						
						<tr>
						<td class="h2">
						Shiksha Nagar, Lamachaur, Haldwani(263139)
						</td>
						</tr>
						
						<tr>
						<td colspan="4">
						<marquee><b>Welcome To Placement Portal<b></marquee>	
						</td>
						</tr>
						
						
					</table>
			</header>
		</section>

<?php
	include('sindex_nav.php');
?>	
		
		<div id="page-inner">
		
			

			<!--onClick="javascript:popUp('usertype.php')"-->

			<div id="main-wrap">
				<form  action="#" method = "post" enctype="multipart/form-data">
				
					<table class="table-condensed" style="margin-left:100px;">
					<thead>
					<center><h2>
							<font color="blue">
								<b>Update Profile</b>
							</font>
							</h2>
					</center>
					
					
					</thead>
					
					<tbody>
					 <?php 
					
								$options1=$row_1['graduation'];
								$options2=$row_1['post_graduation'];
								$options3=$row_1['state'];
								$options4=$row_1['X_Board'];
								$options5=$row_1['XII_Board'];
								$options6=$row_1['nationality'];
							
								
				?>
					<tr><td colspan ="4"><h3>Basic Details- <hr/></h3></td></tr>
						
						<tr>
							<td colspan="2"><label>Username:</label></td>
							<td colspan="1"><input name="username" type="text" class="form-control" value="<?php echo $row_1['username']; ?>" disabled="disabled"/></td>
						</tr>
						<tr>
							<td colspan="2"><label>Name:</label></td>
							<td colspan="1"><input name="fullname" type="text" class="form-control" value="<?php echo $row_1['fullname']; ?>"  ></td>
							<td rowspan="3">
							<div class="pfimage" style="margin-left:100px">
							<?php
									if($row_1['status']==1){
										echo"<img src='uploads/profile".$_SESSION['username'].".jpg?'".mt_rand().">";
									}
									else{
										echo"<img src='uploads/profiledefault.jpg'>";
									}
							?>
							</div>
							
							<input type="file" class="btn btn-primary" name="file" style="margin-left:50px"><br>
							<button type="submit" class="btn styled-button-8" style="margin-left:140px" name="submit_image" />Upload</button>
							<?php
								include('upload_pic.php');
								
							?>
							</td>
								
						</tr>


						
						<tr>
							<td colspan="2"><label>Father's Name:</label></td>
							<td colspan="1"><input name="father_name" type="text" class="form-control" value="<?php echo $row_1['father_name']; ?>" ></td>
						</tr>	
							
						<tr>
							<td colspan="2"><label>Mother's Name:</label></td>
							<td colspan="1"><input name="mother_name" type="text" class="form-control" value="<?php echo $row_1['mother_name']; ?>" ></td>
						</tr>	

						<tr>
						   <td colspan="2"><label>Gender:</label>
							<td colspan="2">
								<input type="radio" name="gender" class ="radio" value="male"<?php echo $row_1['gender']=="male"?"checked":" " ?>>Male<br>
								<input type="radio" name="gender" class ="radio" value="female"<?php echo $row_1['gender']=="female"?"checked":" " ?> >Female<br>	
								<input type="radio" name="gender"  class ="radio" value="other"<?php echo $row_1['gender']=="other"?"checked":" " ?> >Others<br>
							</td>
						</tr>
						
							<tr>
							<td colspan="2"><label>Nationality:</label></td>
							<td><select name="nationality" class="form-control" >
							<option value="select" >Select</option>
							<option value="INDIAN" <?php if($options6=="INDIAN") echo'selected="selected"';?>>INDIAN</option>
							<option value="OTHER" <?php if($options6=="OTHER") echo'selected="selected"';?>>OTHER</option>
							</select></td>
							</tr>

						
						<tr>
							<td colspan="2"><label > Date_Of_Birth :*</label></td>
							<td colspan="1"><input name="date_of_birth" type = "date" class = "form-control" value="<?php echo $row_1['date_of_birth']; ?>" /></td>
						</tr>
	

						<tr>
							<td colspan="2">Contact no.:&nbsp;&nbsp;<b>+91</td>
							<td colspan="1"><input name="contact" type="text" class="form-control" maxlength="10" value="<?php echo $row_2['contact']; ?>" /></td>
						</tr>
						
						
						 <tr>
							 <td colspan="2"><label>Email Id :</label></td>
							<td colspan="1">
							<input name="email" type="email" class="form-control" maxlength="80" value="<?php echo $row_2['email']; ?>" /></td>
						</tr>

							 					
						<tr>
						<td colspan="4"><h3>Educational Qualification- <hr></h3></td></tr>
				
					   
						<tr>
							<td colspan="1"><label>High_School_Percentage:&nbsp;</label></td>
							<td colspan="1"><input name="X_percentage" type="text" class="form-control" maxlength="5" value="<?php 
							if($row_1['X_percentage']!=0){
								echo $row_1['X_percentage']; 
							}
							else{
								echo "";
							}
							
							?>"/></td>
							
							<td colspan="1"><label>&nbsp;&nbsp;&nbsp;&nbsp;Year_of_passing:</label></td>
							<td colspan="1"><input name="year_of_passing1" type = "text" class = "form-control" maxlength="4" value="<?php if($row_1['year_of_passing1']!=0){
								echo $row_1['year_of_passing1']; 
							}
							else{
								echo "";
							} ?>" /></td>
						</tr>
						
						<tr>
							<td colspan="1"><label>Board:&nbsp;</label></td>
							<td colspan="1"><select name="X_Board" class="form-control"  >
								<option value="select" >Select</option>
								<option value="CBSE" <?php if($options4=="CBSE") echo'selected="selected"';?> >CBSE</option>
								<option value="ICSE" <?php if($options4=="ICSE") echo'selected="selected"';?> >ICSE</option>
								<option value="STATE BOARD" <?php if($options4=="STATE BOARD") echo'selected="selected"';?> >STATE BOARD</option>
								</select>
							</td>
						</tr>
						
                        <tr>
							<td colspan="1"><label>Intermediate_Percentage:&nbsp;</label></td>
                           <td colspan="1"><input name="XII_percentage" type="text" class="form-control" maxlength="5" value="<?php echo $row_1['XII_percentage'];?>" /></td> 
							
							<td colspan="1"><label>&nbsp;&nbsp;&nbsp;&nbsp;Year_of_passing:</label></td>
							<td colspan="1"><input name="year_of_passing2" type="text" class = "form-control" maxlength="4" value="<?php if($row_1['year_of_passing2']!=0){
								echo $row_1['year_of_passing2']; 
							}
							else{
								echo "";
							} ?>" /></td>
						</tr> 
						
						<tr>
							<td colspan="1"><label>Board:&nbsp;</label></td>
							<td colspan="1"><select name="XII_Board" class="form-control">
								<option value="select" >Select</option>
								<option value="CBSE" <?php if($options5=="CBSE") echo'selected="selected"';?>>CBSE</option>
								<option value="ICSE" <?php if($options5=="ICSE") echo'selected="selected"';?>>ICSE</option>
								<option value="STATE BOARD" <?php if($options5=="STATE BOARD") echo'selected="selected"';?>>STATE BOARD</option>
								</select>
							</td>
						</tr>
						

						<tr>
							<td colspan="1"><label>Graduation:&nbsp;</label></td>
							<td colspan="1"><select name="graduation" class="form-control"  >
								<option value="" >Select</option>
								<option value="BCA" <?php if($options1=="BCA") echo'selected="selected"';?> >BCA</option>
								<option value="BBA" <?php if($options1=="BBA") echo'selected="selected"';?> >BBA</option>
								<option value="B.COM" <?php if($options1=="B.COM") echo'selected="selected"';?> >B.COM</option>
								
								<option value="B.TECH(IT)" <?php if($options1=="B.TECH(IT)") echo'selected="selected"';?> >B.TECH(IT)</option>
								<option value="B.TECH(Cs)"<?php if($options1=="B.TECH(Cs)") echo'selected="selected"';?> >B.TECH(Cs)</option>
								<option value="B.TECH(Mech.)"<?php if($options1=="B.TECH(Mech.)") echo'selected="selected"';?> >B.TECH(Mech.)</option>
								</select>
							</td>
							
							<td colspan="1"><label>&nbsp;&nbsp;&nbsp;&nbsp;Year_of_passing:</label></td>
							<td colspan="1"><input name="year_of_passing3" type = "text" class = "form-control" maxlength="4" value="<?php if($row_1['year_of_passing3']!=0){
								echo $row_1['year_of_passing3']; 
							}
							else{
								echo "";
							} ?>" /></td>
						</tr>
						
						<tr>
							<td colspan="1"><label>University:&nbsp;</label></td>
							<td colspan="1"><input name="university" type="text" class="form-control" maxlength="80" value="<?php echo $row_1['university']; ?>" /></td>
						</tr>
						
							<tr>
							<td colspan="1"><label>Post Graduation:&nbsp;</label></td>
							<td colspan="1"><select name="post_graduation" class="form-control" >
								<option value="">Select</option>
								<option value="MCA" <?php if($options2=="MCA") echo'selected="selected"';?> >MCA</option>
								<option value="MBA"<?php if($options2=="MBA") echo'selected="selected"';?> >MBA</option>
								<option value="M.COM" <?php if($options2=="M.COM") echo'selected="selected"';?> >M.COM</option>
								<option value="M.TECH(IT)" <?php if($options2=="M.TECH(IT)") echo'selected="selected"';?> >M.TECH(IT)</option>
								<option value="M.TECH(Cs)"<?php if($options2=="M.TECH(Cs)") echo'selected="selected"';?> >M.TECH(Cs)</option>
								<option value="M.TECH(Mech.)"<?php if($options2=="M.TECH(Mech.)") echo'selected="selected"';?> >M.TECH(Mech.)</option>
								</select>
							</td> 
							<td colspan="1"><label>&nbsp;&nbsp;&nbsp;&nbsp;Year_of_passing:</label></td>
							<td colspan="1"><input name="year_of_passing4" type = "text" class = "form-control" maxlength="4" value="<?php if($row_1['year_of_passing4']!=0){
								echo $row_1['year_of_passing4']; 
							}
							else{
								echo "";
							} ?>" /></td>
						
						</tr>
		
		
						<tr>
							<td colspan="1"><label>University:&nbsp;</label></td>
							<td colspan="1"><input name="university2" type="text" class="form-control" maxlength="80" value="<?php echo $row_1['university2']; ?>" /></td>
						</tr>
	                     
		

						<tr><td colspan=2><h3>Permanent Address- <hr></h3></td></tr>

						<tr>
							<td><label>State :</label></td>
							<td><select name="state" class="form-control" >
								<option value="state">Select State</option>
								<option value="Andhra Pradesh" <?php if($options3=="Andhra Pradesh") echo'selected="selected"';?>>Andhra Pradesh</option>
								<option value="Arunanchal Pradesh" <?php if($options3=="Arunanchal Pradesh") echo'selected="selected"';?>>Arunanchal Pradesh</option>
								<option value="Assam" <?php if($options3=="Assam") echo'selected="selected"';?>>Assam</option>
								<option value="Bihar" <?php if($options3=="Bihar") echo'selected="selected"';?>>Bihar</option>
								<option value="Chattisgarh" <?php if($options3=="Chattisgarh") echo'selected="selected"';?>>Chattisgarh</option>
								<option value="Goa" <?php if($options3=="Goa") echo'selected="selected"';?>>Goa</option>
								<option value="Gujarat" <?php if($options3=="Gujarat") echo'selected="selected"';?>>Gujarat</option>
								<option value="Haryana" <?php if($options3=="Haryana") echo'selected="selected"';?>>Haryana</option>
								<option value="Himachal Pradesh" <?php if($options3=="Himachal Pradesh") echo'selected="selected"';?>>Himachal Pradesh</option>
								<option value="Jammu And Kashmir" <?php if($options3=="Jammu And Kashmir") echo'selected="selected"';?>>Jammu and Kashmir</option>
								<option value="Jharkhand" <?php if($options3=="Jharkhand") echo'selected="selected"';?>>Jharkhand</option>
								<option value="Karnataka" <?php if($options3=="Karnataka") echo'selected="selected"';?>>Karnataka</option>
								<option value="Kerala" <?php if($options3=="Kerala") echo'selected="selected"';?>>Kerala</option>
								<option value="Madhya Pradesh" <?php if($options3=="Madhya Pradesh") echo'selected="selected"';?>>Madhya Pradesh</option>
								<option value="Maharashtra" <?php if($options3=="Maharashtra") echo'selected="selected"';?>>Maharashtra</option>
								<option value="Manipur" <?php if($options3=="Manipur") echo'selected="selected"';?>>Manipur</option>
								<option value="Meghalaya" <?php if($options3=="Meghalaya") echo'selected="selected"';?>>Meghalaya</option>
								<option value="Mizoram" <?php if($options3=="Mizoram") echo'selected="selected"';?>>Mizoram</option>
								<option value="Nagaland" <?php if($options3=="Nagaland") echo'selected="selected"';?>>Nagaland</option>
								<option value="Odisha" <?php if($options3=="Odisha") echo'selected="selected"';?>>Odisha</option>
								<option value="Punjab" <?php if($options3=="Punjab") echo'selected="selected"';?>>Punjab</option>
								<option value="Rajasthan" <?php if($options3=="Rajasthan") echo'selected="selected"';?>>Rajasthan</option>
								<option value="Sikkim" <?php if($options3=="Sikkim") echo'selected="selected"';?>>Sikkim</option>
								<option value="Tamil Nadu" <?php if($options3=="Tamil Nadu") echo'selected="selected"';?>>Tamil Nadu</option>
								<option value="Telangana" <?php if($options3=="Telangana") echo'selected="selected"';?>>Telangana</option>
								<option value="Tripura" <?php if($options3=="Tripura") echo'selected="selected"';?>>Tripura</option>
								<option value="Uttar Pradesh" <?php if($options3=="Uttar Pradesh") echo'selected="selected"';?>>Uttar Pradesh</option>
								<option value="Uttarakhand" <?php if($options3=="Uttarakhand") echo'selected="selected"';?>>Uttarakhand</option>
								<option value="West Bengal" <?php if($options3=="West Bengal") echo'selected="selected"';?>>West Bengal</option>
								</select></td>
						</tr>	 	
						
						<tr>
							<td><label for="city">City :</label></td> 
							<td><input name="city" type="text" class="form-control" maxlength="40" value="<?php echo $row_1['city']; ?>" /></td>
						</tr>
	
						
						<tr>
							<td><label>Pincode :</label></td>
							<td><input name="pincode" type="text" class="form-control" maxlength="6" value="<?php if($row_1['pincode']!=0){
								echo $row_1['pincode']; 
							}
							else{
								echo "";
							} ?>" /></td>
						</tr>
						
						<tr>
							<td><label>Landmark :</label></td>
							<td><input name="landmark" type="text" class="form-control" maxlength="80" value="<?php echo $row_1['landmark']; ?>" /></td>
						</tr>
						
						<tr>
							<td><label>Address :</label></td>
							<td><input name="address" type="text" class="form-control" maxlength="80" value="<?php echo $row_1['address']; ?>" /></td>
						</tr>
						<tr><td colspan="4">
						<input type = "submit" value="Update" name="update" class="styled-button-8" style="margin-left:45%;"/>
						</td></tr>
					
					
					</tbody>			 
					</table>	 
					</form>	
					</div>
				 
	
				<?php
				include('supdatequery.php');
				?>	
				
					<?php 
	}
	}
		}
		else
		{
			header('Location:logout.php');
		}

		?>
		<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/jquery.min.js"></script>
	
</body>
		<?php
			include('footer.php');
		?>
		
</html>
