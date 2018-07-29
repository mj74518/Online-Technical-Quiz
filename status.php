<div style="color:#000;">
<table class="table table-hover" style="background-color:#fff; border-radius:5px;">
<tr><td><b>Switch Questions From Here:&nbsp;</b><?php
$res=$con->query("Select * from question WHERE test_id='$test_id'");
$rows = mysqli_num_rows($res);
while($row_ = $res->fetch_assoc()){
$que_i=$row['que_id'];

for($i=1;$i<=$rows;$i++){
?>

<a href="skip.php?test_id=<?php echo $test_id ?>&s_no=<?php echo $s_no ?>&total=<?php echo $rows ?>&que_id=<?php echo $que_i ?>"
name="skip" class="btn btn-round btn-primary"><?php echo $i ?></a>
&nbsp;
<?php
}
}
?>
</td></tr>
</table>
</div>