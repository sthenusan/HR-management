


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Leave applied by employees</title>
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
    //$_SESSION['username']='e000100004';
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
						<h2><b>Leave Applied by Employees</b></h2>
					</div>
                </div>
            </div>

           
                        
            <?php

            include 'config\database.php';
            include 'objects\applied_leave.php';

            $db=new Database();
            $application=new ViewAppliedLeave($db->getConnection(),$_SESSION['username']);
            if (($application->role)==1 or ($application->role)==5){
                header("location: access_restricted.php");
                exit();
            }
            $stmt = $application->readAppliedLeave();
            $num = $stmt->rowCount();
            if($num>0){

            ?>
            
                <table class='table table-hover table-responsive table-bordered'>
                    <tr>;
                        <th>Employee Id</th>
                        <th>Applied Date</th>
                        <th>Type of leave</th>
                        <th>From Date</th>
                        <th>Number of days</th>
                        <th>Actions</th>
                    </tr>
            
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            
                        extract($row);?>
            
                        <tr>

                            <td ><?php echo $row['emp_id']?></td>
                            <td ><?php echo $row['applied_date']?></td>
                            <td><?php echo $row['leave_type']?></td>
                            <td><?php echo $row['from_date']?></td>
                            <td><?php echo $row['no_of_days']?></td>
                            <td>

                                <a href='#viewEmployeeModal' data-toggle='modal' name="view" value="view" id="<?php echo $row['emp_id']; ?>" class='btn btn-info left-margin view_data'>
                                        <span class='glyphicon glyphicon-eye-open'></span> View
                                    </a>

                                    <a href="assets\applied_leave_approve.inc.php?id=<?php echo $row['emp_id'];?>&date=<?php echo $row['applied_date']?>"  class='btn btn-success left-margin'>
                                        <span class='glyphicon glyphicon-ok'></span> Approve
                                    </a>

                                    <a href="assets\applied_leave_reject.inc.php?id=<?php echo $row['emp_id'];?>&date=<?php echo $row['applied_date']?>"  class='btn btn-danger left-margin'  onclick="return confirm('Are you sure you want to reject the leave application ?')">
                                        <span class='glyphicon glyphicon-remove'></span> Reject
                                    </a>
                                 
                            </td>
                        </tr>
                    <?php } ?>
            
                </table>
            
                <?php
                // paging buttons will be here
            }
            
            // tell the user there are no products
            else{
                echo "<div class='alert alert-info'>No Leave Applications were found.</div>";
            }
            ?>
            
			
        </div>
	</div>
	


    <!--Profile Card -->
	<div id="viewEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
    		    <div class="card profile-card-5">
    		        <div class="card-img-block">
    		            <img class="card-img-top" src="libs/css/index.jpg" alt="Card image cap">
    		        </div>
                    <div class="card-body " >
                    <p class="card-text" id="employee_detail"></p>

                    <a href="#" class="btn btn-primary center">More information</a>
                  </div>
                </div>
    		        <div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					</div>
            </div>
		</div>
	</div>
    
    <script>  
 
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"assets/ajax_emp_info.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#viewEmployeeModal').modal('show');  
                     }  
                });  
           }            
      });  
  
 </script>

	
</body>
</html>                                		                            








