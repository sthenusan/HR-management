<?php 
session_start();
$emp_id=$_SESSION["username"];
?>

<?php    
if (!isset($_SESSION['username'])){
        header("location: access_restricted.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>hrms</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -10px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 10px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 100px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 200px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<?php
						$db = mysqli_connect('localhost', 'root', '', 'hrm');




//$emp_id=$_session['username'];
$branch_id='';
		
        $query11 = "SELECT branch_id  FROM emp_branch_department WHERE emp_id='$emp_id';";
        $result=mysqli_query($db, $query11);
        $applicationArray=array();
        while($row=mysqli_fetch_assoc($result)){
            $applicationArray[]=$row;
        }
        foreach ($applicationArray as $application) {
            $branch_id=$application['branch_id'];

        }
       

 if (isset($_POST['Filter_dep'])){
    $department=mysqli_real_escape_string($db,$_POST['department']);

    $query="CALL emp_branch_department_report('$department','$branch_id')";
    $result1=mysqli_query($db,$query);

?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Department <b>Details</b></h2>
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
						
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
						<th>Department </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
						



  <?php //$result=mysqli_next_result($db);
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
							 
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
							
                            </tr>
                           <?php }}
                           else {
                           	echo "<h2>"."The department has no workers in this certain department until now"."</h2>";
                           }}
                           ?>
                       
                    
                     
                </tbody>
            </table>
		</div>
    </div>
    		<?php
						$db = mysqli_connect('localhost', 'root', '', 'hrm');




 if (isset($_POST['Filter_branch'])){
    $branch=mysqli_real_escape_string($db,$_POST['branch']);

    $query="CALL employee_branch_report('$branch')";
    $result1=mysqli_query($db,$query);
   //$result=mysqli_next_result($db);
 

    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Branch <b>Details</b></h2>
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
						
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
						

                    </tr>
                </thead>
                <tbody>
                    <tr>
				
<?php    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){
               ?>


                       
							 
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             
							
                            </tr>
                           <?php }}
                          
                         }


                           ?>
                       
                    
                     
                </tbody>
            </table>
		</div>
    </div>
<!---->
<?php
						$db = mysqli_connect('localhost', 'root', '', 'hrm');




  if (isset($_POST['Filter_job'])){

    $title_name=mysqli_real_escape_string($db,$_POST['title_name']);
  echo "<option value=".$title_name.">".$title_name."</option>";
  
     $query="CALL employee_jobtitle_report('$title_name','$branch_id')";
    $result1=mysqli_query($db,$query);

    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Job <b>Details</b></h2>
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
						
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
						

                    </tr>
                </thead>
                <tbody>
                    <tr>
				


<?php
   //$result=mysqli_next_result($db);
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
							 
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             
							
                            </tr>
                           <?php }}
                           else {
                            echo "<h1>"."No one is working in this branch for this certain job"."<h1>";
                           }
                         }?>
                       
                    
                     
                </tbody>
            </table>
		</div>
    </div>

<?php
		$db = mysqli_connect('localhost', 'root', '', 'hrm');




  if (isset($_POST['Filter_paygrade'])){

    $pg_type=mysqli_real_escape_string($db,$_POST['pg_type']);
  echo "<option value=".$pg_type.">".$pg_type."</option>";
  
    $query="CALL employee_paygrade_report('$pg_type','$branch_id')";
    $result1=mysqli_query($db,$query);
    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>paygrade <b>Details</b></h2>
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
						
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
						

                    </tr>
                </thead>
                <tbody>
                    <tr>
				


<?php
   //$result=mysqli_next_result($db);
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
							 
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             
							
                            </tr>
                           <?php }}
                            else {
                            echo "<h1>"."No one is working in this branch for this certain pay grade"."<h1>";
                           }
                         }?>
                       
                    
                     
                </tbody>
            </table>
		</div>
    </div> 

<?php
    $db = mysqli_connect('localhost', 'root', '', 'hrm');




   if (isset($_POST['Filter_leave'])){

  $from=mysqli_real_escape_string($db,$_POST['from']);

        $department=mysqli_real_escape_string($db,$_POST['department']);
 $query="CALL employee_leave_report('$department','$from','$branch_id')";
    $result1=mysqli_query($db,$query);

    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Department Leave <b>Details</b></h2>
          </div>
                </div>
            </div>
    
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
           
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
                         <th>No Of Days</th>
                          <th>Start Date</th>
                           <th>Leave Status</th>
            

                    </tr>
                </thead>
                <tbody>
                    <tr>
        


<?php
   //$result=mysqli_next_result($db);
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
               
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             <td><?php echo $row3['no_of_days']; ?></td>
                             <td><?php echo $row3['from_date']; ?></td>
                             <td><?php echo $row3['l_status']; ?></td>
                             
              
                            </tr>
                           <?php }
                           }
else{
	echo "<h2>"."No one apply leave from this department from this certain date"."</h2>";
}

                           }?>
                       
                    
                     
                </tbody>
            </table>
    </div>
    </div> 

<?php
        $db = mysqli_connect('localhost', 'root', '', 'hrm');




  if (isset($_POST['Filter_dept_branch'])){

    $department=mysqli_real_escape_string($db,$_POST['department']);

  $branch=mysqli_real_escape_string($db,$_POST['branch']);
  
    $query="CALL emp_branch_department_report('$department','$branch')";
    $result1=mysqli_query($db,$query);

    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Department Branch <b>Details</b></h2>
                    </div>
                </div>
            </div>
        
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                     
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr>
                


<?php
   //$result=mysqli_next_result($db);
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
                             
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             
                            
                            </tr>
                           <?php }
                           }
                         }?>
                       
                    
                     
                </tbody>
            </table>
        </div>
    </div> 


    <?php
        $db = mysqli_connect('localhost', 'root', '', 'hrm');




  if (isset($_POST['Filter_dept_branch_paygrade'])){

    $department=mysqli_real_escape_string($db,$_POST['department']);


   $pg_type=mysqli_real_escape_string($db,$_POST['pg_type']);
  
    $query="CALL emp_branch_department_paygrade_report('$department','$branch_id','$pg_type')";
    $result1=mysqli_query($db,$query);


    ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Department Branch Paygrade<b>Details</b></h2>
                    </div>
                </div>
            </div>
        
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                     
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        
                        <th>Pay Grade</th>
                        <th>Status Type</th>
                        <th>Title Name</th>
                        <th>Department Name</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <tr>
                


<?php
   
    if (mysqli_num_rows($result1)>0){
           while ($row3=mysqli_fetch_assoc($result1)){

?>
                       
                             
                             
                             <td><?php echo $row3['emp_id']; ?></td>
                             <td><?php echo $row3['fname']; ?></td>
                             <td><?php echo $row3['lname']; ?></td>
                             <td><?php echo $row3['pg_type']; ?></td>
                             <td><?php echo $row3['status_type']; ?></td>
                             <td><?php echo $row3['title_name']; ?></td>
                             <td><?php echo $row3['dept_name']; ?></td>
                             
                            
                            </tr>
                           <?php }}}?>
                       
                    
                     
                </tbody>
            </table>
        </div>
    </div> 
   
   
</body>
</html>                                		                            