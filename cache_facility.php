<?php 

    include('connect.php');


            
//National jobs for vacant

             $sql4 = "SELECT DISTINCT(facility_name),facility_type_name,facility_id,dhis_facility_id,institution_type,district_name FROM national_jobs WHERE facility_type_name IN ('Regional Referral Hospital','Ministry','National Referral Hospital','Specialised National Facility') ";

            $result4 = mysqli_query($mysqli, $sql4);


            while($row4 = mysqli_fetch_assoc($result4)){

                $facility_type_name = $row4['facility_type_name'];

                $facility_name = $row4['facility_name'];

                $facility_id = $row4['facility_id'];
                
                $dhis_facility_id = $row4['dhis_facility_id'];

                $institution_type = $row4['institution_type'];

                $district_name = $row4['district_name'];
                
                
                $facility_name2 = '%'.$facility_name.'%';
                
                
                $sql5 = "SELECT facility_facility_level,approved,job,job_id,dhis_job_id,job_classification,job_category,cadre,salary_grade FROM structure WHERE job NOT IN (SELECT DISTINCT(job_name) AS job FROM national_jobs WHERE facility_name='$facility_name' ) AND facility_facility_level LIKE '$facility_name2'";
                
               
                


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



               
                   $SQL4 = mysqli_query($mysqli, "INSERT INTO national_jobs (`facility_id`,`dhis_facility_id`,`facility_name`,`facility_type_name`,`institution_type`,`district_name`,`job_id`,`dhis_job_id`,`job_name`,`job_classification`,`job_category`,`cadre_name`,`salary_scale`,`approved`,`male`,`female`,`total`,`excess`,`vacant`,`pec_filled`) VALUES ('$facility_id','$dhis_facility_id','$facility_name','$facility_type_name','$institution_type','$district_name','$job_id','$dhis_job_id','$job','$job_classification','$job_category','$cadre_name','$salary_scale','$approved','0','0','0','0','0','0')"); 
                   }
              
            }

 
                    
     
                                  
		 // $sql1 =	mysqli_query($mysqli,"DELETE FROM national_jobs WHERE approved=0 AND male=0 AND female=0");						  
							

?> 
