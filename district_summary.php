<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
    $sql11= "SELECT  *  FROM national_job_summary  ORDER BY job_name";
    
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
     
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover"  id="example2">
                             <thead>
                                <tr>
                                           
                                
                                  <th>Facility Level</th>
                                   <th></th> 
                                  <th>District/Facility</th>
                               
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
                                         	
			          	<button type="submit" name="Level" class="btn btn-primary">Apply level Limit</button>				</td>
                        
                         <td>
		           			<select name="district_name" class="form-control" >
                                                   <option value="">Select District</option>
                                          <?php
										
						$sql="SELECT DISTINCT(district_name) AS district_name FROM staff  WHERE facility_type_id != '' AND facility_type_id != 'facility_type|4' AND facility_type_id != 'facility_type|Subcounty' AND facility_type_id != 'facility_type|Municipal ' AND facility_type_id != 'facility_type|Board'  AND facility_type_id != 'facility_type|Division' AND district_name!='' ORDER BY district_name";
						$result= mysqli_query($mysqli,$sql); 
												
												
						while ($row = mysqli_fetch_assoc($result)){
											
					?>
                                                <option value= <?php echo $row['district_name'].'>'.$row['district_name']; ?></option>
                                        <?php
					  }
									  
										  
					?>
                       </select>				  </td>
                        
                         <td><button type="submit" name="Submit" class="btn btn-primary">Apply District Limit</button></td>
					  
				  
										
							
				<?php
				
		
								
			         if(isset($_POST['Level'])){
										
					 $sql11 = "SELECT  *  FROM national_job_summary_by_level n"; 
					
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

									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%'";
									
									}else{
                                    $values =explode(".", $value);
									$query= $query." ".$value." LIKE '%".$_POST[$values[1]]."%' AND";
									}
														
									$count++;
							  }
							$sql11=  $sql11." ".$query; 
                    
                    if($facility_type_id=='facility_type|5') {$display = 'National PNFP Job Summary';}
                    elseif($facility_type_id=='facility_type|DHO'){$display = 'National DHO Job Summary';}
                    elseif($facility_type_id=='facility_type|Ghospital'){$display = 'National General Hospital Job Summary';}
                    elseif($facility_type_id=='facility_type|HCII'){$display = 'National Health Centre II Job Summary';}
                    elseif($facility_type_id=='facility_type|HCIII'){$display = 'National Health Centre III Job Summary';}
                    elseif($facility_type_id=='facility_type|HCIV'){$display = 'National Health Centre IV Job Summary';}
                    elseif($facility_type_id=='facility_type|Town'){$display = 'National Town Job Summary';}
                    
				}
			  
		
			
			 
			$sql11=$sql11." ORDER BY job_name";
                         
                         
			
			$_SESSION['query']=$sql11;
                         
                         
                      //   echo $sql11;
                         
                      
		       }elseif(isset($_POST['Submit'])){
										
				
                $sql11 = "SELECT * FROM national_job_summary_by_district n";          
                         
                $district_name= $_POST['district_name'];
		
							
				
				
				$nonEmpty=array();
				if ($district_name!=''){
				$nonEmpty[0]="n.district_name";
				}
				
				
				
		  		$noOfElements=sizeof($nonEmpty);
		  		if($noOfElements>0){
						  
						  $count =1;
						     $query="WHERE ";
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
                    
                    
                    
                        $display = $district_name;
                    
                    
                    
                    
				}
			  
		
			
			 
			$sql11=$sql11." ORDER BY job_name";
                         
             // echo $sql11;           
			
			$_SESSION['query']=$sql11;
                      
		       }else{

				$sql11= "SELECT  *  FROM national_job_summary  ORDER BY job_name";

               $_SESSION['query']=$sql11;
			   
			   //echo $sql11;
                         
                         $display = "National Job Summary";
		       }
														
				?> 
                  </form>
                                    </tbody>
                                </table>
                 <p><h2><?php echo $display; ?></h2></p> 
              <table id="example1" class="stripe hover multiple-select-row data-table-export wrap" style="
  font-size: 17px;">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Job</th>
                  <th>Approved Norms</th>
                  <th>Filled Male</th>
                  <th>Filled Female</th>
                  <th>Total Filled</th>
                  <th>Vacant/Excess</th>
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
                                                $sum_vacant_excess = 0;
                                                $final_percentage = 0;

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['job_name'].'</td>';
                                                      echo'<td>'.number_format($row['total']).'</td>';
                                                      echo'<td>'.number_format($row['male']).'</td>';
                                                      echo'<td>'.number_format($row['female']).'</td>';
                                                      echo'<td>'.number_format($row['no']).'</td>';
                                                      $vac = $row['total']-$row['no'];
                                                      echo'<td>'.$vac.'</td>';
                                                      $pec = round(($row['no']/$row['total']*100),0);
                                                      echo'<td>'.$pec.'%'.'</td>';
                                                      
                                                        $sum_approved += $row['total'];
                                                        
                                                        $sum_male += $row['male'];
                                                    
                                                        $sum_female += $row['female'];
                                                    
                                                        $sum_filled += $row['no'];
                                                    
                                                        $sum_vacant_excess += $vac;
                                                     

                                                        $count++;                       

                                                            
                                                            
                                                      echo  "</td>"; 
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    
                                                     $final_percentage = $sum_filled/$sum_approved*100;
                    
                    
                    
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td><h3>Total</h3></td><td><h3><?php echo $sum_approved; ?></h3></td><td><h3><?php echo $sum_male; ?></h3><td><h3><?php echo $sum_female; ?></h3><td><h3><?php echo $sum_filled; ?></h3></td><td><h3><?php echo $sum_vacant_excess; ?></h3></td><td><h3><?php echo round($final_percentage,0).'%'; ?></h3></td></tr> 
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

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DataTables -->
<script src="src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
  <script src="src/plugins/datatables/media/js/dataTables.responsive.js"></script>
  <script src="src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>

<script src="src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.print.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.html5.js"></script>
  <script src="src/plugins/datatables/media/js/button/buttons.flash.js"></script>
  <script src="src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
  <script src="src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
  <script>
    $('document').ready(function(){
      $('.data-table').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
      });
      $('.data-table-export').DataTable({
        scrollCollapse: true,
        autoWidth: false,
        responsive: true,
        columnDefs: [{
          targets: "datatable-nosort",
          orderable: false,
        }],
        "lengthMenu": [[-1,10, 25, 50], ["All",10, 25, 50]],
        "language": {
          "info": "_START_-_END_ of _TOTAL_ entries",
          searchPlaceholder: "Search"
        },
        dom: 'Bfrtip',
        buttons: [
        'copy', 'csv', 'pdf', 'print'
        ]
      });
      var table = $('.select-row').DataTable();
      $('.select-row tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
          $(this).removeClass('selected');
        }
        else {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
        }
      });
      var multipletable = $('.multiple-select-row').DataTable();
      $('.multiple-select-row tbody').on('click', 'tr', function () {
        $(this).toggleClass('selected');
      });
    });
  </script>
</body>
</html>
