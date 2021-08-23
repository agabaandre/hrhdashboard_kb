<?php

include'connect.php';

// $monthWords = "June";
// $year = "2021";
 //$month=06;
$currentMonth = date('F');
$monthWords = Date('F', strtotime($currentMonth . " last month"));
$month = date('m',strtotime($monthWords));
$year = date("Y");   
$no_of_days = cal_days_in_month(CAL_GREGORIAN,date('m',strtotime($month)),$year);      
$query = "SELECT * FROM (SELECT (SELECT  ( CASE a.month
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
          END )) AS month, a.month AS monthWords,work_days,(work_days + off_days + leave_days + other_days) AS previous4, (daysPresent + daysOffDuty + daysOnLeave + daysRequest) AS next4, a.year,daysPresent,daysOffDuty, daysOnLeave,daysRequest, person_id FROM attendance a WHERE month = '".$monthWords."' AND year =".$year.") AS attend, (SELECT person_id, job_name, cadre_name, salary_scale, district_name, region_name, institution_type, facility_type_name, facility_name FROM staff AS s) AS staff WHERE attend.person_id = staff.person_id;";

// $query;



$result= mysqli_query($mysqli,$query); 

//$no = 454291;

while ($row = mysqli_fetch_assoc($result)){
    
    $month = $row['month'];
    $monthWords = $row['monthWords'];
    $previous4 = $row['previous4'];
    $next4 = $row['next4'];
    $year = $row['year'];
    $daysPresent = $row['daysPresent'];
    $daysOffDuty = $row['daysOffDuty'];
    $daysOnLeave = $row['daysOnLeave'];
    $daysRequest = $row['daysRequest'];
    $work_days = $row['work_days'];
 
    
     if($work_days< 0){ 
        
        $work_days = 0; 
    
    }
    
    
    if($previous4>0){   
        
        $daysAbsent = $row['work_days'] - $row['daysPresent'];
        if($daysAbsent < 0){
        
        $daysAbsent = 0;
        }
	if($row['work_days'] <= 0){
        
        $daysAbsentRate = 0;
        }else{
        $daysAbsentRate = ($daysAbsent/$row['work_days'])*100;
        }
    }else{
          
        $daysAbsent = 0;
        $daysAbsentRate = 0;
    
    }
    
    
    
    if($next4>0){$absolute_days_absent = $no_of_days - ($row['daysPresent'] + $row['daysOffDuty']+$row['daysOnLeave']+$row['daysRequest']);}else{$absolute_days_absent = 0;}
    if($next4>0){$days_not_at_facility = $no_of_days - $row['daysPresent'];}else{$days_not_at_facility = 0;
    }
    //$days_not_at_facility = $no_of_days - $row['daysPresent'];
    $person_id = $row['person_id'];
    $job_name = $row['job_name'];
    $cadre_name = $row['cadre_name'];
    $salary_scale = $row['salary_scale'];
    $district_name = $row['district_name'];
    $region_name = $row['region_name'];
    $facility_type_name = $row['facility_type_name'];
    $facility_name = $row['facility_name'];
    $facility_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $facility_name);
    $institution_type = $row['institution_type'];
    
    $insert = "INSERT INTO staff_attendance_dr VALUES('', '$month','$monthWords','$previous4','$next4','$year','$daysPresent','$daysOffDuty','$daysOnLeave','$daysRequest','$daysAbsent','$work_days','$daysAbsentRate','$absolute_days_absent','$days_not_at_facility','$person_id','$job_name','$cadre_name','$salary_scale','$district_name','$region_name','$facility_type_name','$facility_name','$institution_type');";
    
    //$no++;
    
    //echo $insert."<br>";
    mysqli_query($mysqli,$insert); 
    
                      
}


?>
