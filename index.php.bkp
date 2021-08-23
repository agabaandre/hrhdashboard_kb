<?php
    include'connect.php';



 //$query2 = "SELECT COUNT(*) AS gender_sum FROM staff s,district d WHERE s.district_id=d.district_id";
        $job_query ="SELECT DISTINCT job_name, job_id FROM job";
        $gender_query ="SELECT DISTINCT gender FROM staff";

     $query2 =  "SELECT s.gender, c.cadre_name, COUNT(*) AS gender_sum FROM staff s, job j, cadre c,district d WHERE s.district_id=d.district_id AND  s.job_id = j.job_id AND j.cadre_id = c.cadre_id ";
     $query5 =  "SELECT s.gender, c.cadre_name, COUNT(*) AS gender_sum FROM staff s, job j, cadre c,district d WHERE s.district_id=d.district_id AND  s.job_id = j.job_id AND j.cadre_id = 'Administrators' AND s.gender = 'Male' ";
     $establishmentquery ="SELECT facility_type, ((filled / establishment) *100) AS percent_filled FROM staff GROUP BY facility_type";

        //$sql_result ="";
        
        

    // echo $sql11;


$establishmentquery ="SELECT facility_type, SUM(approved) AS totalestablishment, SUM(filled) AS totalfilled, SUM(vac_exe) AS totalexcess, ROUND((SUM(filled)/SUM(approved))*100,1) AS percentagefilled  FROM establishment GROUP BY facility_type ORDER BY totalestablishment DESC";
                $health_centers=array();
                $total_female=array();
                $total_male=array();
                $total_establishment=array();
                $total_percentagefilled=array();
               $result2=mysqli_query($mysqli,$establishmentquery);
                while($row2=mysqli_fetch_assoc($result2))
                {
                  //facility level
                  //$facility_type = mysql_escape_string($row2['facility_type']); 
                  $facility_type = $row2['facility_type']; 
                  array_push($health_centers, $facility_type);
                    //echo $facility_type;
                  // 
                  $totalestablishment = $row2['totalestablishment'];  
                  array_push($total_establishment, (int)($totalestablishment));
                  //echo $totalestablishment;
                  // percentage filled  
                  $percentagefilled = $row2['percentagefilled'];  
                  array_push($total_percentagefilled, (int)($percentagefilled));
                    //echo $percentagefilled;
                  //total Female per facility level
                  //$total_femalesql ="SELECT COUNT(*) AS total_female FROM staff WHERE facility_type= '$facility_type' AND gender='female'";
                  //$total_femalevalue = mysqli_fetch_array(mysqli_query($mysqli,$total_femalesql));
                  //array_push($total_female, (int)($total_femalevalue['total_female']));
                    
                  //total male per facility level
                  //$total_malesql ="SELECT COUNT(*) AS total_male FROM staff WHERE facility_type= '$facility_type' AND gender='male'";
                  //$total_malevalue = mysqli_fetch_array(mysqli_query($mysqli,$total_malesql));
                  //array_push($total_male, (int)($total_malevalue['total_male']));
                  //echo "SELECT COUNT(*) AS total_female FROM staff WHERE facility_type= '$facility_type' AND gender='female'";
                  //array_push($percent_filled, (int)($row2['percent_filled']));
                }
                $total_femalesql ="SELECT COUNT(s.gender) AS sum, gender FROM staff s WHERE gender='female' GROUP BY s.gender ORDER BY gender";
                $total_femalevalue = mysqli_fetch_array(mysqli_query($mysqli,$total_femalesql));
                $total_femalevalue = (int)($total_femalevalue['sum']);

                $total_malesql ="SELECT COUNT(s.gender) AS sum, gender FROM staff s WHERE gender='male' GROUP BY s.gender ORDER BY gender";
                $total_malevalue = mysqli_fetch_array(mysqli_query($mysqli,$total_malesql));
                $total_malevalue = (int)($total_malevalue['sum']);
                //echo $total_femalevalue."<br>".$total_malevalue;

                $_SESSION['health_centers']=json_encode($health_centers);

                $_SESSION['total_establishment']=json_encode($total_establishment);

                $_SESSION['total_percentagefilled']=json_encode($total_percentagefilled);
                
                //$_SESSION['total_male']=json_encode($percent_filled);
