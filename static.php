<?php 
									
	include('connect.php'); 


    //$month = "January";
    //$year = "2019";

    $currentMonth = date('F');
    $month = Date('F', strtotime($currentMonth . " last month"));
    $year = date("Y");

    echo $month;
    echo $year

    
    $sql1 = "INSERT INTO monthly_static_figures (district_id,district_name,facility_id,facility_name,facility_type_name,institution_type,total,month,year)  SELECT district_id,district_name, facility_id,facility_name,institution_type,facility_type_name, COUNT(person_id) AS total, '$month' , '$year' FROM staff GROUP BY facility_id,institution_type";

/*
    $sql2 =	"SELECT COUNT(a.person_id) AS total_dutyroster,s.district_id,s.district_name,s.facility_id,s.facility_name,s.facility_type_name,s.institution_type,a.month,a.year FROM attendance a,staff s WHERE a.person_id=s.person_id AND a.year='$year' AND a.month='$month' AND (a.work_days!=0 OR a.off_days!=0 OR a.leave_days!=0 OR a.other_days!=0) GROUP BY s.facility_id,s.institution_type";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $total_dutyroster = $row2['total_dutyroster'];

            $district_id = $row2['district_id'];

            $district_name = $row2['district_name'];

            $facility_id = $row2['facility_id'];

            $facility_name = $row2['facility_name'];

            $facility_type_name = $row2['facility_type_name'];

            $institution_type = $row2['institution_type'];

            $month = $row2['month'];

            $year = $row2['year'];    
                                    
								   
    $SQL2 = mysqli_query($mysqli, "UPDATE monthly_static_figures SET total_dutyroster=$total_dutyroster WHERE district_id='$district_id' AND district_name='$district_name' AND facility_id='$facility_id' AND facility_name='$facility_name' AND facility_type_name='$facility_type_name' AND  institution_type='$institution_type' AND month='$month' AND year='$year'" );
            
            
           
                                    
    }	
	
    
   */
									
?>     

                                



