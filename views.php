<?php


dist_fac_cadre
SELECT district_name,facility_name,cadre_name,gender,COUNT(person_id) AS `no` FROM staff WHERE cadre_name != '' AND cadre_name != 'Non Health Professionals' AND cadre_name != 'Support Staffs' AND cadre_name != 'Administration Professionals' AND facility_type_id != 'facility_type|DHO' AND facility_type_id != 'facility_type|Town' GROUP BY district_name,facility_name,cadre_name,gender
    
total_approved_by_district
select sum(`total_approved`) AS `total_approved`,`job_id` AS `job_id`,`job_name` AS `job_name`,`salary_scale` AS `salary_scale`,`district_name` AS `district_name`,`institution_type` AS `institution_type` from `hrhdashboard`.`total_approved_by_district_temp` group by `job_id`,`district_name` order by `district_name`
    
total_approved_by_district_by_job    
SELECT SUM(total_approved) AS total_approved,job_id,job_name,salary_scale,district_name,facility_id,facility_name,institution_type FROM total_approved_by_district_by_job_temp GROUP BY job_id,district_name ORDER BY district_name,facility_id
    

    
total_approved_by_district_by_facility
SELECT (s.approved * t.no) AS total_approved,s.job_id AS job_id,s.job_name AS job_name,s.salary_scale AS salary_scale,t.district_name AS district_name,s.institution_type AS institution_type,facility_id,facility_name FROM total_facilities_districts_facility t ,structure s WHERE s.facility_type_id = t.facility_type_id ORDER BY t.district_name,t.facility_type_id    
    
    
    
    
   
    
    
    total_facilities_districts_facility
    SELECT COUNT(facility_id) AS no,district_name,facility_type_id,facility_type_name,facility_id,facility_name,institution_type FROM total_facilities_districts_facility_temp GROUP BY district_name,facility_type_id,facility_id
    
    
    
    



