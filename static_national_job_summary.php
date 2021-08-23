<?php
    include'connect.php';


if(!isset($_GET['year'])){
					   
			   $year=$_SESSION['year'];
			   
			  
								   
			   }else{
			 
			  $year = $_GET['year'];

			$_SESSION['year'] = $year;
    
            }
    
    
?>
<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<style>
.nav-tabs
 {
   border-color:#004A00;
   width:100%;
 }

.nav-tabs > li a { 
    border: 1px solid #004A00;
    background-color:#004A00; 
    color:#fff;
    }

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover{
    background-color:#D5FFD5;
    color:#000;
    border: 1px solid #1A3E5E;
    border-bottom-color: transparent;
    }

.nav-tabs > li > a:hover{
  background-color: #D5FFD5 !important;
    border-radius: 5px;
    color:#000;

} 

.tab-pane {
    border:solid 1px #004A00;
    border-top: 0; 
    width:100%;
/*    background-color:#D5FFD5;*/
    padding:5px;
}
</style>
 <?php include'Header.php';?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
    
    
 <?php include'admin_sidemenu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <?php include("menu3.php"); ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
          
<!--        <section class="col-lg-12 connectedSortable">-->
          <!-- Custom tabs (Charts with tabs)-->
<!--          <div class="nav-tabs-custom">-->
            <!-- Tabs within a box -->
<!--            <ul class="nav nav-tabs pull-right">-->
              
<!--              <li class="pull-left header"><i class="fa fa-user-md"></i>Reporting Rates</li>-->
<!--            </ul>-->
<!--            <div class="tab-content no-padding">-->
                
<!-----------------begin  Filters---------------------------------------------------------->
                
                   
  
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                           
                
                
<!--
            </div>
          </div>
-->
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
        
          <!-- /.box -->

          <!-- quick email widget -->
          
<!--

        </section>
-->
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
       
     
             
          
          
          
          
          
          
          
          
          <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
<!--
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header">Results</li>
            </ul>
