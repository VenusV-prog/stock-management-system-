<?php
$db_host="localhost"; //localhost server 
$db_user="root"; //database username
$db_password=""; //database password   
$db_name="stock_management"; //database name

try
{
 $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //if($db) echo"connected to stock_management database succesfully!!";
 //else echo "failed to connect";
}
catch(PDOEXCEPTION $e)
{
 $e->getMessage();
}

?>