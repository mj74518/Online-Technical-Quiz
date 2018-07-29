<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
		  <a style="color:white;" class="navbar-brand" href="index.php">ONLINE TECHNICAL QUIZ</a>
	   <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
				<li ><a style="color:white;" href="index.php">HOME</a></li>
				<li><a style="color:white;" href="quiz.php">All Quiz</a></li>
           
				<li class="dropdown" >
				<a style="color:white;" class="dropdown-toggle" data-toggle="dropdown" href="#"><strong><?php
					
					if($row_1['full_name']=="")
					{
						echo ($row_1['user_id']);
					}
					else{
						echo ($row_1['full_name']);
					}
				 ?></strong>&nbsp;<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				<li><a href="change_pass.php">Change Password</a></li>
				<li><a href="update_profile.php">Update Profile</a></li>
				</ul>
			</li>
					<li><a style="color:white;" class="logout" href="logout.php" title="LogOut"><span class="glyphicon glyphicon-off"><span></a>
            	</ul>
            </div>
           
        </div>
    </div>
