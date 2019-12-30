<?php
	include_once ('../db_config.php');
    if(isset($_POST['add'])){

        $org_id = trim($_POST['org_id']);
        $org_id= mysqli_real_escape_string($db, $org_id);

        $branch_id = trim($_POST['branch_id']);
        $branch_id= mysqli_real_escape_string($db, $branch_id);

        $name = trim($_POST['name']);
        $name= mysqli_real_escape_string($db, $name);

        $country = trim($_POST['country']);
        $country= mysqli_real_escape_string($db, $country);

        $city = trim($_POST['city']);
        $city= mysqli_real_escape_string($db, $city);

        $street = trim($_POST['street']);
        $street= mysqli_real_escape_string($db, $street);


        $check_branch="SELECT * FROM branch where branch_id='$branch_id' and org_id='$org_id'";
        $result= mysqli_query($db,$check_branch);

        if(mysqli_num_rows($result)==0){
                $query="INSERT INTO branch (org_id,branch_id,name,country,city,street) VALUES('$org_id','$branch_id','$name', '$country','$city','$street')";
            mysqli_query($db,$query);

            header('location:../add_branch.php');

        }
        else{
            echo "<script>alert('The entered branch is already exists. Check and try again.');</script>";
            header('location:../add_branch.php');
        }


		

        #$image=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		 
		 
		 

          
       
       
		
       // header('Location: ../employee.php');
	}
?>