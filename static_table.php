<?php 
									
	include('connect.php'); 


//    $monthWords = "July";
  //  $year = "2021";

    $monthWords = date('F');
    $year = date("Y");
    

    $sql2 =	"SELECT district_id,district_name, facility_id,facility_name,institution_type,facility_type_name, COUNT(person_id) AS total FROM staff GROUP BY facility_id,institution_type";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $total = $row2['total'];

            $district_id = $row2['district_id'];

            $district_name = $row2['district_name'];

            $facility_id = $row2['facility_id'];

            $facility_name = $row2['facility_name'];
            
            $facility_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $facility_name);

            $facility_type_name = $row2['facility_type_name'];

            $institution_type = $row2['institution_type'];

              
                                    
								   
     $SQL2 = mysqli_query($mysqli, "INSERT INTO monthly_static_figures (`district_id`,`district_name`,`facility_id`,`facility_name`,`facility_type_name`,`institution_type`,`total`,`monthWords`,`year`) VALUES ('$district_id','$district_name','$facility_id','$facility_name','$facility_type_name','$institution_type','$total','$monthWords','$year')");
            
        
            
           
                                    
    }	


 $sql2 =	"SELECT r.region_id,r.region_name,dr.district_id FROM regions r,district_region dr WHERE r.region_id=dr.region_id";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){



            $district_id = $row2['district_id'];

            $region_id = $row2['region_id'];

            $region_name = $row2['region_name'];

           
                                    
								   
     $SQL2 = mysqli_query($mysqli, "UPDATE monthly_static_figures SET region_id='$region_id',region_name2='$region_name' WHERE district_id='$district_id' AND region_name2=''");
        }

 $sql2 =	"SELECT id,monthWords FROM monthly_static_figures WHERE month=0";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $id = $row2['id'];

            $monthWords = $row2['monthWords'];

            if($monthWords == 'January'){ $month = 1; }
               elseif($monthWords == 'February'){$month = 2;}
               elseif($monthWords == 'March'){$month = 3;}
               elseif($monthWords == 'April'){$month = 4;}
               elseif($monthWords == 'May'){$month = 5;}
               elseif($monthWords == 'June'){$month = 6;}
               elseif($monthWords == 'July'){$month = 7;}
               elseif($monthWords == 'August'){$month = 8;}
               elseif($monthWords == 'September'){$month = 9;}
               elseif($monthWords == 'October'){$month = 10;}
               elseif($monthWords == 'November'){$month = 11;}
               elseif($monthWords == 'December'){$month = 12;}
            

              
                                    
								   
     $SQL2 = mysqli_query($mysqli, "UPDATE  monthly_static_figures SET month = '$month' WHERE id=$id ");
            
            
          
            
           
                                    
    }	
									
?>     

                                



