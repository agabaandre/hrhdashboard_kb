<?php session_start(); 

    
    include('connect.php'); 

     
    
        $ultimate_query = "SELECT COUNT(s.gender) AS sum, gender FROM staff s GROUP BY s.gender ORDER BY gender DESC";
        

        
 

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
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     <?php include("menu.php"); ?>
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
                 
<form method="post">
<!--begin form-row----------------------------------------------------------------------->
  <div class="form-row">
    
    <div class="form-group col-md-1">
      <label for="inputState">Region</label>
      <select name="region_name" class="form-control" >
            <option value="">Region</option>
                <?php

                    $sql="select Distinct region_name from staff ORDER by region_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['region_name'];?>"><?php echo $row['region_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">District</label>
        <select name="district_name[]" class="form-control selectpicker" multiple >
<!--          <select name="district_name" class="form-control" >-->
            <option value="">District</option>
                <?php

                    $sql="select Distinct district_name from staff ORDER by district_name";
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
      <label for="inputState">Level</label>
      <select name="facility_type_name" class="form-control" >
            <option value="">Level</option>
                <?php

                    $sql="select Distinct facility_type_name from staff ORDER by facility_type_name";
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

                    $sql="select Distinct facility_name from staff ORDER by facility_name";
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
<!--begin form-row----------------------------------------------------------------------->
  <div class="form-row">
    
    
      
    <div class="form-group col-md-1">
      <label for="inputState">Cadre</label>
      <select name="cadre_name" class="form-control" >
            <option value="">Cadre</option>
                <?php

                    $sql="select Distinct cadre_name from staff ORDER by cadre_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['cadre_name'];?>"><?php echo $row['cadre_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">Scale</label>
      <select name="salary_scale" class="form-control" >
            <option value="">Scale</option>
                <?php

                    $sql="select Distinct salary_scale from staff ORDER by salary_scale";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['salary_scale'];?>"><?php echo $row['salary_scale']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">Job</label>
      <select name="job_name" class="form-control" >
            <option value="">Job</option>
                <?php

                    $sql="select Distinct job_name from staff ORDER by job_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['job_name'];?>"><?php echo $row['job_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Institution</label>
      <select name="institution_type" class="form-control" >
            <option value="">Institution</option>
                <?php

                    $sql="select Distinct institution_type from staff ORDER by institution_type";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['institution_type'];?>"><?php echo $row['institution_type']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
      
  </div>
<!--end form-row------------------------------------------------------------------------>
  <div class="form-group col-md-2">
      <br>
        <button type="submit" name="Continue" class="btn btn-primary">Apply Limits</button>
  </div>
</form>
<?php
             $selected_district_name="";
              
                
        
                                
                     if(isset($_POST['Continue'])){
                         
                         $ultimate_query ="SELECT COUNT(s.gender) AS sum, gender FROM staff s";

                        
                        $region_name = $_POST["region_name"];
                        $district_name = $_POST["district_name"];
                        $facility_type_name = $_POST["facility_type_name"];
                        $facility_name = $_POST["facility_name"];
                        $cadre_name = $_POST["cadre_name"];
                        $salary_scale = $_POST["salary_scale"];
                        $job_name = $_POST["job_name"];
                        $institution_type = $_POST["institution_type"];
                        
                    

                $nonEmpty=array();
                $filters =array();
                if ($region_name!=''){
                $nonEmpty[0]="s.region_name";
                $filters[0]="Region";
                }
                
                if ($facility_type_name!=''){
                $nonEmpty[1]="s.facility_type_name";
                $filters[1]="Facility Type";
                }
                if ($facility_name!=''){
                $nonEmpty[2]="s.facility_name";
                $filters[2]="Facility";
                }
                if ($cadre_name!=''){
                $nonEmpty[3]="s.cadre_name";
                $filters[3]="Cadre";
                }
                if ($salary_scale!=''){
                $nonEmpty[4]="s.salary_scale";
                $filters[4]="Salary";
                }
                if ($job_name!=''){
                $nonEmpty[5]="s.job_name";
                $filters[5]="Job";
                }
                if ($institution_type!=''){
                $nonEmpty[6]="s.institution_type";
                $filters[6]="Institution Type";
                }
                         
                $noOfElements=sizeof($nonEmpty);        
                if ($district_name!=''){
                $nonEmptyd="s.district_name";
                
                    $countd = 1;
                    if($noOfElements==0){
                        $queryd = " ";
                        $filtersd="District";
                    }else{
                        $queryd = " AND ";
                        $filtersd=", District";
                    }
                    
                    $noOfdistricts=sizeof($_POST['district_name']);
                    //echo $noOfdistricts;
                    foreach($_POST['district_name'] as $district_name) {
                        if($countd==$noOfdistricts){
                            $districts = $districts." ".$district_name;
                            $queryd = $queryd."".$nonEmptyd."='".$district_name."' ";
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
                $query=" WHERE ";
                $finalfilters="";
                $noOfElements=sizeof($nonEmpty);
                if($noOfElements>0){
                          
                          $count =1;
                            
                             $query=" WHERE";
                             $finalfilters="";
                    //loop for generating query
                              foreach(array_combine($nonEmpty,$filters) as $value1 => $value2){
                                    
                                    if($count==$noOfElements){
                                    $values =explode(".", $value1);

                                    $query= $query." ".$value1." LIKE '%".mysqli_real_escape_string($mysqli,$_POST[$values[1]])."%'";
                                    $finalfilters= $finalfilters." ".$value2." = ".mysqli_real_escape_string($mysqli,$_POST[$values[1]]);
                                    
                                    }else{
                                    $values =explode(".", $value1);
                                    $query= $query." ".$value1." LIKE '%".mysqli_real_escape_string($mysqli,$_POST[$values[1]])."%' AND";
                                    
                                    $finalfilters= $finalfilters." ".$value2." = ".mysqli_real_escape_string($mysqli,$_POST[$values[1]]).", ";
                                    }
                                    
                                  //$filters = $filters.",".$value." = ".$_POST[$values[1]];
                                    $count++;
                              }
                             //echo $query."<br>";
                             $ultimate_query=  $ultimate_query." ".$query."".$queryd." GROUP BY s.gender ORDER BY gender DESC";  
               
                }else{
                    $ultimate_query=  $ultimate_query." ".$query."".$queryd." GROUP BY s.gender ORDER BY gender DESC";  
                }
                //echo $noOfElements;          
                //echo $finalfilters;
                $finalfilters= $finalfilters." ".$districtsfilter;
                //echo "<br>".$ultimate_query;
          

             }
              
            
               $result2=mysqli_query($mysqli,$ultimate_query);
                
                                
                $row2=mysqli_fetch_assoc($result2);
                $totalMale = $row2['sum'];
                if($totalMale==""){
                    $totalMale=0;
                }
                
                $row2=mysqli_fetch_assoc($result2);
                $totalFemale = $row2['sum'];
                if($totalFemale==""){
                    $totalFemale=0;
                }
                  //echo $totalFemale."bb";                      
                ?>   
 
            <!-------------------------GRAPHS------------------------------------->
                                    
<div id="gender" style="min-width: 310px; height: 400px; max-width: 900px; margin: 0 auto"></div>                                   
<script type="text/javascript">
    

Highcharts.chart('gender', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Health Worker Gender Summary for  <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';
  
            }?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}:<br> n = {point.y}</b> <br> {point.percentage:.0f}%',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Staff',
        colorByPoint: true,
        data: [{
                name: 'Male',
                color:'#32CD32',
                
                y: <?php echo $totalMale; ?>
            }, {
                name: 'Female',
                color:'#DA70D6',
                y:<?php echo $totalFemale; ?>
            }]
    }]
});    
                            
    </script>



                                    
                    
                    
                    <!-------------------------GRAPHS------------------------------------->    
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
