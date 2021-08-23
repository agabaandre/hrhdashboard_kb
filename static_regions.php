<?php 
									
	include('connect.php'); 


    //$month = "January";
    //$year = "2019";

    //$currentMonth = date('F');
    //$month = Date('F', strtotime($currentMonth . " last month"));
    //$year = date("Y");

   
   
    $sql2 =	"SELECT r.region_id,r.region_name,dr.district_id FROM regions r,district_region dr WHERE r.region_id=dr.region_id";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){



            $district_id = $row2['district_id'];

            $region_id = $row2['region_id'];

            $region_name = $row2['region_name'];

           
                                    
								   
     $SQL2 = mysqli_query($mysqli, "UPDATE staff SET region_id2='$region_id',region_name2='$region_name' WHERE district_id='$district_id'");
            
            
            
           
                                    
    }	

									
?>     

                                



