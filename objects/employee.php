<?php
    class Employee{
        public $emp_id;
        public $role;
        public $title;
        public $dept;
        private $conn;
        private $branch_id;


        public function __construct($emp_id,$db){
            $this->emp_id=$emp_id;
            $this->conn=$db;
            $this->getRole();
            $this->getTitle();
            $this->getDept();
            $this->getBranchId();
        }

    
    
        public function getTitle(){
            $query = "SELECT title_name FROM `emp_title` natural join job_title WHERE emp_id=?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->emp_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->title = $row['title_name'];
        }

        public function getRole(){
            $query = "SELECT role_id FROM `emp_role` WHERE emp_id=?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->emp_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->role = $row['role_id'];
        }

        private function getBranchId(){
            $query = "SELECT branch_id FROM `emp_branch_department` WHERE emp_id=? limit 1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->emp_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->branch_id = $row['branch_id'];
        }


        private function getDept(){
            $query = "SELECT dept_name FROM `emp_branch_department` natural join department WHERE emp_id=?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->emp_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->dept = $row;
        }

       
        public function getPersonalInfo(){
            $query = "SELECT fname,lname FROM `employee`  WHERE emp_id=?"; 
                $stmt = $this->conn->prepare( $query );
                $stmt->bindParam(1, $this->emp_id);
                $stmt->execute();
                return $stmt;
        }

        public function allowedLeave(){
            $query = "SELECT leave_type,allowed_leave from pg_leave natural join leave_type where pg_id=(select pg_id from emp_pg where emp_id=?)";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->emp_id);
            $stmt->execute();
            return $stmt;
        }

        public function leave_approved(){
            $query = "SELECT leave_type , sum(no_of_days)as leave_taken FROM leave_type natural join emp_applied_leave  WHERE emp_id=? and month(from_date)=month(CURRENT_TIMESTAMP) and year(from_date)=year(CURRENT_TIMESTAMP) and l_status='approved' group by leave_type";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->emp_id);
            $stmt->execute();
            return $stmt;

        }

        public function getEmployeedDetails(){

            $query = "SELECT * FROM `emp_basic_info` WHERE branch_id=? order by dept_name "; 
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->branch_id);
            $stmt->execute();
            return $stmt;
        }

        public function getNewFields(){
            $query = "SELECT * FROM `emp_new_attribute_name` order by attribute_name" ; 
            $stmt = $this->conn->query($query);
            return $stmt;
            

        }

        public function getNewFieldValue($field_name){
            $query="SELECT attribute_value FROM emp_new_attribut_value natural join emp_new_attribute_name WHERE emp_id=? and attribute_name=?";
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->emp_id);
            $stmt->bindParam(2, $field_name);
            if($stmt->execute()){
                $result=$stmt->fetch ();
                return $result['attribute_value'];
                //  return $result[0];
            
            }else{
                return '';
            }
            
        }

        public function employeeDetailsForLeave(){

            $query = "SELECT emp_id,name,dept_name,branch_id FROM `emp_basic_info` natural join emp_role WHERE branch_id=? and (role_id=3 or role_id=4 or role_id=5)order by dept_name "; 
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->branch_id);
            $stmt->execute();
            return $stmt;
        }
        

    }

?>


<?php
// include '../config/database.php';

// $db = new Database();
// $e=new Employee('e000100003',$db->getConnection());

//  echo( $e->getNewFieldValue('nationality'));
 
?>