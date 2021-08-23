<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
  //$sql11= "SELECT District,Facility,Job,Gender,UniformSize,COUNT(PersonId) AS no FROM uniforms GROUP BY Job,Gender,UniformSize,District,Facility ORDER BY District,Facility,Job,Gender,UniformSize";
    
    
   $sql11 = " SELECT Job,Gender,SUM(S) AS S,SUM(M) AS M,SUM(L) AS L,SUM(XL) AS XL,SUM(XXL) AS XXL FROM temp_uniforms_final ";
    
    
       
       
      // GROUP BY Job,Gender ORDER BY Job,Gender
                         
    
    
    
 
    
    $display = 'National Uniform Summary';
    
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <?php include'admin_sidemenu.php';?>

    <!-- Main content -->
    <section class="content">
         <?php include("menu.php"); ?>
      <div class="box">
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover"  id="example2">
                             <thead>
                                <tr>
                                           
                                
                                  
                                  <th>District</th>
                                  <th>Facility</th>
                                  <th>Job</th>
                               
                                 </tr>
                </thead>
                                    <tbody>
                                            
                            		
					<form method="post">	
					
                        <td>
		           			<select name="District" class="form-control" >
                                                   <option value="">Select District</option>
                                          <?php
										
                                            $sql="SELECT DISTINCT(District) AS District FROM temp_uniforms_final ORDER BY District";

                                            $result= mysqli_query($mysqli,$sql); 
                                            while ($row = mysqli_fetch_assoc($result)){

                                            ?>
                                                                    <option value ="<?php echo($row['District']);?>"><?php echo($row['District']);?></option>
                                                            <?php
                                          }
                                    ?>
                                           </select>				  
                         </td>
                        <td>
		           			<select name="Facility" class="form-control" >
                                                   <option value="">Select Facility</option>
                                          <?php
										
                                            $sql="SELECT DISTINCT(Facility) AS Facility FROM temp_uniforms_final ORDER BY Facility";

                                            $result= mysqli_query($mysqli,$sql); 
                                            while ($row = mysqli_fetch_assoc($result)){

                                            ?>
                                                                    <option value ="<?php echo($row['Facility']);?>"><?php echo($row['Facility']);?></option>
                                                            <?php
                                          }
                                    ?>
                                           </select>				  
                         </td>
                         <td>
		           			<select name="Job" class="form-control" >
                                                   <option value="">Select Job</option>
                                          <?php
										
                                            $sql="SELECT DISTINCT(Job) AS  Job FROM temp_uniforms_final ORDER BY Job";

                                            $result= mysqli_query($mysqli,$sql); 
                                            while ($row = mysqli_fetch_assoc($result)){

                                            ?>
                                                                    <option value ="<?php echo($row['Job']);?>"><?php echo($row['Job']);?></option>
                                                            <?php
                                          }
                                    ?>
                                           </select>				  
                         </td>

                <td><button type="submit" name="Submit" class="btn btn-primary">Apply</button></td>
					  
				  
										
							
				<?php
				
		
								
			         if(isset($_POST['Submit'])){
										
				
                         
                          
                $District= $_POST['District'];
                         
                $Facility= $_POST['Facility'];
                         
                $Job= $_POST['Job'];
                         
                
				
				
				$nonEmpty=array();
				if ($District!=''){
				$nonEmpty[0]="District";
				}
                if ($Facility!=''){
				$nonEmpty[1]="Facility";
				}
                if ($Job!=''){
				$nonEmpty[2]="Job";
				}
				
				
				
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
						  $count =1;
						     $query="WHERE ";
							  foreach($nonEmpty as $value){
									
									if($count==$noOfElements){
									$values =explode(".", $value);

									$query= $query." ".$value." = '".$_POST[$values[0]]."'";
									
									}else{
                                    $values =explode(".", $value);
									$query= $query." ".$value." = '".$_POST[$values[0]]."' AND";
									}
														
									$count++;
							  }
							$sql11=  $sql11." ".$query; 
                    
                    
                    
                        $display = "Uniforms by Job by Gender : Results Limited By ".$District." ".$Facility." ".$Job."";
                    
                    
                  
                    
                 
                    
				}
			  
		
			
			 
                    $sql11=$sql11." GROUP BY Job,Gender ORDER BY Job,Gender";

                   // echo $sql11;       

                    $_SESSION['query']=$sql11;
                      
		       }else{

                       // $sql11= "SELECT District,Facility,Job,Gender,UniformSize,COUNT(PersonId) AS no FROM uniforms GROUP BY Job,Gender,UniformSize,District,Facility ORDER BY District,Facility,Job,Gender,UniformSize";
                         
                         
                     
                         
                        $sql11 =  "SELECT Job,Gender,SUM(S) AS S,SUM(M) AS M,SUM(L) AS L,SUM(XL) AS XL,SUM(XXL) AS XXL FROM temp_uniforms_final GROUP BY Job,Gender ORDER BY Job,Gender";

                        $_SESSION['query']=$sql11;
                         
                         //echo $sql11; 

			  
                         $display = "Uniforms by Job by Gender";
		       
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
                  <th>Gender</th>
                  <th>S</th>
                  <th>M</th>
                  <th>L</th>
                  <th>XL</th>
                  <th>XXL</th>
                  <th>TOTALS</th>
                  <!--<th>JOB TOTALS</th>-->
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                              
                                          

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                                $count =1;
                                                $sum_s =0;
                                                $sum_m =0;
                                                $sum_l =0;
                                                $sum_xl =0;
                                                $sum_xxl =0;
                                                $sum_total = 0;
                                                $sub_total =0;
                                               
                                                    
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    
                                             /*       $job = $row['Job'];
                                              
                                                    if($display == "National Uniform Summary"){
                                                        
                                                        $sql12 =  "SELECT SUM(S+M+L+XL+XXL) AS sub_total2 FROM temp_uniforms_final WHERE Job = '$job'";
                                                        
                                                    }else{
                                                        
                                                        
                                                        
                                                        $sql12 =  "SELECT SUM(S+M+L+XL+XXL) AS sub_total2 FROM temp_uniforms_final";
                                                                    
                                                        $sql12=  $sql12." ".$query; 
                                                        
                                                        $sql12=$sql12." AND Job = '$job' GROUP BY Job,Gender,Facility ORDER BY Job,Gender";
                                                        
                                                    }
			  */
		
			
                                                  
                                                    
                                                    $results12 =mysqli_query($mysqli,$sql12);
                                                    
                                                    $row12 = mysqli_fetch_row($results12);
												    @list($ID) = $row12;
												    $sub_total2="$ID" ;
                                                    
                                                    
                                                    
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['Job'].'</td>';
                                                      echo'<td>'.$row['Gender'].'</td>';
                                                      echo'<td>'.$row['S'].'</td>';
                                                      echo'<td>'.$row['M'].'</td>';
                                                      echo'<td>'.$row['L'].'</td>';
                                                      echo'<td>'.$row['XL'].'</td>';
                                                      echo'<td>'.$row['XXL'].'</td>';
                                                      $sub_total =  $row['S'] + $row['M'] + $row['L'] + $row['XL'] + $row['XXL'];
                                                      echo'<td>'.$sub_total.'</td>';
                                                    //  echo'<td>'.$sub_total2.'</td>'; 
                                                    
                                                    
                                                    
                                          
                                                        $sum_s= $row['S'] + $sum_s;
                                                        $sum_m= $row['M'] + $sum_m;
                                                        $sum_l= $row['L'] + $sum_l;
                                                        $sum_xl= $row['XL'] + $sum_xl;
                                                        $sum_xxl= $row['XXL'] + $sum_xxl;
                                                        
                                                        $sum_total= $sum_s + $sum_m + $sum_l + $sum_xl + $sum_xxl;

                                                        $count++;  
                                                            
                                                     
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    

                    
                    
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td>Total</td><td></td><td><?php echo $sum_s; ?></td><td><?php echo $sum_m; ?></td><td><?php echo $sum_l;?></td><td><?php echo $sum_xl; ?></td><td><?php echo $sum_xxl; ?></td><td><?php echo $sum_total; ?></td></tr> 
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
