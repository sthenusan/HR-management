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
<title>HRM-Admin</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
		min-width: 50px;
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
		width: 100px;
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
</head>
<body>
<?php
   // session_start();
    function db_connect(){
    $conn = mysqli_connect("localhost", "root", "", "hrm");
    if(!$conn){
      echo "Can't connect database " . mysqli_connect_error($conn);
      exit;
    }
    function getAll($conn){
		$query = "SELECT  distinct emp_id,fname,lname,branch_id,Address from sm_details  ORDER BY emp_id DESC";
		$result = mysqli_query($conn, $query);
		
		
        if(!$result){
            echo "Can't retrieve data " . mysqli_error($conn);
            exit;
        }
        return $result;
    }
    return $conn;
  }
 $conn = db_connect();
 $result = getAll($conn);
?>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Second Managers</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Second Manager</span></a>
						 						
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>Emp_id</th>
                        <th>First name</th>
                        <th>Last name</th>
						<th>Branch ID</th>
						<th>Address</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <tr>
						
                        <?php  $i=0;
                              while($row = mysqli_fetch_assoc($result)){
                                 $i+=1; ?>
							 
                             
                             <td><?php echo $row['emp_id']; ?></td>
                             <td><?php echo $row['fname']; ?></td>
                             <td><?php echo $row['lname']; ?></td>
                             <td><?php echo $row['branch_id']; ?></td>
                             <td><?php echo $row['Address']; ?></td>
                             
							 <td>

                            </td>
                            </tr>
                           <?php }?>
                       
                    
                     
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
<!---->




