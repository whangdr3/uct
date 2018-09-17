<?php
$serverName = "WHANGDRE\SQLUCTSERVER"; //serverName\instanceName
$connectionInfo = array( "Database"=>"uct", "UID"=>"sa", "PWD"=>"azalp1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     // echo "Connection established.<br />";
	
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>