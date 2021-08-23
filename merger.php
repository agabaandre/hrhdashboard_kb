<?php 
									
/*	include('connect.php'); 

	$sql1 =	mysqli_query($mysqli,"UPDATE staff SET institution_type='District'");

    $sql1 =	mysqli_query($mysqli,"UPDATE staff SET facility_type_name='DHOs Office' WHERE facility_type_id='facility_type|DHO'");


   
  
    $sqlkcca =	"SELECT * FROM staff_kcca";

					
	$resultkcca= mysqli_query($mysqli, $sqlkcca);
                                        
                                       
                                while($rowkcca = mysqli_fetch_assoc($resultkcca)){
                                  
                                    
                                    $person_id = "KCCA|".$rowkcca['person_id'];

                                    $job_id = $rowkcca['job_id'];
                                    
                                    $job_name = $rowkcca['job_name'];
                                    
                                    $cadre_id = $rowkcca['cadre_id'];
                                    
                                    $cadre_name = $rowkcca['cadre_name'];	

				                    $salary_scale_id = $rowkcca['salary_scale_id'];
                                    
                                    $salary_scale = $rowkcca['salary_scale'];
                                    
                                    $district_id = 'district|102';

                                    //$region_id = $rowkcca['region_id'];

                                    //$region_name = $rowkcca['region_name'];

                                    $facility_type_id = $rowkcca['facility_type_id'];

                                    $district_name = 'KAMPALA';

                                    $facility_name = $rowkcca['facility_name'];

                                    
                                    $job_classification = $rowkcca['job_classification'];


                                    $facility_type_name = $rowkcca['facility_type_name'];
                                    
                                    $facility_type_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $facility_type_name);

                                    $facility_id = "KCCA|".$rowkcca['facility_id'];	


                                    $gender = $rowkcca['gender'];

                                    $age = $rowkcca['age'];				
                                    
                                    if($facility_type_id == 'facility_type|Municipal'){
                                        
                                        $institution_type = 'Municipality';
                                        
                                        $facility_type_name = 'Municipal Health Office';
                                        
                                    }else{
                                        
                                        $institution_type = 'District';
                                    }
                                    
								   
				        $SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','$institution_type')");
                                    
                                    
                                    
               
                                   
                                    
                                  }	



    $SQLpol1 = $resultpol1= mysqli_query($mysqli, "UPDATE staff_police SET facility_type_id='facility_type|HCII' WHERE facility_type_id='facility_type|1'");
    
    $SQLpol2 = $resultpol2= mysqli_query($mysqli, "UPDATE staff_police SET facility_type_id='facility_type|HCIII' WHERE facility_type_id='facility_type|2'");

    $SQLpol3 = $resultpol3= mysqli_query($mysqli, "UPDATE staff_police SET facility_type_id='facility_type|HCIV' WHERE facility_type_id='facility_type|3'");
    
    
    
    $sqlpol =	"SELECT * FROM staff_police";

					
	$resultpol= mysqli_query($mysqli, $sqlpol);
                                        
                                       
                                while($rowpol = mysqli_fetch_assoc($resultpol)){
                                  
                                    
                                    $person_id = "POLICE|".$rowpol['person_id'];

                                    $job_id = $rowpol['job_id'];
                                    
                                    $job_name = $rowpol['job_name'];
                                    
                                    $cadre_id = $rowpol['cadre_id'];
                                    
                                    $cadre_name = $rowpol['cadre_name'];	

				                    $salary_scale_id = $rowpol['salary_scale_id'];
                                    
                                    $salary_scale = $rowpol['salary_scale'];
                                    
                                    $district_id = $rowpol['district_id'];

                                    //$region_id = $rowpol['region_id'];

                                    //$region_name = $rowpol['region_name'];

                                    $facility_type_id = $rowpol['facility_type_id'];
                                    
                                    $facility_type_name = $rowpol['facility_type_name'];

                                    $district_name = $rowpol['district_name'];

                                    $facility_name = $rowpol['facility_name'];
                                    
                                    $job_classification = $rowpol['job_classification'];
                                    
                                    if($facility_name == 'KOBOKO POLICE Health Centre II'){
                                        
                                        $district_name = 'KOBOKO';
                                        
                                    }




                                    $facility_id = "POLICE|".$rowpol['facility_id'];	


                                    $gender = $rowpol['gender'];

                                    $age = $rowpol['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','District')");
                                    
                                    
                                    
								  
								  
                                    
                                    
                                   
                                    
                                  }	


    $sqlmun =	"SELECT * FROM staff_municipal";

					
	$resultmun= mysqli_query($mysqli, $sqlmun);
                                        
                                       
            while($rowmun = mysqli_fetch_assoc($resultmun)){
                                  
                                    
				    $person_id = "MUNICIPAL|".$rowmun['person_id'];

				    $job_id = $rowmun['job_id'];
                                    
                    $job_name = $rowmun['job_name'];

                    $cadre_id = $rowmun['cadre_id'];

                    $cadre_name = $rowmun['cadre_name'];	

				    $salary_scale_id = $rowmun['salary_scale_id'];
                                    
                    $salary_scale = $rowmun['salary_scale'];

                    $district_id = $rowmun['district_id'];

				    //$region_id = $rowmun['region_id'];

				    //$region_name = $rowmun['region_name'];

				    $facility_type_id = $rowmun['facility_type_id'];
                                

				    $district_name = $rowmun['district_name'];
				

				    $facility_name = $rowmun['facility_name'];

				    $facility_name = preg_replace('/[^\p{L}\p{N}\s]/u', '', $facility_name);
                
                    $job_classification = $rowmun['job_classification'];

                                    
                    
				    
				    $facility_type_name =  $rowmun['facility_type_name'];

  				    $facility_id = "MUNICIPAL|".$rowmun['facility_id'];	
					
				    
				    $gender = $rowmun['gender'];

				    $age = $rowmun['age'];
                                    
                    //if($facility_type_id == 'facility_type|Municipal'){
                                        
                            $institution_type = 'Municipality';
                                        
                      //  }else{

                        //    $institution_type = 'District';
                        //}

                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','$institution_type')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }



     $sqlmul =	"SELECT * FROM staff_mulago";

					
	$resultmul= mysqli_query($mysqli, $sqlmul);
                                        
                                       
                                while($rowmul = mysqli_fetch_assoc($resultmul)){
                                  
                                    
                                    $person_id = "MULAGO|".$rowmul['person_id'];

                                    $job_id = $rowmul['job_id'];
                                    
                                    $job_name = $rowmul['job_name'];
                                    
                                    $cadre_id = $rowmul['cadre_id'];
                                    
                                    $cadre_name = $rowmul['cadre_name'];	

				                    $salary_scale_id = $rowmul['salary_scale_id'];
                                    
                                    $salary_scale = $rowmul['salary_scale'];
                                    
                                    $district_id = 'district|102';

                                    //$region_id = $rowmul['region_id'];

                                    //$region_name = $rowmul['region_name'];

                                    $facility_type_id = 'facility_type|MULAGONRH';

                                    $district_name = 'MULAGO NATIONAL REFERRAL HOSPITAL';

                                    $facility_name = $rowmul['facility_name'];
                                    
                                    $job_classification = $rowmul['job_classification'];


                                    $facility_type_name = 'Mulago National Referral Hospital';

                                    $facility_id = "MULAGO|".$rowmul['facility_id'];	


                                    $gender = $rowmul['gender'];

                                    $age = $rowmul['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Referral Hospital')");	
                                    
                                 
								  
								  
                                    
                                    
                                   
                                    
                                  }



    $sqlbut =	"SELECT * FROM staff_butabika";

					
	$resultbut= mysqli_query($mysqli, $sqlbut);
                                        
                                       
                                while($rowbut = mysqli_fetch_assoc($resultbut)){
                                  
                                    
                                    $person_id = "BUTABIKA|".$rowbut['person_id'];

                                    $job_id = $rowbut['job_id'];

                                    $job_name = $rowbut['job_name'];
                                    
                                    $cadre_id = $rowbut['cadre_id'];
                                    
                                    $cadre_name = $rowbut['cadre_name'];	

				                    $salary_scale_id = $rowbut['salary_scale_id'];
                                    
                                    $salary_scale = $rowbut['salary_scale'];
                                    
                                    $district_id = $rowbut['district_id'];

                                    //$region_id = $rowbut['region_id'];

                                    //$region_name = $rowbut['region_name'];

                                    $facility_type_id = 'facility_type|BUTABIKANRH';

                                    $district_name = $rowbut['facility_name'];

                                    $facility_name = $rowbut['facility_name'];
                                    
                                    $job_classification = $rowbut['job_classification'];


                                    $facility_type_name = 'Butabika National Referral Hospital';

                                    $facility_id = "BUTABIKA|".$rowbut['facility_id'];	


                                    $gender = $rowbut['gender'];

                                    $age = $rowbut['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Referral Hospital')");	
                                    
                                   
								  
                                    
                                    
                                   
                                    
                                  }	


				
        $sqlrrh =	"SELECT * FROM staff_rrh";

					
	$resultrrh= mysqli_query($mysqli, $sqlrrh);
                                        
                                       
                                while($rowrrh = mysqli_fetch_assoc($resultrrh)){
                                  
                                    
                                    $person_id = "RRH|".$rowrrh['person_id'];

                                    $job_id = $rowrrh['job_id'];
                                    
                                    $job_name = $rowrrh['job_name'];
                                    
                                    $cadre_id = $rowrrh['cadre_id'];
                                    
                                    $cadre_name = $rowrrh['cadre_name'];	

				                    $salary_scale_id = $rowrrh['salary_scale_id'];
                                    
                                    $salary_scale = $rowrrh['salary_scale'];
                                    
                                    $district_id = $rowrrh['district_id'];

				                    //$region_id = $rowrrh['region_id'];

				                    //$region_name = $rowrrh['region_name'];



					
                                if($rowrrh['facility_name'] == 'GULU REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|GULURRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                 $facility_type_name = 'Gulu Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'ARUA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|ARUARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                 $facility_type_name = 'Arua Regional Referal Hospital';


                                }elseif($rowrrh['facility_name'] == 'CHINA UGANDA FRIENDSHIP HOSPITAL NAGURU'){

                                $facility_type_id = 'facility_type|NAGURURRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'China Uganda Friendship Hospital Naguru';

                                }elseif($rowrrh['facility_name'] == 'HOIMA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|HOIMARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Hoima Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'JINJA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|JINJARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Jinja Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'MBARARA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|MBARARARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Mbarara Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'KABALE REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|KABALERRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Kabale Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'LIRA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|LIRARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Lira Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'MOROTO REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|MOROTORRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Moroto Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'MASAKA REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|MASAKARRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];
                                $facility_type_name = 'Masaka Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'MBALE REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|MBALERRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Mbale Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'MUBENDE REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|MUBENDERRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Mubende Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'SOROTI REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|SOROTIRRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Soroti Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'FORT PORTAL REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|FORTPORTALRRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Fort Portal Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'SOROTI REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|SOROTIRRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Soroti Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'FORT PORTAL REGIONAL REFERAL HOSPITAL'){

                                $facility_type_id = 'facility_type|FORTPORTALRRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Fort Portal Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'KAWEMPE Regional Referral Hospital'){

                                $facility_type_id = 'facility_type|KAWEMPERRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Kawempe Regional Referal Hospital';

                                }elseif($rowrrh['facility_name'] == 'KIRUDDU Regional Referral Hospital'){

                                $facility_type_id = 'facility_type|KIRUDDURRH';

                                $district_name = $rowrrh['facility_name'];

                                $facility_name = $rowrrh['facility_name'];

                                $facility_type_name = 'Kiruddu Regional Referal Hospital';

                                }


                                $job_classification = $rowrrh['job_classification'];
                                    
                                    
                                $facility_id = "RRH|".$rowrrh['facility_id'];	


                                $gender = $rowrrh['gender'];

                                $age = $rowrrh['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','Regional Referral Hospital')");	
                                    
                                    
                                  
								  
								  
                                    
                                    
                                   
                                    
                                  }







                                            
    $sql1 =	"SELECT * FROM staff_moh ORDER BY facility_name";

					
	$result1= mysqli_query($mysqli, $sql1);
                                        
                                       
                                while($row1 = mysqli_fetch_assoc($result1)){
                                  
                                    
                                    $person_id = "MOH|".$row1['person_id'];

                                    $job_id = $row1['job_id'];
                                    
                                    $job_name = $row1['job_name'];
                                    
                                    $cadre_id = $row1['cadre_id'];
                                    
                                    $cadre_name = $row1['cadre_name'];	

				                    $salary_scale_id = $row1['salary_scale_id'];
                                    
                                    $salary_scale = $row1['salary_scale'];
                                    
                                    $district_id = 'district|102';

                                    //$region_id = $row1['region_id'];

                                    //$region_name = $row1['region_name'];

                                    $facility_type_id = 'facility_type|Ministry';

			                        $district_name = 'KAMPALA';

                                    $facility_name = 'MOH headquarters';
                                    
                                    $job_classification = $row1['job_classification'];

                                    $facility_type_name = 'Ministry';
                                    
                                    $add = 'facility|Ministry-102-1';
                                    
                                    $facility_id = "MOH|".$add;	

                                    $gender = $row1['gender'];

                                    $age = $row1['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','Ministry')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }                         
									

$sql1 =	"SELECT * FROM staff_ubts ORDER BY facility_name";

					
	$result1= mysqli_query($mysqli, $sql1);
                                        
                                       
                                while($row1 = mysqli_fetch_assoc($result1)){
                                  
                                    
                                    $person_id = "UBTS|".$row1['person_id'];

                                    $job_id = $row1['job_id'];
                                    
                                    $job_name = $row1['job_name'];
                                    
                                    $cadre_id = $row1['cadre_id'];
                                    
                                    $cadre_name = $row1['cadre_name'];	

                                    $salary_scale_id = $row1['salary_scale_id'];
                                    
                                    $salary_scale = $row1['salary_scale'];
                                    
                                    $district_id = $row1['district_id'];

                                    //$region_id = $row1['region_id'];

                                    //$region_name = $row1['region_name'];

                                    $facility_type_id = 'facility_type|UBTSNI';

                                    $district_name = $row1['facility_name'];

                                    $facility_name = 'Uganda Blood Transfusion Service';
                                    
                                    $job_classification = $row1['job_classification'];

                                    $district_name = 'Uganda Blood Transfusion Service';
                                    
                                    $facility_type_name = 'Uganda Blood Transfusion Service';

                                    $facility_id = 'facility|UBTS';	


                                    $gender = $row1['gender'];

                                    $age = $row1['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff ('job_classification',`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Institution')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }


$sql1 =	"SELECT * FROM staff_uci ORDER BY facility_name";

					
	$result1= mysqli_query($mysqli, $sql1);
                                        
                                       
                                while($row1 = mysqli_fetch_assoc($result1)){
                                  
                                    
                                    $person_id = "UCI|".$row1['person_id'];

                                    $job_id = $row1['job_id'];
                                    
                                    $job_name = $row1['job_name'];
                                    
                                    $cadre_id = $row1['cadre_id'];
                                    
                                    $cadre_name = $row1['cadre_name'];	

				                    $salary_scale_id = $row1['salary_scale_id'];
                                    
                                    $salary_scale = $row1['salary_scale'];
                                    
                                    $district_id = 'district|102';

                                    //$region_id = $row1['region_id'];

                                    //$region_name = $row1['region_name'];

                                    $facility_type_id = 'facility_type|UCINI';

                                    $district_name = 'KAMPALA';

                                    $facility_name = $row1['facility_name'];
                                    
                                    $job_classification = $row1['job_classification'];


                                    $facility_type_name = 'Uganda Cancer Institute';

                                    $facility_id = $row1['facility_id'];	


                                    $gender = $row1['gender'];

                                    $age = $row1['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Institution')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }


$sql1 =	"SELECT * FROM staff_uhi ORDER BY facility_name";

					
	$result1= mysqli_query($mysqli, $sql1);
                                        
                                       
                                while($row1 = mysqli_fetch_assoc($result1)){
                                  
                                    
                                    $person_id = "UHI|".$row1['person_id'];

                                    $job_id = $row1['job_id'];
                                    
                                    $job_name = $row1['job_name'];
                                    
                                    $cadre_id = $row1['cadre_id'];
                                    
                                    $cadre_name = $row1['cadre_name'];	

				                    $salary_scale_id = $row1['salary_scale_id'];
                                    
                                    $salary_scale = $row1['salary_scale'];
                                    
                                    $district_id = $row1['district_id'];

                                    //$region_id = $row1['region_id'];

                                    //$region_name = $row1['region_name'];

                                    $facility_type_id = 'facility_type|UHINI';

                                    $district_name = $row1['facility_name'];

                                    $facility_name = $row1['facility_name'];
                                    
                                    $job_classification = $row1['job_classification'];


                                    $facility_type_name = 'Uganda Heart Institute';

                                    $facility_id = "UHI|".$row1['facility_id'];	


                                    $gender = $row1['gender'];

                                    $age = $row1['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification',$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Institution')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }		
                                  
                                
                        
                                
    $sql1 =	"SELECT * FROM staff_uvri ORDER BY facility_name";

					
	$result1= mysqli_query($mysqli, $sql1);
                                        
                                       
                                while($row1 = mysqli_fetch_assoc($result1)){
                                  
                                    
                                    $person_id = "UVRI|".$row1['person_id'];

                                    $job_id = $row1['job_id'];
                                    
                                    $job_name = $row1['job_name'];
                                    
                                    $cadre_id = $row1['cadre_id'];
                                    
                                    $cadre_name = $row1['cadre_name'];	

				                    $salary_scale_id = $row1['salary_scale_id'];
                                    
                                    $salary_scale = $row1['salary_scale'];
                                    
                                    $district_id = $row1['district_id'];

                                    //$region_id = $row1['region_id'];

                                    //$region_name = $row1['region_name'];

                                    $facility_type_id = 'facility_type|UVRINI';

                                    $district_name = $row1['facility_name'];

                                    $facility_name = $row1['facility_name'];
                                    
                                    $job_classification = $row1['job_classification'];


                                    $facility_type_name = 'Uganda Virus Research Institute';

                                    $facility_id = "UVRI|".$row1['facility_id'];	


                                    $gender = $row1['gender'];

                                    $age = $row1['age'];				
                                    
                                    
								   
				$SQL2 = mysqli_query($mysqli, "INSERT INTO staff (`job_classification`,`person_id`,`job_id`,`job_name`,`cadre_id`,`cadre_name`,`salary_scale_id`,`salary_scale`,`district_id`,`district_name`,`facility_type_id`,`facility_type_name`,`facility_id`,`facility_name`,`gender`,`age`,`institution_type`) VALUES ('$job_classification','$person_id','$job_id','$job_name','$cadre_id','$cadre_name','$salary_scale_id','$salary_scale','$district_id','$district_name','$facility_type_id','$facility_type_name','$facility_id','$facility_name','$gender','$age','National Institution')");				 
								  
								  
                                    
                                    
                                   
                                    
                                  }	
                   

    $sql1 =	mysqli_query($mysqli,"UPDATE staff SET region_id2='' AND region_name2=''");



    $sql2 =	"SELECT r.region_id,r.region_name,dr.district_id FROM regions r,district_region dr WHERE r.region_id=dr.region_id";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){



            $district_id = $row2['district_id'];

            $region_id = $row2['region_id'];

            $region_name = $row2['region_name'];

           
                                    
								   
     $SQL2 = mysqli_query($mysqli, "UPDATE staff SET region_id2='$region_id',region_name2='$region_name' WHERE district_id='$district_id'");
            
            
            
           
                                    
    }


      $SQL2 = mysqli_query($mysqli, "UPDATE staff SET region_id2='1',region_name2='Central' WHERE region_id2=0");

    
    */
   
									
									?>     

                                



