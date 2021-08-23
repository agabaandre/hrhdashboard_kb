<?php 

    include('connect.php');


            
//National jobs for vacant

             $sql4 = "SELECT DISTINCT(facility_name),facility_type_name,facility_id,dhis_facility_id,institution_type,district_name FROM national_jobs WHERE facility_type_name IN ('DHOs Office','City Health Office','General Hospital','HCII','HCIII','HCIV','Town Council','Municipal Health Office','Blood Bank Main Office','Blood Bank Regional Office','Medical Bureau Main Office','Prison Main Office') ";
            // echo $sql4;

            $result4 = mysqli_query($mysqli, $sql4);

            
            while($row4 = mysqli_fetch_assoc($result4)){

                $facility_type_name = $row4['facility_type_name'];

                $facility_name = $row4['facility_name'];

                $facility_id = $row4['facility_id'];
                
                $dhis_facility_id = $row4['dhis_facility_id'];

                $institution_type = $row4['institution_type'];

                $district_name = $row4['district_name'];
                
               

               $sql5 = "SELECT approved,job,job_id,dhis_job_id,job_classification,job_category,cadre,salary_grade FROM structure WHERE job NOT IN (SELECT DISTINCT(job_name) FROM national_jobs WHERE facility_name='$facility_name' AND approved>=1) AND facility_facility_level='$facility_type_name'";
               //echo $sql5;
              

                $result5 = mysqli_query($mysqli, $sql5);

                while($row5 = mysqli_fetch_assoc($result5)){

                  $job = $row5['job']; 

                  $approved = $row5['approved']; 

                  $job_id = $row5['job_id'];
                    
                  $dhis_job_id = $row5['dhis_job_id'];

                  $job_classification = $row5['job_classification'];

                  $job_category = $row5['job_category']; 

                  $cadre_name = $row5['cadre']; 

                  $salary_scale = $row5['salary_grade'];

                   // if($approved > 0){
                      $SQL4 = mysqli_query($mysqli, "INSERT INTO national_jobs (`facility_id`,`dhis_facility_id`,`facility_name`,`facility_type_name`,`institution_type`,`district_name`,`job_id`,`dhis_job_id`,`job_name`,`job_classification`,`job_category`,`cadre_name`,`salary_scale`,`approved`,`male`,`female`,`total`,`excess`,`vacant`,`pec_filled`) VALUES ('$facility_id','$dhis_facility_id','$facility_name','$facility_type_name','$institution_type','$district_name','$job_id','$dhis_job_id','$job','$job_classification','$job_category','$cadre_name','$salary_scale','$approved','0','0','0','0','0','0')");   
                      
                  //  }

                   

                }
            //}

 //echo $sum_approved.'<br>';
                  
     
                                  
		 // $sql1 =	mysqli_query($mysqli,"DELETE FROM national_jobs WHERE approved=0 AND male=0 AND female=0");						  
							
}
?> 
