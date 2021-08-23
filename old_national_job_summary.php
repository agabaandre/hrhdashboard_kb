<?php session_start(); 
if(!isset($_SESSION['user_id']) ) {
     ?>
                                
      <script type="text/javascript" language="javascript">
       window.location="index.php";
      </script>
                                
     <?php
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
    
    $sql11= "SELECT job_name,salary_scale,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total  FROM national_jobs n";
    
    ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 <?php include'admin_sidemenu.php';?>

  <!-- =============================================== -->

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    
    <!-- Main content -->
    <section class="content">
      <?php include("menu2.php"); ?>
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
                           <th>Approved/Not Approved</th>
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
			 <td>
           			<select name="structure" class="form-control" >
                                <option value="">Select Approved/Not Approved</option>
				<option value="1">Approved</option>
				<option value="0">Not Approved</option>
                                
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

			  	 $structure= $_POST['structure'];

				 
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
				
				
				
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
				  $count =1;
				     $query="WHERE ";
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
			   
		        if($noOfElements>0){ 
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

			}
			 
			$sql11=$sql11." GROUP BY job_id ORDER BY salary_scale,job_name";
                         
            		$display = $district_name.' '.$institution_type.' '.$facility_name.' '.$facility_type_name.' '.$ownership.' '.$job_category.' '.$job_classification.' '.$norms." Job Summary";         
			
			
		       }else{

				$sql11= "SELECT facility_type_name,job_name,salary_scale,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total  FROM national_jobs  GROUP BY job_id ORDER BY salary_scale,job_name";
                 
              
			  
                $display = "National Job Summary";
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
                  <th>Job</th>
                  <th>Salary Scale</th>
                  <th>Approved</th>
                  <th>Filled</th>
                  <th>Vacant</th>
                  <th>Excess</th>
                  <th>% Filled </th>
		  <th>% Vacant </th>
                  <th>Filled Male</th>
                  <th>Filled Female</th>
                    
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                
                                                
                $count=1;
                $sum_approved = 0;
                $sum_male = 0;
                $sum_female = 0;
                $sum_filled = 0;
                $sum_excess = 0;
                $sum_vacant = 0;
                $final_percentage = 0;

                 $results=mysqli_query($mysqli,$sql11);
           
            
                while ($row=mysqli_fetch_assoc($results)) {
                    echo'<tr>';
                      echo'<td>'.$count.'</td>';
                      echo'<td>'.$row['job_name'].'</td>';
                      echo'<td>'.$row['salary_scale'].'</td>';
                      echo'<td>'.$row['approved'].'</td>';
                      echo'<td>'.$row['total'].'</td>';
                      
                     
                    if($row['total'] < $row['approved'] ){
                          $vac =   $row['approved'] - $row['total'];
                          echo'<td>'.$vac.'</td>';
			  $sum_vacant+=$vac;
                      }else{
                          $vac = 0;
                          echo'<td>'.$vac.'</td>';
                       
                      }
                      
                      if($row['total'] > $row['approved'] ){
                          $exec = $row['total'] - $row['approved'];
                          echo'<td>'.$exec.'</td>';
			  $sum_excess+=$exec;
                      }else{
                          $exec = 0;
                          echo'<td>'.$exec.'</td>';
                       
                      }

		    if($row['approved']==0){
			  $per_fill =0;
		      }else{
			  $per_fill = round(($row['total']/$row['approved'])*100,0);
		     }
		      echo'<td>'.$per_fill.'%'.'</td>';

		    if($vac==0){
                          $per_vac =0;
                      }else{
                          $per_vac = round(($vac/$row['approved'])*100,0);
                     }
                      echo'<td>'.$per_vac.'%'.'</td>';
                      

                      
                      echo'<td>'.$row['male'].'</td>';
                      echo'<td>'.$row['female'].'</td>';
                      
                       
                        $sum_approved += $row['approved'];
                        
                        $sum_male += $row['male'];
                    
                        $sum_female += $row['female'];
                    
                        $sum_filled += $row['total'];
                    
                       
                  
                     

                        $count++;                       

                            
                            
                      echo  "</td>"; 
                      echo'</tr>';
                
                     }

                    
                    
                     if($sum_approved == 0){
		     $fin_per_exec = 0;
		     $fin_per_fill = 0;
		     $fin_per_vac = 0;
		     }else{
		     $fin_per_exec = ($sum_excess/$sum_approved)*100;
		     $fin_per_fill = ($sum_filled/$sum_approved)*100;
		     $fin_per_vac = (($sum_vacant-$sum_excess)/$sum_approved)*100;
                     //$fin_per_net = (100-$fin_per_fill);
		     }


                    ?>
                    
                </tbody>
                  <tr><td></td><td></td><td>Total</td><td><?php echo number_format($sum_approved); ?></td><td><?php echo number_format($sum_filled); ?><td><?php echo number_format($sum_vacant); ?><td><?php echo number_format($sum_excess); ?></td><td><?php echo round($fin_per_fill,0),'%'; ?></td><td><?php echo round($fin_per_vac,0),'%'; ?></td><td><?php echo number_format($sum_male); ?></td><td><?php echo number_format($sum_female); ?></td></tr> 
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
