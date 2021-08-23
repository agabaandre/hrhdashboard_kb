<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
    $display = "By district by Facility";
    
    $sql11= "SELECT district_name,facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs n";
    
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
                    
                    
                    
                        $display = $district_name.' '.$institution_type." By district by Facility";
                    
                    
                 
                    
				}
			  
		
			
			 
			$sql11=$sql11." GROUP BY facility_name ORDER BY district_name,facility_name";
                         
			
			$_SESSION['query']=$sql11;
                      
		       }else{

				//$sql11= "SELECT *  FROM dist_fac_cadre_final";
                         
                $sql11= "SELECT district_name,facility_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs  GROUP BY facility_name ORDER BY district_name,facility_name";
    

               $_SESSION['query']=$sql11;
			   
			 
                         
                         $display = "By district by Facility";
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
                  <th>Facility</th>
                  <th>Approved Norms</th>
                  <th>Filled Male</th>
                  <th>Filled Female</th>
                  <th>Total Filled</th>
                  <th>Excess</th>
                  <th>Vacant</th>
                  <th>% Filled </th>
                  
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
                                                      echo'<td>'.$row['district_name'].'</td>';
                                                      echo'<td>'.$row['facility_name'].'</td>';
                                                      echo'<td>'.$row['approved'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                      echo'<td>'.$row['total'].'</td>';
                                                     
                                                      if($row['total'] > $row['approved'] ){
                                                          $exec = $row['total'] - $row['approved'];
                                                          echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($row['total'] < $row['approved'] ){
                                                          $vac =   $row['approved'] - $row['total'];
                                                          echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                      echo'<td>'.round($row['pec_filled'],0).'</td>';
                                                      
                                                       
                                                        $sum_approved += $row['approved'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $row['total'];
                                                    
                                                       if($sum_filled > $sum_approved ){
                                                          $sum_excess = $sum_filled - $sum_approved;
                                                      }else{
                                                            $sum_excess = 0;
                                                      }
                                                      if($sum_filled < $sum_approved ){
                                                          $sum_vacant =   $sum_approved - $sum_filled;
                                                      }else{
                                                          $sum_vacant = 0;
                                                      }
                                                     

                                                        $count++;                       

                                                            
                                                            
                                                      echo  "</td>"; 
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    
                                                     $final_percentage = $sum_filled/$sum_approved*100;
                    
                    
                    
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td></td><td>Total</td><td><?php echo $sum_approved; ?></td><td><?php echo $sum_male; ?><td><?php echo $sum_female; ?><td><?php echo $sum_filled; ?></td><td><?php echo $sum_excess; ?></td><td><?php echo $sum_vacant; ?></td><td><?php echo round($final_percentage,0).'%'; ?></td></tr> 
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
