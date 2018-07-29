<?php

include('dbconfig/config.php');

if(isset($_POST["course_id"])){
	$var=$_POST['course_id'];
    $query = $con->query("SELECT * FROM subject WHERE course_id ='$var'");
    $rowCount = $query->num_rows;

    if($rowCount > 0){
        echo '<option value="">Select Subject</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sub_id'].'">'.$row['sub_name'].'</option>';
			
        }
    }else{
        echo '<option value="">Subject not available</option>';
    }
}
?>