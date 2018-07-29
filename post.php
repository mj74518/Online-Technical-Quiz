<!DOCTYPE html>
<html>
<head>
	<title>Post</title>
	<!--?php
		require 'bootstrap/head.php';
	?-->
	 <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />  
  
</head>
<body style="background-image:url('images/header.jpg'); background-size:100%;">
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
		  <a style="color:white;" class="navbar-brand" href="index.php"><b>TECHNICAL DISCUSSION FORUM</b></a>
	   <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-left">
				<li ><a style="color:white;" href="#home"><span class="glyphicon glyphicon-home"></span></a></li>
				<li>
				<form class="navbar-form navbar-left">
			    <div class="form-group">
			        <input type="text" class="form-control" placeholder="Search">
			    </div>
			    <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>
				</form>
				</li>
				
				</ul>
            
                <ul class="nav navbar-nav navbar-right">
				<li class="dropdown" >
				<a style="color:white;" class="dropdown-toggle" data-toggle="dropdown" href="#"><strong>username<!--?php
					
					if($row_1['full_name']=="")
					{
						echo ($row_1['user_id']); 
					}
					else{
						echo ($row_1['full_name']);
					}
				 ?--></strong>&nbsp;<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				<li><a href="schangepass.php">Change Password</a></li>
				<li><a href="supdate_profile.php">Edit Profile</a></li>
				</ul>
			</li>
					<li><a style="color:white;" class="logout" href="logout.php" title="LogOut"><span class="glyphicon glyphicon-off"><span></a>
            	</ul>
            </div>
           
        </div>
    </div>
	
	 <table class="table table-condensed table-hover" style=" background-color:#2c3e50; border-radius:3px; margin-top: 9%; margin-left:8%; width: 10em;">
    	
		<tr> 
    		<td><a style="color:#3498db;" class="dropdown" href="" >topic 1</a></td>
    	</tr>	
		<tr> 
    		<td><a style="color:#3498db;" class="dropdown" href="" >topic 2</a></td>
    	</tr>	
		<tr> 
    		<td><a style="color:#3498db;" class="dropdown" href="" >topic 3</a></td>
    	</tr>
    	|</table>
	<script src="assets/js/jquery.js"></script> 
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

   </body>
   <?php
   include('footer.php')
   ?>
</html>