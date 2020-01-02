<html>
<?php
session_start();
$emp_id =$_SESSION['username'];



 $db = mysqli_connect('localhost', 'root', '', 'hrm');
    if(isset($_POST['apply'])){

        
        
        

		$from_date = trim($_POST['from_date']);
        $from_date= mysqli_real_escape_string($db, $from_date);
        
		$applied_date = trim($_POST['applied_date']);
		$applied_date = mysqli_real_escape_string($db, $applied_date);
		
		$no_of_days= trim($_POST['no_of_days']);
        $no_of_days = mysqli_real_escape_string($db, $no_of_days);
        
		$leave_type = trim($_POST['leave_type']);
		$leave_type = mysqli_real_escape_string($db, $leave_type);
		$l_status="requested";
		
		

		$leave_id='';
        $query11 = "SELECT leave_id  FROM leave_type WHERE leave_type='$leave_type';";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $leave_id=$application['leave_id'];
        }
        $query = "SELECT SUM(no_of_days) FROM emp_applied_leave where leave_id =$leave_id and l_status='approved' and  emp_id='$emp_id'"; 
  
$result = mysqli_query($db,$query) or die(mysqli_error());

// Print out result
while($row = mysqli_fetch_array($result)){
    $days=$row['SUM(no_of_days)'];
    
}

$allowed_leave='';
        $query11 = "SELECT allowed_leave  FROM max_allowe_leave WHERE leave_id='$leave_id' and emp_id='$emp_id'";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $allowed_leave=$application['allowed_leave'];
        }
      $gender='';
        $query11 = "SELECT gender  FROM employee WHERE employee.emp_id='$emp_id'";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $gender=$application['gender'];
        }

 $apply='';
 
         $query11 = "SELECT applied_date  FROM emp_applied_leave WHERE emp_id='$emp_id'order by applied_date limit 1";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $apply=$application['applied_date'];
        }

        $from='';
 
         $query11 = "SELECT from_date  FROM emp_applied_leave WHERE emp_id='$emp_id'order by from_date limit 1";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $from=$application['from_date'];
        }
        if ($apply==$applied_date){
                echo "<script>alert('You cannot apply for on same date.'); location.href='/final_version/inc/apply-leave.php';</script>";
        }
else if ($from==$from_date){
                echo "<script>alert('You have already applied for leave on this date.'); location.href='/final_version/inc/apply-leave.php';</script>";
        }

        else if ( ($gender=='m') and ($leave_type=='maternity')){
                echo "<script>alert('You cannot apply for maternity leave.'); location.href='/final_version/inc/apply-leave.php';</script>";
                 //echo "<script>alert('already that branch has HR Maneger!'); location.href='../hr.php';</script>";
                
            }
        
      
        else if (($days)>=($allowed_leave)){
            echo "<script>alert('You cannot apply for leave. You are exceeding the limit');location.href='/final_version/inc/apply-leave.php';</script>";
        } 

        else if (($allowed_leave-$days)<$no_of_days){
            echo "<script>alert('You cannot apply for leave. Your applied days exceeding the allow limit');location.href='/final_version/inc/apply-leave.php';</script>";
        }

        else{
        
        $query="INSERT INTO emp_applied_leave (emp_id,applied_date,from_date,no_of_days,l_status,leave_id) VALUES('$emp_id','$applied_date','$from_date','$no_of_days','$l_status','$leave_id')";
        $result=mysqli_query($db,$query);
        if ($result){
           echo "<script>alert('Your leave application has been submitted successfully');location.href='/final_version/inc/apply-leave.php';</script>";
        }else{
             echo "<script>alert('Some thing went wrong try again');location.href='/final_version/inc/apply-leave.php';</script>";
        }
    }

       
    

       
 


       // session_start();
 
       // $branch_id=$_GET["b0001"];
        
       
       
       
		
       // header('Location: ../employee.php');
	}
?>

</html>