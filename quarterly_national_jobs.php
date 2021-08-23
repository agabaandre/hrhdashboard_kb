<?php 

    include('connect.php');



	//$year = date('Y');
	//$month = $currentMonth = date('F');


	$year = 2020;
	$month = 'December';

        $sql1 = "SELECT * FROM national_jobs";
   
      // $n=1;
   

       $result1= mysqli_query($mysqli, $sql1); 

      while($row1 = mysqli_fetch_assoc($result1)){
         
         
                    $facility_id = $row1['facility_id'];
             
                    $dhis_facility_id = $row1['dhis_facility_id'];

                    $facility_name = $row1['facility_name'];
              
                    $facility_type_name = $row1['facility_type_name'];

		    $region_name = $row1['region_name'];
             
                    $institution_type = $row1['institution_type'];

		    $ownership = $row1['ownership'];
              
                    $district_name = $row1['district_name'];

                    $job_id = $row1['job_id'];
              
                    $dhis_job_id = $row1['dhis_job_id'];

                    $job_name = $row1['job_name'];
              
                    $job_category = $row1['job_category'];

                    $job_classification = $row1['job_classification'];

                    $cadre_name = $row1['cadre_name'];

                    $salary_scale = $row1['salary_scale'];

                    $approved = $row1['approved'];

                    $male = $row1['male'];

                    $female = $row1['female'];
              
                    $total = $row1['total'];
             
        



         $SQL3 = mysqli_query($mysqli, "INSERT INTO quarterly_national_jobs (`month`,`year`,`facility_id`,`dhis_facility_id`,`facility_name`,`facility_type_name`,`region_name`,`institution_type`,`ownership`,`district_name`,`job_id`,`dhis_job_id`,`job_name`,`job_classification`,`job_category`,`cadre_name`,`salary_scale`,`approved`,`male`,`female`,`total`) VALUES ('$month','$year','$facility_id','$dhis_facility_id','$facility_name','$facility_type_name','$region_name','$institution_type','$ownership','$district_name','$job_id','$dhis_job_id','$job_name','$job_classification','$job_category','$cadre_name','$salary_scale','$approved','$male','$female','$total')"); 
 
    //$n++;
   // if($n>20){       
     //   break;
       //   }
          

	}	
?> 
