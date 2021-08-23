<?php 

    include('connect.php');

   /* $repeat=0;

    $inserted=0;
        
    $sql1 =	mysqli_query($mysqli,"UPDATE temp_structure SET facility_facility_level='DHOs Office' WHERE facility_facility_level='DHO\'\s Office'");

    $SQL12 = "SELECT * FROM temp_structure ORDER BY facility_facility_level,job,approved DESC";
    echo $SQL12;
    $result12 = mysqli_query($mysqli, $SQL12);

          while($row12 = mysqli_fetch_assoc($result12)){

                    $id = $row12['id'];
              
                    $facility_facility_level = $row12['facility_facility_level'];
              
                    $job = $row12['job'];

                    $approved = $row12['approved'];
              
                    $job_id = $row12['job_id'];
              
                    $job_classification = $row12['job_classification'];
              
                    $job_category = $row12['job_category'];
              
                    $cadre = $row12['cadre'];
              
                    $salary_grade = $row12['salary_grade'];

                    $dhis_job_id = $row12['dhis_job_id'];
              
                    $fid = $row12['fid'];
              
                    $ftypeid = $row12['ftypeid'];
              
                    if($ftypeid == 'facility_type|11' || $ftypeid == 'facility_type|9' || $ftypeid == 'facility_type|Division' || $ftypeid == 'facility_type|12' ){
                       $ftypeid =  $fid;
                    }
              
              UPDATE structure SET ftypeid='facility|768' WHERE facility_facility_level LIKE 'ARUA Regional Referral Hospital - Regional Referra%'
                  
              $SQL13 = "SELECT * FROM structure WHERE facility_facility_level = '$facility_facility_level' AND job = '$job'";
             
              
              $result13 = mysqli_query($mysqli, $SQL13);
              
              $num = mysqli_num_rows($result13);
            
             if($num >= 1){
                  $repeat++;
              }else{
                  
                $SQL14 = mysqli_query($mysqli, "INSERT INTO structure VALUES ('$id','$facility_facility_level','$job','$approved','$job_id','$job_classification','$job_category','$cadre','$salary_grade','$dhis_job_id','$fid','$ftypeid')");  
                  $inserted++;
              }
              
                   
                        
                    }

        echo $inserted." INSERTED AND ".$repeat." REPEATED";

   // $sql1 =	mysqli_query($mysqli,"UPDATE staff SET facility_type_name='DHOs Office' WHERE facility_type_id='facility_type|DHO'");

    //$sql1 =	mysqli_query($mysqli,"UPDATE staff SET gender='Male' WHERE gender=''");

  */


        
////National jobs for filled

                $sql3 = "(SELECT      facility_id,dhis_facility_id,facility_name,facility_type_name,institution_type,district_name,job_id,dhis_job_id,job_name,job_classification,job_category,cadre_name,salary_scale,approved,               
                      (case when gender = 'Male' then filled else 0 end) male,
                      (case when gender = 'Female' then filled else 0 end) female
                      FROM  staff GROUP BY facility_id,dhis_facility_id,facility_name,facility_type_name,institution_type,district_name,job_id,dhis_job_id,job_classification,job_category,cadre_name,salary_scale,approved)";
    
             $SQL3 = mysqli_query($mysqli, "TRUNCATE TABLE national_jobs");


             $result3 = mysqli_query($mysqli, $sql3);

          while($row3 = mysqli_fetch_assoc($result3)){

                    $facility_id = $row3['facility_id'];
              
                    $dhis_facility_id = $row3['dhis_facility_id'];

                    $facility_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row3['facility_name']);
              
                    $facility_type_name = $row3['facility_type_name'];
              
                    $institution_type = $row3['institution_type'];
              
                    $district_name = $row3['district_name'];

                    $job_id = $row3['job_id'];
              
                    $dhis_job_id = $row3['dhis_job_id'];

                    $job_name = $row3['job_name'];
              
                    $job_category = $row3['job_category'];

                    $job_classification = $row3['job_classification'];

                    $cadre_name = $row3['cadre_name'];

                    $salary_scale = $row3['salary_scale'];

                    $approved = $row3['approved'];

                    $male = $row3['male'];

                    $female = $row3['female'];
              
                    $total = $male + $female;
              
                    if($total > $approved ){
                          $excess = $total - $approved;
                      }else{
                          $excess = 0;
                      }
                      if($total < $approved ){
                          $vacant =   $approved - $total;
                      }else{
                          $vacant = 0;
                      }
                      //echo'<td>'.$total.'</td>';
                      if($approved== 0){
                            $pec_filled =0;
                      }else{
                         $pec_filled = round(($total/$approved*100),0);
                      }
              
              
              

              $SQL3 = mysqli_query($mysqli, "INSERT INTO national_jobs (`facility_id`,`dhis_facility_id`,`facility_name`,`facility_type_name`,`institution_type`,`district_name`,`job_id`,`dhis_job_id`,`job_name`,`job_classification`,`job_category`,`cadre_name`,`salary_scale`,`approved`,`male`,`female`,`total`,`excess`,`vacant`,`pec_filled`) VALUES ('$facility_id','$dhis_facility_id','$facility_name','$facility_type_name','$institution_type','$district_name','$job_id','$dhis_job_id','$job_name','$job_classification','$job_category','$cadre_name','$salary_scale','$approved','$male','$female','$total','$excess','$vacant','$pec_filled')"); 
                    
                        
                    }
                                  
		//  $sql1 =	mysqli_query($mysqli,"DELETE FROM national_jobs WHERE approved=0 AND male=0 AND female=0");						  
							

?> 