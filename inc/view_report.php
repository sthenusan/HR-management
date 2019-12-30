<?php include('test1.php');?>




  <!--==========================
    Intro Section
  ============================-->
 

   
    

   
   
    

    
    <section id="view_report">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <br><br><br><br>
          <a href="test1.php">Link</a>
          <h3>View Report</h3>
          
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              


              <div class="member-info">
                <div class="member-info-content">

                  <h3>Filter By</h3>
                  
                    <form method="POST" action="final_report.php">
                      <label for="department"><b>Department</b></label><br>
                       <select name="department">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT dept_name,dept_id FROM department");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['dept_name'].">".$row3['dept_name']."</option>";

                          }
                        }?>
                      </select>
                      
                      <div class="clearfix"><br>
                      <button type="submit" class="btn btn-success" name="Filter_dep">Filter by department &raquo;</button>
                    </div>
                  </form><br>
                  
                    
              <br><br>

                
                  
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
             
              <div class="member-info">
                <div class="member-info-content">
                     <h3>Filter By</h3>
                  
                    <form method="POST" action="final_report.php">
                      <label for="title_name"><b>Job Title</b></label><br>
                       <select name="title_name">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT title_name FROM job_title");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['title_name'].">".$row3['title_name']."</option>";

                          }
                        }?>
                      </select>
                      
                      <div class="clearfix"><br>
                      <button type="submit" class="btn btn-success" name="Filter_job">Filter by Job Title &raquo;</button>
                    </div>
                    <br>
                 
                  </form>
                  
                    
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
             
              <div class="member-info">
                <div class="member-info-content">
                <h3>Filter By</h3>
                  
                    <form method="POST" action="final_report.php">
                      <label for="pg_type"><b>Paygrade </b></label><br>
                       <select name="pg_type">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT pg_id,pg_type FROM pay_grade");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['pg_type'].">".$row3['pg_type']."</option>";

                          }
                        }?>
                      </select>
                      
                      <div class="clearfix"><br>
                      <button type="submit" class="btn btn-success" name="Filter_paygrade">Filter by Pay Grade &raquo;</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
             
              <div class="member-info">
                <div class="member-info-content">
                   <h3>Filter By</h3>
                    <form method="POST" action="final_report.php">
                      <label for="from"><b>From </b></label><br>

                      <input type="date" name="from" placeholder="From date"><br>
                      
                      <label for="department"><b>Department</b></label><br>
                       <select name="department">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT dept_name,dept_id FROM department");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['dept_name'].">".$row3['dept_name']."</option>";

                          }
                        }?>
                      </select>
                      <div class="clearfix"><br>
                      <button type="submit" class="btn btn-success" name="Filter_leave">Filter by Leave date &raquo;</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

<!--==========================
      Contact Section
    ============================-->

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
             
              <div class="member-info">
                <div class="member-info-content">
                   <h3>Filter By</h3>
  
                   
                </div>
              </div>
            </div>
          </div>

        </div>
  <!--==========================
      Contact Section
    ============================-->
     <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
             
              <div class="member-info">
                <div class="member-info-content">
                   <h3>Filter By</h3>
  
                    <form method="POST" action="final_report.php">
                      <label for="department"><b>Department Branch PayGrade</b></label><br>
                       <select name="department">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT dept_name,dept_id FROM department");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['dept_name'].">".$row3['dept_name']."</option>";

                          }
                        }?>
                      </select>
                      
                     
                       

                      <select name="pg_type">
                       <?php
                        $db = mysqli_connect('localhost', 'root', '', 'hrm');
                        $sql=("SELECT pg_id,pg_type FROM pay_grade");
                        $result=mysqli_query($db,$sql);
                        if (mysqli_num_rows($result)>0){
                          while ($row3=mysqli_fetch_assoc($result)){
                            echo "<option value=".$row3['pg_type'].">".$row3['pg_type']."</option>";

                          }
                        }?>
                      </select>
                      <div class="clearfix"><br>
                      <button type="submit" class="btn btn-success" name="Filter_dept_branch_paygrade">Filter by Department Branch &raquo;</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
        

  </main>
 

  <!--==========================
    Footer
  ============================-->
 