<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 

     


 $sql11= "SELECT COUNT(DISTINCT(facility_name)) AS units,SUM(male) AS male,SUM(female) AS female,n.facility_type_name,n.district_name,SUM(approved) AS approved,SUM(total) AS filled  FROM national_jobs n WHERE n.facility_type_name='Municipal Health Office'";


    $display = 'Municipal Health Offices';
    
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <?php include'admin_sidemenu.php';?>

    <!-- Main content -->
    <section class="content">
         <?php include("menu2.php"); ?>
      <div class="box">
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover"  id="example2">
                      <thead>
                        <tr>
			   <th>Institution Type</th>
			   <th>Ownership</th>
                           <th>District</th>
                           <th>Facility</th> 
                           <th>Facility Level</th>
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
           			<select name="facility_name" class="form-control" >
                                <option value="">Select Facility</option>
                                <?php
				    $sql="SELECT DISTINCT(facility_name) AS facility_name FROM national_jobs ORDER BY facility_name";
			            $result= mysqli_query($mysqli,$sql); 
					     while ($row = mysqli_fetch_assoc($result)){
				         ?>
                                 <option value ="<?php echo($row['facility_name']);?>"><?php echo($row['facility_name']);?></option>
                                 <?php
		                   }
				?>
                            </select>				  
                          </td>
                          <td>
           			<select name="facility_type_name" class="form-control" >
                                <option value="">Select Facility Level</option>
                                <?php
				    $sql="SELECT DISTINCT(facility_type_name) AS facility_type_name FROM national_jobs ORDER BY facility_type_name";
			            $result= mysqli_query($mysqli,$sql); 
				     while ($row = mysqli_fetch_assoc($result)){
			         ?>
                                 <option value ="<?php echo($row['facility_type_name']);?>"><?php echo($row['facility_type_name']);?></option>
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
			<!--
			 <td>
           			<select name="structure" class="form-control" >
                                <option value="">Select Approved/Not Approved</option>
				<option value="1">Approved</option>
				<option value="0">Not Approved</option>
                                
                            </select>				  
                          </td>-->
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
                          
                        
                         <td><button type="submit" name="Limit" class="btn btn-primary">Apply </button></td>
					  
				  
										
		<?php		
								
			 if(isset($_POST['Limit'])){
						         
				 $institution_type= $_POST['institution_type'];
				 
				 $facility_type_name= $_POST['facility_type_name'];
				 
				 $facility_name= $_POST['facility_name'];
				 
				 $district_name= $_POST['district_name'];

				 
				 $ownership= $_POST['ownership'];

			  	 $region_name= $_POST['region_name'];

				 
				 $job_category= $_POST['job_category'];
				 
				 $job_classification= $_POST['job_classification'];
		
						
				
				
				$nonEmpty=array();
				if ($institution_type!=''){
				$nonEmpty[0]="n.institution_type";
				}
                		if($facility_type_name!=''){
				$nonEmpty[1]="n.facility_type_name";
				}
                		if($facility_name!=''){
				$nonEmpty[2]="n.facility_name";
				}
                		if($district_name!=''){
				$nonEmpty[3]="n.district_name";
				}
				if($ownership!=''){
				$nonEmpty[4]="n.ownership";
				}
                		if($job_category!=''){
				$nonEmpty[5]="n.job_category";
				}
                		if($job_classification!=''){
				$nonEmpty[6]="n.job_classification";
				}
				if($region_name!=''){
				$nonEmpty[7]="n.region_name";
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
                    
				}
			   
		    /*    if($noOfElements>0){ 
		        if($structure != '' && $structure == 1){
			  $sql11=  $sql11." "."AND approved >= 1";
			  $norms = 'Approved Structure';	
			}elseif($structure != '' && $structure == 0){
			  $sql11=  $sql11." "."AND approved = 0";
			  $norms = 'Jobs Not On Structure';
			}
			}else{
			  if($structure != '' && $structure == 1){
			  $sql11=  $sql11." "."WHERE approved >= 1";
			  $norms = 'Approved Structure';	
			}elseif($structure != '' && $structure == 0){
			  $sql11=  $sql11." "."WHERE approved = 0";
			  $norms = 'Jobs Not On Structure';
			}

			}*/
			
			 
			$sql11=$sql11." GROUP BY n.district_name ORDER BY n.district_name";
                         
            		$display = $district_name.' '.$institution_type.' '.$facility_name.' '.$facility_type_name.' '.$ownership.' '.$job_category.' '.$job_classification.' '.$region_name." Municipal Health Offices"; 

			
                      
		       }else{

			

                       $sql11= "SELECT COUNT(DISTINCT(facility_name)) AS units,SUM(male) AS male,SUM(female) AS female,n.facility_type_name,n.district_name,SUM(approved) AS approved,SUM(total) AS filled  FROM national_jobs n WHERE n.facility_type_name='Municipal Health Office' GROUP BY n.district_name ORDER BY n.district_name";
              
                         
                         $display = "Municipal Health Offices";
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
                  <th>District</th>
                  <th>Units</th>
                  <th>Unit Norm</th>
                  <th>Approved</th>
		  <th>Filled </th>
		  <th>Vacant </th>
		  <th>Excess</th>
		  <th>Male</th>
		  <th>Female</th>
		  <th>% Filled</th>
		  <th>% Vacant </th>
		  <th>% Male </th>
		  <th> % Female </th>
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                
                                                
                        $count=1;
                        $sum_approved = 0;
			$sum_filled = 0;
			$sum_vacant = 0;
			$sum_excess = 0;
			$sum_male = 0;
			$sum_female = 0;
			$sum_total_units = 0;
			$sum_unit_norms = 0;

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                   
		   
			$unit=0;
			$unit_norm = 6;
                        $approved = 0;
                                                         
                     echo'<tr>';
                      echo'<td>'.$count.'</td>';
                      echo'<td>'.$row['district_name'].'</td>';
                      echo'<td>'.$row['units'].'</td>';
                      echo'<td>'.number_format($unit_norm).'</td>';
		      $approved = $row['units']*$unit_norm;
		      echo'<td>'.number_format($approved).'</td>';
                      echo'<td>'.number_format($row['filled']).'</td>';
		     
		     
                    if($row['filled'] < $approved ){
                          $vac =  $approved - $row['filled'];
                          echo'<td>'.number_format($vac).'</td>';
			  $sum_vacant+=$vac;
                      }else{
                          $vac = 0;
                          echo'<td>'.$vac.'</td>';
                       
                      }
                      
                      if($row['filled'] > $approved ){
                          $exec = $row['filled'] - $approved;
                          echo'<td>'.$exec.'</td>';
			  $sum_excess+=$exec;
                      }else{
                          $exec = 0;
                          echo'<td>'.$exec.'</td>';
                       
                      }

		      echo'<td>'.number_format($row['male']).'</td>';
                      echo'<td>'.number_format($row['female']).'</td>';
			
		

		   if($row['approved']==0){
			  $per_fill =0;
		      }else{
			  $per_fill = round(($row['filled']/$approved)*100,0);
		     }
		      echo'<td>'.$per_fill.'%'.'</td>';

		    if($vac==0){
                          $per_vac =0;
                      }else{
                          $per_vac = round(($vac/$approved)*100,0);
                     }
                      echo'<td>'.$per_vac.'%'.'</td>';

		      if($row['male']==0){
			  $per_male =0;
		      }else{
			  $per_male = round(($row['male']/$row['filled'])*100,0);
		     }
		      echo'<td>'.$per_male.'%'.'</td>';
		
		      if($row['female']==0){
			  $per_female =0;
		      }else{
			  $per_female = round(($row['female']/$row['filled'])*100,0);
		     }
		      echo'<td>'.$per_female.'%'.'</td>';
                     
                      
                       
                        $sum_approved += $approved;
                        
                        $sum_male += $row['male'];
                    
                        $sum_female += $row['female'];
                    
                        $sum_filled += $row['filled'];

                        $sum_total_units += $row['units'];
                    
			$sum_unit_norms += $unit_norm;

                        $count++;    
                                                     
                                                }
                               
                   
                     if($sum_approved == 0){
		     
		    
		     $fin_per_fill = 0;
		     $fin_per_vac = 0;
		     $fin_per_male = 0;
		     $fin_per_female = 0;
		     }else{
		    
		     $fin_per_fill = (($sum_filled-$sum_excess)/$sum_approved)*100;
		     $fin_per_vac = ($sum_vacant/$sum_approved)*100;
                     $fin_per_male = ($sum_male/$sum_filled)*100;
		     $fin_per_female = ($sum_female/$sum_filled)*100;
		     
		     if($fin_per_vac < 0){$fin_per_vac = 0; }
		     }
                    
			?>
                    
                </tbody>
                  <tr><td></td><td></td><td></td><td>Total</td><td><?php echo number_format($sum_approved); ?></td><td><?php echo number_format($sum_filled); ?></td><td><?php echo number_format($sum_vacant); ?></td><td><?php echo number_format($sum_excess); ?></td><td><?php echo number_format($sum_male); ?></td><td><?php echo number_format($sum_female); ?></td><td><?php echo round($fin_per_fill,0),'%'; ?></td><td><?php echo round($fin_per_vac,0),'%'; ?></td><td><?php echo round($fin_per_male,0),'%'; ?></td><td><?php echo round($fin_per_female,0),'%'; ?></td></tr>  
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

