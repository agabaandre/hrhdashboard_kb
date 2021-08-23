<?php 
		include('connect.php');

			if ($_SESSION['month'] != ''){

			     $year = $_SESSION['year'];

			     $month = $_SESSION['month'] ;

			}else{
			   $SQL44="SELECT MAX(month) AS month,MAX(year) AS year FROM quarterly_national_jobs";

			   $result44= mysqli_query($mysqli,$SQL44); 

			   while ($row44=mysqli_fetch_assoc($result44)) {

					$month = $row44['month'];

					$year = $row44['year'];
				}
			   
			}

?>
<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 

     


 




$sql11= "SELECT COUNT(DISTINCT(facility_name)) AS units,n.facility_type_name,SUM(approved) AS approved,SUM(total) AS filled  FROM quarterly_national_jobs n WHERE n.facility_type_name IN ('Blood Bank Main Office','Blood Bank Regional Office','City Health Office','DHOs Office','General Hospital','HCII','HCIII','HCIV','Medical Bureau Main Office','Municipal Health Office','Town Council')  ";

$sql14= "SELECT DISTINCT(n.facility_name),SUM(approved) AS approved,SUM(total) AS filled  FROM quarterly_national_jobs n WHERE facility_type_name IN ('Regional Referral Hospital','Ministry','Specialised National Facility','National Referral Hospital')  ";
                         
    
    $display = 'National Facility Level Summary';
    
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <?php include'admin_sidemenu.php';?>

    <!-- Main content -->
    <section class="content">
         <?php include("menu5.php"); ?>
      <div class="box">
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
		<form method="post">
                  <table>
		  <tr>
			
			<td><h2>Select Month:&nbsp;&nbsp;&nbsp;&nbsp;</h2></td><td><h2>
			<select name="month" class="form-control" >
                                <option value="">Select Month</option>
                                <?php
                                      $sql="SELECT DISTINCT(month) AS month FROM quarterly_national_jobs ORDER BY month";
                                      $result= mysqli_query($mysqli,$sql); 
								
                                        while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value ="<?php echo($row['month']);?>"><?php echo($row['month']);?></option>
                                        <?php
					 }
				 ?>
                            </select></h2></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><h2>Select Year:&nbsp;&nbsp;&nbsp;&nbsp;</h2></td><td><h2>
			<select name="year" class="form-control" >
                                <option value="">Select Year</option>
                                <?php
                                      $sql="SELECT DISTINCT(year) AS year FROM quarterly_national_jobs ORDER BY year";
                                      $result= mysqli_query($mysqli,$sql); 
								
                                        while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value ="<?php echo($row['year']);?>"><?php echo($row['year']);?></option>
                                        <?php
					 }
				 ?>
                            </select></h2></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
 			<td><button type="submit" name="Select" class="btn btn-primary">Select </button></td>
		  </tr>

		  </table>
		   </form>
			<?php
 			if(isset($_POST['Select'])){
				
			  

			    $month= $_POST['month'];
				 
			    $year= $_POST['year'];
				 
			    $_SESSION['month'] = $month;

			    $_SESSION['year'] = $year;

			}
			
			?>
                  <table class="table table-striped table-bordered table-hover"  id="example2">
                   <thead>
                        <tr>
                                   
                        
                          <th>Institution Type</th>
			  <th>Ownership</th>
                          <th>District</th>
                          <th>Job Category</th>
                           <th>Job Classification</th> 
                           <th>Region</th>
                         </tr>
       	           </thead>
                  <tbody>
                                            
                            		
		  <form method="post">	
			<td>
   			  <select name="institution_type" class="form-control" >
                                <option value="">Select Institution Type</option>
                                <?php
                                    $sql="SELECT DISTINCT(institution_type) AS institution_type FROM national_jobs ORDER BY institution_type";
                                    $result= mysqli_query($mysqli,$sql); 
                                        while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value ="<?php echo($row['institution_type']);?>"><?php echo($row['institution_type']);?></option>
                                        <?php
                                      }
                                ?>
                            </select>
                          </td>	
			<td>
           			<select name="ownership" class="form-control" >
                                <option value="">Select Ownership</option>
				<option value="Public">Public</option>
				<option value="Private">Private</option>
				<option value="PNFP">PNFP</option>
				<option value="Prisons">Prisons</option>
                                <option value="Police">Police</option>
                            </select>				  
                          </td>
                         <td>
		           	<select name="district_name" class="form-control" >
                                <option value="">Select District</option>
                                <?php
                                      $sql="SELECT DISTINCT(district_name) AS district_name FROM national_jobs ORDER BY district_name";
                                      $result= mysqli_query($mysqli,$sql); 
								
                                        while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value ="<?php echo($row['district_name']);?>"><?php echo($row['district_name']);?></option>
                                        <?php
					                   }
				                 ?>
                            </select>				  
                        </td>
			<td>
           			<select name="job_category" class="form-control" >
                                <option value="">Select Job Category</option>
                                <?php
				    $sql="SELECT DISTINCT(job_category) AS job_category FROM national_jobs ORDER BY job_category";
			            $result= mysqli_query($mysqli,$sql); 
				     while ($row = mysqli_fetch_assoc($result)){
			         ?>
                                 <option value ="<?php echo($row['job_category']);?>"><?php echo($row['job_category']);?></option>
                                         <?php
					                   }
								?>
                            </select>				  
                          </td>
			<td>
           			<select name="job_classification" class="form-control" >
                                <option value="">Select Job Classification</option>
                                <?php
				    $sql="SELECT DISTINCT(job_classification) AS job_classification FROM national_jobs ORDER BY job_classification";
			            $result= mysqli_query($mysqli,$sql); 
				     while ($row = mysqli_fetch_assoc($result)){
			         ?>
                                 <option value ="<?php echo($row['job_classification']);?>"><?php echo($row['job_classification']);?></option>
                                         <?php
					                   }
								?>
                            </select>				  
                          </td>
			<td>
           			<select name="region_name" class="form-control" >
                                <option value="">Select Region</option>
                                <?php
				    $sql="SELECT DISTINCT(region_name) AS region_name FROM national_jobs ORDER BY region_name";
			            $result= mysqli_query($mysqli,$sql); 
				     while ($row = mysqli_fetch_assoc($result)){
			         ?>
                                 <option value ="<?php echo($row['region_name']);?>"><?php echo($row['region_name']);?></option>
                                         <?php
					                   }
								?>
                            </select>				  
                          </td>
                          
			 
                        
                        
                         <td><button type="submit" name="Submit" class="btn btn-primary">Apply </button></td>
							
				<?php
								
			         if(isset($_POST['Submit'])){
				
				$district_name= $_POST['district_name'];
				         
				$institution_type= $_POST['institution_type'];

				$ownership= $_POST['ownership'];

				$region_name= $_POST['region_name'];
				
				$job_category= $_POST['job_category'];
				 
				$job_classification= $_POST['job_classification'];
                         
				$nonEmpty=array();
				$limits=array();
				if ($district_name!=''){
				$nonEmpty[0]="n.district_name";
				}
                		if ($institution_type!=''){
				$nonEmpty[1]="n.institution_type";
				}
				if ($ownership!=''){
				$nonEmpty[3]="n.ownership";
				}
				if($job_category!=''){
				$nonEmpty[4]="n.job_category";
				}
                		if($job_classification!=''){
				$nonEmpty[5]="n.job_classification";
				}
				if($region_name!=''){
				$nonEmpty[6]="n.region_name";
				}

				
			
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
			  $count =1;
			     $query="AND ";
				  foreach($nonEmpty as $value){
						
						if($count==$noOfElements){
						$values =explode(".", $value);

						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."'";
						
						}else{
                                    		$values =explode(".", $value);
						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."' AND";
						}
											
						$count++;
						  }
							$sql11=  $sql11." ".$query; 
                    
                    					$sql14=  $sql14." ".$query; 
                    
                               
                   		
                    
				}
			  
 			
		        
			

			$sql11=$sql11." AND month='".$month."' AND year=$year GROUP BY n.facility_type_name ORDER BY n.facility_type_name";

			$sql14=$sql14." AND month='".$month."' AND year=$year GROUP BY n.facility_name ORDER BY n.facility_name";
                         
		       
			
			$display = $month.'  '.$year.'  '.$district_name.' '.$institution_type.' '.$facility_name.' '.$facility_type_name.' '.$ownership.' '.$job_category.' '.$job_classification.' '.$region_name." Facility Level Summary";
			


                      
		       }else{



		$sql11= "SELECT COUNT(DISTINCT(facility_name)) AS units,n.facility_type_name,SUM(approved) AS approved,SUM(total) AS filled  FROM quarterly_national_jobs n WHERE n.facility_type_name IN ('Blood Bank Main Office','Blood Bank Regional Office','City Health Office','DHOs Office','General Hospital','HCII','HCIII','HCIV','Medical Bureau Main Office','Municipal Health Office','Town Council')  ";



		$sql14= "SELECT DISTINCT(n.facility_name),SUM(approved) AS approved,SUM(total) AS filled  FROM quarterly_national_jobs n WHERE facility_type_name IN ('Regional Referral Hospital','Ministry','Specialised National Facility','National Referral Hospital')  ";
                         
              

 		$sql11=$sql11." AND month='".$month."' AND year=$year GROUP BY n.facility_type_name ORDER BY n.facility_type_name";

		$sql14=$sql14." AND month='".$month."' AND year=$year GROUP BY n.facility_name ORDER BY n.facility_name";
              

                $display = $month.'  '.$year.'  '." National Facility Level Summary";
		       }
														
				?> 
                  </form>
                                    </tbody>
                                </table>
                 <p><h2><?php echo $display; ?></h2></p> 
              <table class="table table-striped table-bordered table-hover multiple-select-row data-table-export wrap"  id="example" data-show-export="true">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Facility Level</th>
                  <th>Units</th>
                  <th>Unit Norm</th>
                  <th>Approved</th>
                  <th>People in Position</th>
	          <th>Properly Deployed in Position</th>
		  <th>Not Properly Deployed in Position</th>
                  <th>Vacant Properly Deployed</th>
                  <th>Excess Properly Deployed</th>
		  <th>% Filled Properly Deployed</th>
		  <th>% Vacant Properly Deployed</th>
		  <th>% Filled in Position</th>
		  <th>% Vacant in Position</th>
                  <th>Filled Male Properly Deployed</th>
                  <th>Filled Female Properly Deployed</th>
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                
                                                
                                            

			$count=1;
			$sum_approved = 0;
			$sum_filled = 0;
			$sum_filled_structure = 0;
			$sum_filled_not_on_structure = 0;
			$sum_vacant_structure = 0;
			$sum_excess_structure = 0;
			$sum_male_structure = 0;
			$sum_female_structure = 0;
			$sum_total_units = 0;
			$sum_unit_norms = 0;

                        $results=mysqli_query($mysqli,$sql11);
                                           
                                           
                        while ($row=mysqli_fetch_assoc($results)) {
                            $facility_type_name = $row['facility_type_name'];

			
			$sql12= "SELECT SUM(total) AS filled_structure,SUM(male) AS male_structure,SUM(female) AS female_structure  FROM national_jobs n  WHERE facility_type_name='$facility_type_name' AND approved > 0";
			

			$sql13= "SELECT SUM(total) AS filled_not_on_structure  FROM national_jobs n  WHERE facility_type_name='$facility_type_name' AND approved = 0";
			

			$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
				  $count =1;
				     $query="AND ";
					  foreach($nonEmpty as $value){
							
						if($count==$noOfElements){
						$values =explode(".", $value);

						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."'";
						
						}else{
	    					$values =explode(".", $value);
						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."' AND";
						}
											
						$count++;
					  }
					$sql12=  $sql12." ".$query;

					$sql13=  $sql13." ".$query; 
                    
				}

			$results12=mysqli_query($mysqli,$sql12);
			$row12=mysqli_fetch_assoc($results12);

			$results13=mysqli_query($mysqli,$sql13);
			$row13=mysqli_fetch_assoc($results13);
		   
			$unit=0;
			if($row['facility_type_name'] == 'General Hospital'){$unit_norm = 190;}
			elseif($row['facility_type_name'] == 'HCIV'){$unit_norm = 48;}
			elseif($row['facility_type_name'] == 'HCIII'){$unit_norm = 19;}
			elseif($row['facility_type_name'] == 'HCII'){$unit_norm = 9;}
			elseif($row['facility_type_name'] == 'DHOs Office'){$unit_norm = 8;}
			elseif($row['facility_type_name'] == 'City Health Office'){$unit_norm = 3;}
			elseif($row['facility_type_name'] == 'Blood Bank Regional Office'){$unit_norm = 16;}
			elseif($row['facility_type_name'] == 'Medical Bureau Main Office'){$unit_norm = 12;}
			elseif($row['facility_type_name'] == 'Municipal Health Office'){$unit_norm = 6;}
			elseif($row['facility_type_name'] == 'Town Council'){$unit_norm = 3;}
			elseif($row['facility_type_name'] == 'Blood Bank Main Office'){$unit_norm = 214;}
			
                        $approved = 0;
                                                    
                                                         
                     echo'<tr>';
                      echo'<td>'.$count.'</td>';
                      echo'<td>'.$row['facility_type_name'].'</td>';
                      echo'<td>'.$row['units'].'</td>';
                      echo'<td>'.number_format($unit_norm).'</td>';
		      $approved = $row['units']*$unit_norm;
                      echo'<td>'.number_format($approved).'</td>';
                      echo'<td>'.number_format($row['filled']).'</td>';
		     
		     if($row12['filled_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.number_format($row12['filled_structure']).'</td>';
		      }
		      if($row13['filled_not_on_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.number_format($row13['filled_not_on_structure']).'</td>';
		      }
                      
                    if($row12['filled_structure'] < $approved ){
                          $vac =  $approved - $row12['filled_structure'];
                          echo'<td>'.number_format($vac).'</td>';
			  $sum_vacant_structure+=$vac;
                      }else{
                          $vac = 0;
                          echo'<td>'.$vac.'</td>';
                       
                      }
                      
                      if($row12['filled_structure'] > $approved ){
                          $exec = $row12['filled_structure'] - $approved;
                          echo'<td>'.$exec.'</td>';
			  $sum_excess_structure+=$exec;
                      }else{
                          $exec = 0;
                          echo'<td>'.$exec.'</td>';
                       
                      }

		  

		   

		   if($row['approved']==0){
			  $per_fill_on_structure =0;
		      }else{
			  $per_fill_on_structure = round(($row12['filled_structure']/$approved)*100,0);
		     }
		      echo'<td>'.$per_fill_on_structure.'%'.'</td>';

		    if($vac==0){
                          $per_vac =0;
                      }else{
                          $per_vac = round(($vac/$approved)*100,0);
                     }
                      echo'<td>'.$per_vac.'%'.'</td>';

		   if($row['approved']==0){
			  $per_fill_in_position =0;
		      }else{
			  $per_fill_in_position = round(($row['filled']/$approved)*100,0);
		     }
		      echo'<td>'.$per_fill_in_position.'%'.'</td>';

		   
		      $per_vac_in_position = 100-$per_fill_in_position;
		      $per_vac_in_position = round($per_vac_in_position,0);

                      echo'<td>'.$per_vac_in_position.'%'.'</td>';
                      


		      if($row12['male_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row12['male_structure'].'</td>';
		      }
		      if($row12['female_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row12['female_structure'].'</td>';
		      }
                      
                     
                      
                       
                        $sum_approved += $approved;
                        
                        $sum_male_structure += $row12['male_structure'];
                    
                        $sum_female_structure += $row12['female_structure'];
                    
                        $sum_filled += $row['filled'];

			$sum_filled_structure += $row12['filled_structure'];
		
			$sum_filled_not_on_structure += $row13['filled_not_on_structure'];
                
                        $sum_total_units += $row['units'];
                    
			$sum_unit_norms += $unit_norm;

                        $count++;    
                                                     
                                                }
                                                   
                                          
                                  $results14=mysqli_query($mysqli,$sql14);
                                  $num = mysqli_num_rows($results14);
                            

                                      while ($row14=mysqli_fetch_assoc($results14)) {
                                                    
                                                    $facility_name = $row14['facility_name'];

			
			$sql15= "SELECT SUM(total) AS filled_structure,SUM(male) AS male_structure,SUM(female) AS female_structure  FROM national_jobs n  WHERE facility_name='$facility_name' AND approved > 0";
			

			$sql16= "SELECT SUM(total) AS filled_not_on_structure  FROM national_jobs n  WHERE facility_name='$facility_name' AND approved = 0";
			

			$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
				  $count =1;
				     $query="AND ";
					  foreach($nonEmpty as $value){
							
						if($count==$noOfElements){
						$values =explode(".", $value);

						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."'";
						
						}else{
	    					$values =explode(".", $value);
						$query= $query." ".$value." LIKE '".$_POST[$values[1]]."' AND";
						}
											
						$count++;
					  }
					$sql15=  $sql15." ".$query;

					$sql16=  $sql16." ".$query; 
                    
				}

			$results15=mysqli_query($mysqli,$sql15);
			$row15=mysqli_fetch_assoc($results15);

			$results16=mysqli_query($mysqli,$sql16);
			$row16=mysqli_fetch_assoc($results16);
		   
			$unit = 0;
                                                    $units = 1;
                                                      
                    echo'<tr>';
                      echo'<td>'.$count.'</td>';
                      echo'<td>'.$row14['facility_name'].'</td>';
                      echo'<td>'.$units.'</td>';
                      echo'<td>'.number_format($row14['approved']).'</td>';
                     echo'<td>'.$row14['approved'].'</td>';
                      echo'<td>'.$row14['filled'].'</td>';
		     
		     if($row15['filled_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row15['filled_structure'].'</td>';
		      }
		      if($row16['filled_not_on_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row16['filled_not_on_structure'].'</td>';
		      }
                      
                    if($row15['filled_structure'] < $row14['approved'] ){
                          $vac =   $row14['approved'] - $row15['filled_structure'];
                          echo'<td>'.$vac.'</td>';
			  $sum_vacant_structure+=$vac;
                      }else{
                          $vac = 0;
                          echo'<td>'.$vac.'</td>';
                       
                      }
                      
                      if($row15['filled_structure'] > $row14['approved'] ){
                          $exec = $row15['filled_structure'] - $row14['approved'];
                          echo'<td>'.$exec.'</td>';
			  $sum_excess_structure+=$exec;
                      }else{
                          $exec = 0;
                          echo'<td>'.$exec.'</td>';
                       
                      }

		  

		   

		   if($row14['approved']==0){
			  $per_fill_on_structure =0;
		      }else{
			  $per_fill_on_structure = round(($row15['filled_structure']/$row14['approved'])*100,0);
		     }
		      echo'<td>'.$per_fill_on_structure.'%'.'</td>';

		    if($vac==0){
                          $per_vac =0;
                      }else{
                          $per_vac = round(($vac/$row['approved'])*100,0);
                     }
                      echo'<td>'.$per_vac.'%'.'</td>';

		   if($row14['approved']==0){
			  $per_fill_in_position =0;
		      }else{
			  $per_fill_in_position = round(($row14['filled']/$row14['approved'])*100,0);
		     }
		      echo'<td>'.$per_fill_in_position.'%'.'</td>';

		   
		      $per_vac_in_position = 100-$per_fill_in_position;
		      $per_vac_in_position = round($per_vac_in_position,0);

                      echo'<td>'.$per_vac_in_position.'%'.'</td>';
                      


		      if($row15['male_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row15['male_structure'].'</td>';
		      }
		      if($row15['female_structure']== ''){
			echo'<td>'.$unit.'</td>';
	              }else{
			echo'<td>'.$row15['female_structure'].'</td>';
		      }
                                                
                                                      
                      
                                                
                                                     
                        $sum_approved += $row14['approved'];
                        
                        $sum_male_structure += $row15['male_structure'];
                    
                        $sum_female_structure += $row15['female_structure'];
                    
                        $sum_filled += $row14['filled'];

			$sum_filled_structure += $row15['filled_structure'];
		
			$sum_filled_not_on_structure += $row16['filled_not_on_structure'];
                
                        $sum_total_units += $units;
                    
			$sum_unit_norms+=  $row14['approved'];

                        $count++;    
			
			 echo  "</td>"; 
                      echo'</tr>';
                
                     }

		    if($sum_excess_structure > 0){
		   $sum_vacant_structure = $sum_vacant_structure - $sum_excess_structure;
		   }
                   
                     if($sum_approved == 0){
		     
		    
		     $per_fill_on_structure = 0;
		     $fin_per_vac = 0;
		     $per_fill_in_position = 0;
		     $per_vac_in_position = 0;
		     }else{
		    
		     $per_fill_on_structure = (($sum_filled_structure-$sum_excess_structure)/$sum_approved)*100;
		     $fin_per_vac = ($sum_vacant_structure/$sum_approved)*100;
                     $per_fill_in_position = ($sum_filled/$sum_approved)*100;
		     $per_vac_in_position = 100 - $per_fill_in_position;
		     
		     if($per_vac_in_position < 0){$per_vac_in_position = 0; }
		     }
                    


                    
                   
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td>Total</td><td><?php echo number_format($sum_total_units); ?></td><td><?php echo number_format($sum_unit_norms);?></td><td><?php echo number_format($sum_approved); ?></td><td><?php echo number_format($sum_filled); ?></td><td><?php echo number_format($sum_filled_structure); ?></td><td><?php echo number_format($sum_filled_not_on_structure); ?></td><td><?php echo number_format($sum_vacant_structure); ?></td><td><?php echo number_format($sum_excess_structure); ?></td><td><?php echo round($per_fill_on_structure,0),'%'; ?></td><td><?php echo round($fin_per_vac,0),'%'; ?></td><td><?php echo round($per_fill_in_position,0),'%'; ?></td><td><?php echo round($per_vac_in_position,0),'%'; ?></td><td><?php echo number_format($sum_male_structure); ?></td><td><?php echo number_format($sum_female_structure); ?></td></tr>  
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
     <?php include'footer.php';?>
  </footer>

  <?php include('footer2.php'); ?>
    
</body>
</html>
