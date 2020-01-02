



<style>
body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 60%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}

</style>





<?php
session_start();
include_once ('db_config.php');
$emp_id=$_SESSION["username"];


    if (!isset($_SESSION['username'])){
        header("location: access_restricted.php");
        exit();
    }

$row_employee='';

$sql_employee = "SELECT * FROM employee WHERE emp_id='$emp_id'";
$result_employee = mysqli_query($db,$sql_employee);
if(mysqli_num_rows($result_employee) > 0){
    $row_employee = mysqli_fetch_array($result_employee);  
    
    $sql_role="SELECT * FROM emp_role WHERE emp_id='$emp_id'";
    $result_role= mysqli_query($db,$sql_role);
    if(mysqli_num_rows($result_role) > 0){
        $row_role= mysqli_fetch_array($result_role);

        $role_id=$row_role['role_id'];
    }

    $sql_role_name="SELECT * FROM role where role_id='$role_id'";
    $result_role_name= mysqli_query($db,$sql_role_name);

    if(mysqli_num_rows($result_role_name) > 0){
        $row_role_name= mysqli_fetch_array($result_role_name);
    }

    $sql_title="SELECT * FROM emp_title WHERE emp_id='$emp_id'";
    $result_title= mysqli_query($db,$sql_title);
    if(mysqli_num_rows($result_title) > 0){
        $row_title= mysqli_fetch_array($result_title);

        $title_id=$row_title['title_id'];
    }

    $sql_title_name="SELECT * FROM job_title where title_id='$title_id'";
    $result_title_name=mysqli_query($db,$sql_title_name);

    if (mysqli_num_rows($result_title_name) >0){
        $row_title_name=mysqli_fetch_array($result_title_name);
    }




    $sql_mail= "SELECT * FROM account WHERE username='$emp_id'";
    $result_mail= mysqli_query($db,$sql_mail);

    if(mysqli_num_rows($result_mail) > 0){
        $row_mail = mysqli_fetch_array($result_mail); 

    }


    $sql_phone="SELECT *FROM emp_contact_num WHERE emp_id='$emp_id'";
    $result_phone= mysqli_query($db,$sql_phone);

    if(mysqli_num_rows($result_mail) > 0){
        $row_phone = mysqli_fetch_array($result_phone); 

    }


    $sql_department="SELECT * FROM emp_branch_department Where emp_id='$emp_id'";
    $result_department=mysqli_query($db,$sql_department);

    if(mysqli_num_rows($result_department) > 0){
        $row_department = mysqli_fetch_array($result_department); 
        $department_id= $row_department['dept_id'];
        $branch_id=$row_department['branch_id'];

    }
    $sql_branch_name="SELECT * FROM branch where branch_id='$branch_id'";
    $result_branch_name=mysqli_query($db,$sql_branch_name);

    if (mysqli_num_rows($result_branch_name)){
        $row_branch_name=mysqli_fetch_array($result_branch_name);
    }

    $sql_department_name="SELECT * FROM department where dept_id='$department_id'";
    $result_department_name=mysqli_query($db,$sql_department_name);

    if (mysqli_num_rows($result_department_name)){
        $row_department_name=mysqli_fetch_array($result_department_name);
    }
 




}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row_employee['image']);?>" >
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo  $row_employee['fname'].' '. $row_employee['lname'];?>
                                    </h5>
                                    <h6>
                                        <?php echo  $row_role_name['role_name'];?>
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>

                                </li>
                                                                <li class="nav-item">
                                    <a class="nav-link" id="home-tab" data-toggle="tab" href="editpersonal_info.php" role="tab" aria-controls="home" aria-selected="true">Edit</a>
                                    
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo  $row_employee['emp_id']?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_title_name['title_name']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Branch</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_branch_name['branch_name']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_department_name['dept_name']?></p>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo  $row_mail['email']?> </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> <?php echo  $row_phone['contact_no'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Marital Status</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_employee['marital_status']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nationality</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_employee['nationality']?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $row_employee['Address']?></p>
                                            </div>
                                        </div>
                                       





                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