<div id="editEmployeeModal" class="modal fade">
 
	
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="edit_form" action="assets/sm_edit_inc.php" method="post" enctype="multipart/form-data"  >
					<div class="modal-header">						
						<h4 class="modal-title">Edit Second Manager</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
					    <div class="form-group">
							<label>Emp_id</label>
							<input type="text"name="emp_id" id="emp_id"  class="form-control"   maxlength="10" minlength="10" pattern="(?=.*[e])(?=.*[0-9]).{10,}" title="Id should be in requested format" required>
						</div>
						<div class="form-group">
							<label>First name</label>
							<input type="text" id="fname" name='fname' class="form-control"   pattern="[A-Za-z]{3,}" title="Three or more letter" required>
						</div>
						<div class="form-group">
							<label>Last name</label>
							<input class="form-control" type="text" name='lname'  id='lname'  pattern="[A-Za-z]{3,}" title="Three or more letter" required>
						</div>

						<div class="form-group">
							<label>Branch ID</label>
							<input class="form-control" type="text" name='branch_id' placeholder="If any changes" id='branch_id' maxlength="5" minlength="5" pattern="(?=.*[b])(?=.*[0-9]).{5,}" title="Three or more letter" required>
						</div>
						<div class="form-group">
							<label>Marital status</label>
                            <select class="form-control " id='marital_status'  name='marital_status'   required>
                                  <option value="single" for="type">single</option>
                                  <option value="married" for="type">married</option>
                                  <option value="widowed" for="type">widowed</option>
                                  <option value="divorced" for="type">Divorced</option>
                            </select>
						</div>					
					
                        <div class="form-group">
							<label>Nationality</label>
							<input type="text" class="form-control"  name='nationality' id='nationality' required>
						</div>
						<div class="form-group">
							<label>Birth date</label>
							<input type="date" name='birth_date' id='birth_date' class="form-control"=<?php echo date('y-m-d'); ?> title="invalid date" required>
						</div>
						<div class="form-group">
							<label>Gender</label>
                            <select class="form-control"   name='gender' id='gender' required>
                                  <option value="f" for="type">female</option>
                                  <option value="m" for="type">male</option>
                                   
                            </select>
							 
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name='Address' id='Address' class="form-control" required>
						</div>					
				 		
						<div class="form-group">
							<label>Phone(add if any new number exists)</label>
							<input type="text" class="form-control" name='contact_no' id='contact_no' placeholder="if exits"  pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" ><br>
							<input type="text" class="form-control" name='contact_no1' id='contact_no1' placeholder="if exits"  pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" ><br>
							 
						</div>
						<div class="form-group">
							<label>Emergency contact no</label>
							<input type="text" class="form-control" name='econtact_no' id='econtact_no' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" required>
						</div>
						<div class="form-group">
							<label>contact person</label>
							<input class="form-control" type='text' name='contact_per_name' id='contact_per_name'  pattern="[A-Za-z]{3,}" title="Three or more letter" required></input>
						</div>

						<div class="form-group ">
                            <label >Department</label><br>
							<select class="form-control " name='department' required>

                                  
                                  <option value="marketing" for="type">marketing</option>
                                  <option value="finance" for="type">finance</option>
                                  <option value="IT" for="type">IT</option>
                                  <option value="human_resource" for="type">human resource</option>

                                   
                            </select>   
                                          
                       </div>		
						 
						 
						 
						<div class="form-group">
							<label>Job</label>
                            <select class="form-control" name='title_name' id='title_name'  required>
                                  <option value="QA_Engineer" for="type">QA_Engineer</option>
                                  <option value="Accountant" for="type">Accountant</option>
                                  <option value="Software_Engineer" for="type">Software_Engineer</option>


                                   
                            </select>
						</div>		
									
					 					
						<div class="form-group">
							<label>Joined date</label>
							<input type="date" class="form-control"  name="joined_date" id="joined_date" min=<?php echo date('y-m-d'); ?> title="invalid date" required>
						</div>
						<div class="form-group">
							<label>Job status</label>
                            <select class="form-control"   name="status" id='status' required>
                                  <option value="intern (fulltime)" for="type">intern (fulltime)</option>
                                  <option value="intern (parttime)" for="type">intern (parttime)</option>
                                  <option value="contract (fulltime)" for="type">contract (fulltime)</option>
                                  <option value="contract (parttime)" for="type">contract (parttime)</option>
                                  <option value="permanent" for="type">permanent</option>
                                  <option value="freelance" for="type">freelance</option>
                                  
                                   
                            </select>
						</div>
						<div class="form-group">
							<label>Role</label>
							<select class="form-control" name="role" id='role'  required>
                                  <option value="supervisor" for="type">supervisor</option>
                                  <option value="employee" for="type">employee</option>
                                   
                                   
                            </select>
						</div>
						<div class="form-group">
							<label>Pay grade</label>
                            <select class="form-control" name="paygrade" role='paygrade'  required>
                                  <option value="level_1" for="type">level 1</option>
                                  <option value="level_2" for="type">level 2</option>
                                  <option value="level_3" for="type">level 3</option>
                                                                                                      
                                   
                            </select>
						</div>	
                        <div class="form-group ">
                            <label >Dependent info</label><br>
                                 
                                         <label  style="width:5%; text-align:center; margin:auto">num_child</label>
                                         <input    class="form-control" type="number" id='num_child'  name="num_child" title="include no of child!" min="0" max="10" value="0" required>
                                         <label  style="width:5%; text-align:center; margin:auto">num_relative</label>
                                         <input   class="form-control" type="number" id='num_relative'  name="num_relative" title="include no of relatives" min="0" max="10" value="0" required>
                                         <label  style="width:5%; text-align:center; margin:auto">num_family_members</label>
                                         <input   class="form-control" type="number"   name="num_family_members" id="num_family_members" title="include family members!" min="0" max="10" value="0" required>
                                     
                        </div>		
                        <!-- <div class="form-group">
							<label>Photo</label>
                            <input name="image" type="file"  id="image" accept=".jpg,.jpeg,.png" required/>	

						</div> -->


					 
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						 
						<input type="submit"name='save' class="btn btn-info save" emp_id="<?php echo $row['emp_id']; ?>" id="save" value="save">
					</div>
				</form>
			</div>
		</div>
	</div>



	<!-- add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				
                <form  action="assets/second_add.php" method="post" enctype="multipart/form-data" onsubmit="return checkDate(this)">            
                <div class="content-body">
					<div class="modal-header">						
						<h4 class="modal-title">ADD Second Manager</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Emp_id</label>
							<input type="text" name="emp_id" class="form-control" maxlength="10" minlength="10" pattern="(?=.*[e])(?=.*[0-9]).{10,}" title="Id should be in requested format" required>
						</div>
						<div class="form-group">
							<label>First name</label>
							<input type="text" name="fname" class="form-control"  pattern="[A-Za-z]{3,}" title="Three or more letter" required>
						</div>
						<div class="form-group">
							<label>Last name</label>
							<input class="form-control" type="text"  name='lname' pattern="[A-Za-z]{3,}" title="Three or more letter" required>
						</div>

						<div class="form-group">
							<label>Branch ID</label>
							<input class="form-control" type="text" name='branch_id'  id='branch_id' maxlength="5" minlength="5" pattern="(?=.*[b])(?=.*[0-9]).{5,}" title="Three or more letter" required>
						</div>



						<div class="form-group">
							<label>Marital status</label>
                            <select class="form-control " name='marital_status' required>
                                  <option value="single" for="type">single</option>
                                  <option value="married" for="type">married</option>
                                  <option value="widowed" for="type">widowed</option>
                                  <option value="divorced" for="type">Divorced</option>
                            </select>
						</div>					
					
                        <div class="form-group">
							<label>Nationality</label>
							<input type="text" class="form-control" name='nationality' required>
						</div>
						<div class="form-group">
							<label>Birth date</label>
							<input type="date" name='birth_date' class="form-control" max="2001-01-01" title="invalid date" required>
						</div>
						<div class="form-group">
							<label>Gender</label>
                            <select class="form-control " name='gender' required>
                                  <option value="f" for="type">female</option>
                                  <option value="m" for="type">male</option>
                                   
                            </select>
							 
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" name='Address' class="form-control" required>
						</div>					
				 		
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control" name='contact_no' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" required><br>
							<input type="text" class="form-control" name='contact_no1' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" placeholder="if exits" ><br>
							<input type="text" class="form-control" name='contact_no2' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" placeholder="if exits" >
						</div>
						<div class="form-group">
							<label>Emergency contact no</label>
							<input type="text" class="form-control" name='econtact_no' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" required>
						</div>
						<div class="form-group">
							<label>contact person</label>
							<input class="form-control" type='text' name='contact_per_name' pattern="[A-Za-z]{3,}" title="Three or more letter" required></input>
						</div>
                        
						<div class="form-group ">
                            <label >Department</label><br>
							<select class="form-control " name='department' required>
                        
                                  <option value="human_resource" for="type">human resource</option>
                                  <option value="marketing" for="type">marketing</option>
                                  <option value="finance" for="type">finance</option>
                                  <option value="IT" for="type">IT</option>
                                  

                                   
                            </select>   
                                          
                       </div>		
					    
                     <div class="form-group">
							<label>Job</label>
                            <select class="form-control" name='title_name' id='title_name'  required>
                                  <option value="QA_Engineer" for="type">QA_Engineer</option>
                                  <option value="Accountant" for="type">Accountant</option>
                                  <option value="Software_Engineer" for="type">Software_Engineer</option>


                                   
                            </select>
						</div>		


					 					
						<div class="form-group">
							<label>Joined date</label>
							<input type="date" class="form-control"  name="joined_date" min=<?php echo date('y-m-d'); ?> title="invalid date" required>
						</div>
						<div class="form-group">
							<label>Job status</label>
                            <select class="form-control" name="status" required>
                                  <option value="intern (fulltime)" for="type">intern (fulltime)</option>
                                  <option value="intern (parttime)" for="type">intern (parttime)</option>
                                  <option value="contract (fulltime)" for="type">contract (fulltime)</option>
                                  <option value="contract (parttime)" for="type">contract (parttime)</option>
                                  <option value="permanent" for="type">permanent</option>
                                  <option value="freelance" for="type">freelance</option>
                                  
                                   
                            </select>
						</div>
						<div class="form-group">
							<label>Role</label>
							<select class="form-control" name="role" required>
                                  <option value="supervisor" for="type">supervisor</option>
                                  <option value="employee" for="type">employee</option>
                                   
                                   
                            </select>
						</div>
						<div class="form-group">
							<label>Pay grade</label>
                            <select class="form-control" name="paygrade" required>
                                  <option value="level_1" for="type">level 1</option>
                                  <option value="level_2" for="type">level 2</option>
                                  <option value="level_3" for="type">level 3</option>
                                                                                                      
                                   
                            </select>
						</div>	
                        <div class="form-group ">
                            <label >Dependent info</label><br>
                                 
                                         <label  style="width:5%; text-align:center; margin:auto">num_child</label>
                                         <input    class="form-control" type="number" name="num_child" title="include no of child!" min="0" max="10" value="0" required>
                                         <label  style="width:5%; text-align:center; margin:auto">num_relative</label>
                                         <input   class="form-control" type="number" name="num_relative" title="include no of relatives" min="0" max="10" value="0" required>
                                         <label  style="width:5%; text-align:center; margin:auto">num_family_members</label>
                                         <input   class="form-control" type="number" name="num_family_members" title="include family members!" min="0" max="10" value="0" required>
                                     
                        </div>		

                        <div class="form-group">
							<label>Photo</label>
                            <input name=image type="file" id="" accept=".jpg,.jpeg,.png" required/>	

						</div>

                          

                    </div>	
					

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="add" class="btn btn-success" value="add">
						 
					</div>
				</form>
			</div>
		</div>
	</div>
	 

