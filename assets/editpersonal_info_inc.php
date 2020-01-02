<?php       
 
    include_once ('../db_config.php');
    if(isset($_POST["save"])){
       
        $emp_id = trim($_POST['emp_id']);
		$emp_id = mysqli_real_escape_string($db, $emp_id);
        
        $fname = trim($_POST['fname']);
        $fname= mysqli_real_escape_string($db, $fname);
        
		$lname = trim($_POST['lname']);
		$lname = mysqli_real_escape_string($db, $lname);

        $marital_status= trim($_POST['marital_status']);
        $marital_status = mysqli_real_escape_string($db, $marital_status);
        
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
        $contact_no1 = mysqli_real_escape_string($db, $contact_no1);
        
        $econtact_no = trim($_POST['econtact_no']);
		$econtact_no = mysqli_real_escape_string($db, $econtact_no);
		
	    $contact_per_name = trim($_POST['contact_per_name']);
        $contact_per_name = mysqli_real_escape_string($db, $contact_per_name);

        $num_child = trim($_POST['num_child']);
	    $num_child= mysqli_real_escape_string($db, $num_child);
		
		$num_relative = trim($_POST['num_relative']);
	    $num_relative = mysqli_real_escape_string($db, $num_relative);
		
		$num_family_members = trim($_POST['num_family_members']);
        $num_family_members  = mysqli_real_escape_string($db, $num_family_members );

		$query = "UPDATE `employee` SET `fname`='$fname',`lname`='$lname',`marital_status`='$marital_status',`nationality`='$nationality',`birth_date`='$birth_date',`gender`='$gender',`Address`='$Address' WHERE   emp_id = '$emp_id'"; 
		mysqli_query($db,$query);

		$queryB="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no1' )";
        mysqli_query($db,$queryB);

        $query1="INSERT INTO emp_contact_num (emp_id,contact_no) VALUES('$emp_id','$contact_no' )";
		mysqli_query($db,$query1);

        
        $query2="UPDATE `emp_dependant_info` SET `emp_id`='$emp_id',`num_child`='$num_child',`num_relative`='$num_relative',`num_family_members`='$num_family_members'WHERE emp_id = '$emp_id'"; 
		mysqli_query($db,$query2);
		
		$query3="UPDATE `emp_emergency_contact` SET `emp_id`='$emp_id',`contact_per_name`='$contact_per_name',`econtact_no`='$econtact_no' WHERE emp_id = '$emp_id'";
        mysqli_query($db,$query3);
		
		 

        echo "<script>alert('Profile Edited Succesfully'); location.href='../inc/profile.php';</script>";
		

 

       


       
		
		 
	// header('Location: ../employee.php');
		
		
	}
?>