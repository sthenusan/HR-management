<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "hrm");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM emp_details WHERE emp_id = "."'".$_POST['employee_id']."'"; 
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);

      $query2 = "SELECT * FROM hr_details WHERE emp_id = "."'".$_POST['employee_id']."'"; 
      $result2 = mysqli_query($connect, $query2);  
      $row2 = mysqli_fetch_array($result2);



      $fname = $row['fname'];
      $lname = $row['lname'];
      $branch_id = $row2['branch_id'];
      $marital_status=$row['marital_status'];

      $nationality = $row['nationality'];
      $birth_date = $row['birth_date'];
      $gender = $row['gender'];
      $Address = $row['Address'];
      $num_child= $row['num_child'];
      $num_relative = $row['num_relative'];
      $num_family_members = $row['num_family_members'];
      $contact_per_name = $row['contact_per_name'];
      $econtact_no = $row['econtact_no'];
      
      $role_name = $row['role_name'];
      $pg_type = $row['pg_type'];
      
      $status_type = $row['status_type'];
      $joined_date = $row['joined_date'];
      

      
      $data['fname'] = $fname;
      $data['lname'] = $lname;
      $data['branch_id']=$branch_id;
      $data['marital_status'] = $marital_status;
      $data['nationality'] = $nationality;
      $data['birth_date'] = $birth_date;
      $data['gender'] = $gender;
      $data['Address'] = $Address;
      $data['num_child'] = $num_child;
      $data['num_relative'] = $num_relative;
      $data['num_family_members'] = $num_family_members;
      $data['contact_per_name'] = $contact_per_name;
      $data['econtact_no'] = $econtact_no;
      $data['title_name'] = $title_name;
      $data['role_name'] = $role_name;
      $data['pg_type'] = $pg_type;
      $data['status_type'] = $status_type;
      $data['joined_date'] = $joined_date;
            
  
     
      echo json_encode($data);  
 }  
 ?>
 