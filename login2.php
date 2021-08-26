<?php
session_start();
    include('connectionpdo.php');


    if(isset($_POST['nameu']) AND isset($_POST['emailu']) AND isset($_POST['role']) AND isset($_POST['passwordu'])){
        $name  =$_POST['nameu'];
        $email  =$_POST['emailu']; 
        $role  =$_POST['role'];  
        $password =$_POST['passwordu']; 
        extract($_POST);

        if(empty($name)){      
            $errorMsg[]="please enter username"; //check name textbox not empty or null
        }
        elseif(empty($email)){
            $errorMsg[]="please enter email"; //check email textbox not empty or null
        }
        elseif(empty($role)){
            $errorMsg[]="please select role"; //check select option not empty or null
        }
        elseif(empty($password)){
            $errorMsg[]="please enter password"; //check passowrd textbox not empty or null
        }
        elseif($name AND $email AND $role AND $password){
            $req="SELECT * FROM Users WHERE username='$name' AND emailuser='$email' AND typeuser='$role' AND passworduser='$password' limit 1"; //sql select query
            $res = $db->query($req)->fetch();
            if(sizeof($res)>=1){
                $_SESSION['user_name'] = $res['username'];
                $_SESSION['email'] = $res['emailuser'];
                $_SESSION['role'] = $res['typeuser'];
                if($res['typeuser'] == "Administrator") //check condition admin login not direct back to index.php page
                    header("Location: articles.php"); 
                else
                echo '<h1 class="text-danger">Wrong email or password or role. Try Again!!</h1>';
                
                if($res['typeuser'] == "Seller") //check condition admin login not direct back to index.php page
                header("Location: receipt2.php"); 
                else
                echo "";
            
            }
            else echo 'user not found!!';
        }
    }
     
    
?>