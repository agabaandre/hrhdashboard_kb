<?php session_start(); 
include('connect.php');	
?>
<!DOCTYPE html>
	<html lang="en">
	<div class="login-form">
                  
                  <form class="user" method="POST" autocomplete="off">
                    <div class="form-group"> 
                     
                      <input type="text" class="form-control" name="username" 
                        placeholder="Username" autofocus="">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="password"  placeholder="Password">
                    </div>
                   
                    <div class="form-group">
                      <button class="btn btn-info btn-block" type="submit" name="Submit">Login</button>
                    </div>
                   
                  </form>

                  
                  
                </div>

                                                             
                                                        
      
		<?php
		if(isset($_POST['Submit'])){
	
				   $user = $_POST['username'];
				   $pass = $_POST['password'];
				   
				   $user= trim($user);
				   $pass= trim($pass);


				if($user=='' || $pass==''){
				
				?>
				      <script language="JavaScript" type="text/javascript">

						alert ("Please Enter Your Username and Password");
					window.location="index.php";
				
				      </script>
                                                    <?php
			
			}
			else{	
					
					
					if ($user == 'admin' && $pass == 'audit' )
					   {
						
						$_SESSION['user_id']= 'admin';
						   ?>
                                                    <script type="text/javascript" language="JavaScript">
								window.location="national_job_summary.php";
							</script>
                                                    <?php
						   }
						else{
									  ?>
                                                    <script type="text/javascript" language="JavaScript">
											  
							  alert ("WRONG USERNAME OR PASSWORD");
							  window.location="index.php";
					        </script>
                                                    <?php
								}
			
					}

}


 ?>


              

</body>

</html>
