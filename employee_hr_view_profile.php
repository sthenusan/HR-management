<?php if (isset($_GET['emp_id'])){
    $emp_id = $_GET['emp_id'];

    ?>



<html>

<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
	<style>
body {
  margin: 0;
  padding: 0;
  background-color: #17a2b8;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 1200px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
	</style>
</head>
<body>
	  <div id="login">
        <h3 class="text-center text-white pt-5">employee full info</h3>
        <div class="container">
        	
        	<?php
   
              $db = mysqli_connect('localhost', 'root', '', 'hrm');

    
		      $query = "SELECT *  from emp_details where emp_id='$emp_id'";
		      $result = mysqli_query($db, $query);
		      $row = mysqli_fetch_assoc($result)
?>               
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Employee</h3>
                             
                             <div class="form-group">
                                <img  height="200px" width= "200px" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']);?>" >
                                 
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Emp_id : <?php echo ($row['emp_id']);?></label>
                                 
                            </div>
                            <div class="form-group">
                                <label  class="text-info">First Name : <?php echo ($row['fname']);?></label>
                                 
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Last Name : <?php echo ($row['lname']);?> </label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Marital status : <?php echo ($row['marital_status']);?> </label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Nationality : <?php echo ($row['nationality']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Birth date : <?php echo ($row['birth_date']);?></label>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Gender : <?php echo ($row['gender']);?></label>
                            </div>

                             <div class="form-group">
                                <label  class="text-info">Address : <?php echo ($row['Address']);?></label>
                            </div>
                            

                            <div class="form-group">
                                <label  class="text-info">Emergency contact number : <?php echo ($row['econtact_no']);?></label>
                            </div>
                              <div class="form-group">
                                <label  class="text-info">Contact person : <?php echo ($row['contact_per_name']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Job : <?php echo ($row['title_name']);?></label>
                            </div>
                              <div class="form-group">
                                <label  class="text-info">Joined date : <?php echo ($row['joined_date']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Employment status : <?php echo ($row['status_type']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Paygrade : <?php echo ($row['pg_type']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">role: <?php echo ($row['role_name']);?></label>
                            </div>
                            <label  class="text-info">Dependant information</label>
                             <div class="form-group">
                                <label  class="text-info">Num child : <?php echo ($row['num_child']);?></label>
                            </div>
                             <div class="form-group">
                                <label  class="text-info">Num relatives : <?php echo ($row['num_relative']);?></label>
                            </div>
                              <div class="form-group">
                                <label  class="text-info">Num family members : <?php echo ($row['num_family_members']);?></label>
                            </div>
                             
                             
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<html>

<?php }?>
