<?php
    include'connect.php';

function rangeValue($total){
    if ($total > 12){
            $range = $total - 12;
        }else{
            $range=0;
        }
    return $range;
}

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
        //Total for attendence per duty Roster
        $rownumrows = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS N FROM (SELECT month, year FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 GROUP BY month, year) AS total"));
        $total = $rownumrows['N'];
        $range = rangeValue($total);
        
        

//echo "Total = ".$total;
//echo "<br>Range = ".$range;
        $queryAttendance = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";

        $institutionsR = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";
                    
        $facilityR = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";
                    
        $HealthWorkersR = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff, month,year FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 GROUP BY month, year ORDER BY year,month) AS t, (SELECT SUM(total) AS total,month,year  FROM monthly_static_figures GROUP BY year,month) AS s WHERE t.month = s.month AND t.year = s.year LIMIT $range,$total";

//echo $queryAttendance;
        //Total for attendence per duty Roster
        $rownumrows = mysqli_fetch_array(mysqli_query($mysqli, "SELECT COUNT(*) AS N FROM (SELECT month, year FROM staff_attendance_dr WHERE next4 > 0 GROUP BY month, year) AS total"));
        $total = $rownumrows['N'];
        $range = rangeValue($total);

        $queryAttendance23 = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";

        $institutionsR23 = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";
                    
        $facilityR23 = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE next4 > 0 GROUP BY month, year ORDER BY year,month LIMIT $range,$total";
                    
        $HealthWorkersR23 = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff,month,year FROM staff_attendance_dr WHERE next4 > 0 GROUP BY month, year ORDER BY month, year) AS t, (SELECT SUM(total) AS total,month,year  FROM monthly_static_figures GROUP BY month, year) AS s WHERE t.month = s.month AND t.year = s.year LIMIT $range,$total";
        
        
            
        //echo $HealthWorkersR23;
//$ultimate_query = "SELECT age FROM staff s";
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
          
                          <form method="post">
<!--begin form-row----------------------------------------------------------------------->
                              
  <div class="form-row">
    <div class="form-group col-md-1">
      <label for="inputState">From</label>
      <div class="input-group date datepicker"><input  name="start_date" type="text" size="30" class="form-control monthyear"></div>
    </div>
      
    <div class="form-group col-md-1">
      <label for="inputState">To</label>
      <div class="input-group date datepicker"><input  name="end_date" type="text" size="30" class="form-control monthyear"></div>
    </div>
    <div class="form-group col-md-1">
      <label for="inputState">Region</label>
      <select name="region_name2" class="form-control" >
            <option value="">Region</option>
                <?php

                    $sql="select Distinct region_name from staff_attendance_dr ORDER by region_name";
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

                    $sql="SELECT DISTINCT district_name FROM staff ORDER BY district_name";
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

                    $sql="SELECT DISTINCT institution_type FROM staff ORDER BY institution_type";
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

                    $sql="SELECT DISTINCT facility_type_name FROM staff ORDER BY facility_type_name";
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

                    $sql="SELECT DISTINCT facility_name FROM staff ORDER BY facility_name";
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

                    $sql="SELECT DISTINCT cadre_name FROM staff ORDER BY cadre_name";
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
      <label for="inputState">Salary</label>
      <select name="salary_scale" class="form-control" >
            <option value="">Salary</option>
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

                    $sql="SELECT DISTINCT job_name FROM staff ORDER by job_name";
                    $result= mysqli_query($mysqli,$sql); 


                    while ($row = mysqli_fetch_assoc($result)){

                    ?>
                                  <option value= "<?php echo $row['job_name'];?>"><?php echo $row['job_name']; ?></option>

                                  <?php
                      }


              ?>
    </select>
    </div>
    
      
  </div>
<!--end form-row------------------------------------------------------------------------>
                    <!--begin form-row----------------------------------------------------------------------->
  
<!--end form-row------------------------------------------------------------------------>
  <div class="form-group col-md-2">
      <br>
        <button type="submit" name="Continue" class="btn btn-primary">Apply Limits</button>
  </div>
