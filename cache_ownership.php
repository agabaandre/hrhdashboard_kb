<?php
 include('connect.php');

	$sql1 = mysqli_query($mysqli,"UPDATE national_jobs SET ownership='Public' WHERE institution_type IN ('National Referral Hospital, Central Government','Specialised Facility, Central Government','Ministry, Central Government','Regional Referral Hospital, Central Government','District, Local Government (LG)','UBTS, Central Government','City, Local Government (LG)','Municipality, Local Government (LG)')");


	$sql1 = mysqli_query($mysqli,"UPDATE national_jobs SET ownership='Private' WHERE institution_type LIKE 'UCBHCA, Private for Profit (PFPs)'");


	$sql1 = mysqli_query($mysqli,"UPDATE national_jobs SET ownership='PNFP' WHERE institution_type IN ('UCMB, Private not for Profit (PNFPs)', 'UPMB, Private not for Profit (PNFPs)','UMMB, Private not for Profit (PNFPs)','UOMB, Private not for Profit (PNFPs)','Civil Society Organisations (CSO)')");


	$sql1 = mysqli_query($mysqli,"UPDATE national_jobs SET ownership='Prison' WHERE institution_type IN ('Uganda Prison Services, Security Forces')");


	$sql1 = mysqli_query($mysqli,"UPDATE national_jobs SET ownership='Police' WHERE institution_type IN ('Uganda Police, Security Forces')");


?>
