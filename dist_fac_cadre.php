<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
 $sql11= "SELECT district_name,facility_name,cadre_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs n";
                         
    
    
    
 
    
    $display = 'National District Facility Cadre Summary';
    
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
                    
                    
                    
                        $display = $district_name.' '.$institution_type." Facility Cadre Summary";
                    
                    
                 
                    
				}
			  
		
			
			 
			$sql11=$sql11." GROUP BY facility_name ORDER BY district_name,facility_name";
                         
            
			
			$_SESSION['query']=$sql11;
                      
		       }else{

				//$sql11= "SELECT *  FROM dist_fac_cadre_final";
                         
                $sql11= "SELECT district_name,facility_name,cadre_name,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total,AVG(pec_filled) AS pec_filled  FROM national_jobs  GROUP BY facility_name ORDER BY district_name,facility_name";
    

               $_SESSION['query']=$sql11;
			   
			 
                         
                         $display = "District Facility Cadre Summary";
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
                  <th>Cadre</th>
                  <th>Male</th>
                  <th>Female</th>
                  <th>Total</th>
                  
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                              
                                                
                                                $count=1;
                                                $sum_male=0;
                                                $sum_female=0;
                                                $sum_total=0;
                                                

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['district_name'].'</td>';
                                                      echo'<td>'.$row['facility_name'].'</td>';
                                                      echo'<td>'.$row['cadre_name'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                      $total = $row['female']+$row['male'];
                                                      echo'<td>'.$total.'</td>';
                                                      
                                                     
                                                        $sum_male= $row['male'] + $sum_male;
                                                        $sum_female= $row['female'] + $sum_female;
                                                        $sum_total= $total + $sum_total;

                                                        $count++;  
                                                            
                                                            
                                                      echo  "</td>"; 
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    

                    
                    
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td></td><td>Total</td><td></td><td><?php echo $sum_male; ?></td><td><?php echo $sum_female;?></td><td><?php echo $sum_total; ?></td></tr> 
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
