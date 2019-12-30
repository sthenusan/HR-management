<?php 
include_once ('db_config.php');
session_start();


$username="";
$password="";
$email="";


//registering user
if (isset($_POST['register'])) {
    $username=mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    
    


    $query1 = "SELECT * FROM account WHERE email = '$email'";
    $results = mysqli_query($db,$query1);

    $query2 = "SELECT * FROM account WHERE username = '$username'";
    $results1 = mysqli_query($db,$query2);

    $query= "SELECT * FROM employee where emp_id='$username'";
    $results3= mysqli_query($db,$query);

    if ((mysqli_num_rows($results)==0) and (mysqli_num_rows($results1)==0)){

        if (mysqli_num_rows($results3)==1){


        ##$password =md5($password );
        $query = "INSERT INTO account (username,password,email)
                VALUES('$username','$password','$email')";
        
        mysqli_query($db, $query);
        header('location: /final_version/first_page.php');

        }
        
        else{
            echo "<script>alert('Entered username is wrong');</script>";
        }


    }
    else {
      echo "<script>alert('The entered email address or username already exists. Try again with another email address or username.');</script>";
    }       
}

?>