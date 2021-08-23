<?php

    
include('connect.php');


 $month = "August";
 $year = "2019";

    //$currentMonth = date('F');
    //$month = Date('F', strtotime($currentMonth . " last month"));
    //$year = date("Y");
    
  
 $sql2 =	"SELECT * FROM temp_attendance WHERE year='$year' AND month='$month'";



 $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $person_id = $row2['person_id'];

            $district_id = $row2['district_id'];

            $district = $row2['district'];

            $facility_id = $row2['facility_id'];

            $month = $row2['month'];
            
            $year = $row2['year'];

            $work_days = $row2['work_days'];

            $off_days = $row2['off_days'];

            $leave_days = $row2['leave_days'];
            
            $other_days = $row2['other_days'];

            $daysPresent = $row2['daysPresent'];

            $daysOffDuty = $row2['daysOffDuty'];
            
            $daysOnLeave = $row2['daysOnLeave'];

            $daysRequest = $row2['daysRequest'];

            $daysAbsent = $row2['daysAbsent'];
            
            $absolute_days_absent = $row2['absolute_days_absent'];

            $days_not_at_facility = $row2['days_not_at_facility'];

           
                                
								   
    $SQL2 = mysqli_query($mysqli, "INSERT INTO attendance (`person_id`,`district_id`,`district`,`facility_id`,`month`,`year`,`work_days`,`off_days`,`leave_days`,`other_days`,`daysPresent`,`daysOffDuty`,`daysOnLeave`,`daysRequest`,`daysAbsent`,`absolute_days_absent`,`days_not_at_facility` ) VALUES ('$person_id','$district_id','$district','$facility_id','$month','$year','$work_days','$off_days','$leave_days','$other_days','$daysPresent','$daysOffDuty','$daysOnLeave','$daysRequest','$daysAbsent','$absolute_days_absent','$days_not_at_facility' )") ;


    }
                         
  //$SQL3 = mysqli_query($mysqli, "TRUNCATE TABLE temp_attendance" );

//echo "INSERT INTO attendance (`person_id`,`district_id`,`district`,`facility_id`,`month`,`year`,`work_days`,`off_days`,`leave_days`,`other_days`,`daysPresent`,`daysOffDuty`,`daysOnLeave`,`daysRequest`,`daysAbsent`,`absolute_days_absent`,`days_not_at_facility` ) VALUES ('$person_id','$district_id','$district','$facility_id','$month','$year','$work_days','$off_days','$leave_days','$other_days','$daysPresent','$daysOffDuty','$daysOnLeave','$daysRequest','$daysAbsent','$absolute_days_absent','$days_not_at_facility' )"   ; 

?>