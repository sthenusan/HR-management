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
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

body {
  height: 100vh;
  padding: 0;
  margin: 0;
}

.bg {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

.span_pseudo, .chiller_cb span:before, .chiller_cb span:after {
  content: "";
  display: inline-block;
  background: #fff;
  width: 0;
  height: 0.2rem;
  position: absolute;
  transform-origin: 0% 0%;
}

.chiller_cb {
  position: relative;
  height: 2rem;
  display: flex;
  align-items: center;
}
.chiller_cb input {
  display: none;
}
.chiller_cb input:checked ~ span {
  background: #fd2727;
  border-color: #fd2727;
}
.chiller_cb input:checked ~ span:before {
  width: 1rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.3s;
}
.chiller_cb input:checked ~ span:after {
  width: 0.4rem;
  height: 0.15rem;
  transition: width 0.1s;
  transition-delay: 0.2s;
}
.chiller_cb input:disabled ~ span {
  background: #ececec;
  border-color: #dcdcdc;
}
.chiller_cb input:disabled ~ label {
  color: #dcdcdc;
}
.chiller_cb input:disabled ~ label:hover {
  cursor: default;
}
.chiller_cb label {
  padding-left: 2rem;
  position: relative;
  z-index: 2;
  cursor: pointer;
  margin-bottom:0;
}
.chiller_cb span {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: 2px solid #ccc;
  position: absolute;
  left: 0;
  transition: all 0.2s;
  z-index: 1;
  box-sizing: content-box;
}
.chiller_cb span:before {
  transform: rotate(-55deg);
  top: 1rem;
  left: 0.37rem;
}
.chiller_cb span:after {
  transform: rotate(35deg);
  bottom: 0.35rem;
  left: 0.2rem;
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
		$query = "SELECT * from branch_full_info";
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
						<h2>Manage <b>Branches</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Branch</span></a>
						 						
					</div>
                </div>
            </div>
		
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
					 
                        <th>ID</th>
                         
                        <th>Branch</th>
                        <th>Country</th>
						<th>City</th>
                        <th>Street</th>
                        <th>Department</th>
                        <th>Phone</th>
						 
                       
                         

                    </tr>
                </thead>
                <tbody>
                    <tr>
						
                        <?php  $i=0;
                              while($row = mysqli_fetch_assoc($result)){
                                 $i+=1; ?>
							 
                             
                             <td><?php echo $row['id']; ?></td>
                             
                             <td><?php echo $row['branch_name']; ?></td>
                             <td><?php echo $row['country']; ?></td>
                             <td><?php echo $row['city']; ?></td>
                             <td><?php echo $row['street']; ?></td>
                             <td><?php echo $row['dept_name']; ?></td>
                             <td><?php echo $row['phone']; ?></td>
                             
                             
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
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
<!---->



	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				
                <form  action="assets/department_add.php" method="post" enctype="multipart/form-data" >            
                <div class="content-body">
					<div class="modal-header">						
						<h4 class="modal-title">ADD Branch</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					    <div class="form-group">
							<label>Organization</label>
							<input type="text" name="org_name" class="form-control" placeholder='Jupiter'  title="Three or more letter" required>
						</div>					
						<div class="form-group">
							<label>Branch_id</label>
							<input type="text" name="branch_id" class="form-control" pattern="(?=.*[b])(?=.*[0-9]).{5,}" title="Id should be in requested format" required>
						</div>
						<div class="form-group">
							<label>Branch</label>
							<input type="text" name="branch_name" class="form-control"  title="Three or more letter" required>
						</div>
						<div class="form-group">
							<label>Country</label>
							<input class="form-control" type="text"  name='country' pattern="[A-Za-z]{3,}" title="Three or more letter" required>
						</div>
						<div class="form-group">
							<label>City</label>
							<input type="text" class="form-control" name='city' required>
						</div>
						 <div class="form-group">
							<label>Street</label>
							<input type="text" class="form-control" name='street' required>
						</div>
						 
						 
                            <label>Department</label>
                            <div class="bg">
                                 <div>
                                     <div class="chiller_cb">
                                         <input id="myCheckbox" name='department' value='marketing'type="checkbox" >
                                         <label for="myCheckbox">marketing</label>
										 <span></span>
									</div><br>
									<div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"   name='contact_no' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number"  placeholder="if this dep exists" required >
                                        </div>
                                    </div>
                                    <div class="chiller_cb">
                                          <input id="myCheckbox2" name='department1' value='IT' type="checkbox">
                                          <label for="myCheckbox2">IT</label>
                                          <span></span>
                                    </div><br>
									<div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='contact_no1' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number"  placeholder="if this dep exists" >
                                        </div>
                                    </div><br>
                                    <div class="chiller_cb">
                                         <input id="myCheckbox3" name='department2' value='human resource' type="checkbox" >
                                         <label for="myCheckbox3">human resource</label>
                                         <span></span>
                                   </div><br>
								   <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name='contact_no2' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number"  placeholder="if this dep exists" >
                                        </div>
                                    </div><br>

								   <div class="chiller_cb">
                                         <input id="myCheckbox4" name='department3' value='finance' type="checkbox" >
                                         <label for="myCheckbox4">finance</label>
                                         <span></span>
                                   </div><br>
								   <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name='contact_no3' pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" placeholder="if this dep exists" >
                                        </div>
                                    </div><br>
								    
                                </div>
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
</body>
</html>                                		                            