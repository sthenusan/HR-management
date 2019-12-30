<?php
	include_once ('../db_config.php');
    if(isset($_POST['add'])){

        
        
        $emp_id = trim($_POST['emp_id']);
        $emp_id= mysqli_real_escape_string($db, $emp_id);

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
        
        $contact_no = trim($_POST['contact_no']);
        $contact_no = mysqli_real_escape_string($db, $contact_no);

        $contact_no1 = trim($_POST['contact_no1']);
        $contact_no1= mysqli_real_escape_string($db, $contact_no1);

        $contact_no2 = trim($_POST['contact_no2']);
        $contact_no2 = mysqli_real_escape_string($db, $contact_no2);
        
        $econtact_no = trim($_POST['econtact_no']);
        $econtact_no = mysqli_real_escape_string($db, $econtact_no);
        
        $contact_per_name = trim($_POST['contact_per_name']);
        $contact_per_name = mysqli_real_escape_string($db, $contact_per_name);

        $department = trim($_POST['department']);
        $department = mysqli_real_escape_string($db, $department);

        $title_name = trim($_POST['title_name']);
        $title_name = mysqli_real_escape_string($db, $title_name);
        
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

        $image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));



        $q="select * from hr_details where branch_id='$branch_id'";
        $r=mysqli_query($db,$q);
        
        if (mysqli_num_rows($r) > 0)   {
                
            echo "<script>alert('already that branch has HR Maneger!'); location.href='../hr.php';</script>";
        } 
        else {


        
        
		 
		 
		 
        $query="INSERT INTO employee (emp_id,fname,lname,marital_status,nationality,birth_date,gender,Address,image) VALUES('$emp_id','$fname','$lname', '$marital_status','$nationality','$birth_date','$gender','$Address','$image')";
        mysqli_query($db,$query);

        $queryA="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no1' )";
        mysqli_query($db,$queryA);

        $queryB="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no2' )";
        mysqli_query($db,$queryB);

        $query1="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no' )";
        mysqli_query($db,$query1);
       
        $query2="INSERT INTO emp_emergency_contact (emp_id,contact_per_name,econtact_no) VALUES('$emp_id','$contact_per_name','$econtact_no' )";
        mysqli_query($db,$query2);

        $role_id='';
        $query8 = "SELECT role_id FROM role WHERE role.role_name='$role'";
        $result=mysqli_query($db, $query8);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $role_id=$application['role_id'];
        }
        $query3="INSERT INTO emp_role(emp_id,role_id) VALUES('$emp_id','2' )";
        mysqli_query($db,$query3);

        $pg_id='';
        $query9 = "SELECT pg_id  FROM pay_grade WHERE pay_grade.pg_type='$paygrade'";
        $result=mysqli_query($db, $query9);
        $applicationArray1=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray1[]=$row;
        }
        foreach ($applicationArray1 as $application1) {
            $pg_id=$application1['pg_id'];
        }
        $query4="INSERT INTO emp_pg(emp_id,pg_id) VALUES('$emp_id','$pg_id' )";
        mysqli_query($db,$query4);

        
        $status_id='';
        $query10 = "SELECT status_id  FROM employment_status WHERE employment_status.status_type='$status'";
        $result=mysqli_query($db, $query10);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $status_id=$application['status_id'];
        }
        
        

        $query5="INSERT INTO emp_status(emp_id,status_id,joined_date) VALUES('$emp_id','$status_id','$joined_date' )";
        mysqli_query($db,$query5);

        $title_id='';
        $query11 = "SELECT title_id  FROM job_title WHERE job_title.title_name='$title_name'";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $title_id=$application['title_id'];
        }
        $query6="INSERT INTO emp_title(emp_id,title_id) VALUES('$emp_id','1' )";
        mysqli_query($db,$query6);

        $query7="INSERT INTO emp_dependant_info (emp_id,num_child,num_relative,num_family_members) VALUES('$emp_id','$num_child','$num_relative','$num_family_members')";
        mysqli_query($db,$query7);



       // session_start();
 
       // $branch_id=$_GET["b0001"];
         
         
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
         $query13="INSERT INTO emp_branch_department(branch_id,dept_id,emp_id) VALUES('$branch_id','d0004','$emp_id' )";
         mysqli_query($db,$query13);
       
    
		
    header('Location: ../hr.php');


 
}
}
?>