-->
            <div class="tab-content padding">
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                <!-- Nav tabs -->
                
                <h4>Audit Reports for <?php echo $year; ?></h4> 
                <form method="post">
                <table class="table table-striped table-bordered table-hover"  id="example2">
                             <thead>
                                <tr>
                                           
                                
                                  <th>Facility Level</th>
                                   <th></th> 
                                  <th>Institution</th>
                                    <th></th> 
                                    <th>Institution Type</th>
                               
                                 </tr>
                </thead>
                                    <tbody>
                                            
                            		
					<form method="post">	
					 <td>
		           			<select name="facility_type_name" class="form-control" >
                                                   <option value="">Select Facility Level</option>
                                          <?php
										
						$sql="SELECT DISTINCT(facility_type_id) AS facility_type_id, facility_type_name FROM static_national_jobs_level_final ORDER BY facility_type_name";
						$result= mysqli_query($mysqli,$sql); 
												
												
						while ($row = mysqli_fetch_assoc($result)){
											
					?>
                                                
                                                <option value ="<?php echo($row['facility_type_name']);?>"><?php echo($row['facility_type_name']);?></option>
                                        <?php
					  }
									  
										  
					?>
                       </select>				  </td>
                        
                         <td>
                                         	
			          	<button type="submit" name="Level" class="btn btn-primary" required="true">Apply level Limit</button>				</td>
                        
                         <td>
		           			<select name="district_name" class="form-control" >
                                                   <option value="">Select District</option>
                                          <?php
										
						$sql="SELECT DISTINCT(district_name) AS district_name FROM static_national_jobs_district_final ORDER BY district_name";
						$result= mysqli_query($mysqli,$sql); 
												
												
						while ($row = mysqli_fetch_assoc($result)){
											
					?>
                                               
                                                <option value ="<?php echo($row['district_name']);?>"><?php echo($row['district_name']);?></option>
                                        <?php
					  }
									  
										  
					?>
                       </select>				  </td>
                        <td><button type="submit" name="District" class="btn btn-primary">Apply District Limit</button></td>
                        
                        <td>
		           			<select name="institution_type" class="form-control" >
                                                   <option value="">Select Institution Type</option>
                                          <?php
										
						$sql="SELECT DISTINCT(institution_type) AS institution_type FROM static_national_jobs_institution_type_final ORDER BY institution_type";
						$result= mysqli_query($mysqli,$sql); 
												
												
						while ($row = mysqli_fetch_assoc($result)){
											
					?>
                                               
                                                <option value ="<?php echo($row['institution_type']);?>"><?php echo($row['institution_type']);?></option>
                                        <?php
					  }
									  
										  
					?>
                       </select>				  </td>
                        
                         <td><button type="submit" name="Type" class="btn btn-primary">Apply Type Limit</button></td>
					  
				  
										
							
				<?php
				
		
								
			         if(isset($_POST['Level'])){
                         
                         
										
					 $facility_type_name= $_POST['facility_type_name'];
                         
                         
                         
                         if($facility_type_name == ''){
                            
                           
                             $sqlq1= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=1 ORDER BY scale,job ";
                         
                             $sqlq2= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=2 ORDER BY scale,job ";

                             $sqlq3= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=3 ORDER BY scale,job ";

                             $sqlq4= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=4 ORDER BY scale,job ";
                             
                         }else{
                         
                       
                             
                             $sqlq1= "SELECT  *  FROM static_national_jobs_level_final n WHERE job!='None' AND  year=$year AND quarter=1 ";
                         
                             $sqlq2= "SELECT  *  FROM static_national_jobs_level_final n WHERE job!='None' AND  year=$year AND quarter=2  ";

                             $sqlq3= "SELECT  *  FROM static_national_jobs_level_final n WHERE job!='None' AND  year=$year AND quarter=3 ";

                             $sqlq4= "SELECT  *  FROM static_national_jobs_level_final n WHERE job!='None' AND  year=$year AND quarter=4  ";
                             
                             
					
					
                        }
                                        
		
							
				
				
				$nonEmpty=array();
				if ($facility_type_name!=''){
				$nonEmpty[0]="n.facility_type_name";
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
							$sqlq1=  $sqlq1." ".$query;
                    
                            $sqlq2=  $sqlq2." ".$query;
                    
                            $sqlq3=  $sqlq3." ".$query;
                    
                            $sqlq4=  $sqlq4." ".$query;
                    
                                                               
                    
                   
                    
				}
			  
		
			
			 
			$sqlq1=$sqlq1." ORDER BY scale,job";
                         
            $sqlq2=$sqlq2." ORDER BY scale,job";
                         
            $sqlq3=$sqlq3." ORDER BY scale,job";
                         
            $sqlq4=$sqlq4." ORDER BY scale,job";
                         
                         
			
			$_SESSION['query']=$sqlq1;
                         
            $_SESSION['query']=$sqlq2;
                         
            $_SESSION['query']=$sqlq3;
                         
            $_SESSION['query']=$sqlq4;
                         
                         
                      
                         
                        $display = $facility_type_name." Job Summary"; 
                      
		       }elseif(isset($_POST['District'])){
										
				
                          
                         
                $district_name= $_POST['district_name'];
		
				if($district_name == ''){
                            
                              $sql11= "SELECT  *  FROM static_national_jobs_final WHERE job!='None'";
                             
                         }else{
                         
                         $sql11 = "SELECT * FROM static_national_jobs_district_final n WHERE job!='None'";
					
					
                        }			
				
				
				$nonEmpty=array();
				if ($district_name!=''){
				$nonEmpty[0]="n.district_name";
				}
				
				
				
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
						  $count =1;
						     $query="AND ";
							  foreach($nonEmpty as $value){
									
									if($count==$noOfElements){
									$values =explode(".", $value);

									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%'";
									
									}else{
                                                                        $values =explode(".", $value);
									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%' AND";
									}
														
									$count++;
							  }
							$sql11=  $sql11." ".$query; 
                    
                    
                    
                       
                    
                    
                    
                    
				}
			  
		
			
			 
			$sql11=$sql11." ORDER BY scale,job";
                         
                     $display = $district_name." Job Summary";         
			
			$_SESSION['query']=$sql11;
                         
                         //echo $sql11;
                      
		       }elseif(isset($_POST['Type'])){
										
				
                          
                         
                $institution_type= $_POST['institution_type'];
		
				if($institution_type == ''){
                            
                              $sql11= "SELECT  *  FROM static_national_jobs_final WHERE job!='None'";
                             
                         }else{
                         
                         $sql11 = "SELECT * FROM static_national_jobs_institution_type_final n WHERE job!='None'";
					
					
                        }			
				
				
				$nonEmpty=array();
				if ($institution_type!=''){
				$nonEmpty[0]="n.institution_type";
				}
				
				
				
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
						  $count =1;
						     $query="AND ";
							  foreach($nonEmpty as $value){
									
									if($count==$noOfElements){
									$values =explode(".", $value);

									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%'";
									
									}else{
                                                                        $values =explode(".", $value);
									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%' AND";
									}
														
									$count++;
							  }
							$sql11=  $sql11." ".$query; 
                    
                    
                    
                       
                    
                    
                    
                    
				}
			  
		
			
			 
			$sql11=$sql11." ORDER BY scale,job";
                         
                     $display = $institution_type." Job Summary";         
			
			$_SESSION['query']=$sql11;
                         
                        // echo $sql11;
                      
		       }else{

				 $sqlq1= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=1 ORDER BY scale,job ";
                         
                 $sqlq2= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=2 ORDER BY scale,job ";
                         
                 $sqlq3= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=3 ORDER BY scale,job ";
                         
                 $sqlq4= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=4 ORDER BY scale,job ";

               $_SESSION['query']=$sql11;
			   
			  // echo $sqlq1;
                         
                         $display = "National Job Summary";
		       }
														
				?> 
                  </form>
                                    </tbody>
                                </table>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#Q1" data-toggle="tab">Quarter 1</a>
                                </li>
                                <li><a href="#Q2" data-toggle="tab">Quarter 2 </a>
                                </li>
                                <li><a href="#Q3" data-toggle="tab">Quarter 3 </a>
                                </li>
                                <li><a href="#Q4" data-toggle="tab">Quarter 4 </a>
                                </li>
                                
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="Q1">
                                    <br>
                <br>
                                    
                  
                                                                                                                            
                                                                                                                          
                  <div class="table-responsive">
                      
                      
                    <table class="table table-striped table-bordered table-hover example" id="example">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                  <th>Job</th>
                  <th>Salary Scale</th>
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
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            
                   // $sql11= "SELECT  *  FROM static_national_jobs_final WHERE job!='None' AND  year=$year AND quarter=1 ORDER BY scale,job ";
                            
                         //   echo $sql11;
                    
                                            $count=1;
                                                $sum_approved = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $final_percentage = 0;

                                                 $results=mysqli_query($mysqli,$sqlq1);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['job'].'</td>';
                                                      echo'<td>'.$row['scale'].'</td>';
                                                      echo'<td>'.$row['app_total'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                     
                                                      $total = $row['female']+$row['male'];
                                                      echo'<td>'.$total.'</td>';
                                                      if($total > $row['app_total'] ){
                                                          $exec = $total - $row['app_total'];
                                                          echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($total < $row['app_total'] ){
                                                          $vac =   $row['app_total'] - $total;
                                                          echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                      //echo'<td>'.$total.'</td>';
                                                      if($row['app_total']== 0){
                                                            $pec =0;
                                                            echo'<td>'.$pec.'%'.'</td>';
                                                      }else{
                                                         $pec = round(($total/$row['app_total']*100),0);
                                                      echo'<td>'.$pec.'%'.'</td>'; 
                                                          
                                                      }
                                                      
                                                       
                                                        $sum_approved += $row['app_total'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $total;
                                                    
                                                        $sum_excess += $exec;
                                                    
                                                        $sum_vacant += $vac;
                                                     

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
                                    
            </div>
            <div class="tab-pane fade" id="Q2">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example1">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                           <th>#</th>
                  <th>Job</th>
                  <th>Salary Scale</th>
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
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            $count=1;
                                                $sum_approved = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $final_percentage = 0;
                            
                           
                                                 $results=mysqli_query($mysqli,$sqlq2);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['job'].'</td>';
                                                      echo'<td>'.$row['scale'].'</td>';
                                                      echo'<td>'.$row['app_total'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                     
                                                      $total = $row['female']+$row['male'];
                                                      echo'<td>'.$total.'</td>';
                                                      if($total > $row['app_total'] ){
                                                          $exec = $total - $row['app_total'];
                                                          echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($total < $row['app_total'] ){
                                                          $vac =   $row['app_total'] - $total;
                                                          echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                      //echo'<td>'.$total.'</td>';
                                                      if($row['app_total']== 0){
                                                            $pec =0;
                                                            echo'<td>'.$pec.'%'.'</td>';
                                                      }else{
                                                         $pec = round(($total/$row['app_total']*100),0);
                                                      echo'<td>'.$pec.'%'.'</td>'; 
                                                          
                                                      }
                                                      
                                                       
                                                        $sum_approved += $row['app_total'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $total;
                                                    
                                                        $sum_excess += $exec;
                                                    
                                                        $sum_vacant += $vac;
                                                     

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
              
           </div>
                                <div class="tab-pane fade" id="Q3">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example1">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                           <th>#</th>
                  <th>Job</th>
                  <th>Salary Scale</th>
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
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            $count=1;
                                                $sum_approved = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $final_percentage = 0;
                            
                           
                                                 $results=mysqli_query($mysqli,$sqlq3);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['job'].'</td>';
                                                      echo'<td>'.$row['scale'].'</td>';
                                                      echo'<td>'.$row['app_total'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                     
                                                      $total = $row['female']+$row['male'];
                                                      echo'<td>'.$total.'</td>';
                                                      if($total > $row['app_total'] ){
                                                          $exec = $total - $row['app_total'];
                                                          echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($total < $row['app_total'] ){
                                                          $vac =   $row['app_total'] - $total;
                                                          echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                      //echo'<td>'.$total.'</td>';
                                                      if($row['app_total']== 0){
                                                            $pec =0;
                                                            echo'<td>'.$pec.'%'.'</td>';
                                                      }else{
                                                         $pec = round(($total/$row['app_total']*100),0);
                                                      echo'<td>'.$pec.'%'.'</td>'; 
                                                          
                                                      }
                                                      
                                                       
                                                        $sum_approved += $row['app_total'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $total;
                                                    
                                                        $sum_excess += $exec;
                                                    
                                                        $sum_vacant += $vac;
                                                     

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
              
           </div>
                        <div class="tab-pane fade" id="Q4">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example1">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                           <th>#</th>
                  <th>Job</th>
                  <th>Salary Scale</th>
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
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            $count=1;
                                                $sum_approved = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $final_percentage = 0;
                            
                           
                                                 $results=mysqli_query($mysqli,$sqlq4);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['job'].'</td>';
                                                      echo'<td>'.$row['scale'].'</td>';
                                                      echo'<td>'.$row['app_total'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                     
                                                      $total = $row['female']+$row['male'];
                                                      echo'<td>'.$total.'</td>';
                                                      if($total > $row['app_total'] ){
                                                          $exec = $total - $row['app_total'];
                                                          echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $exec = 0;
                                                          echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($total < $row['app_total'] ){
                                                          $vac =   $row['app_total'] - $total;
                                                          echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $vac = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                      //echo'<td>'.$total.'</td>';
                                                      if($row['app_total']== 0){
                                                            $pec =0;
                                                            echo'<td>'.$pec.'%'.'</td>';
                                                      }else{
                                                         $pec = round(($total/$row['app_total']*100),0);
                                                      echo'<td>'.$pec.'%'.'</td>'; 
                                                          
                                                      }
                                                      
                                                       
                                                        $sum_approved += $row['app_total'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $total;
                                                    
                                                        $sum_excess += $exec;
                                                    
                                                        $sum_vacant += $vac;
                                                     

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
              
           </div>
                
            </div>
              </div> </div>
          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
        
          <!-- /.box -->

          <!-- quick email widget -->
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          
          
          
          
          
          
          
          
          
          
          
          
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
     <?php include'footer.php';?>
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


    
 <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="css/datatables.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" />
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

  
  <script type="text/javascript">
$(document).ready(function() {
var t = $('#example').DataTable( {
				"iDisplayLength": 10,
    				"aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "All"]],
				"columnDefs": [ {
				    "searchable": false,
				    "orderable": false,
				    "targets": 0,
				} ],
				"order": [[ 1, 'asc' ]]
			    } );
			 
			    t.on( 'order.dt search.dt', function () {
				t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				    cell.innerHTML = i+1;
				} );
			    } ).draw();
    
var f = $('#example1').DataTable( {
				"iDisplayLength": 10,
    				"aLengthMenu": [[10, 20, 30, 50, -1], [10, 20, 30, 50, "All"]],
				"columnDefs": [ {
				    "searchable": false,
				    "orderable": false,
				    "targets": 0,
				} ],
				"order": [[ 1, 'asc' ]]
			    } );
			 
			    f.on( 'order.dt search.dt', function () {
				f.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				    cell.innerHTML = i+1;
				} );
			    } ).draw();
$('.monthyear').datepicker({
    		format: "mm-yyyy",
            startView: "months", 
            minView: "months",
            minViewMode: 1,
		});
        
    $('.year').datepicker({
    		format: "MM-yyyy",
            startView: "year", 
            minView: "year",
            minViewMode: 2,
		});  
});
</script> 
    

</body>
</html>
