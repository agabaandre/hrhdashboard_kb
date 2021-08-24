
<?php 
$backupdir = "/var/HRH_bkp";
$db_user = 'ihris_manage';
$db_pass = 'managi123';
$database ='information_schema';

$ignore_list = array('old_distance','municipal_manage','moh_manage','mohattendance','mohattdemo','manage','ihris_ims','covid','demo_chwr','dhishrisanalysis','dutyrosterdemo','DES_demo', 'information_schema','phpmyadmin','performance_schema', 'mysql','demo_manage','train_demo');

//$ignore_list = array( 'central_moh_referral');

$suffix = date('Y-m-d');

$db = mysqli_connect( 'localhost', $db_user, $db_pass, $database );
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$dbs = mysqli_query($db, "SELECT schema_name FROM schemata where schema_name NOT IN ( '" . implode( "','", $ignore_list ) . "' )" );
$backups = array();
while( $data = mysqli_fetch_assoc($dbs) ) {
    $backups[] = $data['schema_name'];
}

mysqli_free_result($dbs);

foreach( $backups as $backup_db ) {

    $use_dir = $backupdir . "/" . $backup_db;
    if ( !is_dir( $use_dir ) ) {
        mkdir( $use_dir );
    }       
    $result = mysqli_query($db,"SELECT table_name FROM tables WHERE table_schema = '$backup_db' AND table_name not like 'hippo_%' AND table_name not like 'zebra_%'" ) ;
  

    $tables = array();
    while ( $data = mysqli_fetch_assoc( $result ) ) {
        $tables[] = $data['table_name'];
    }       
    mysqli_free_result( $result );
    echo "Backing up $backup_db...\n";
    exec( "mysqldump -u $db_user --password=$db_pass $backup_db " . implode( " ", $tables ) . " > $use_dir/backup_${backup_db}_$suffix.sql" );
    exec( "bzip2 $use_dir/backup_${backup_db}_$suffix.sql" );

}

mysql_close($db);
exec( "find $backupdir -type f -mtime +7 -not -name \"*-01.sql.bz2\" -print -exec rm {} \;" );

?>




