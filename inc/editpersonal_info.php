<?php
   session_start();
	
   $emp_id=$_SESSION["username"];

 ?>


<?php 

$db = mysqli_connect('localhost', 'root', '', 'hrm');

$query="SELECT * from emp_pg where emp_id='$emp_id'";

$result=mysqli_query($db,$query);

if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_array($result); 

	if ($row['pg_id']==1){

		 echo "<script>alert('You are not allowed to edit your personal details.'); location.href='profile.php';</script>";
	}
}





?>



<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">
	


    
 <?php
   
        

    
		$query = "SELECT *  from emp_details where emp_id='$emp_id'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result)
?>               

                    <form action="/../final_version/assets/editpersonal_info_inc.php" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Edit personal info</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                            <div class="form-group">
								<label>Emp_id </label>
								<input type="text" name="emp_id"   class="form-control" value="<?php echo $row['emp_id']; ?>" pattern="(?=.*[e])(?=.*[0-9]).{10,}" title="Id should be in requested format" required>
							</div>
							<div class="form-group">
								<label>First name</label>
								<input type="text" value="<?php echo $row['fname']; ?>"  name='fname' class="form-control"   pattern="[A-Za-z]{3,}" title="Three or more letter" required>
							</div>
							<div class="form-group">
								<label>Last name</label>
								<input class="form-control" type="text" name='lname'  value="<?php echo $row['lname']; ?>"  pattern="[A-Za-z]{3,}" title="Three or more letter" required>
							</div>
							<div class="form-group">
								<label>Marital status</label>
                           		 <select class="form-control " value="<?php echo $row['marital_status']; ?>"  name='marital_status'   required>
                                 	 <option value="single" for="type">single</option>
                                 	 <option value="married" for="type">married</option>
                                  	 <option value="widowed" for="type">widowed</option>
                                     <option value="divorced" for="type">Divorced</option>
                           		 </select>
						    </div>					
					
							<div class="form-group">
								<label>Nationality</label>
								<input type="text" class="form-control" value="<?php echo $row['nationality']; ?>"  name='nationality'  required>
							</div>
							<div class="form-group">
								<label>Birth date</label>
								<input type="date" name='birth_date' value="<?php echo $row['birth_date']; ?>" class="form-control"=<?php echo date('y-m-d'); ?> title="invalid date" required>
							</div>
							<div class="form-group">
								<label>Gender</label>
                            	<select class="form-control"   name='gender'  value="<?php echo $row['gender']; ?>" required>
                                  <option value="f" for="type">female</option>
                                  <option value="m" for="type">male</option>
                                   
                            	</select>
							 
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name='Address'  value="<?php echo $row['Address']; ?>" class="form-control" required>
							</div>					
				 		
							<div class="form-group">
								<label>Phone(add if any new number exists)</label>
								<input type="text" class="form-control" name='contact_no'  placeholder="if exits"  pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" ><br>
								<input type="text" class="form-control" name='contact_no1'  placeholder="if exits"  pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" ><br>
							 
							</div>
							<div class="form-group">
								<label>Emergency contact no</label>
								<input type="text" class="form-control" name='econtact_no' value="<?php echo $row['econtact_no']; ?>" pattern="(?=.*[0-9]).{10,}" title=" invalid phone number" required>
							</div>
							<div class="form-group">
								<label>contact person</label>
								<input class="form-control" type='text' name='contact_per_name' value="<?php echo $row['contact_per_name']; ?>"  pattern="[A-Za-z]{3,}" title="Three or more letter" required></input>
							</div>

							 
                            <label >Dependent info</label><br>
								<div class="form-group">
                                    <label  >num_child</label>
                                    <input    class="form-control" type="number" value="<?php echo $row['num_child']; ?>"   name="num_child" title="include no of child!" min="0" max="10" value="0" required>
                                </div>        
								<div class="form-group">		
										 <label >num_relative</label>
                                         <input   class="form-control" type="number" value="<?php echo $row['num_relative']; ?>"  name="num_relative" title="include no of relatives" min="0" max="10" value="0" required>
                                </div>
								<div class="form-group">        
										 <label>num_family_members</label>
                                         <input   class="form-control" type="number"   name="num_family_members" value="<?php echo $row['num_family_members']; ?>" title="include family members!" min="0" max="10" value="0" required>
                                </div>     
                            		
                               
                           <div class="text-center">
                                    <input type="submit" value="save" name='save' class="btn btn-info btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>

</body>
</html>