</form>
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
<!--
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header"><i class="fa fa-user-md"></i> Health Worker Attendance</li>
            </ul>
-->
            <div class="tab-content no-padding">
                
<!-----------------begin  Filters---------------------------------------------------------->

<?php
             $selected_district_name="";
              
                
        
                                
                     if(isset($_POST['Continue'])){
                         $finalfilters="";
                         //$ultimate_query ="SELECT COUNT(s.gender) AS sum, gender FROM staff s";

                        
                        $region_name2 = $_POST["region_name2"];
                        $district_name = $_POST["district_name"];
                        $facility_type_name = $_POST["facility_type_name"];
                        $facility_name = $_POST["facility_name"];
                        $cadre_name = $_POST["cadre_name"];
                        $salary_scale = $_POST["salary_scale"];
                        $job_name = $_POST["job_name"];
                        $institution_type = $_POST["institution_type"];
                        $start_date =explode("-", $_POST["start_date"]);
                        $end_date =explode("-", $_POST["end_date"]);
                        $start_month = $start_date[0];
                        $start_year = $start_date[1];
                        $end_month = $end_date[0];
                        $end_year = $end_date[1];
                         
                         
                      if(strlen($_POST["start_date"])!=0 && strlen($_POST["end_date"])!=0){
                          $queryy=" AND ";
                        if($start_year == $end_year){
                            $queryy = $queryy." month >=".(int)($start_month)." AND month<=".(int)($end_month)." AND year = ".(int)($start_year);
                            $finalfilters = $finalfilters." ".$start_month."-".$start_year." to ".$end_month."-".$end_year;
                        }else{
                            $queryy = $queryy." (month >=".(int)($start_month)." AND year >= ".(int)($start_year).") OR (month<=".(int)($end_month)." AND year <= ".(int)($end_year).")";
                            $finalfilters = $finalfilters." ".$start_month."-".$start_year." to ".$end_month."-".$end_year;
                        }
                      }    
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
                if ($cadre_name!=''){
                $nonEmpty[3]="cadre_name";
                $filters[3]="Cadre";
                }
                if ($salary_scale!=''){
                $nonEmpty[4]="salary_scale";
                $filters[4]="Salary";
                }
                if ($job_name!=''){
                $nonEmpty[5]="job_name";
                $filters[5]="Job";
                }
                if ($institution_type!=''){
                $nonEmpty[6]="institution_type";
                $filters[6]="Institution Type";
                }
                         
                $noOfElements=sizeof($nonEmpty);        
                if ($district_name!=''){
                $nonEmptyd="district_name";
                
                    $countd = 1;
                    if($noOfElements==0 && $queryy !=""){
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
                $query=" ";
                
                $noOfElements=sizeof($nonEmpty);
                if($noOfElements>0){
                          
                          $count =1;
                            
                             $query=" AND ";
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
                             //echo $queryd."<br>";
                        $queryAttendance = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
                    $institutionsR = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
                    $facilityR = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
                    $HealthWorkersR = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff,monthWords,year,month FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year) AS t, (SELECT SUM(total) AS total,month,year FROM monthly_static_figures WHERE total != 0 ".$query."".$queryd."".$queryy."  GROUP BY month, year) AS s WHERE t.month = s.month AND t.year = s.year ORDER BY t.year,t.month;";
                    //echo $institutionsR."<br>";
                    
        $queryAttendance23 = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
        $institutionsR23 = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
        $facilityR23 = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year ORDER BY year,month;";
                    
        $HealthWorkersR23 = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff,monthWords,year,month FROM staff_attendance_dr WHERE next4 > 0 ".$query."".$queryd."".$queryy." GROUP BY month, year) AS t, (SELECT SUM(total) AS total,month, year FROM monthly_static_figures WHERE total != 0 ".$query."".$queryd."".$queryy."  GROUP BY month, year) AS s WHERE t.month = s.month AND t.year = s.year ORDER BY t.year,t.month;";
            //echo $HealthWorkersR23."<br>";   
                }else{
                    $queryAttendance = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    //echo $queryAttendance."<br>";
                    
                    $institutionsR = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    
                    //echo $institutionsR."<br>";
                    
                    $facilityR = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    
                    //echo $facilityR."<br>";
                    
                    $HealthWorkersR = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff,monthWords,year,month FROM staff_attendance_dr WHERE previous4 > 0 AND next4 > 0 ".$queryy."".$queryd." GROUP BY month, year) AS t, (SELECT SUM(total) AS total, month, year FROM monthly_static_figures WHERE total != 0 ".$queryy."".$queryd."  GROUP BY month, year) AS s WHERE t.month = s.month AND t.year = s.year ORDER BY t.year,t.month;";
                    
                    //echo $HealthWorkersR."<br>";
        
        $queryAttendance23 = "SELECT month, monthWords, year, SUM(daysPresent) AS daysPresent, SUM(daysOffDuty) AS daysOffDuty, SUM(daysOnLeave) AS daysOnLeave, SUM(daysRequest) AS daysRequest, SUM(daysAbsent) AS daysAbsent, SUM(absolute_days_absent) AS absolute_days_absent, SUM(days_not_at_facility) AS days_not_at_facility FROM staff_attendance_dr WHERE next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    
        $institutionsR23 = "SELECT COUNT(DISTINCT(district_name)) AS institutions,month,year FROM staff_attendance_dr WHERE next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    
        $facilityR23 = "SELECT COUNT(DISTINCT(facility_name)) AS facilities,month,year  FROM staff_attendance_dr WHERE next4 > 0 ".$queryy."".$queryd." GROUP BY month, year ORDER BY year,month;";
                    
        $HealthWorkersR23 = "SELECT * FROM (SELECT COUNT(DISTINCT(person_id)) AS staff,monthWords,year,month FROM staff_attendance_dr WHERE next4 > 0 ".$queryy."".$queryd." GROUP BY month, year) AS t, (SELECT SUM(total) AS total,month,year FROM monthly_static_figures WHERE total != 0 ".$queryy."".$queryd."  GROUP BY month, year) AS s WHERE t.month = s.month AND t.year = s.year ORDER BY t.year,t.month;";
                }
                //echo $noOfElements;          
                //echo $finalfilters;
                $finalfilters= $finalfilters." ".$districtsfilter;
                //echo "<br>".$queryAttendance;
          

             }
             //echo $HealthWorkersR."<br>"; 
            
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
                  $month_ind = $row2['monthWords']." ".$row2['year']; 
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
                  $totaldays_ind =  (int)($daysOffDuty_ind) + (int)($daysOnLeave_ind) + (int)($daysRequest_ind) + (int)($daysAbsent_ind);  
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
                
                
                
                $institutionsR_total = array();
                $institutionsResult = mysqli_query($mysqli,$institutionsR);
                while($rowR2=mysqli_fetch_assoc($institutionsResult))
                {
                    $institutionsR_total_ind = $rowR2['institutions']; 
                    array_push($institutionsR_total, $institutionsR_total_ind); 
                }
                
                
                $facilityR_total = array();
                $facilityResult = mysqli_query($mysqli,$facilityR);
                while($rowfR2=mysqli_fetch_assoc($facilityResult))
                {
                    $facilityR_total_ind = $rowfR2['facilities']; 
                    array_push($facilityR_total, $facilityR_total_ind); 
                }
                
                $HealthWorkersR_total = array();
                $HealthWorkersRT_total = array();
                $HealthWorkersResult = mysqli_query($mysqli,$HealthWorkersR);
                while($rowfR2=mysqli_fetch_assoc($HealthWorkersResult))
                {
                    $HealthWorkersR_total_ind = $rowfR2['staff']; 
                    $HealthWorkersRT_total_ind = $rowfR2['total'];
                    array_push($HealthWorkersR_total, $HealthWorkersR_total_ind); 
                    array_push($HealthWorkersRT_total, $HealthWorkersRT_total_ind); 
                }
                
                
                ?>   
                
