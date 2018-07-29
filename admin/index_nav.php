<style>
#pfimage{
	width: 105px;
    height: 105px;
    position: relative;
    overflow: hidden;
    border-radius: 50%;	
	}
</style>
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered">
				  <a href="profile.php"><?php
									if($row_1['pic_status']==1){
										echo"<img id='pfimage' src='uploads/profile".$_SESSION['username'].".jpg?'".mt_rand().">";
									}
									else{
										echo"<img id='pfimage' src='uploads/profiledefault.jpg'>";
									}
							?></a></p>
              	  <h5 class="centered"><?php

                    if($row_1['admin_name']=="")
                    {
                        echo ($row_1['admin_id']);
                    }
                    else{
                        echo ($row_1['admin_name']);
                    }
                    ?></h5>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Manage Students</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="std_details.php">Students Registered</a></li>        
                          <li><a  href="add_user.php">Add Student</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Manage Admin</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="admin_details.php">Admin Registered</a></li>
                          <li><a  href="create_admin.php">Add Admin</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Manage Profile</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="profile.php">Update Profile</a></li>
                          <li><a  href="change_password.php">Change Password</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>