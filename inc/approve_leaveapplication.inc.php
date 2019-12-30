<?php 

$conn=mysqli_connect('localhost','root','','hrm');
$eid=$_GET['eid'];
if (isset($_POST['approve'])) {
	$data="approved";
	$sql1="UPDATE _leave SET leave_status = '$data' WHERE emp_reg_id='$eid';";
	mysqli_query($conn,$sql1);
	header("Location: ../account.php?approved");
}else if(isset($_POST['reject'])){
	$data="rejected";
	$sql1="UPDATE _leave SET leave_status = '$data' WHERE emp_reg_id='$eid';";
	mysqli_query($conn,$sql1);
	header("Location: ../account.php?rejected");
}