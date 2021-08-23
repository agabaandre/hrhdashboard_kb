<?php 

    include('connect.php');

      $SQL4 = "SELECT facility_id,job_id,approved,filled FROM staff WHERE approved=0 AND filled=0 ORDER BY facility_id,job_id";

      //echo $SQL4;

      $result4 = mysqli_query($mysqli, $SQL4);

            
            while($row4 = mysqli_fetch_assoc($result4)){

                $job_id = $row4['job_id'];

                $facility_id = $row4['facility_id'];
                
                $filled = $row4['filled'];

                if($filled < 1){
                     $SQL5 = "SELECT COUNT(person_id) AS no FROM staff WHERE job_id='$job_id' AND facility_id='$facility_id'";
               
                     $result5 = mysqli_query($mysqli, $SQL5);
                    
                     $row5 = mysqli_fetch_assoc($result5);
                    
                     $no = $row5['no'];
                    
                    $SQL6 =	mysqli_query($mysqli,"UPDATE  staff SET filled= $no WHERE job_id='$job_id' AND facility_id='$facility_id'");	 
                    
                }else{
                    
                    continue;
                }
                
               
            }
              

?> 