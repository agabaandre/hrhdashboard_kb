<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

 <?php include'Header.php';
    
    include('connect.php'); 
    

                         
    
    
    
 
    
    $display = 'Select Year';
    
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <?php include'admin_sidemenu.php';?>

    <!-- Main content -->
    <section class="content">
         <?php //include("menu2.php"); ?>
      <div class="box">
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                  
                 <p><h2><?php echo $display; ?></h2></p> 
              <table class="table table-striped table-bordered table-hover multiple-select-row data-table-export wrap"  id="example" data-show-export="true">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Year</th>
                  <th>View</th>
                  
                  
                  
                </tr>
                </thead>
                <tbody>
                 <?php 
                                                include('connect.php'); 
                                                
                                                $count=1;
                                                
                                                $sql11= "SELECT DISTINCT(year) AS year FROM static_national_jobs_final";
                                                

                                                 $results=mysqli_query($mysqli,$sql11);
                                           
                                            
                                                while ($row=mysqli_fetch_assoc($results)) {
                                                    echo'<tr>';
                                                      echo'<td>'.$count.'</td>';
                                                      echo'<td>'.$row['year'].'</td>';
                                                      echo "<td><a href='static_national_job_summary.php?year=".$row['year']."'><i class='fa fa-eye fa-2x'></i></a></td>";
                                                      
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

  <?php include('footer2.php'); ?>
    
</body>
</html>