//echo $_SESSION['percent_filled'];  total_establishment  total_percentagefilled





//Attendance graph

$rownumrows = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS N FROM (SELECT month, year FROM attendance GROUP BY month, year) AS total"));
        $total = $rownumrows['N'];
        $range = $total - 12;

//echo "Total = ".$total;
//echo "<br>Range = ".$range;
        $queryAttendance = "SELECT (SELECT  ( CASE month
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
          END )) AS month, month AS monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM attendance GROUP BY month, year ORDER BY year,month LIMIT $range,$total";

//echo $queryAttendance;

            $month=array();
            $daysPresent =array(); 
            $daysOffDuty=array();
            $daysOnLeave=array();
            $daysRequest=array();
            $daysAbsent=array();
            $totaldays = array();
            $absolute_days_absent = array();
            $days_not_at_facility = array();
$result2=mysqli_query($mysqli,$queryAttendance);
                while($row2=mysqli_fetch_assoc($result2))
                {
                  //; 
                  $month_ind = $row2['monthWords']; 
                  array_push($month, $month_ind); 
                  // daysPresent
                  $daysPresent_ind = $row2['daysPresent'];  
                  array_push($daysPresent, (int)($daysPresent_ind));
                  //daysOffDuty   '
                  $daysOffDuty_ind = $row2['daysOffDuty'];  
                  array_push($daysOffDuty, (int)($daysOffDuty_ind));                     
                  // daysOnLeave  
                  $daysOnLeave_ind = $row2['daysOnLeave'];  
                  array_push($daysOnLeave, (int)($daysOnLeave_ind));
                  //daysRequest  
                  $daysRequest_ind = $row2['daysRequest'];  
                  array_push($daysRequest, (int)($daysRequest_ind));
                  //daysAbsent
                  $daysAbsent_ind = $row2['daysAbsent'];  
                  array_push($daysAbsent, (int)($daysAbsent_ind));
                  //absolute_days_absent
                  $absolute_days_absent_ind = $row2['absolute_days_absent'];  
                  array_push($absolute_days_absent, (int)($absolute_days_absent_ind));
                  //daysAbsent
                  $days_not_at_facility_ind = $row2['days_not_at_facility'];  
                  array_push($days_not_at_facility, (int)($days_not_at_facility_ind));
                    
                  //Total
                  $totaldays_ind = (int)($daysPresent_ind) + (int)($daysOffDuty_ind) + (int)($daysOnLeave_ind) + (int)($daysRequest_ind) + (int)($daysAbsent_ind);  
                  array_push($totaldays, (int)($totaldays_ind));
                }
//$health_centers = json_encode($health_centers);
                $month=json_encode($month);
                $daysPresent =json_encode($daysPresent); 
                $daysOffDuty=json_encode($daysOffDuty);
                $daysOnLeave=json_encode($daysOnLeave);
                $daysRequest=json_encode($daysRequest);
                $daysAbsent=json_encode($daysAbsent);
                $absolute_days_absent=json_encode($absolute_days_absent);
                $days_not_at_facility=json_encode($days_not_at_facility);

