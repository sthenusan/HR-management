<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update employee details</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="libs\css\applied_leave.css">
<link rel="stylesheet" href="libs\css\profile_card.css">
.
</head>

<body>
  
    <?php session_start();
    $_SESSION['username']='e000100003';
    if (!isset($_SESSION['username'])){
        header("location: access_restricted.php");
        exit();
    }
    ?>

        
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>View Employee Leave Count</b></h2>
					</div>
                </div>
            </div>

           
                        
            <?php

            include 'config\database.php';
            include 'objects\employee.php';

            $db=new Database();
            $user=new Employee($_SESSION['username'],$db->getConnection());
            if ((($user->role)==2)){
                header("location: access_restricted.php");
                exit();
            }
            $stmt = $user->employeeDetailsForLeave();
            $num = $stmt->rowCount();
            if($num>0){

            ?>
                         <?php
                            //display error / success mesages
                            if (isset($_SESSION['message'])){
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                        ?>
            
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>
                        <th>Employee Id</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
            
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
                        extract($row);?>
            
                        <tr>

                            <td ><?php echo $row['emp_id']?></td>
                            <td ><?php echo ucwords (strtolower($row['name']))?></td>
                            <td><?php echo ucwords (strtolower( $row['dept_name']))?></td>
                            <td>

                                <a href='assets/manager_view_emp_leave.inc.php?emp_id=<?php echo $row['emp_id']?>' data-toggle='modal'  id="<?php echo $row['emp_id']; ?>" class='btn btn-primary left-margin '>
                                    <span class='glyphicon glyphicon-eye-open'></span> View
                                </a> 
                            </td>
                        </tr>
                    <?php } ?>
            
                </table>
            
                <?php
            }
            else{
                echo "<div class='alert alert-info'>No Employees were found.</div>";
            }
            ?>
            
			
        </div>
	</div>
    
    
</body>
</html>                                		                            