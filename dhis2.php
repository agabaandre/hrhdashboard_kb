<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    
   $sql11= "SELECT dhis_job_id,job_name,dhis_facility_id,facility_name,salary_scale,SUM(approved) AS approved,SUM(male) AS male,SUM(female) AS female,SUM(total) AS total  FROM national_jobs  GROUP BY job_id,dhis_facility_id ORDER BY facility_name,job_name";
    
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
                  
                  

				
                 <p><h2><?php echo $display; ?></h2></p> 
               <table class="table table-striped table-bordered table-hover multiple-select-row data-table-export wrap"  id="example" data-show-export="true">
                <thead>
                <tr>
                  <th>#</th>
                  <th>DHIS Facility ID</th>
                  <th>Facility</th>
                  <th>DHIS Job ID</th>
                  <th>Job</th>
                  <th>Approved Norms</th>
                  <th>Filled Male</th>
                  <th>Filled Female</th>
                  <th>Total Filled</th>
                 <!-- <th>Excess</th>
                  <th>Vacant</th>
                  <th>% Filled </th>-->
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                
                                                
                                                $count=1;
                                             /*   $sum_approved = 0;
                                                $sum_male = 0;
                                                $sum_female = 0;
                                                $sum_filled = 0;
                                                $sum_excess = 0;
                                                $sum_vacant = 0;
                                                $final_percentage = 0;*/

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['dhis_facility_id'].'</td>';
                                                      echo'<td>'.$row['facility_name'].'</td>';
                                                      echo'<td>'.$row['dhis_job_id'].'</td>';
                                                      echo'<td>'.$row['job_name'].'</td>';
                                                      echo'<td>'.$row['approved'].'</td>';
                                                      echo'<td>'.$row['male'].'</td>';
                                                      echo'<td>'.$row['female'].'</td>';
                                                      echo'<td>'.$row['total'].'</td>';
                                                   /*   
                                                      
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
                                                    
                                                        //$sum_excess += $exec;
                                                    
                                                        //$sum_vacant += $vac;
                                                    
                                                        if($sum_filled > $sum_approved ){
                                                          $sum_excess = $sum_filled - $sum_approved;
                                                         // echo'<td>'.$exec.'</td>';
                                                      }else{
                                                          $sum_excess = 0;
                                                          //echo'<td>'.$exec.'</td>';
                                                       
                                                      }
                                                      if($sum_filled < $sum_approved ){
                                                          $sum_vacant =   $sum_approved - $sum_filled;
                                                          //echo'<td>'.$vac.'</td>';
                                                      }else{
                                                          $sum_vacant = 0;
                                                          echo'<td>'.$vac.'</td>';
                                                       
                                                      }
                                                     */

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