$ultimate_query = "SELECT age FROM staff s";
?>
<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
    
    
 <?php include'admin_sidemenu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Welcome to Ministry Of Health Uganda Human Resources for Health Sector work force data and access to related sector HR Systems</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $rowHW = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM staff"));
                                        echo number_format($rowHW); ?></h3>

              <p>Health Workers</p>
            </div>
            <div class="icon">
              <i class="ion ion-thermometer"></i>
            </div>
            <a href="national_job_summary.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $rowf = mysqli_num_rows(mysqli_query($mysqli,"SELECT DISTINCT facility_id FROM staff"));
                                        echo number_format($rowf); ?></h3>

              <p>Facilities</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-home"></i>
            </div>
            <a href="district_facilities_detail.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $rowd = mysqli_num_rows(mysqli_query($mysqli,"SELECT DISTINCT district_id FROM staff"));
                                        echo number_format($rowd); ?></h3>

              <p>Districts</p>
            </div>
            <div class="icon">
              <i class="ion ion-earth"></i>
            </div>
            <a href="districts.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php $rowpd = $rowpd0 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM district_focal_persons")) + $rowpd1 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM RRH_contacts"))+$rowpd2 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM municipality_contacts"))+$rowpd3 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM central_institutions_contacts"))+$rowpd3 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM regional_resource_persons"));
                                        echo number_format($rowpd); ?></h3>

              <p>Phone Directory</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-call"></i>
            </div>
            <a href="phone_directory.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
      
          
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                 
            
            
                
                <div class="row">
                    <div class="col-lg-6">
                     <br>
                        <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <i class="fa fa-female"></i><i class="fa fa-exchange"></i> <i class="fa fa-male"></i> Uganda Gender Summary
                                    </div>
                                    <div class="panel-body">
             
                    <!-------------------------GRAPHS------------------------------------->
                                    
<div id="gender" style="min-width: 310px; height: 300px; max-width: 900px; margin: 0 auto"></div>                                   
<script type="text/javascript">
    
// Build the chart
Highcharts.chart('gender', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Health Worker Gender Summary for Uganda'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
                name: 'Male',
                color:'#32CD32',
                
                y: <?php echo $total_malevalue; ?>
            }, {
                name: 'Female',
                color:'#FF00FF',
                y:<?php echo $total_femalevalue; ?>
            }]
    }]
});
    
                            
    </script>



                                    
                    
                    
                    <!-------------------------GRAPHS------------------------------------->
                    
                    
                               </div>
                                <!--<div class="panel-footer">
                                    
                               </div>-->
        
                    
                                </div>
                            </div>
                    <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                     <br>
                        <div class="panel panel-default">
                                    <div class="panel-heading">
                                       <i class="fa  fa-group"></i> Uganda Health Workers Age Distribution
                                    </div>
                                    <div class="panel-body">
             
<?php 
$below30 = 0;
              $between3055 = 0;
              $between5565 = 0;
              $above65 = 0;
             

              $result= mysqli_query($mysqli,$ultimate_query);
              

               while ($row = mysqli_fetch_assoc($result)){
                if($row['age'] <= 30){
                  $below30++;

                }elseif($row['age']>30 && $row['age']<=55 ){
                  $between3055++;


                }elseif($row['age']>55 && $row['age']<=65){
                  $between5565++;


                }elseif ($row['age']>65) {
                $above65++;
                }
                                        
               }
//                                        echo $between3055."<br>";
//                                          echo $between5565."<br>";
//                                          echo $above65."<br>";
//                                          
                                        
                                        
?>
                                        <!-------------------------GRAPHS------------------------------------->
                                    
 <div id="ageDistribution" style="min-width: 310px; max-width: 800px; height: 300px; margin: 0 auto"></div>                                   
                                    <script type="text/javascript">
Highcharts.chart('ageDistribution', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<?php if($selected_district_name!=''){echo strtoupper($selected_district_name);}else
            { echo 'Uganda';
  
            }?>  Health Workers Age Distribution'
    },
    xAxis: {
        categories: ['Below 30','Between 30 -55','Between 55-65','Above 65'],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'No of Staff'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Age distribution',
        data: [<?php echo $below30 ?>,<?php echo $between3055 ?>,<?php echo $between5565 ?>,<?php echo $above65 ?>]

    }]
});

                                        
//Absorbed 
//Left
//Not absorbed
//Not eligible for absorption
//Not yet submitted for absorption
//Position not advertised/no vacancy
//Submitted for absorption
        </script>


                    
                    
                               </div>
                                <!--<div class="panel-footer">
                                    
                               </div>-->
        
                    
                                </div>
                            </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                    
                    
                               
                
                
                
                
                
            </div>
          </div>
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
    
    

</body>
</html>
