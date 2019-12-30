<?php

if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["date"]) && !empty($_GET["date"])){
    include "../config/database.php";
    $db=new Database();
    $conn=$db->getConnection();

    $query = "UPDATE emp_applied_leave SET l_status='approved'  WHERE emp_id= ?  and applied_date=?";
    
    if($stmt = $conn->prepare($query)){
        $stmt->bindParam(1, $param_id);
        $stmt->bindParam(2, $param_date);
        $param_id = trim($_GET["id"]);
        $param_date=trim($_GET["date"]);
        if($stmt->execute()){
            header("location: ../emp_view_applied_leave.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }else{
        echo "didn't work";
    }
     
} else{
    if(empty(trim($_GET["id"]))){
        header("location: ../error.php");
        exit();
    }
}