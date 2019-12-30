<?php
	include_once ('../db_config.php');
    if(isset($_POST['add'])){

        
        
        $org_name = trim($_POST['org_name']);
        $org_name= mysqli_real_escape_string($db, $org_name);
        

		$branch_id = trim($_POST['branch_id']);
        $branch_id= mysqli_real_escape_string($db, $branch_id);
        
        
		$branch_name = trim($_POST['branch_name']);
        $branch_name = mysqli_real_escape_string($db, $branch_name);
        
		
		$country= trim($_POST['country']);
        $country= mysqli_real_escape_string($db, $country);
        
        
		$city = trim($_POST['city']);
        $city = mysqli_real_escape_string($db, $city);
        
        $street = trim($_POST['street']);
        $street = mysqli_real_escape_string($db, $street);
         
		$contact_no = trim($_POST['contact_no']);
        $contact_no = mysqli_real_escape_string($db, $contact_no);

        $contact_no1 = trim($_POST['contact_no1']);
        $contact_no1= mysqli_real_escape_string($db, $contact_no1);

        $contact_no2 = trim($_POST['contact_no2']);
        $contact_no2 = mysqli_real_escape_string($db, $contact_no2);
        
        $contact_no3 = trim($_POST['contact_no3']);
        $contact_no3 = mysqli_real_escape_string($db, $contact_no3);
        
        $department = trim($_POST['department']);
        $department = mysqli_real_escape_string($db, $department);

        $department1 = trim($_POST['department1']);
        $department1 = mysqli_real_escape_string($db, $department1);

        $department2 = trim($_POST['department2']);
        $department2 = mysqli_real_escape_string($db, $department2);

        $department3 = trim($_POST['department3']);
        $department3 = mysqli_real_escape_string($db, $department3);

        $q="select * from branch where branch_id='$branch_id'";
        $r=mysqli_query($db,$q);
        
        if (mysqli_num_rows($r) > 0)   {
                
            echo "<script>alert('already there is a branch with this id.Try again!'); location.href='../department.php';</script>";
        } else {
                

        

        $org_id='';
        $query = "SELECT org_id FROM organization WHERE organization.org_name='$org_name'";
        $result=mysqli_query($db, $query);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $org_id=$application['org_id'];
        }
        $query1="INSERT INTO branch (org_id,branch_id,branch_name,country,city,street) VALUES('$org_id','$branch_id','$branch_name', '$country','$city','thu')";
        $success=mysqli_query($db,$query1); 
        
        //for marketing
        $dept_id='';
        $query3 = "SELECT dept_id FROM department WHERE department.dept_name='$department'";
        $result=mysqli_query($db, $query3);
        $applicationArray=array();
           while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
           }
           foreach ($applicationArray as $application) {
              $dept_id=$application['dept_id'];
           }
            
        $query4="INSERT INTO departments_in_branch (branch_id,dept_id) VALUES('$branch_id','$dept_id')";
        $success1=mysqli_query($db,$query4);

        $id='';
        $query5 = "SELECT id FROM departments_in_branch where dept_id='$dept_id' and branch_id='$branch_id'";
        $result=mysqli_query($db, $query5);
        $applicationArray=array();
          while($row=mysqli_fetch_assoc($result)){
              $applicationArray[]=$row;
         }
          foreach ($applicationArray as $application) {
            $id=$application['id'];
         }
        $query6="INSERT INTO dept_branch_contact_num (id,phone) VALUES('$id','$contact_no')";
        mysqli_query($db,$query6);
        //for IT

       $dept_id1='';
       $query7 = "SELECT dept_id FROM department WHERE department.dept_name='$department1'";
       $result=mysqli_query($db, $query7);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $dept_id1=$application['dept_id'];
         }

        $query8="INSERT INTO departments_in_branch (branch_id,dept_id) VALUES('$branch_id','$dept_id1')";
        $success2=mysqli_query($db,$query8);

        $id='';
        $query9= "SELECT id FROM departments_in_branch where dept_id='$dept_id1' and branch_id='$branch_id' ";
        $result=mysqli_query($db, $query9);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $id=$application['id'];
         }

         $query10="INSERT INTO dept_branch_contact_num (id,phone) VALUES('$id','$contact_no1')";
         mysqli_query($db,$query10);
       // for human resource

         $dept_id2='';
         $query11= "SELECT dept_id FROM department WHERE department.dept_name='$department2'";
         $result=mysqli_query($db, $query11);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $dept_id2=$application['dept_id'];
         }

         $query12="INSERT INTO departments_in_branch (branch_id,dept_id) VALUES('$branch_id','$dept_id2')";
         $success3=mysqli_query($db,$query12);

         $id='';
         $query13= "SELECT id FROM departments_in_branch where dept_id='$dept_id2' and branch_id='$branch_id' ";
         $result=mysqli_query($db, $query13);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $id=$application['id'];
         }

         $query14="INSERT INTO dept_branch_contact_num (id,phone) VALUES('$id','$contact_no2')";
         mysqli_query($db,$query14);
         //for finance

         $dept_id3='';
         $query15= "SELECT dept_id FROM department WHERE department.dept_name='$department3';";
         $result=mysqli_query($db, $query15);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $dept_id3=$application['dept_id'];
         }

         $query16="INSERT INTO departments_in_branch (branch_id,dept_id) VALUES('$branch_id','$dept_id3')";
         $success2=mysqli_query($db,$query16);

         $id='';
         $query17= "SELECT id FROM departments_in_branch where dept_id='$dept_id3' and branch_id='$branch_id' ";
         $result=mysqli_query($db, $query17);
         $applicationArray=array();
         while($row=mysqli_fetch_assoc($result)){
             $applicationArray[]=$row;
         }
         foreach ($applicationArray as $application) {
             $id=$application['id'];
         }

         $query18="INSERT INTO dept_branch_contact_num (id,phone) VALUES('$id','$contact_no3')";
         mysqli_query($db,$query18);

         header('Location: ../department.php');
        
       
        
        
        
       
        }
	
 	 }
 ?>