/////Combine approved and filled jobs by district
									
                                        
        $sql8 =	"(SELECT a.job_id AS app_job_id,a.job_name AS app_job,a.salary_scale AS app_scale,a.total_approved AS app_total, a.district_name AS app_district_name,a.facility_id AS app_facility_id,a.facility_name AS app_facility_name,f.job_id AS fill_job_id,f.job_name AS fill_job,f.salary_scale AS fill_scale,f.gender,f.total AS fill_total,f.district_name AS fill_district_name,f.facility_id AS fill_facility_id,f.facility_name AS fill_facility_name FROM total_approved_by_district_by_facility a RIGHT JOIN tmp_filled_jobs_by_district_by_job f on a.job_id = f.job_id AND a.district_name=f.district_name GROUP BY f.job_id,f.district_name,facility_id,gender ORDER BY f.job_id) UNION (SSELECT a.job_id AS app_job_id,a.job_name AS app_job,a.salary_scale AS app_scale,a.total_approved AS app_total, a.district_name AS app_district_name,a.facility_id AS app_facility_id,a.facility_name AS app_facility_name,f.job_id AS fill_job_id,f.job_name AS fill_job,f.salary_scale AS fill_scale,f.gender,f.total AS fill_total,f.district_name AS fill_district_name,f.facility_id AS fill_facility_id,f.facility_name AS fill_facility_name FROM total_approved_by_district_by_facility a LEFT JOIN tmp_filled_jobs_by_district_by_job f on a.job_id= f.job_id AND a.district_name=f.district_name GROUP BY a.job_id,a.district_name,facility_id,gender ORDER BY a.job_id)";
                                        
                                       
                                        
                                        
								
			$SQL8 = mysqli_query($mysqli, "TRUNCATE TABLE national_jobs_by_district_by_facility");
							
			$result8= mysqli_query($mysqli, $sql8);
												
                              while($row8 = mysqli_fetch_assoc($result8)){
				                
				                    $app_job_id = $row8['app_job_id'];	 	
                                  
                                   $app_job = $row8['app_job'];	 	
                                  
				                    $app_scale = $row8['app_scale'];
                                  
                                   $app_total = $row8['app_total'];
                                  
                                   $app_district_name = $row8['app_district_name'];
                                  
                                   $app_facility_id = $row8['app_facility_id'];
                                  
                                   $app_facility_name = $row8['app_facility_name'];

                                  
                                  $fill_job_id = $row8['fill_job_id'];
                                  
                                   $fill_job = $row8['fill_job'];
                                  
                                   $fill_scale = $row8['fill_scale'];
                                  
                                   
				                    $fill_total = $row8['fill_total'];
                                  
                                   $fill_district_name = $row8['fill_district_name'];
                                  
                                   $fill_facility_id = $row8['fill_facility_id'];
                                  
                                   $fill_facility_name = $row8['fill_facility_name'];
                                  
                                   $gender = $row8['gender'];

                                  

                                  
                                  
								  
								if($app_job_id  == NULL){  
                                   
                                   
                                      $job_id =  $fill_job_id;
                                       
                                      $job = $fill_job;
                                       
                                      $scale = $fill_scale;
                                    
                                      $app_total =0;
                                       
                                       $district_name = $fill_district_name;
                                        
                                        
                                        $gender = $row8['gender'];
                                   
                                   }elseif($fill_job_id  == NULL){
                                       
                                        $job_id =  $app_job_id;
                                       
                                      $job = $app_job;
                                       
                                      $scale = $app_scale;
                                    
                                      $fill_total=0;
                                       
                                       $district_name = $app_district_name;

                                       $gender = 'N/A';
                                       
                                       
                                       
                                   }else{
                                       
                                       $job_id =  $fill_job_id;
                                       
                                      $job = $fill_job;
                                       
                                      $scale = $fill_scale; 
                                       
                                       $district_name = $fill_district_name;

                                        
                                        $gender = $row8['gender'];
                                    
                                       $fill_total = $fill_total;
                                    
                                       $app_total = $app_total;
                                       
                                   }
                                  
                                  
                                
								
								  
								  
								   $SQL2 = mysqli_query($mysqli, "INSERT INTO national_jobs_by_district (`job_id`,`job`,`scale`,`gender`,`app_total`,`fill_total`,`district_name`) VALUES ('$job_id','$job','$scale','$gender','$app_total','$fill_total','$district_name')");
                                 
                                  
                                 
									}
									
									
/////Combine approved and filled jobs by district end --------------------------




/////Final jobs by district
									
           $sql9 = "(SELECT  job_id,job,scale,app_total,district_name,
                                                  sum(case when gender = 'Male' then fill_total else 0 end) male,
                                                  sum(case when gender = 'Female' then fill_total else 0 end) female
                                                  FROM national_jobs_by_district
                                                GROUP BY job_id,job,scale,district_name,app_total)";
                                     				
										
								$SQL9 = mysqli_query($mysqli, "TRUNCATE TABLE national_jobs_district_final");
												
				                
                                 $result9 = mysqli_query($mysqli, $sql9);
                                     
                                        
                              while($row9 = mysqli_fetch_assoc($result9)){
				                
                                 
								  
				                    $job_id = $row9['job_id'];
                                  
                                    $job = $row9['job'];
                                  
				                    $scale = $row9['scale'];
                                  
                                   $app_total = $row9['app_total'];
                                  
                                   $male = $row9['male'];
                                  
                                   $female = $row9['female'];
                                  
                                   $district_name = $row9['district_name'];

                                  
                                  
                                 $SQL3 = mysqli_query($mysqli, "INSERT INTO national_jobs_district_final (`job_id`,`job`,`scale`,`app_total`,`male`,`female`,`district_name`) VALUES ('$job_id','$job','$scale','$app_total','$male','$female','$district_name')"); 
                                  
                                
                                  }
                                  
    
    
    
    
    ?>