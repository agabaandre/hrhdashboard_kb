<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
    $sql11= "SELECT *  FROM total_facilities_districts ORDER BY district_name,facility_type_name,institution_type";
    
    $display = 'District Facility Level Totals';
    
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
                <table class="table table-striped table-bordered table-hover multiple-select-row data-table-export wrap"  id="example" data-show-export="true">
                <thead>
                <tr>
                  <th>#</th>
                  <th>District</th>
                  <th>Facility Level</th>
		  <th>Institution Type</th>
                  <th>Total</th>
                  
                  
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
                                                      echo'<td>'.$row['facility_type_name'].'</td>';
						      echo'<td>'.$row['institution_type'].'</td>';
                                                      echo'<td>'.number_format($row['no']).'</td>';
                                                      
                                                       
                                                       
                                                    
                                                        $total += $row['no'];
                                                     

                                                        $count++;  
                                                            
                                                            
                                                      echo  "</td>"; 
                                                      echo'</tr>';
                                                
                                                     }
                    
                                                    
                                                    ?>
                    
                </tbody>
                  <tr><td></td><td>Total</td><td></td><td><?php echo $total; ?></td></tr> 
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
