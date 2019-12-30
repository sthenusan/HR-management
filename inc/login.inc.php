<?php 
session_start();
include_once ('db_config.php');


    $username="";
    $password="";

    if (isset($_POST['login'])) {

        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        ##$password = md5($password);
        
        $query = "SELECT * FROM account WHERE username = '$username' AND password = '$password' ";
        $results = mysqli_query($db,$query);

        $date=date("Y-m-d");

        $query_data="UPDATE account SET last_logged_date='$date' where username='$username' ";

        $result4=mysqli_query($db,$query_data);


        
            if (mysqli_num_rows($results)==1){

                $row = mysqli_fetch_array($results);
                #echo "<script>alert('You are logged in');</script>";        
                
                $role_query= "SELECT * FROM emp_role where emp_id='$username'";
                $result_role_query=mysqli_query($db,$role_query);

                if (mysqli_num_rows($result_role_query)>0){
                    $row_role_query= mysqli_fetch_array($result_role_query);
                    $_SESSION['username'] = $row['username'];

                    if ($row_role_query['role_id']==1){
                        
                        header("location:admin_first.php");
                    }

                    else if ($row_role_query['role_id']==2){
                        
                        header("location:hr_first.php");
                    }
                    else if ($row_role_query['role_id']==3){
                        
                        header("location:secondmanager_first.php");
                    }

                    else if ($row_role_query['role_id']==4){
                        header("location:employee_first.php");
                        
                    }
                    else if($row_role_query['role_id']==5){
                        header("location:employee_first.php");
                        
                    }              
                

                }
                else{
                    
                    header("location:loginfail.php");
                    
                }
            }
                else{
                    
                    header("location:loginfail.php");
                    
                }
    }


?>