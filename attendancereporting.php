<?php
    include'connect.php';

function chooseColor($percent){
    if($percent >= 80){
       return  "bg-green";
   }elseif($percent >= 50){
       return  "bg-orange";
   }elseif($percent > 1){   
       return  "bg-red";
   }else{
       return  "bg-gray";
   }
}

 
    // Pick previous month from today
                            $date = date('Y-m-d',time());
                            $splitdate = explode('-', $date);
                            $month = $splitdate[1]-1;
                            $year = $splitdate[0];
                            $newdate = $year.'-0'.$month.'-'.$splitdate[2];
                            $month = date("F",strtotime($newdate));
                            //echo $month;

echo $queryAttendance;
?>
<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<style>
.nav-tabs
 {
   border-color:#004A00;
   width:100%;
 }

.nav-tabs > li a { 
    border: 1px solid #004A00;
    background-color:#004A00; 
    color:#fff;
    }

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover{
    background-color:#D5FFD5;
    color:#000;
    border: 1px solid #1A3E5E;
    border-bottom-color: transparent;
    }

.nav-tabs > li > a:hover{
  background-color: #D5FFD5 !important;
    border-radius: 5px;
    color:#000;

} 

.tab-pane {
    border:solid 1px #004A00;
    border-top: 0; 
    width:100%;
/*    background-color:#D5FFD5;*/
    padding:5px;
}
</style>
<!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  
  
<link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="src/plugins/datatables/media/css/responsive.dataTables.css">
 <?php include'Header.php';?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
    
    
 <?php include'admin_sidemenu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <?php include("menu.php"); ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
          
<!--        <section class="col-lg-12 connectedSortable">-->
          <!-- Custom tabs (Charts with tabs)-->
<!--          <div class="nav-tabs-custom">-->
            <!-- Tabs within a box -->
<!--            <ul class="nav nav-tabs pull-right">-->
              
<!--              <li class="pull-left header"><i class="fa fa-user-md"></i>Reporting Rates</li>-->
<!--            </ul>-->
<!--            <div class="tab-content no-padding">-->
                
<!-----------------begin  Filters---------------------------------------------------------->
                <form method="post">
<!--begin form-row----------------------------------------------------------------------->
  <div class="form-row">
      
    <div class="form-group col-md-2">
      <label for="inputState">From</label>
      <div class="input-group date datepicker"><input  name="start_date" type="text"  size="30" class="form-control monthyear"></div>
    </div>
      
    <div class="form-group col-md-2">
      <label for="inputState">To</label>
      <div class="input-group date datepicker"><input  name="end_date" type="text"  size="30" class="form-control monthyear"></div>
    </div>
    
    <div class="form-group col-md-1">
      <label for="inputState">Region</label>
      <select name="region_name2" class="form-control" >
            <option value="">Region</option>
                <?php

                    $sql="select Distinct region_name2 from monthly_static_figures ORDER by region_name2";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['region_name2'];?>"><?php echo $row['region_name2']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="col-md-1">
      <label for="inputState">District</label>
        <select name="district_name[]" class="form-control selectpicker" multiple >
