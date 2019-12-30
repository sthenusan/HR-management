<?php
session_start();
include "../config/database.php";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$attribute_name = test_input($_POST['attribute_name']);
$attribute_type = test_input($_POST['attribute_type']);
$max_length = test_input($_POST['max_length']);
$min_length = test_input($_POST['min_length']);

if(!empty($attribute_name) &&  !empty($attribute_type)){
    $db=new Database();
    $conn=$db->getConnection();


    $query1 = "SELECT attribute_name FROM emp_new_attribute_name where attribute_name=?"; 
    $stmt1 = $conn->prepare( $query1 );
    $stmt1->bindParam(1,$attribute_name);
    $stmt1->execute();
    $num = $stmt1->rowCount();
    if($num>0){
        $_SESSION['message']='<div class="alert alert-danger">Attribute name already exist.Try with another name </div>';
        header("location: ../emp_add_new_field.php");
        exit();
    } else{              
    
    $query2 = "INSERT INTO `emp_new_attribute_name`(`attribute_name`, `attribute_type`, `max_length`, `min_length`) VALUES (?,?,?,?)";
    
    if($stmt = $conn->prepare($query2)){
        $stmt->bindParam(1, $attribute_name);
        $stmt->bindParam(2, $attribute_type);
        $stmt->bindParam(3, $max_length);
        $stmt->bindParam(4, $min_length);
            if($stmt->execute()){
                $_SESSION['message']='<div class="alert alert-success">Data successfully inserted.</div>';
                header("location: ../emp_add_new_field.php");
                exit();
            } else{
                $_SESSION['message']='<div class="alert alert-danger">Something went wrong.Try again</div>';
                header("location: ../emp_add_new_field.php");
                exit();
            }
    }
}
    
}

?>