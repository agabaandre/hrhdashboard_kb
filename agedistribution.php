<?php session_start(); 

    
    include('connect.php'); 

     
    
        $ultimate_query = "SELECT age, gender FROM staff s";
        

        
 

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

                    $sql="SELECT DISTINCT region_name FROM staff ORDER by region_name";
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
                         
                         $ultimate_query = "SELECT age, gender FROM staff s";

                        
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
                             $ultimate_query=  $ultimate_query." ".$query."".$queryd;  
               
                }else{
                    $ultimate_query=  $ultimate_query." ".$query."".$queryd;  
                }
                //echo $noOfElements;          
                //echo $finalfilters;
                $finalfilters= $finalfilters." ".$districtsfilter;
                //echo "<br>".$ultimate_query;
          

             }
              
            
               $below30 = 0;
              $between3055 = 0;
              $between5565 = 0;
              $above65 = 0;
                                        
                                        $male1821 = 0;
                                        $male2225 = 0;
                                        $male2629 = 0;
                                        $male3033 = 0;
                                        $male3437 = 0;
                                        $male3841 = 0;
                                        $male4245 = 0;
                                        $male4649 = 0;
                                        $male5053 = 0;
                                        $male5457 = 0;
                                        $male5861 = 0;
                                        $male6265 = 0;
                                        $male66 = 0;
                                        $female1821 = 0;
                                        $female2225 = 0;
                                        $female2629 = 0;
                                        $female3033 = 0;
                                        $female3437 = 0;
                                        $female3841 = 0;
                                        $female4245 = 0;
                                        $female4649 = 0;
                                        $female5053 = 0;
                                        $female5457 = 0;
                                        $female5861 = 0;
                                        $female6265 = 0;
                                        $female66 = 0;
                                        
                                    
             //$male1821 = 0; $male2225 = 0; $male2629 = 0; $male3033 = 0; $male3437 = 0; $male3841 = 0; $male4245 = 0; $male4649 = 0; $male5053 = 0; $male5457 = 0; $male5861 = 0; $male6265 = 0; $male66 = 0;

              $result= mysqli_query($mysqli,$ultimate_query);
              

               while ($row = mysqli_fetch_assoc($result)){
                /*if($row['age'] <= 30){
                  $below30++;

                }elseif($row['age']>30 && $row['age']<=55 ){
                  $between3055++;


                }elseif($row['age']>55 && $row['age']<=65){
                  $between5565++;


                }elseif ($row['age']>65) {
                $above65++;
                }*/
                   
                   
                   //if statements for male
                   //$male1821 = 0; $male2225 = 0; $male2629 = 0; $male3033 = 0; $male3437 = 0; $male3841 = 0; $male4245 = 0; $male4649 = 0; $male5053 = 0; $male5457 = 0; $male5861 = 0; $male6265 = 0; $male66 = 0;
                   if($row['age']>18 && $row['age']<=21 && $row['gender']=="Male"){
                      $male1821++; 
                   }elseif($row['age']>=22 && $row['age']<=25 && $row['gender']=="Male"){
                     $male2225++;  
                   }elseif($row['age']>=26 && $row['age']<=29 && $row['gender']=="Male"){
                     $male2629++;  
                   }elseif($row['age']>=30 && $row['age']<=33 && $row['gender']=="Male"){
                     $male3033++;  
                   }elseif($row['age']>=34 && $row['age']<=37 && $row['gender']=="Male"){
                     $male3437++;  
                   }elseif($row['age']>=38 && $row['age']<=41 && $row['gender']=="Male"){
                     $male3841++;  
                   }elseif($row['age']>=42 && $row['age']<=45 && $row['gender']=="Male"){
                     $male4245++;  
                   }elseif($row['age']>=46 && $row['age']<=49 && $row['gender']=="Male"){
                     $male4649++;  
                   }elseif($row['age']>=50 && $row['age']<=53 && $row['gender']=="Male"){
                     $male5053++;  
                   }elseif($row['age']>=54 && $row['age']<=57 && $row['gender']=="Male"){
                     $male5457++;  
                   }elseif($row['age']>=58 && $row['age']<=61 && $row['gender']=="Male"){
                     $male5861++;  
                   }elseif($row['age']>=62 && $row['age']<=65 && $row['gender']=="Male"){
                     $male6265++;  
                   }elseif($row['age']>65 && $row['gender']=="Male"){
                     $male66++; 
                       
                   }elseif($row['age']>=18 && $row['age']<=21 && $row['gender']=="Female"){
                      $female1821++;     
                   }elseif($row['age']>=22 && $row['age']<=25 && $row['gender']=="Female"){
                     $female2225++;  
                   }elseif($row['age']>=26 && $row['age']<=29 && $row['gender']=="Female"){
                     $female2629++;  
                   }elseif($row['age']>=30 && $row['age']<=33 && $row['gender']=="Female"){
                     $female3033++;  
                   }elseif($row['age']>=34 && $row['age']<=37 && $row['gender']=="Female"){
                     $female3437++;  
                   }elseif($row['age']>=38 && $row['age']<=41 && $row['gender']=="Female"){
                     $female3841++;  
                   }elseif($row['age']>=42 && $row['age']<=45 && $row['gender']=="Female"){
                     $female4245++;  
                   }elseif($row['age']>=46 && $row['age']<=49 && $row['gender']=="Female"){
                     $female4649++;  
                   }elseif($row['age']>=50 && $row['age']<=53 && $row['gender']=="Female"){
                     $female5053++;  
                   }elseif($row['age']>=54 && $row['age']<=57 && $row['gender']=="Female"){
                     $female5457++;  
                   }elseif($row['age']>=58 && $row['age']<=61 && $row['gender']=="Female"){
                     $female5861++;  
                   }elseif($row['age']>=62 && $row['age']<=65 && $row['gender']=="Female"){
                     $female6265++;  
                   }elseif($row['age']>65 && $row['gender']=="Female"){
                     $female66++;  
                   }
                 
                                        
                 
              }
             
             
