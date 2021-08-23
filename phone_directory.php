<?php
    include'connect.php';


?>
<!DOCTYPE html>
<html>
<?php include'head.php';?>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue sidebar sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

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
    <?php include("menu.php"); ?>
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
                <form method="post">
<!--begin form-row----------------------------------------------------------------------->
  
                    
                    
<!--end form-row------------------------------------------------------------------------>
                    
  
</form>
                   
  
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

            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header">Phone Directory</li>
            </ul>
            <div class="tab-content padding">
              <!-- Morris chart - Sales -->
<!--
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
-->
                <!-- Nav tabs -->
                             <ul class="nav nav-tabs">
                                <li class="active"><a href="#DFPC" data-toggle="tab">District Focal Persons</a>
                                </li>
                                <li><a href="#RRHC" data-toggle="tab">RRH Contacts </a>
                                </li>
                                <li><a href="#MC" data-toggle="tab">Municipality Contacts </a>
                                </li>
                                <li><a href="#CIC" data-toggle="tab"> Central Institutions Contacts</a>
                                </li>
                                <li><a href="#RRPC" data-toggle="tab"> Regional Resource Persons</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="DFPC">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Telephone number</th>
                            <th>District</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                    $no=1;;
                    $result= mysqli_query($mysqli, "SELECT first_name,last_name,title,telephone_number,email,district_name,status FROM district_focal_persons f  ORDER BY district_name ASC");


        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['first_name']."</td>";
                echo "<td>".$row['last_name']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td><a href='tel:'>".$row['telephone_number']."</a></td>";
                echo "<td>".$row['district_name']."</td>";
                echo "<td><a href='mailto:'>".$row['email']."</a></td>";
                echo "<td>".$row['status']."</td>";
            echo  "</tr>"; 
            $no++;
        
            }
        ?>
                
                 </tbody>
            </table>
                                        
        </div> 
                                    
            </div>
            <div class="tab-pane fade" id="RRHC">
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Telephone number</th>
                            <th>District</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            
                            $no=1;
                            $result= mysqli_query($mysqli, "SELECT RRH_contacts_id,firstname,lastname,title,telephone,email,hospital FROM RRH_contacts  ORDER BY hospital ASC");


        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td><a href='tel:'>".$row['telephone']."</a></td>";
                echo "<td>".$row['hospital']."</td>";
                echo "<td><a href='mailto:'>".$row['email']."</a></td>";
            echo  "</tr>";
            
            $no++;
            }
                            
                            
                            
                            
                            
                            
        ?>
                
                 </tbody>
            </table>
                                        
        </div>
              
           </div>
                                
                                
                                <div class="tab-pane fade" id="MC">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example5">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Telephone number</th>
                            <th>Municipality</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            
                            $no=1;
                            $result= mysqli_query($mysqli, "SELECT municipality_contacts_id,firstName,lastName,title,telephone,municipality,email FROM municipality_contacts  ORDER BY municipality ASC");


        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td><a href='tel:'>".$row['telephone']."</a></td>";
                echo "<td>".$row['municipality']."</td>";
                echo "<td>".$row['email']."</td>";
            echo  "</tr>";  
            
            $no++;
        }
        ?>
                
                 </tbody>
            </table>
                                        
        </div>
              
           </div>
                                
                                <div class="tab-pane fade" id="CIC">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example4">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Telephone number</th>
                            <th>Organisation</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            $no=1;
                            $result= mysqli_query($mysqli, "SELECT central_institutions_id,firstName,lastName,organisation,telephone,email,title FROM central_institutions_contacts  ORDER BY organisation ASC");


        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td><a href='tel:'>".$row['telephone']."</a></td>";
                echo "<td>".$row['organisation']."</td>";
                echo "<td>".$row['email']."</td>";
            echo  "</tr>"; 
            $no++;
        }
        ?>
                            
                            
     
                
                 </tbody>
            </table>
                                        
        </div>
              
           </div>
                                
                                <div class="tab-pane fade" id="RRPC">
                                    <br>
                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover example" id="example3">
<!--
                <div>
                    <table border="border" width="100%">
-->
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Title</th>
                            <th>Telephone number</th>
                            <th>District</th>
                            <th>Region</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>            
<!-----------------end  Filters---------------------------------------------------------->
                <?php
                            $no=1;
                            $result= mysqli_query($mysqli, "SELECT regional_resource_persons_id,firstName,lastName,title,telephone,region,district,email FROM regional_resource_persons  ORDER BY district ASC");


        while($row = mysqli_fetch_assoc($result)){

            echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['district']."</td>";
                echo "<td>".$row['region']."</td>";
                echo "<td><a href='tel:'>".$row['telephone']."</a></td>";
                echo "<td>".$row['email']."</td>";
            echo  "</tr>"; 
            
            $no++;
        }
        ?>
                
                 </tbody>
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
    var f = $('#example3').DataTable( {
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
    var f = $('#example4').DataTable( {
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
    var f = $('#example5').DataTable( {
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
    		format: "MM-yyyy",
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
