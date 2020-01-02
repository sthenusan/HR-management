<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "hrm");  
      $query="SELECT leave_type,allowed_leave from pg_leave natural join leave_type where pg_id=(select pg_id from emp_pg where emp_id='".$_POST["employee_id"]."') order by leave_type ASC";
      $query1 = "SELECT emp_id,fname,lname FROM employee WHERE emp_id = '".$_POST["employee_id"]."'";  
      $query2="SELECT leave_type , sum(no_of_days)as leave_taken FROM leave_type natural join emp_applied_leave  WHERE emp_id='".$_POST["employee_id"]."'  and year(from_date)=year(CURRENT_TIMESTAMP) and l_status='approved' group by leave_type order by leave_type ASC";
      $result = mysqli_query($connect, $query);  
      $result2 = mysqli_query($connect, $query2); 
      $result1= mysqli_query($connect, $query1);

      $output .= '  

      <div>
      ';
            while($row = mysqli_fetch_array($result1))  
            {  
            $output .= ' 
            <p><span>Employee Id : </span>'.$row["emp_id"].' <br> <span>Name : </span>'.$row["fname"].' '.$row["lname"]. '</p> 
            <br>
        
            ';  
            }  
        $output .= '  
        
      </div>
      <h5>Details of allowed Leaves</h5>
      
            <div class="table-responsive">  
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center;">Leave Type</th>
                        <th style="text-align: center;">Allowed days</th>
                    </tr> ';
                    while($row = mysqli_fetch_array($result))  
                    {  
                    $output .= '  
                    <tr>   
                        <td >'.$row["leave_type"].'</td> 
                        <td >'.$row["allowed_leave"].'</td>  
                    </tr>  
             
                    ';  
                    }  
                $output .= '  
                </table>
            </div>
       <br>
        <h5>Details of already approved Leaves</h5>

            <div class="table-responsive">  
                <table class="table table-bordered">
                    <tr>
                        <th style="text-align: center;">Leave Type</th>
                        <th style="text-align: center;">Approved Leaves</th>
                    </tr> ';
                    while($row = mysqli_fetch_array($result2))  
                    {  
                    $output .= '  
                    <tr>   
                        <td >'.$row["leave_type"].'</td> 
                        <td >'.$row["leave_taken"].'</td>  
                    </tr>  
            
                    ';  
                    }  
                $output .= '  
            </table>
            </div>
       
         
      ';  
      echo $output;  
 }  
 ?>
 