<!-----------------end  Filters---------------------------------------------------------->
                
                
                
                
                
                <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#HWAA" data-toggle="tab">Attendance As Per Duty Roster</a>
                                </li>
                                <li><a href="#HWAAA" data-toggle="tab">Overall Attendance </a>
                                </li>
                                <li><a href="#HWADNAT" data-toggle="tab">Authorized and Unauthorized Absenteeism </a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="HWAA">
                                    <br>
 <!-------------------------GRAPHS------------------------------------->
                <div id="absenteeism" style="min-width: 310px; height: 400px; max-width: 100%; margin: 0 auto"></div>
                                    
                  
    <script type="text/javascript">
    
Highcharts.chart('absenteeism', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Attendance As Per Duty Roster for <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';
  
            }?>'
    },
    xAxis: {
        categories: <?php   echo $month;  ?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Days)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: [{ //person_id, month, year, daysPresent, daysOffDuty, daysOnLeave, daysRequest, daysAbsent, absenteeismRate
        name: 'Present',
        data: <?php echo $daysPresent;  ?>,
        color: "#005595"
    }, {
        name: 'Absent',
        data: <?php echo $daysAbsent;  ?>,
        color: "#b32317"
    }]
});
</script>                 

                
                
                    
                    <!-------------------------GRAPHS------------------------------------->
                                    
 <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th></th>
                                            <?php 
                                                //echo $totaldays;
                                                //echo $daysPresent;
                                                $month = json_decode($month);
                                                $count= 0;
                                                foreach($month as $value){
                                                    echo "<th>".$value."</th>";
                                                    $count++;
                                                }
                                            
                                            ?>
                                        </tr>
                                            <?php
                                            //$institutionsR_total = json_decode($institutionsR_total);
                                            $daysPresentT = json_decode($daysPresent);
                                            $daysAbsentT = json_decode($daysAbsent);
                                            echo '<tr>';
                                            echo '<td valign="center"><div class="boxcolor daysPresent"></div> Present</td>';
                                            for($i=0; $i<$count; $i++){
        echo '<td>'.round((($daysPresentT[$i]/($daysPresentT[$i] + $daysAbsentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysAbsent"></div> Absent</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysAbsentT[$i]/($daysPresentT[$i] + $daysAbsentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> % Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($HealthWorkersR_total[$i]/$HealthWorkersRT_total[$i])*100),1).'%</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$HealthWorkersR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            
     
                                            echo '<tr>';
                                            echo '<td> Institutions </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$institutionsR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Facilities </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$facilityR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            
     
     
     
                                            
                                         //print_r($month);  
                                            $month=json_encode($month);
                                            ?>
                                        </table>                                   

                                    
                                    
                                    
                            
        
                                    
                                    
                                    
                                </div>
                                <div class="tab-pane fade" id="HWAAA">
                                    <br>
<!-------------------------GRAPHS------------------------------------->
               
  <?php 
        $month=array();
            $daysPresent =array(); 
            $daysOffDuty=array();
            $daysOnLeave=array();
            $daysRequest=array();
            $daysAbsent=array();
            $totaldays = array();
            $absolute_days_absent = array();
            $days_not_at_facility = array();
    
    //echo $queryAttendance23."<br>";
                                    
    $result2=mysqli_query($mysqli,$queryAttendance23);
                while($row2=mysqli_fetch_assoc($result2))
                {
                    //echo $row2['monthWords']." ".$row2['year']."<br>"; 
                  //; 
                  $month_ind = $row2['monthWords']." ".$row2['year']; 
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
                  $totaldays_ind =  (int)($daysOffDuty_ind) + (int)($daysOnLeave_ind) + (int)($daysRequest_ind) +  (int)($absolute_days_absent_ind);
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
                $totaldays = json_encode($totaldays); 
                //echo $month."<br>";
                                    
                $institutionsR_total = array();
                $institutionsResult = mysqli_query($mysqli,$institutionsR23);
                while($rowR2=mysqli_fetch_assoc($institutionsResult))
                {
                    $institutionsR_total_ind = $rowR2['institutions']; 
                    array_push($institutionsR_total, $institutionsR_total_ind); 
                }
                
                
                $facilityR_total = array();
                $facilityResult = mysqli_query($mysqli,$facilityR23);
                while($rowfR2=mysqli_fetch_assoc($facilityResult))
                {
                    $facilityR_total_ind = $rowfR2['facilities']; 
                    array_push($facilityR_total, $facilityR_total_ind); 
                }
                
                $HealthWorkersR_total = array();
                $HealthWorkersRT_total = array();
                $HealthWorkersResult = mysqli_query($mysqli,$HealthWorkersR23);
                while($rowfR2=mysqli_fetch_assoc($HealthWorkersResult))
                {
                    $HealthWorkersR_total_ind = $rowfR2['staff']; 
                    $HealthWorkersRT_total_ind = $rowfR2['total'];
                    array_push($HealthWorkersR_total, $HealthWorkersR_total_ind); 
                    array_push($HealthWorkersRT_total, $HealthWorkersRT_total_ind); 
                }
                                                 
                                    
                                    
?>                                  
 <div id="absoluteAbsenteeism" style="min-width: 310px; height: 400px; max-width: 100%; margin: 0 auto"></div>                
    <script type="text/javascript">
    
Highcharts.chart('absoluteAbsenteeism', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Overall Attendance for <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';
  
            }?>'
    },
    xAxis: {
        categories: <?php echo $month;  ?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Days)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: [{ //person_id, month, year, daysPresent, daysOffDuty, daysOnLeave, daysRequest, daysAbsent, absenteeismRate
        name: 'Present',
        data: <?php echo $daysPresent;  ?>,
        color: "#005595"
    }, {
        name: 'OffDuty',
        data: <?php echo $daysOffDuty;  ?>,
        color: "#569fd3"
    }, {
        name: 'Leave',
        data: <?php echo $daysOnLeave;  ?>,
        color: "#5f6062"
    }, {
        name: 'Official Request',
        data: <?php echo $daysRequest;  ?>,
        color: "#78496a"
    }, {
        name: 'Absent',
        data: <?php echo $absolute_days_absent ;  ?>,
        color: "#b32317"
    }]
});
</script>                 

               
                
                    
                    <!-------------------------GRAPHS------------------------------------->
                                    
    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th></th>
                                            <?php 
                                                //echo $totaldays;
                                                //echo $daysPresent;
                                                $month = json_decode($month);
                                                $count= 0;
                                                foreach($month as $value){
                                                    echo "<th>".$value."</th>";
                                                    $count++;
                                                }
                                            
                                            ?>
                                        </tr>
                                            <?php
                                            //$totaldays = json_decode($daysAbsent);
                                            $daysPresentT = json_decode($daysPresent);
                                            $daysOffDutyT = json_decode($daysOffDuty);
                                            $daysOnLeaveT = json_decode($daysOnLeave);
                                            $daysRequestT = json_decode($daysRequest);
                                            $absolute_days_absentT = json_decode($absolute_days_absent);
                                            
                                            echo '<tr>';
                                            echo '<td valign="center"><div class="boxcolor daysPresent"></div> Present</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysPresentT[$i]/($daysPresentT[$i] + $daysOffDutyT[$i] + $daysOnLeaveT[$i] + $daysRequestT[$i] + $absolute_days_absentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysOffDuty"></div> Off-Duty</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysOffDutyT[$i]/($daysPresentT[$i] + $daysOffDutyT[$i] + $daysOnLeaveT[$i] + $daysRequestT[$i] + $absolute_days_absentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysOnLeave"></div> Leave</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysOnLeaveT[$i]/($daysPresentT[$i] + $daysOffDutyT[$i] + $daysOnLeaveT[$i] + $daysRequestT[$i] + $absolute_days_absentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysRequest"></div> Official Request</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysRequestT[$i]/($daysPresentT[$i] + $daysOffDutyT[$i] + $daysOnLeaveT[$i] + $daysRequestT[$i] + $absolute_days_absentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysAbsent"></div> Absent</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($absolute_days_absentT[$i]/($daysPresentT[$i] + $daysOffDutyT[$i] + $daysOnLeaveT[$i] + $daysRequestT[$i] + $absolute_days_absentT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
        
                                            echo '<tr>';
                                            echo '<td> % Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($HealthWorkersR_total[$i]/$HealthWorkersRT_total[$i])*100),1).'%</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$HealthWorkersR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
        
                                            echo '<tr>';
                                            echo '<td> Institutions </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$institutionsR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Facilities </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$facilityR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            
                                            
                                            $month=json_encode($month);
                                            ?>
                                        </table>
                                    
                                </div>
                                <div class="tab-pane fade" id="HWADNAT">
                                    <br>

<!-------------------------GRAPHS------------------------------------->
                <div id="DaysnotatFacility" style="min-width: 310px; height: 400px; max-width: 100%; margin: 0 auto"></div>
                                    
                  
    <script type="text/javascript">
    
Highcharts.chart('DaysnotatFacility', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Authorized and Unauthorized Absenteeism for <?php if($finalfilters!=''){echo $finalfilters;}else{ echo 'Uganda';
  
            }?>'
    },
    xAxis: {
        categories: <?php echo $month;  ?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Percent'
        }
    },
    tooltip: {
        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.percentage:.1f}%</b> ({point.y:,.0f} Days)<br/>',
        split: true
    },
    plotOptions: {
        area: {
            stacking: 'percent',
            lineColor: '#ffffff',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#ffffff'
            }
        }
    },
    series: [{ //person_id, month, year, daysPresent, daysOffDuty, daysOnLeave, daysRequest, daysAbsent, absenteeismRate
        name: 'Present',
        data: <?php echo $daysPresent;  ?>,
        color: "#005595"
    }, {
        name: 'Absent',
        data: <?php echo $totaldays;  ?>,
        color: "#b32317"
    }]
});
</script>                 

                
                
                    
                    <!-------------------------GRAPHS------------------------------------->  
                                    
                                    
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th></th>
                                            <?php 
                                                //echo $totaldays;
                                                //echo $daysPresent;
                                                $month = json_decode($month);
                                                $count= 0;
                                                foreach($month as $value){
                                                    echo "<th>".$value."</th>";
                                                    $count++;
                                                }
                                            
                                            ?>
                                        </tr>
                                            <?php
                                            //$totaldays = json_decode($daysAbsent);
                                            $daysPresentT = json_decode($daysPresent);
                                            $totaldaysT = json_decode($totaldays);
                                            
                                            echo '<tr>';
                                            echo '<td valign="center"><div class="boxcolor daysPresent"></div> Present</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($daysPresentT[$i]/($daysPresentT[$i] + $totaldaysT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                            
                                            
                                            echo '<tr>';
                                            echo '<td><div class="boxcolor daysAbsent"></div> Absent</td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($totaldaysT[$i]/($daysPresentT[$i] + $totaldaysT[$i]))*100),1).'%</td>';
                                            }
                                            echo '</tr>';
                                            
                                        
                                            echo '<tr>';
                                            echo '<td> % Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.round((($HealthWorkersR_total[$i]/$HealthWorkersRT_total[$i])*100),1).'%</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Health Workers </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$HealthWorkersR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
                                        
                                           
                                           echo '<tr>';
                                            echo '<td> Institutions </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$institutionsR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            echo '<tr>';
                                            echo '<td> Facilities </td>';
                                            for($i=0; $i<$count; $i++){
                                             echo '<td>'.$facilityR_total[$i].'</td>';
                                            }
                                            echo '</tr>';
     
                                            
                                            
                                            ?>
                                        </table>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>
                
                
                
                
                
                
                
                
                
                
                
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                           
                
                
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


    
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
$(document).ready(function() {
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
    
    $('.data-table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
      });
      $('.data-table-export').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[-1,10, 25, 50], ["All",10, 25, 50]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'pdf', 'print'
        ]
      });
      var table = $('.select-row').DataTable();
      $('.select-row tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      });
      var multipletable = $('.multiple-select-row').DataTable();
      $('.multiple-select-row tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
      });
});
</script>  

</body>
</html>