<!-- delete Modal -->



 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
<script>
function checkDate(form){
        d2=form.joined_date.value;
        d1=form.birth_date.value;
        if (d2>d1){
            return true;
        }
        else{
            alert("birth date cannot be greater than joined date");
            return false;
        }
    }
});
</script>
 
<script>

	$(document).ready(function(){
		$(document).on('click','.edit',function(){
		var employee_id=$(this).attr("emp_id");
		
		$.ajax({
				url:"fetch.php",
				method:"POST",
				data:{employee_id:employee_id},
				success:function(data){
					var user = JSON.parse(data);
						$('#fname').val(user.fname);
						$('#lname').val(user.lname);
						$('#marital_status').val(user.marital_status);
						$('#nationality').val(user.nationality);
						$('#birth_date').val(user.birth_date);
						$('#gender').val(user.gender);
						$('#Address').val(user.Address);
						$('#num_child').val(user.num_child);
						$('#num_relative').val(user.num_relative);
						$('#num_family_members').val(user.num_family_members);
						$('#contact_per_name').val(user.contact_per_name);
						$('#econtact_no').val(user.econtact_no);
						$('#title_name').val(user.title_name);
						$('#role_name').val(user.role_name);
						$('#pg_type').val(user.pg_type);
						$('#status_type').val(user.status_type);
						$('#joined_date').val(user.joined_date);
						$('#emp_id').val(employee_id);
					    $('#editEmployeeModal').modal('show');
					}
					

			});
		});	


		// $(document).on('click','.save',function(){
		// var employee_id=$(this).attr("emp_id");
		
		// $.ajax({
		// 		url:"assets/employee_edit_inc.php",
		// 		method:"POST",
		// 		data:{employee_id:employee_id},
		// 		success:function(data){
		// 			alert();
		// 		} 
					

		// 	});
		// });		
	

	});
	
</script>
 
   
</body>
</html>                                		                            