<!--          <select name="district_name" class="form-control" >-->
            <option value="">District</option>
                <?php

                    $sql="SELECT DISTINCT district_name FROM monthly_static_figures ORDER by district_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['district_name'];?>"><?php echo $row['district_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">Institution</label>
      <select name="institution_type" class="form-control" >
            <option value="">Institution</option>
                <?php

                    $sql="SELECT DISTINCT institution_type FROM monthly_static_figures ORDER by institution_type";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['institution_type'];?>"><?php echo $row['institution_type']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">Level</label>
      <select name="facility_type_name" class="form-control" >
            <option value="">Level</option>
                <?php

                    $sql="SELECT DISTINCT facility_type_name FROM staff ORDER by facility_type_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['facility_type_name'];?>"><?php echo $row['facility_type_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
    
    <div class="form-group col-md-1">
      <label for="inputState">Facility</label>
      <select name="facility_name" class="form-control" >
            <option value="">Facility</option>
                <?php

                    $sql="select Distinct facility_name from monthly_static_figures ORDER by facility_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['facility_name'];?>"><?php echo $row['facility_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
  
    
    
      
    
      
    
      
    
    
      
  </div>
<!--end form-row------------------------------------------------------------------------>
                    
  <div class="form-group col-md-3">
      <br>
        <button type="submit" name="Continue" class="btn btn-primary">Apply Limits</button>
  </div>
</form>
                   
  
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                           
                
                
<!--
            </div>
          </div>
-->
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
        
          <!-- /.box -->

          <!-- quick email widget -->
          
<!--

        </section>
-->
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
       
     <?php
             $selected_district_name="";
              $queryt ="WHERE month ='".$month."' AND year = ".$year;
$queryAttendance = "SELECT SUM(total) AS total , facility_name, district_name, monthWords AS monthWords,month AS month, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures ".$queryt." GROUP BY district_name, month, year";
          
$queryAttendanceF = "SELECT SUM(total) AS total, facility_name, district_name, monthWords AS monthWords,month AS month, year, total_dutyroster, total_attendance FROM monthly_static_figures ".$queryt." GROUP BY facility_name, month, year";
                
        //echo "<br>".$queryAttendance;
          
        //echo $queryAttendanceF;
                                
                     if(isset($_POST['Continue'])){
                         
                         //$ultimate_query ="SELECT COUNT(s.gender) AS sum, gender FROM staff s";
                        $region_name2 = $_POST["region_name2"];
                        $district_name = $_POST["district_name"];
                        $facility_type_name = $_POST["facility_type_name"];
                        $facility_name = $_POST["facility_name"];
                        $institution_type = $_POST["institution_type"];
                        $start_date =explode("-", $_POST["start_date"]);
                        $end_date =explode("-", $_POST["end_date"]);
                        $start_month = $start_date[0];
                        $start_year = $start_date[1];
                        $end_month = $end_date[0];
                        $end_year = $end_date[1];
                         
                        if(strlen($_POST["start_date"])!=0 && strlen($_POST["end_date"])!=0){
                          $queryy=" WHERE ";
                        if($start_year == $end_year && $start_month != $end_month ){
                            $queryy = $queryy." month >=".(int)($start_month)." AND month<=".(int)($end_month)." AND year = ".(int)($start_year);
                            $finalfilters = $finalfilters." ".$start_month."-".$start_year." to ".$end_month."-".$end_year;
                        }else if($start_year == $end_year && $start_month == $end_month ){
                            
                            $queryy = $queryy." month =".(int)($start_month)." AND year = ".(int)($start_year);
                            $finalfilters = $finalfilters." ".$start_month."-".$start_year;
                            
                        }else{
                            $queryy = $queryy." (month >=".(int)($start_month)." AND year = ".(int)($start_year).") OR (month<=".(int)($end_month)." AND year = ".(int)($end_year).")";
                            $finalfilters = $finalfilters." ".$start_month."-".$start_year." to ".$end_month."-".$end_year;
                        }
                      } else $queryy=" ";    
                    //echo $queryy;
                    
                $nonEmpty=array();
                $filters =array();
                if ($region_name2!=''){
                $nonEmpty[0]="region_name2";
                $filters[0]="Region";
                }
                
                if ($facility_type_name!=''){
                $nonEmpty[1]="facility_type_name";
                $filters[1]="Facility Type";
                }
                if ($facility_name!=''){
                $nonEmpty[2]="facility_name";
                $filters[2]="Facility";
                }
                if ($institution_type!=''){
                $nonEmpty[3]="institution_type";
                $filters[3]="Institution Type";
                }
                         
                $noOfElements=sizeof($nonEmpty);        
                if ($district_name!=''){
                $nonEmptyd="district_name";
                
                    $countd = 1;
                    if($noOfElements==0){
                        if($query==""){
                            $queryd = " WHERE (";
                        }else{
                            $queryd = " WHERE (";
                        }
                        
                        $filtersd="District";
                    }else{
                        $queryd = " ( ";
                        $filtersd=", District";
                    }
                    
                    $noOfdistricts=sizeof($_POST['district_name']);
                    //echo $noOfdistricts;
                    foreach($_POST['district_name'] as $district_name) {
                        if($countd==$noOfdistricts){
                            $districts = $districts." ".$district_name;
                            $queryd = $queryd."".$nonEmptyd."='".$district_name."' )";
                        }else{
                            $districts = $districts."".$district_name.", ";
                            $queryd = $queryd."".$nonEmptyd."='".$district_name."' OR ";
                        }
                        //echo $symptom_id."<br>";
                        $countd++;
                    }
                    
                    $districtsfilter = $filtersd." = ".$districts;
                    //echo $districts."<br>";
                    //echo $queryd;
                }
                $query=" ";
                $finalfilters="";
                $noOfElements=sizeof($nonEmpty);
                if($noOfElements>0){
                          
                          $count =1;
                            if($queryd != ""){
                                $query=" WHERE ";
                            }else{
                                $query=" WHERE ";
                            }
                             
                             $finalfilters="";
                    //loop for generating query
                              foreach(array_combine($nonEmpty,$filters) as $value1 => $value2){
                                    
                                    if($count==$noOfElements){
                                    // $values =explode(".", $value1);
                                        
                                    //echo $_POST[$value1];

                                    $query= $query." ".$value1." = '".mysqli_real_escape_string($mysqli,$_POST[$value1])."'";
                                    $finalfilters= $finalfilters." ".$value2." = ".mysqli_real_escape_string($mysqli,$_POST[$value1]);
                                    
                                    }else{
                                    //$values =explode(".", $value1);
                                    $query= $query." ".$value1." = '".mysqli_real_escape_string($mysqli,$_POST[$value1])."' AND";
                                    
                                    $finalfilters= $finalfilters." ".$value2." = ".mysqli_real_escape_string($mysqli,$_POST[$value1]).", ";
                                    }
                                    
                                  //$filters = $filters.",".$value." = ".$_POST[$values[1]];
                                    $count++;
                              }
                             //echo $query."<br>";
                        $queryAttendance = "SELECT * FROM (SELECT (SELECT ( CASE monthWords WHEN 'January' THEN 1 WHEN 'February' THEN 2 WHEN 'March' THEN 3 WHEN 'April' THEN 4 WHEN 'May' THEN 5 WHEN 'June' THEN 6 WHEN 'July' THEN 7 WHEN 'August' THEN 8 WHEN 'September' THEN 9 WHEN 'October' THEN 10 WHEN 'November' THEN 11 WHEN 'December' THEN 12 END )) AS month, monthWords AS monthWords, SUM(total) AS total, district_name, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures  ".$queryd."".$query." GROUP BY district_name, year, month) AS t ".$queryy;
                            
                            
                            

                    
          $queryAttendanceF = "SELECT * FROM (SELECT (SELECT ( CASE monthWords WHEN 'January' THEN 1 WHEN 'February' THEN 2 WHEN 'March' THEN 3 WHEN 'April' THEN 4 WHEN 'May' THEN 5 WHEN 'June' THEN 6 WHEN 'July' THEN 7 WHEN 'August' THEN 8 WHEN 'September' THEN 9 WHEN 'October' THEN 10 WHEN 'November' THEN 11 WHEN 'December' THEN 12 END )) AS month, monthWords AS monthWords, SUM(total) AS total,facility_name, district_name, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures  ".$queryd."".$query." GROUP BY facility_name, year, month) AS t ".$queryy;
               
                }else{
                    $queryAttendance = "SELECT * FROM (SELECT (SELECT ( CASE monthWords WHEN 'January' THEN 1 WHEN 'February' THEN 2 WHEN 'March' THEN 3 WHEN 'April' THEN 4 WHEN 'May' THEN 5 WHEN 'June' THEN 6 WHEN 'July' THEN 7 WHEN 'August' THEN 8 WHEN 'September' THEN 9 WHEN 'October' THEN 10 WHEN 'November' THEN 11 WHEN 'December' THEN 12 END )) AS month, monthWords AS monthWords, SUM(total) AS total, district_name, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures  ".$queryd."".$query." GROUP BY district_name, year, month) AS t ".$queryy;
                    
          $queryAttendanceF = "SELECT * FROM (SELECT (SELECT ( CASE monthWords WHEN 'January' THEN 1 WHEN 'February' THEN 2 WHEN 'March' THEN 3 WHEN 'April' THEN 4 WHEN 'May' THEN 5 WHEN 'June' THEN 6 WHEN 'July' THEN 7 WHEN 'August' THEN 8 WHEN 'September' THEN 9 WHEN 'October' THEN 10 WHEN 'November' THEN 11 WHEN 'December' THEN 12 END )) AS month, monthWords AS monthWords, SUM(total) AS total,facility_name, district_name, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures  ".$queryd."".$query." GROUP BY facility_name, year, month) AS t ".$queryy;
                    
                    
                }
                //echo $noOfElements;          
                //echo $finalfilters;
                $finalfilters= $finalfilters." ".$districtsfilter;
                //echo "<br>".$queryAttendanceF;
                         
                        // echo $queryAttendance;
          

             }
              
            
                               
                ?>  
             
          
          
          
          
          
          
          
          
          <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
<!--
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header">Results</li>
            </ul>
-->
            <div class="tab-content padding">
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                <!-- Nav tabs -->
                
                <h4>Reporting Rate for <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';} ?></h4> 
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#HWAA" data-toggle="tab">Reporting by Institution</a>
                                </li>
                                <li><a href="#HWAAA" data-toggle="tab">Reporting by Facility </a>
                                </li>
                                
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="HWAA">
                                    <br>
                <br>
                                    
                  
                                                                                                                            
                                                                                                                            
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Institution</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Total no of HW</th>
                            <th>No of HW Reported on Dutyroster</th>
                            <th>% Dutyroster</th>
                            <th>No of HW Reported on Attendance</th>
                            <th>% Attendance</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            
                            //echo $queryAttendance;
                    
                    $result = mysqli_query($mysqli, $queryAttendance);
                    while($rowdistrict = mysqli_fetch_assoc($result)){
                                    $district_name = $rowdistrict['district_name'];
                                    $monthWords = $rowdistrict['monthWords'];
                                    $year = $rowdistrict['year'];
                                    //$staticfigures = mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT SUM(total) AS total, district_name, month, year FROM monthly_static_figures WHERE district_name='$district_name' AND month ='$monthWords' AND year='$year' GROUP BY district_name"));
                        //$staticfigures = mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT SUM(total) AS total, district_name, month, year, SUM(total_dutyroster) AS total_dutyroster, SUM(total_attendance) AS total_attendance FROM monthly_static_figures WHERE district_name='$district_name' AND month ='$monthWords' AND year='$year' GROUP BY district_name"));
                        //echo "SELECT * FROM monthly_static_figures WHERE district_name='$district_name' AND month ='$monthWords' AND year='$year'<br>";
                                   echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td>".$rowdistrict['district_name']."</td>";
                                    echo "<td>".$rowdistrict['monthWords']."</td>";
                                    echo "<td>".$rowdistrict['year']."</td>";
                                    echo "<td>".$rowdistrict['total']."</td>";
                                    echo "<td>".$rowdistrict['total_dutyroster']."</td>";
                        
                                    $PDutyroster = round((($rowdistrict['total_dutyroster']/$rowdistrict['total'])*100),1);
                                    echo "<td class='".chooseColor($PDutyroster)."'>".$PDutyroster."%</td>";
                        
                                   echo "<td>".$rowdistrict['total_attendance']."</td>";
                        
                                    $PAttendance = round((($rowdistrict['total_attendance']/$rowdistrict['total'])*100),1);
                        
                                    echo "<td class='".chooseColor($PAttendance)."'>".$PAttendance."%</td>";
                                    
                                   echo "</tr>";
                                }
                            
                            
                ?>
                
                 </tbody>
            </table>
                                        
        </div> 
                                    
            </div>
            <div class="tab-pane fade" id="HWAAA">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example1">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility</th>
                            <th>Institution</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Total no of HW</th>
                            <th>No of HW Reported on Dutyroster</th>
                            <th>% Dutyroster</th>
                            <th>No of HW Reported on Attendance</th>
                            <th>% Attendance</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            //echo $queryAttendanceF;
                    //$queryAttendanceF = "SELECT total, facility_name, district_name, month, year, total_dutyroster, total_attendance FROM monthly_static_figures";
                    $resultF = mysqli_query($mysqli, $queryAttendanceF);
                    while($rowfacility = mysqli_fetch_assoc($resultF)){
                                    $district_name = $rowfacility['district_name'];
                                    $monthWords = $rowfacility['monthWords'];
                                    $year = $rowfacility['year'];
                                    $facility_id = $rowfacility['facility_id'];
                                    
                        //echo "SELECT * FROM monthly_static_figures WHERE district_name='$district_name' AND facility_id = '$facility_id'  AND month ='$monthWords' AND year='$year'<br>";
                                   echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td>".$rowfacility['facility_name']."</td>";
                                    echo "<td>".$rowfacility['district_name']."</td>";
                                    echo "<td>".$rowfacility['monthWords']."</td>";
                                    echo "<td>".$rowfacility['year']."</td>";
                                    echo "<td>".$rowfacility['total']."</td>";
                                    echo "<td>".$rowfacility['total_dutyroster']."</td>";
                        
                                    $PDutyroster = round((($rowfacility['total_dutyroster']/$rowfacility['total'])*100),1);
                                    echo "<td class='".chooseColor($PDutyroster)."'>".$PDutyroster."%</td>";
                        
                                   echo "<td>".$rowfacility['total_attendance']."</td>";
                        
                                    $PAttendance = round((($rowfacility['total_attendance']/$rowfacility['total'])*100),1);
                        
                                    echo "<td class='".chooseColor($PAttendance)."'>".$PAttendance."%</td>";
                                    
                                   echo "</tr>";
                                }
                            
                            
                ?>
                
                 </tbody>
            </table>
                                        
        </div>
              
           </div>
                
            </div>
              </div> </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
        
          <!-- /.box -->

          <!-- quick email widget -->
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          
          
          
          
          
          
          
          
          
          
          
          
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     <?php include'footer.php';?>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


    
 <!--<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>-->
    <link type="text/css" rel="stylesheet" href="css/datatables.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

  <script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script> 
  <script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
  <script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
  <script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
  <script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
var t = $('#example').DataTable( {
				"iDisplayLength": 10,
    				"aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "All"]],
				"columnDefs": [ {
				    "searchable": false,
				    "orderable": false,
				    "targets": 0,
				} ],
                dom: 'Blfrtip',
                buttons: [
                'copy', 'csv', 'pdf', 'print'
                ],
				"order": [[ 1, 'asc' ]]
			    } );
			 
			    t.on( 'order.dt search.dt', function () {
				t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				    cell.innerHTML = i+1;
				} );
			    } ).draw();
    
var f = $('#example1').DataTable( {
				"iDisplayLength": 10,
    				"aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "All"]],
				"columnDefs": [ {
				    "searchable": false,
				    "orderable": false,
				    "targets": 0,
				} ],
                dom: 'Blfrtip',
                buttons: [
                'copy', 'csv', 'pdf', 'print'
                ],
				"order": [[ 1, 'asc' ]]
			    } );
			 
			    f.on( 'order.dt search.dt', function () {
				f.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				    cell.innerHTML = i+1;
				} );
			    } ).draw();
$('.monthyear').datepicker({
    		format: "mm-yyyy",
            startView: "months", 
            minView: "months",
            minViewMode: 1,
		});
        
    $('.year').datepicker({
    		format: "MM-yyyy",
            startView: "year", 
            minView: "year",
            minViewMode: 2,
		});  
});
</script> 
    

</body>
</html>
