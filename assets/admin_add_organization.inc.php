<?php
	include_once ('../db_config.php');
    if(isset($_POST['add'])){

        $org_id = trim($_POST['org_id']);
        $org_id= mysqli_real_escape_string($db, $org_id);

        $org_name = trim($_POST['name']);
        $org_name= mysqli_real_escape_string($db, $org_name);




        $check_org="SELECT * FROM organization where org_id='$org_id'";
        $result= mysqli_query($db,$check_org);

        if(mysqli_num_rows($result)==0){
                $query="INSERT INTO organization (org_id,org_name) VALUES ('$org_id','$org_name')";
            mysqli_query($db,$query);

            header('location:../add_organization.php');

        }
        else{
            echo "<script>alert('The entered organization is already exists. Check and try again.');</script>";
            
        }


        if (1>0){
            header('location:../add_organization.php');

        }


        


		

        
		 
		 
		 

          
       
       
		
       // header('Location: ../employee.php');
	}
?>