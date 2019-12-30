



<?php
   
    
 
	include_once ('../db_config.php');
    if(isset($_POST["save"])){

        $emp_id = trim($_POST['emp_id']);
        $emp_id= mysqli_real_escape_string($db, $emp_id);
        echo($emp_id);		 
        $fname = trim($_POST['fname']);
        $fname= mysqli_real_escape_string($db, $fname);
        
		$lname = trim($_POST['lname']);
		$lname = mysqli_real_escape_string($db, $lname);


		$marital_status= trim($_POST['marital_status']);
        $marital_status = mysqli_real_escape_string($db, $marital_status);


        $branch_id= trim($_POST['branch_id']);
        $branch_id = mysqli_real_escape_string($db, $branch_id);
        
		$nationality = trim($_POST['nationality']);
		$nationality = mysqli_real_escape_string($db, $nationality);
		
		$birth_date = trim($_POST['birth_date']);
		$birth_date = mysqli_real_escape_string($db, $birth_date);
		
		$gender = trim($_POST['gender']);
	    $gender = mysqli_real_escape_string($db, $gender);
		
		$Address = trim($_POST['Address']);
		$Address = mysqli_real_escape_string($db, $Address);
		
		
		$department = trim($_POST['department']);
		$department = mysqli_real_escape_string($db, $department);


        
         $contact_no = trim($_POST['contact_no']);
         $contact_no = mysqli_real_escape_string($db, $contact_no);
        
         $econtact_no = trim($_POST['econtact_no']);
		 $econtact_no = mysqli_real_escape_string($db, $econtact_no);
		
		 $contact_no1 = trim($_POST['contact_no1']);
		 $contact_no1 = mysqli_real_escape_string($db, $contact_no1);
        		

        
         $contact_per_name = trim($_POST['contact_per_name']);
         $contact_per_name = mysqli_real_escape_string($db, $contact_per_name);

         
        
         $joined_date= trim($_POST['joined_date']);
         $joined_date = mysqli_real_escape_string($db, $joined_date);

         $status = trim($_POST['status']);
		 $status= mysqli_real_escape_string($db, $status);
		
		 $role = trim($_POST['role']);
	     $role = mysqli_real_escape_string($db, $role);
		
		 $paygrade = trim($_POST['paygrade']);
         $paygrade = mysqli_real_escape_string($db, $paygrade);


        $num_child = trim($_POST['num_child']);
	    $num_child= mysqli_real_escape_string($db, $num_child);
		
		$num_relative = trim($_POST['num_relative']);
	    $num_relative = mysqli_real_escape_string($db, $num_relative);
		
		$num_family_members = trim($_POST['num_family_members']);
        $num_family_members  = mysqli_real_escape_string($db, $num_family_members );

		 
		
        $query = "UPDATE `employee` SET `fname`='$fname',`lname`='$lname',`emp_id`='$emp_id',`marital_status`='$marital_status',`nationality`='$nationality',`birth_date`='$birth_date',`gender`='$gender',`Address`='$Address' WHERE   emp_id = '$emp_id'"; 
		mysqli_query($db,$query);

		$queryB="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no1' )";
        mysqli_query($db,$queryB);

        $query1="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no' )";
		mysqli_query($db,$query1);

        
        $query2="UPDATE `emp_dependant_info` SET `emp_id`='$emp_id',`num_child`='$num_child',`num_relative`='$num_relative',`num_family_members`='$num_family_members'WHERE emp_id = '$emp_id'"; 
		mysqli_query($db,$query2);
		
		$query3="UPDATE `emp_emergency_contact` SET `emp_id`='$emp_id',`contact_per_name`='$contact_per_name',`econtact_no`='$econtact_no' WHERE emp_id = '$emp_id'";
        mysqli_query($db,$query3);
		
		$role_id='';
        $query4= "SELECT role_id FROM role WHERE role.role_name='$role'";
        $result=mysqli_query($db, $query4);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $role_id=$application['role_id'];
		}
		echo($role_id);
        $query5="UPDATE `emp_role` SET `emp_id`='$emp_id',`role_id`='$role_id'  WHERE emp_id = '$emp_id'";
		mysqli_query($db,$query5);
		

        $pg_id='';
        $query6 = "SELECT pg_id  FROM pay_grade WHERE pay_grade.pg_type='$paygrade'";
        $result=mysqli_query($db, $query6);
        $applicationArray1=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray1[]=$row;
        }
        foreach ($applicationArray1 as $application1) {
            $pg_id=$application1['pg_id'];
        }
        $query7= "UPDATE `emp_pg` SET `emp_id`='$emp_id',`pg_id`='$pg_id'  WHERE emp_id = '$emp_id'";
        mysqli_query($db,$query7);

        
        $status_id='';
        $query8 = "SELECT status_id  FROM employment_status WHERE employment_status.status_type='$status'";
        $result=mysqli_query($db, $query8);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $status_id=$application['status_id'];
        }
        
        $query9="UPDATE `emp_status` SET `emp_id`='$emp_id',`status_id`='$status_id' joined_date='$joined_date' WHERE emp_id = '$emp_id'";
		mysqli_query($db,$query9);
		


  //       $title_id='';
  //       $query10 = "SELECT title_id  FROM job_title WHERE job_title.title_name='$title_name'";
  //       $result=mysqli_query($db, $query10);
  //       $applicationArray=array();
  //       while($row=mysqli_fetch_assoc($result)){
  //           $applicationArray[]=$row;
  //       }
  //       foreach ($applicationArray as $application) {
  //           $title_id=$application['title_id'];
		// }
		// echo($title_id);
  //       $query11="UPDATE `emp_title` SET `emp_id`='$emp_id',`title_id`='$title_id'  WHERE emp_id = '$emp_id'";
  //       mysqli_query($db,$query11);

       


       // session_start();
 
       // $branch_id=$_GET["b0001"];
        
        if (strlen($branch_id)>1){

         $dept_id='';
		 $query12 = "SELECT dept_id  FROM department WHERE department.dept_name='$department'";
		 
         $result=mysqli_query($db, $query12);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
          }
         foreach ($applicationArray as $application) {
            $dept_id=$application['dept_id'];
          }
         $query13="UPDATE `emp_branch_department` SET `emp_id`='$emp_id',`dept_id`='$dept_id',branch_id='$branch_id'  WHERE emp_id = '$emp_id'";
         mysqli_query($db,$query13);

     }
       
        

		
		 
	 header('Location: ../hr.php');
		
		
	}
?>