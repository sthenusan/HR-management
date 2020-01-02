<?php 
  SESSION_start();
  $username=$_SESSION["username"];
  
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
  <title>Employee add new field</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script language="JavaScript" src="libs\css\js\gen_validatorv4.js"
    type="text/javascript" xml:space="preserve"></script>
</head>
<body>


<script>
jQuery(document).ready(function($) {

// Moved this to the top, this would hide the elements when the page is ready
$('.getlength').hide();

/* $('select[name=totalUsers]') is incorrect for this
example because the totalUsers is the ID. The correct way of selecting through ID is $("#totalUsers")*/
$("#attribute_type").change(function() {

  $('.getlength').hide();

  // Loop is not necessary, just get the value from the select field.
  var selectValue = $(this).val();

  // Use switch for cleaner code
  switch (selectValue) {
      case "string":
        $('.getlength').show();
      case "float":
        $('.getlength').show();
      case "integer":
        $('.getlength').show();
    }
  
});
});
</script>

<?php 
//session_start();
  include 'config/database.php';
  include 'objects/employee.php';

  //$_SESSION['username']='e000100001';
  if (!isset($_SESSION['username'])){
    header("location: access_restricted.php");
    exit();
  }

  $db = new Database();
  $employee= new Employee($_SESSION['username'],$db->getConnection());

  if ($employee->role==1){//only the admins are allowed.?>
        
      <div class="container" style="width:40% ; border-style:ridge ; border-color:#afb6b3 ">

          <h2 style="text-align: center ;font-family:Times New Roman ; padding-top:25px; color:#000033">Add a New Field to Employee</h2>
          <form style='padding-top:20px' style="font-size: 18px" action='assets\emp_add_new_field.inc.php' name='add_attribute_form' id ='add_attribute_form' method='post'>
            
            <?php
            //display error / success mesages
            if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

            <div class="form-group">
              <label  >Attribute Name</label>
              <input name="attribute_name" type="text" class="form-control" >
            </div>
            <br>

            <div class="form-group">
              <label >Attribute Type</label>    
                <select class="browser-default custom-select" name ="attribute_type" id="attribute_type" >
                  <option value="" disabled selected>Choose the expected type of the attribute</option>
                  <option value="date">Date</option>
                  <option value="string">String</option>
                  <option value="float">Float</option>
                  <option value="integer">Integer</option>
                </select>
            </div>
            <br>

            <div class="form-group getlength">
              <label  >Maximum Length</label>
              <input name="max_length"  type="text" class="form-control"  >
              <small  class="form-text text-muted">Maximum number of characters that can be included (Default 255).</small>
            </div>
            <br>

            <div class="form-group getlength" >
              <label >Minimum Length</label>
              <input name="min_length" type="text" class="form-control">
              <small class="form-text text-muted">Minimum number of characters that can included (Default 0).</small>
            </div>
            
            <div  >
            <div id="add_attribute_form_errorloc" class="error_strings" style="color: red"></div>
            </div>
            

          <div class="form-group btn-toolbar row col-lg-8">
              <button type="submit" class="btn btn-primary btn-large" id="submit" style="margin: 13px;">Submit</button>
         </div>

        </form>

        <script language="JavaScript" type="text/javascript"
            xml:space="preserve">
            var frmvalidator  = new Validator("add_attribute_form");
            frmvalidator.EnableOnPageErrorDisplaySingleBox();
            frmvalidator.EnableMsgsTogether();
            
            frmvalidator.addValidation("attribute_name","req","Attribute name: Required");
            frmvalidator.addValidation("attribute_name","alpha","Attribute name: Alphabetic characters only");
            frmvalidator.addValidation("attribute_name","minlen=3","Attribute name: Minimum of 3 characters");

            frmvalidator.addValidation("attribute_type","req","Attribute type: Required");

            frmvalidator.addValidation("max_length","numeric","Maximum Length: Numbers only");
            frmvalidator.addValidation("min_length","numeric","Minimum Length: Numbers only");
            frmvalidator.addValidation("max_length","gtelmnt=min_length","Maximum Length should be greater than Minimum Length");
            
            
        </script>
      </div>



  <?php
    }else{
      header("location: access_restricted.php");
      exit();
    }
  ?>

</body>
</html>
