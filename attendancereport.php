<?php 
    include('connect.php'); 
    // Pick previous month from today
                            $date = date('Y-m-d',time());
                            $splitdate = explode('-', $date);
                            $month = $splitdate[1]-1;
                            $year = $splitdate[0];
                            $year = 2018;
                            $newdate = $year.'-0'.$month.'-'.$splitdate[2];
                            $month = date("F",strtotime($newdate));
                            //echo $year;
    

  include("header2.php");                          
            

                        
   include("sidemenu_admin.php");


                ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                     <br>
                        <div class="panel panel-yellow">
                                    <div class="panel-heading">
                                       <i class="fa fa-th "></i> Monthly Attendance Reporting
                                    </div>
                                    <div class="panel-body">
                                        <form method="post">
                    <table class="table table-striped table-bordered table-hover"  id="example2">
                             <thead>
                                <tr>
                                           
                                
                                            
                 <th>District</th>
                 <th>Month</th>
                 <th>Year</th>
                
                
                
                  </tr>
                                    </thead>
                                    <tbody>
                                            
                                    <tr>
                    
                    <td> <div class="form-group"><select name="district_id" class="form-control" >
                           <option value="">Select District</option>
                        <?php
    
                            $sql="select * from district ORDER by district_name";
                            $result= mysqli_query($mysqli,$sql); 
    
    
                            while ($row = mysqli_fetch_assoc($result)){

                            ?>
                                          <option value= "<?php echo $row['district_id'];?>"><?php echo $row['district_name']; ?></option>
                                          <?php
                              }
                                      
                                      
                      ?>
                            </select></div></td>
                     <td>
                         <div class="input-group date datepicker"><input  name="month" type="text" size="30" class="form-control month"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div>   
                    </td>
                    <td>
                         <div class="input-group date datepicker"><input  name="year" type="text" size="30" class="form-control year"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div>   
                    </td>
                          
                 
                    <td>
                                            
                        <button type="submit" name="Continue" class="btn btn-primary">Apply Limits</button>
                                                    
                </td> 
                                        
                </tr>           
                <?php

           

             $selected_district_name="";
                                        
            
                                
                     if(isset($_POST['Continue'])){

                        $district_id = $_POST['district_id'];
                        $month = $_POST['month'];
                        $year = $_POST['year'];
                        //echo $district_id."<br>".$month."<br>".$year."<br>";
                         $nonEmpty=array();
                if ($district_id!=''){
                $nonEmpty[0]="s.district_id";
                }
                if ($month!=''){
                $nonEmpty[1]="a.month";
                }
                if ($year!=''){
                $nonEmpty[2]="a.year";
                }
                
                $noOfElements=sizeof($nonEmpty);
                if($noOfElements>0){
                          
                          $count =1;
                             $query="AND ";
                              foreach($nonEmpty as $value){
                                    
                                    if($count==$noOfElements){
                                    $values =explode(".", $value);

                                    $query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%'";
                                    
                                    }else{
                                    $values =explode(".", $value);
                                    $query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%' AND";
                                    }
                                                        
                                    $count++;
                              }
                          //echo $query;   
                }
                         ?>
                                        
                         <!--Job query-->
                                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                        <tr>
                            <th>District</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>No of Employees</th>
                            <th>No Reported</th>
                            <th>% Reported</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                    <?php 
                            
                            //echo $query;
                         if($district_id != ''){
                            $query11="SELECT s.district_id, d.district_name, COUNT(*) AS total1 FROM staff s, district d WHERE s.district_id = d.district_id AND s.district_id='$district_id'  GROUP BY district_id ORDER BY district_name";
                             
                             //echo $query11;
                             
                             $result= mysqli_query($mysqli,$query11);     
                            while($row= mysqli_fetch_assoc($result))
                            {
                                $district = $row['district_name'];
                                $district_id = $row['district_id'];
                                $total1 = $row['total1'];
                                //echo $ultimate_query."<br><br>";
                                $ultimate_query ="SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2,m.total AS total, s.district_id FROM attendance a, staff s,monthly_static_figures m WHERE m.district_id=s.district_id AND a.month=m.month AND a.year=m.year AND a.person_id = s.person_id ".$query." GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber";
                                
                                //echo $ultimate_query;
            //echo $ultimate_query."<br><br>";
                                $resultdistrict = mysqli_query($mysqli,$ultimate_query);
                                /*echo "SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2, s.district_id FROM attendance a, staff s WHERE a.person_id = s.person_id AND s.district_id='$district_id' AND a.month='$month' AND a.year=$year  GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber<br>";*/
                               while($rowdistrict = mysqli_fetch_assoc($resultdistrict)){
                                   echo "<tr>";
                                    echo "<td>".$district."</td>";
                                    echo "<td>".$rowdistrict['month']."</td>";
                                    echo "<td>".$rowdistrict['year']."</td>";
                                    echo "<td>".$rowdistrict['total']."</td>";
                                    //echo "<td>".$total1."</td>";
                                    echo "<td>".$rowdistrict['total2']."</td>";
                                   
                                    $score = round((($rowdistrict['total2']/$total1)*100),1);
                                   if($score>90){
                                       echo "<td class='bg-green'>".$score."%</td>";
                                   }elseif($score>75){
                                       echo "<td class='bg-primary'>".$score."%</td>";
                                   }elseif($score>50){
                                       echo "<td class='bg-orange'>".$score."%</td>";
                                   }else{
                                       echo "<td class='bg-red'>".$score."%</td>";
                                   }
                                    
                                   echo "</tr>";
                                }
                                
                                
                            }           
                         }else{
                             $query11="SELECT s.district_id, d.district_name, COUNT(*) AS total1 FROM staff s, district d WHERE s.district_id = d.district_id  GROUP BY district_id ORDER BY district_name";
                             
                             $result= mysqli_query($mysqli,$query11);     
                            while($row= mysqli_fetch_assoc($result))
                            {
                                $district = $row['district_name'];
                                $district_id = $row['district_id'];
                                $total1 = $row['total1'];
                                //echo $ultimate_query."<br><br>";
                                $ultimate_query ="SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2, s.district_id FROM attendance a, staff s WHERE a.person_id = s.person_id AND s.district_id='$district_id' ".$query." GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber";
           // echo $ultimate_query."<br><br>";
                                $resultdistrict = mysqli_query($mysqli,$ultimate_query);
                                /*echo "SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2, s.district_id FROM attendance a, staff s WHERE a.person_id = s.person_id AND s.district_id='$district_id' AND a.month='$month' AND a.year=$year  GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber<br>";*/
                               while($rowdistrict = mysqli_fetch_assoc($resultdistrict)){
                                   echo "<tr>";
                                    echo "<td>".$district."</td>";
                                    echo "<td>".$rowdistrict['month']."</td>";
                                    echo "<td>".$rowdistrict['year']."</td>";
                                    echo "<td>".$total1."</td>";
                                    echo "<td>".$rowdistrict['total2']."</td>";
                                   
                                    $score = round((($rowdistrict['total2']/$total1)*100),1);
                                   if($score>90){
                                       echo "<td class='bg-green'>".$score."%</td>";
                                   }elseif($score>75){
                                       echo "<td class='bg-primary'>".$score."%</td>";
                                   }elseif($score>50){
                                       echo "<td class='bg-orange'>".$score."%</td>";
                                   }else{
                                       echo "<td class='bg-red'>".$score."%</td>";
                                   }
                                    
                                   echo "</tr>";
                                }
                                
                                
                            }           
                         }
                            
                                        
                    ?>
                    </tbody>
                    </table>
                                        
                               </div>
                                        <?php
                    

             }else{
                         ?>
                      <!--Job query-->
                                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>
                        <tr>
                            <th>District</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>No of Employees</th>
                            <th>No Reported</th>
                            <th>% Reported</th>
                        </tr>
                        </thead>
                        <tbody>
                    
                    <?php 
                            
                            
                            $query="SELECT s.district_id, d.district_name, COUNT(*) AS total1 FROM staff s, district d WHERE s.district_id = d.district_id  GROUP BY district_id ORDER BY district_name";
                         
                         //echo $query;
                         
                            $result= mysqli_query($mysqli,$query);     
                            while($row= mysqli_fetch_assoc($result))
                            {
                                $district = $row['district_name'];
                                $district_id = $row['district_id'];
                                $total1 = $row['total1'];
                                //echo $ultimate_query."<br><br>";
                                $ultimate_query ="SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2, s.district_id FROM attendance a, staff s WHERE a.person_id = s.person_id AND s.district_id='$district_id' AND a.month='$month' AND a.year=$year  GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber";
                                $resultdistrict = mysqli_query($mysqli,$ultimate_query);
                                /*echo "SELECT (SELECT  ( CASE a.month
            WHEN 'January' THEN 1
            WHEN 'February' THEN 2
            WHEN 'March' THEN 3
            WHEN 'April' THEN 4
            WHEN 'May' THEN 5
            WHEN 'June' THEN 6
            WHEN 'July' THEN 7
            WHEN 'August' THEN 8
            WHEN 'September' THEN 9
            WHEN 'October' THEN 10
            WHEN 'November' THEN 11
            WHEN 'December' THEN 12
          END )) AS monthnumber, a.month, a.year, COUNT(*) AS total2, s.district_id FROM attendance a, staff s WHERE a.person_id = s.person_id AND s.district_id='$district_id' AND a.month='$month' AND a.year=$year  GROUP BY a.year, a.month, s.district_id ORDER BY year,monthnumber<br>";*/
                               while($rowdistrict = mysqli_fetch_assoc($resultdistrict)){
                                   echo "<tr>";
                                    echo "<td>".$district."</td>";
                                    echo "<td>".$rowdistrict['month']."</td>";
                                    echo "<td>".$rowdistrict['year']."</td>";
                                    echo "<td>".$total1."</td>";
                                    echo "<td>".$rowdistrict['total2']."</td>";
                                   
                                    $score = round((($rowdistrict['total2']/$total1)*100),1);
                                   if($score>90){
                                       echo "<td class='bg-green'>".$score."%</td>";
                                   }elseif($score>75){
                                       echo "<td class='bg-primary'>".$score."%</td>";
                                   }elseif($score>50){
                                       echo "<td class='bg-orange'>".$score."%</td>";
                                   }else{
                                       echo "<td class='bg-red'>".$score."%</td>";
                                   }
                                    
                                   echo "</tr>";
                                }
                                
                                
                            }           
                                        
                    ?>
                    </tbody>
                    </table>
                                        
                               </div>
                                        <?php 
             }
                         
 
                ?> 
                  
                    </tbody>
                                </table>
                            </form>
                              
        
                    
                                </div>
                            </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
           </div>
        
        <!-- /#page-wrapper -->
<footer>
<hr>
<?php include("footer.php");?>
</footer>
           </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
<!--    <script src="startbootstrap-sb-admin-2-1.0.4/bower_components/jquery/dist/jquery.min.js"></script>-->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="startbootstrap-sb-admin-2-1.0.4/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

     <!-- DataTables JavaScript -->
    
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        
</body>

</html>
