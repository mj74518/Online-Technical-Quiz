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
  
  </head>

  <body style="background-image:url('images/header.jpg'); background-size:100%;">

  <section class="container" >
      
      <?php
		include('index_nav.php');
	  ?>
		<section class="wrapper">
			
			<div class="col-lg-12">
			<div style="color:#000;"><h2><b>DASHBOARD</b></h2></div>
			<hr>
				<form action="index.php" method="POST">	
				<center>
				<div style=" background:#fff; padding:1% 3% 3% 3% ; border-radius:3px;">
				<div class="visible-lg visible-md">
				<center><h3><b>Select Course And Subject To choose from variety of Avaiable Quizes</b></h3></center></div>
				<div class="visible-sm visible-xs" style="color:Red;">
				<center><h4>Select Course And Subject To choose from variety of Avaiable Quizes</h4></center></div><br>
				<table class="table table-striped table-advance table-hover" style="width:95%; background:#fff;" >
					<tr>
						<td>Choose Course</td>

						<td>
						<?php
						$query = $con->query("SELECT * FROM course");    
						$rowCount = $query->num_rows;
						?>
						<select name="course_id" id="course" class="form-control" >
						<option value="0">Select Course</option>

							<?php
								if($rowCount > 0){
									while($row = $query->fetch_assoc()){ 
										echo '<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
									}
								}else{
									echo '<option value="">Course not available</option>';
								}
							?>

						</select>
						</td>
					</tr>
					<tr>
						<td>Choose Subject</td>
						<td>
						<select name="sub_id" id="subject"  class="form-control" >
						<option value="0">Select Subject</option>							
						</select>  
						</td>
					</tr>
					<tr><td></td>
					<td><input  type="submit" name="search_btn" style="float:right" value="Go" class="btn btn-primary"/></td></tr>
				</table>
				</div>	
				</center>			
				</form>	
					<?php
						if(isset($_POST['search_btn'])){	
						$subject=$_POST['sub_id'];
						header("location:quiz.php?sub_id=$subject");
						}
					?>
			</div>
			
			<br />
			<br />
		</section>
	  
	<footer class="site-footer" style="bottom:0px;position:fixed;width:100%;">
	<div class="text-center">2018 - Mohit Chandra Joshi
	<a href="index.php#" class="go-top"><i class="fa fa-angle-up"></i></a>
	</div>
	</footer>
  </section>
	<script src="assets/js/jquery.js"></script>
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
<script type="text/javascript">
$(document).ready(function(){
    $('#course').on('change',function(){
        var courseID = $(this).val();
	
        if(courseID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:{'course_id':courseID},
                success:function(html){
                    $('#subject').html(html);
					
                }
            }); 
        }else{
            $('#subject').html('<option value="">Select Course first</option>');
        }
    });
    
});
</script> 

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
