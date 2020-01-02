


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
    //$_SESSION['username']='e000100003';
    if (!isset($_SESSION['username'])){
        header("location: access_restricted.php");
        exit();
    }

    include 'config\database.php';
    include 'objects\employee.php';
    $db=new Database();
    $user=new Employee($_SESSION['username'],$db->getConnection());
    if (!(($user->role)==2 or ($user->role)==3)){
        header("location: access_restricted.php");
        exit();
    }
    ?>
    

	<div >
		<div class="modal-dialog">
			<div class="modal-content">
				
					<div class="modal-header">		
						<h4  style="font-weight: 600 ;text-align: center">Update Employee Details</h4>
                    </div>
					<div class="modal-body" >

                        <form action="assets\emp_update_new_field.inc.php" method="post"> 


                        <?php

                        if (isset($_GET["view_emp_id"])){
                            $emp_id=$_GET["view_emp_id"];
                            $employee= new Employee($emp_id,$db->getConnection());
                            $stmt=$employee->getNewFields();
                        ?>

                                <div class="form-group">
                                    <label>Employee Id</label>
                                    <input type="text" class="form-control" name="emp_id" value="<?php echo $emp_id?>" >
                                </div>

                        <?php
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);
                                    $attribute_type=$row['attribute_type'];
                                    if ($attribute_type=='date'){
                                        $type='date';
                                        $step='';
                                        $pattern='';
                                        $title='';
                                        $max_len='';
                                        $min_len='';
                                    }elseif($attribute_type=='string'){
                                        $type='text';
                                        $step='';
                                        $pattern='^[a-zA-Z]+(\s[a-zA-Z]+)?$';
                                        $title='Alphabetic characters only';
                                        $max_len=strval($row['max_length']);
                                        $min_len=strval($row['min_length']);
                                    }elseif($attribute_type=='float'){
                                        $type='number';
                                        $step='any';
                                        $pattern='';
                                        $title='Decimal';
                                        $max_len=strval($row['max_length']);
                                        $min_len=strval($row['min_length']);
                                    }elseif($attribute_type=='integer'){
                                        $type='number';
                                        $step='';
                                        $pattern='';
                                        $title='';
                                        $max_len=strval($row['max_length']);
                                        $min_len=strval($row['min_length']);
                                    }
                        ?>      
                                <div class="form-group">
                                            <label><?php echo ucfirst(strtolower(($row['attribute_name'])))?></label>
                                            <input type='<?php echo $type?>'step='<?php echo $step?>' maxlength='<?php echo $max_len?>' minlength='<?php echo $min_len?>' title=<?php echo $title?> pattern=<?php echo $pattern?> class="form-control" name="<?php echo $row['attribute_name']?>"  value="<?php echo $employee->getNewFieldValue($row['attribute_name'])?>">
                                </div>
                                    

                        <?php } ?>
                                <div class="modal-footer">
                                    <button onclick="location.href ='view_available_emp.php'" type="button" class="btn btn-default"  >Back</button>
                                    <input type="submit" name='Submit'class="btn btn-primary" value="Update">
                                </div>
                        <?php  }?>
                        
      
                        
                        
					</div>
					
			</div>
		</div>
	</div>
    
    
  
    
</body>
</html>                                		                            