//                                        echo $male1821."<br>";
//                                        echo $male2225."<br>";
//                                        echo $male2629."<br>";
//                                        echo $male3033."<br>";
//                                        echo $male3437."<br>";
//                                        echo $male3841."<br>";
//                                        echo $male4245."<br>";
//                                        echo $male4649."<br>";
//                                        echo $male5053."<br>";
//                                        echo $male5457."<br>";
//                                        echo $male5861."<br>";
//                                        echo $male6265."<br>";
//                                        echo $male66."<br>";
//
//                                        echo $female1821."<br>";
//                                        echo $female2225."<br>";
//                                        echo $female2629."<br>";
//                                        echo $female3033."<br>";
//                                        echo $female3437."<br>";
//                                        echo $female3841."<br>";
//                                        echo $female4245."<br>";
//                                        echo $female4649."<br>";
//                                        echo $female5053."<br>";
//                                        echo $female5457."<br>";
//                                        echo $female5861."<br>";
//                                        echo $female6265."<br>";
//                                        echo $female66."<br>";
               
               
          //'18-21', '22-25', '26-29', '30-33', '34-37', '38-41', '42-45', '46-49', '50-53', '54-57', '58-61', '62-65', 'Above 65'

                                        
                ?>   
 
            <!-------------------------GRAPHS------------------------------------->
                                    
<div id="container" style="min-width: 310px; max-width: auto; height: 500px; margin: 0 auto"></div>                                  
<script type="text/javascript">
    
Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Health Workers Age Distribution for <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';
  
            }?>'
    },

    xAxis: {
        categories: ['18-21', '22-25', '26-29', '30-33', '34-37', '38-41', '42-45', '46-49', '50-53', '54-57', '58-61', '62-65', 'Above 65']
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'Number of Health Workers'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [{
        name:'Male',
        color:'#32CD32',
        data:[<?php echo $male1821 ?>, <?php echo $male2225 ?>, <?php echo $male2629 ?>, <?php echo $male3033 ?>, <?php echo $male3437 ?>, <?php echo $male3841 ?>, <?php echo $male4245 ?>, <?php echo $male4649 ?>, <?php echo $male5053 ?>, <?php echo $male5457 ?>, <?php echo $male5861 ?>, <?php echo $male6265 ?>, <?php echo $male66 ?>]
    }, {
        name: 'Female',
            color:'#DA70D6',
            data:[<?php echo $female1821 ?>, <?php echo $female2225 ?>, <?php echo $female2629 ?>, <?php echo $female3033 ?>, <?php echo $female3437 ?>, <?php echo $female3841 ?>, <?php echo $female4245 ?>, <?php echo $female4649 ?>, <?php echo $female5053 ?>, <?php echo $female5457 ?>, <?php echo $female5861 ?>, <?php echo $female6265 ?>, <?php echo $female66 ?>]
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

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
    
    

</body>
</html>
