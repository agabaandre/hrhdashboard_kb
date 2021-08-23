<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
    $sql11= "SELECT district_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs n";
    
    
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
                        
                         <td><button type="submit" name="Submit" class="btn btn-primary">Apply Limit</button></td>
					  
				  
										
							
				<?php
				
		
								
			         if(isset($_POST['Submit'])){
										
				
               
                $institution_type= $_POST['institution_type'];
                         
                
				
				$nonEmpty=array();
				if ($institution_type!=''){
				$nonEmpty[0]="n.institution_type";
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
                    
                    
                    
                        $display = " National Institution Summary : Results Limited by job " . $institution_type;
                    
                    
                 
                    
				}
			  
		
			
			 
			  $sql11=$sql11." GROUP BY district_name ORDER BY district_name";
                         
              //echo $sql11;           
			
			$_SESSION['query']=$sql11;
                      
		       }else{

                         
                $sql11= "SELECT n.facility_type_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled,facilities AS units,unit_norm  FROM national_jobs n,dist_fac_level d WHERE n.facility_type_name=d.facility_type_name   GROUP BY n.facility_type_name ORDER BY n.facility_type_name";
    
    
                $display = 'National Facility Level Summary';
                         
           
    

               $_SESSION['query']=$sql11;
			   
			  
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
                                                 }
                                                     $final_percentage = $sum_filled/$sum_approved*100;
                    
                    
                    
                                                    ?>
                    
                </tbody>
                
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

  <?php include'footer2.php';?>
    
</body>
</html>
