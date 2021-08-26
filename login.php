<?php
require_once 'connectionpdo.php';

session_start();

if(isset($_SESSION["admin_login"])) //check condition admin login not direct back to index.php page
{
 header("Location: articles.php"); 
}
if(isset($_SESSION["seller_login"])) //check condition employee login not direct back to index.php page
{
 header("Location: receipt2.php"); 
}

if(isset($_REQUEST['btn_login'])) //login button name is "btn_login" and set this
{
    $name  =$_REQUEST["nameu"];
    $email  =$_REQUEST["emailu"]; //textbox name "txt_email"
    $role  =$_REQUEST["roleu"];  //select option name "txt_role"
    $password =$_REQUEST["passwordu"]; //textbox name "txt_password"
  
 if(empty($name)){      
  $errorMsg[]="please enter username"; //check email textbox not empty or null
 }
 else if(empty($email)){
    $errorMsg[]="please enter email"; //check passowrd textbox not empty or null
   }
 else if(empty($role)){
  $errorMsg[]="please select role"; //check select option not empty or null
 }
 else if(empty($password)){
    $errorMsg[]="please enter password"; //check passowrd textbox not empty or null
   }
 else if($name AND $email AND $role AND $password)
 {
  try
  {
   $select_stmt=$db->prepare("SELECT username,emailuser,typeuser,passworduser FROM Users
    WHERE
    username=:uusername AND emailuser=:uemailuser AND typeuser=:utypeuser AND passworduser=:upassword"); //sql select query
   $select_stmt->bindParam(":uusername",$name);
   $select_stmt->bindParam(":uemailuser",$email); //bind all parameter
   $select_stmt->bindParam(":utypeuser",$role);
   $select_stmt->bindParam(":upassword",$password);
   $select_stmt->execute(); //execute query
     
   while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)) //fetch record from MySQL database
   {
    $dbname =$row["username"];
    $dbemail =$row["emailuser"];
    $dbrole  =$row["typeuser"];
    $dbpassword =$row["passworduser"];  //fetchable record store new variable they are "$dbemail","$dbpassword","$dbrole"
    
   }
   if($name!=null AND $email!=null AND $role!=null AND $password!=null) //check taken fields not null after countinue
   {
        if($select_stmt->rowCount()>0) //check row greater than "0" after continue
        {
            if($name==$dbname AND $email==$dbemail AND $role==$dbrole AND $password==$dbpassword) //check type textbox email,password,role and fetchable record new variables are true after continue
            {
                include('articles.php');
                // switch($dbrole)  //role base user login start
                // {
                //     case "Administrator":
                //         $_SESSION["admin_login"]=$email;   //session name is "admin_login" and store in "$email" variable
                //         $loginMsg="Admin... Successfully Login..."; //admin login success message
                //         header("refresh:3; url=articles.php"); //refresh 3 second after redirect to "articles.php" page
                //         break;
                        
                //     case "Seller":
                //         $_SESSION["seller_login"]=$email;    //session name is "employee_login" and store in "$email" variable
                //         $loginMsg="Seller... Successfully Login...";  //employee login success message
                //         header("refresh:3;receipt2.php"); //refresh 3 second after redirect to "employee_home.php" page
                //         break;
        
        
                //         default:
                //             $errorMsg[]="wrong email or password or role";
                // }
            }
     else
     {
      $errorMsg[]="wrong email or password or role";
     }
    }
    else
    {
     $errorMsg[]="wrong email or password or role";
    }
   }
   else
   {
    $errorMsg[]="wrong email or password or role";
   }
  }
  catch(PDOException $e)
  {
   $e->getMessage();
  }  
 }
 else
 {
  $errorMsg[]="wrong email or password or role";
 }
}
?>