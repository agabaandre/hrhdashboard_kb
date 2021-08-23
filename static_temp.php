<?php 
									
	include('connect.php'); 


    $month = "January";
    $year = "2018";

    //$currentMonth = date('F');
    //$month = Date('F', strtotime($currentMonth . " last month"));
    //$year = date("Y");

   

    $sql2 =	"SELECT person_id,daysPresent,daysOffDuty,daysOnLeave,daysRequest FROM attendance  WHERE year='$year' AND month='$month'";

//echo $sql2;


    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $absolute_days_absent = 31 - ($row2['daysPresent'] + $row2['daysOffDuty'] + $row2['daysOnLeave'] + $row2['daysRequest']);
            $person_id = $row2['person_id'];

           
                                    
								   
    $SQL2 = mysqli_query($mysqli, "UPDATE attendance SET absolute_days_absent=$absolute_days_absent WHERE  month='$month' AND year='$year' AND person_id' = '$person_id'" );
            
           // echo "UPDATE attendance SET absolute_days_absent=$absolute_days_absent WHERE  month='$month' AND year='$year' AND person_id' = '$person_id'";
            
          
           
                                    
    }	
	
   							
?>     

                                



