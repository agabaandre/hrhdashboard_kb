<?php 
									
	include('connect.php'); 


    //$month = "January";
    //$year = "2019";

    //$month = date('F');
    //$year = date("Y");
    

    $sql2 =	"SELECT id,month FROM monthly_static_figures";




    $result2= mysqli_query($mysqli, $sql2);
                                        
                                       
        while($row2 = mysqli_fetch_assoc($result2)){


            $id = $row2['id'];

            $month = $row2['month'];

            if($month == 'January'){ $monthFigure = 1; }
               elseif($month == 'February'){$monthFigure = 2;}
               elseif($month == 'March'){$monthFigure = 3;}
               elseif($month == 'April'){$monthFigure = 4;}
               elseif($month == 'May'){$monthFigure = 5;}
               elseif($month == 'June'){$monthFigure = 6;}
               elseif($month == 'July'){$monthFigure = 7;}
               elseif($month == 'August'){$monthFigure = 8;}
               elseif($month == 'September'){$monthFigure = 9;}
               elseif($month == 'October'){$monthFigure = 10;}
               elseif($month == 'November'){$monthFigure = 11;}
               elseif($month == 'December'){$monthFigure = 12;}
            

              
                                    
								   
     $SQL2 = mysqli_query($mysqli, "UPDATE  monthly_static_figures SET monthFigure = '$monthFigure' WHERE id=$id");
            
            
          
            
           
                                    
    }	


									
?>     

                                



