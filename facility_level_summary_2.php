<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
 $sql11= "SELECT n.facility_type_name,n.facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled,facilities AS units,unit_norm  FROM national_jobs n,dist_fac_level d WHERE n.facility_type_name=d.facility_type_name AND n.institution_type=d.institution_type ";
    
    $display = 'National Facility Level Summary';
    
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
                                           
                                
                                  
                                  <th>District</th>
                                  <th>Institution Type</th>
                                 </tr>
                </thead>
                                    <tbody>
                                            
                            		
					<form method="post">	
					
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
                        
                         <td><button type="submit" name="Submit" class="btn btn-primary">Apply  Limit(s)</button></td>
					  
				  
										
							
				<?php
				
		
								
			         if(isset($_POST['Submit'])){
										
				
               
                          
				$district_name= $_POST['district_name'];
				         
				$institution_type= $_POST['institution_type'];
                         
                
				
				
				$nonEmpty=array();
				if ($district_name!=''){
				$nonEmpty[0]="n.district_name";
				}
                		if ($institution_type!=''){
				$nonEmpty[1]="n.institution_type";
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
                    
                    
                    
                        $display = $district_name.' '.$institution_type." Facility Level Summary";
                    
                    
                 
                    
				}
			  
		
			
			 
			$sql11=$sql11." GROUP BY n.facility_type_name ORDER BY n.facility_type_name";
                         
              //echo $sql11;   
			
			$_SESSION['query']=$sql11;
                      
		       }else{

			
                         
                //$sql11= "SELECT n.facility_type_name,n.facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled,facilities AS units,unit_norm  FROM national_jobs n,dist_fac_level d WHERE n.facility_type_name=d.facility_type_name AND n.institution_type=d.institution_type   GROUP BY n.facility_type_name ORDER BY n.facility_type_name";

 $sql11= "SELECT n.facility_type_name,n.facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled,facilities AS units,unit_norm  FROM national_jobs n,dist_fac_level d WHERE n.facility_type_name=d.facility_type_name   GROUP BY n.facility_type_name ORDER BY n.facility_type_name";
                         
              //  $sql11= "SELECT n.facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs n  GROUP BY n.facility_name ORDER BY n.facility_name";
                         
               
                         
             //  echo $sql11;

               $_SESSION['query']=$sql11;
			   
			
                         
                         $display = "National Facility Level Summary";
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
                  <th>Filled</th>
                  <th>Vacant</th>
                  <th>Excess</th>
                  <th>% Filled</th>
		  <th>% Vacant</th>
                
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                
                                                
                                                $count=1;
                                                $sum_total_units = 0;
                                                $sum_unit_norms = 0;
                                                $sum_total_norms = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $sum_net=0;
                                                $sum_excess2 =0;
                                                $sum_vacant2 = 0;

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    
                                                      
                                                      $facility_type_name = $row['facility_type_name'];
                                                    //echo $facility_type_name.'<br>';
                                                      if($row['facility_type_name']== 'DHOs Office' || $row['facility_type_name']== 'City Health Office' || $row['facility_type_name']== 'General Hospital'  || $row['facility_type_name']== 'HCII' || $row['facility_type_name']== 'HCIII' || $row['facility_type_name']== 'HCIV' || $row['facility_type_name']== 'Town Council' || $row['facility_type_name']== 'Municipal Health Office' || $row['facility_type_name']== 'Blood Bank Main Office' || $row['facility_type_name']== 'Blood Bank Regional Office' || $row['facility_type_name']== 'Medical Bureau Main Office' || $row['facility_type_name']== 'Prison Main Office' ){
                                                         
                                                      $total_norms = $row['units']*$row['unit_norm'];
                                                         
                                                     echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['facility_type_name'].'</td>';
                                                      echo'<td>'.$row['units'].'</td>';
                                                      echo'<td>'.number_format($row['unit_norm']).'</td>';
                                                      echo'<td>'.number_format($total_norms).'</td>';
                                                      echo'<td>'.number_format($row['total']).'</td>';
                                                    
                                                    if($row['total'] < $total_norms ){
                                                          $vac =   $total_norms - $row['total'];
                                                          echo'<td>'.$vac.'</td>';
                                                          $sum_vacant += $vac;
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                    if($row['total'] > $total_norms ){
                                                          $exec = $row['total'] - $total_norms;
                                                          echo'<td>'.$exec.'</td>';
                                                          $sum_excess +=$exec;
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($total_norms==0){
                                                          $per_fill =0;
                                                      }else{
                                                          $per_fill = round(($row['total']/$total_norms)*100,0);
                                                     }
                                                      echo'<td>'.$per_fill.'%'.'</td>';
						     if($vac==0){
                                                          $per_vac =0;
                                                      }else{
                                                          $per_vac = round(($vac/$total_norms)*100,0);
                                                     }
                                                      echo'<td>'.$per_vac.'%'.'</td>';
                                                
                                                      
                                                      
                                                        $sum_total_units += $row['units'];
                                                    
                                                        $sum_unit_norms += $row['unit_norm'];
                                                       
                                                        $sum_total_norms += $total_norms;
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $row['total'];
                                                    
                                                     

                                                        $count++;  
                                                            
                                                        
                                                     // echo  "</td>";    
                                                          
                                                      }
                                                    
                                                }
                                                    
                                                    
                                                    
                                                         
                                                    
                                                        
                                                           
     $sql12= "SELECT DISTINCT(n.facility_name),SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs n WHERE facility_type_name IN ('Regional Referral Hospital','Ministry','Specialised National Facility','National Referral Hospital')  GROUP BY n.facility_name ORDER BY n.facility_name";
                                                   
                                                          $results12=mysqli_query($mysqli,$sql12);
                                                          $num = mysqli_num_rows($results12);
                                        // echo $sql12.'<br>';                

                                      while ($row12=mysqli_fetch_assoc($results12)) {
                                                    
                                                    $total_norms = $row12['approved'];
                                                    $units = 1;
                                                      
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row12['facility_name'].'</td>';
                                                      echo'<td>'.$units.'</td>';
                                                      echo'<td>'.number_format($row12['approved']).'</td>';
                                                      echo'<td>'.number_format($total_norms).'</td>';
                                                      echo'<td>'.number_format($row12['total']).'</td>';
                                                    
                                                    if($row12['total'] < $row12['approved'] ){
                                                          $vac =   $row12['approved'] - $row12['total'];
                                                          echo'<td>'.$vac.'</td>';
                                                          $sum_vacant+=$vac;
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                    if($row12['total'] > $row12['approved'] ){
                                                          $exec = $row12['total'] - $row12['approved'];
                                                          echo'<td>'.$exec.'</td>';
                                                          $sum_excess+=$exec;
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($row12['approved']==0){
                                                          $per_fill =0;
                                                      }else{
                                                          $per_fill = round(($row12['total']/$row12['approved'])*100,0);
                                                     }
                                                      echo'<td>'.$per_fill.'%'.'</td>';

						  if($vac==0){
                                                          $per_vac =0;
                                                      }else{
                                                          $per_vac = round(($vac/$total_norms)*100,0);
                                                     }
                                                      echo'<td>'.$per_vac.'%'.'</td>';
                                                
                                                      
                                                      
                                                        $sum_total_units += $units;
                                                    
                                                        $sum_unit_norms += $row12['approved'];
                                                       
                                                        $sum_total_norms += $total_norms;
                                                        
                                                        $sum_male += $row12['male'];
                                                    
                                                        $sum_female += $row12['female'];
                                                    
                                                        $sum_filled += $row12['total'];

							
                                                   
                                                       

                                                        $count++;  
                                                            
                                                            
                                                     // echo  "</td>";   
                                                          
                                                    
                                                  }
                                                
                                                      
                                                      echo'</tr>';
                                                
                                                     
                    
                                                     $fin_per_vac  = ($sum_vacant/$sum_total_norms)*100;
                                                     $fin_per_exec = ($sum_excess/$sum_total_norms)*100;
                                                     $fin_per_fill = ($sum_filled/$sum_total_norms)*100;
						     $fin_per_vac = (($sum_vacant+$sum_excess)/$sum_total_norms)*100;
                                                     $fin_per_net = (100-$fin_per_fill);

                    
                   
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td>Total</td><td><?php echo number_format($sum_total_units); ?></td><td><?php echo number_format($sum_unit_norms);?></td><td><?php echo number_format($sum_total_norms); ?></td><td><?php echo number_format($sum_filled); ?></td><td><?php echo number_format($sum_vacant); ?></td><td><?php echo number_format($sum_excess); ?></td><td><?php echo round($fin_per_fill,0).'%'; ?></td><td><?php echo round($fin_per_vac,0).'%'; ?></td></tr> 
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
