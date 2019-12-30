<?php
session_start();
include "../config/database.php";

if (isset($_POST['Submit'])){

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    $emp_id=test_input($_POST['emp_id']);
    $db=new Database();
    $conn=$db->getConnection();
    $success=false;
    $allValuesNull=true;

    
    $query = "SELECT * FROM `emp_new_attribute_name` order by attribute_name" ; 
    $query1 = "INSERT INTO `emp_new_attribut_value`(`attribute_id`, `emp_id`, `attribute_value`) VALUES (?,?,?)" ; 
    $query2 = "UPDATE `emp_new_attribut_value` SET `attribute_value`=? WHERE attribute_id=? and emp_id=?";
    $query3 ="SELECT * FROM `emp_new_attribut_value` WHERE attribute_id=? and emp_id=?";

    foreach(($conn->query($query)) as $row){        
            $value=test_input($_POST[$row['attribute_name']]);
            $attribute_id=intval(test_input($row['attribute_id']));
            if ($value){
                $allValuesNull=false;
                $stmt3 = $conn->prepare( $query3 );
                $stmt3->bindParam(1,$attribute_id);
                $stmt3->bindParam(2,$emp_id);
                if ($stmt3->execute()){
                    $num = $stmt3->rowCount();
                    if($num>0){
                        $stmt2 = $conn->prepare( $query2 );
                        $stmt2->bindParam(1,$value);
                        $stmt2->bindParam(2,$attribute_id);
                        $stmt2->bindParam(3,$emp_id);
                        if($stmt2->execute()){$success=true;}
                        
                    }else{
                        $stmt1 = $conn->prepare( $query1 );
                        $stmt1->bindParam(1,$attribute_id);
                        $stmt1->bindParam(2,$emp_id);
                        $stmt1->bindParam(3,$value);
                        if($stmt1->execute()){$success=true;}
                    }
                }
                

                
            }
    } 

    if($allValuesNull) {
    
        $_SESSION['message']='<div class="alert alert-warning">No changes made</div>';
        header("location: ../view_available_emp.php");
        exit();
    }
    if ($success){
        $_SESSION['message']='<div class="alert alert-success">Successfully data updated.</div>';
        header("location: ../view_available_emp.php");
        exit();
    }else{
        $_SESSION['message']='<div class="alert alert-danger">Error occured while update.Try again</div>';
        header("location: ../view_available_emp.php");
        exit();
    }


}