<?php 

 // Connects to your Database
 
$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_database_name='album';


 $connect = mysql_connect($mysql_host, $mysql_user, $mysql_password); 
 $select = mysql_select_db($mysql_database_name);
 
 if(!$connect||!$select)
 {
	die(mysql_error());
 }
 
 ?> 
