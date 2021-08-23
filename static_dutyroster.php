<?php 
									
	include('connect.php'); 


//    $monthWords = "July";
  //  $year = "2021";

    $currentMonth = date('F');
    $monthWords = Date('F', strtotime($currentMonth . " last month"));
    $year = date("Y");

   

    $sql2 =	"SELECT COUNT(a.person_id) AS total_dutyroster,s.district_id,s.district_name,s.facility_id,s.facility_name,s.facility_type_name,s.institution_type,a.month,a.year FROM attendance a,staff s WHERE a.person_id=s.person_id AND a.year='$year' AND a.month='$monthWords' AND (a.work_days!=0 OR a.off_days!=0 OR a.leave_days!=0 OR a.other_days!=0) GROUP BY s.facility_id,s.institution_type";


     // echo $sql2;




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $total_dutyroster = $row2['total_dutyroster'];

            $district_id = $row2['district_id'];

            $district_name = $row2['district_name'];

            $facility_id = $row2['facility_id'];

            $facility_name = $row2['facility_name'];
            
            $facility_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $facility_name);

            $facility_type_name = $row2['facility_type_name'];

            $institution_type = $row2['institution_type'];

            $monthWords = $row2['month'];

            $year = $row2['year'];    
                                    
								   
    $SQL2 = mysqli_query($mysqli, "UPDATE monthly_static_figures SET total_dutyroster=$total_dutyroster WHERE district_id='$district_id' AND district_name='$district_name' AND facility_id='$facility_id' AND facility_name='$facility_name' AND facility_type_name='$facility_type_name' AND  institution_type='$institution_type' AND monthWords='$monthWords' AND year='$year'" );
            
          
           
                                    
    }	
	
   							
?>     

                                



