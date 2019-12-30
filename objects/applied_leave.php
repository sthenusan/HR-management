<?php


class ViewAppliedLeave {
    private $emp_id;
    private $branch_id;
    private $conn;
    public $role;

    public function __construct($db,$emp_id){
        $this->conn = $db;
        $this->emp_id=$emp_id;
        $this->getBranchId();
        $this->getRole();
        
    }

    private function getBranchId(){
        $query = "SELECT branch_id FROM `emp_branch_department` WHERE emp_id=? limit 1";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->emp_id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->branch_id = $row['branch_id'];
    }


    private function getRole(){
        $query = "SELECT role_id FROM `emp_role` WHERE emp_id=?";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->emp_id);
    $stmt->execute();
 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
    $this->role = $row['role_id'];
    }


    public function readAppliedLeave(){

        switch ($this->role){
            case 2:
                $query = "SELECT * FROM (hrmanager_related_appliedleaves NATURAL JOIN leave_type) NATURAL JOIN emp_branch_department where l_status='requested' and branch_id=?"; 
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(1, $this->branch_id);
                $stmt->execute();
                return $stmt;

            case 3:
                $query = "SELECT * FROM (secondmanagementuser_related_appliedleaves NATURAL JOIN leave_type) NATURAL JOIN emp_branch_department where l_status='requested' and branch_id=?"; 
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(1, $this->branch_id);
                $stmt->execute();
                return $stmt;

            case 4:
                $query = "SELECT * FROM (supervisor_related_appliedleaves NATURAL JOIN leave_type) NATURAL JOIN emp_branch_department where l_status='requested' and branch_id=? and emp_id in (SELECT supervisee_id FROM supervise where supervisor_id=?)"; 
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(2, $this->emp_id);
                $stmt->bindParam(1, $this->branch_id);
                $stmt->execute();
                return $stmt;
            
        } 

    }

    public function  approveLeave($employee_id,$applied_date){
            $query = "UPDATE emp_applied_leave SET l_status='approved'  WHERE emp_id= ?  and applied_date=?";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $employee_id);
            $stmt->bindParam(2, $applied_date);

            if ($stmt->execute()){
                return true;
            }
            return false;
            

    }

    public function  rejectLeave($employee_id,$applied_date){
        $query = "UPDATE emp_applied_leave SET l_status='rejected'  WHERE emp_id= ?  and applied_date=?";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $employee_id);
        $stmt->bindParam(2, $applied_date);
        if ($stmt->execute()){
            return true;
        }
        return false;
        

} 

}
?>

