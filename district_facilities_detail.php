<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
    $sql11= "SELECT *  FROM total_facilities_temp_districts ";
    
    //$display = 'District Facility Level Totala';
    
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
 <?php include'admin_sidemenu.php';?>
    <!-- Main content -->
    <section class="content">
         <?php include("menu2.php"); ?>
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">District Facilities</h3>
            </div>
            <div>
             
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
                
                
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover"  id="example2">
                             <thead>
                                <tr>
                                           
                                
                                  <th>Facility Level</th>
                                   <th></th> 
                                 
                               
                                 </tr>
                </thead>
                                    <tbody>
                                            
                            		
					<form method="post">	
					 <td>
		           			<select name="facility_type_id" class="form-control" >
                                                   <option value="">Select Facility Level</option>
                                          <?php
										
						$sql="SELECT DISTINCT(facility_type_id) AS facility_type_id, facility_type_name FROM staff  WHERE facility_type_id != '' AND facility_type_id != 'facility_type|4' AND facility_type_id != 'facility_type|Subcounty' AND facility_type_id != 'facility_type|Municipal ' AND facility_type_id != 'facility_type|Board'  AND facility_type_id != 'facility_type|Division' ORDER BY facility_type_id";
						$result= mysqli_query($mysqli,$sql); 
												
												
						while ($row = mysqli_fetch_assoc($result)){
											
					?>
                                                <option value= <?php echo $row['facility_type_id'].'>'.$row['facility_type_name']; ?></option>
                                        <?php
					  }
									  
										  
					?>
                       </select>				  </td>
                        
                         <td>
                                         	
			          	<button type="submit" name="Submit" class="btn btn-primary">Apply</button>				</td>
                        
                         
										
							
				<?php
				
		
								
			         if(isset($_POST['Submit'])){
										
				    $sql11= "SELECT *  FROM total_facilities_temp_districts n";
					
					$facility_type_id= $_POST['facility_type_id'];
		
							
				
				
				$nonEmpty=array();
				if ($facility_type_id!=''){
				$nonEmpty[0]="n.facility_type_id";
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
                    
                            $display = $facility_type_name. " District Facilities";
                    
                   
                    
				}
			  
		
			
			 
			$sql11=$sql11." ORDER BY district_name,facility_name,facility_type_name";
                         
                         
			
			$_SESSION['query']=$sql11;
                         
                         
                        // echo $sql11;
                         
                      
		       }else{

				$sql11= "SELECT *  FROM total_facilities_temp_districts ORDER BY district_name,facility_name,facility_type_name";

               $_SESSION['query']=$sql11;
			   
			   //echo $sql11;
                         $display = "District Facilities";
                       
		       }
														
				?> 
                  </form>
                                    </tbody>
                                </table>
                

             <table class="table table-striped table-bordered table-hover multiple-select-row data-table-export wrap"  id="example" data-show-export="true">
                <thead>
                <tr>
                  <th>#</th>
                  <th>District</th>
                  <th>Facility</th>
                  <th>Facility Level</th>
		  <th>Institution Type</th>
                 
                  
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                include('connect.php'); 
                                                
                                                $count=1;
                                                
                                                $total = 0;

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['district_name'].'</td>';
                                                       echo'<td>'.$row['facility_name'].'</td>';
                                                      echo'<td>'.$row['facility_type_name'].'</td>';
                                                      echo'<td>'.$row['institution_type'].'</td>';
                                                      
                                                       
                                                       
                                                    
                                                        $total += $row['no'];
                                                     

                                                        $count++;  
                                                            
                                                            
                                                      echo  "</td>"; 
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    
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
