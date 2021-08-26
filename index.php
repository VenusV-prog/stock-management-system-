<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="p1p2.css">
<body>
	
    <div class="container">
        <div class="row" style="height: 100px;">
            
        </div>
        <center><br><br>
            <form id="form1" action="login2.php" method="POST" class="col-5" style="background-color: rgb(224, 225, 226);"><br><br>
                <h4 id="h3" class="bg-white"><i class="fas fa-user"></i>&ensp;Login</h4><br><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" id="name" placeholder="Enter Username" name="nameu" required class=" form-control">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" id="" placeholder="Enter Email" name="emailu" required class=" form-control">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="select-wrap col-md-12">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="role" id="" class="form-control" value="">
                            <option value="active">Select role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Seller">Seller</option>
                        </select>
                    </div>
                </div><br>
                <div class="form-group was-validated">
                    <div class="col-md-12">
                        <input type="password" id="pwd" placeholder="Enter Password" name="passwordu" required class="col-12 form-control"><br><br>
                    </div>
                </div>
                <button id="b1" type="submit" class="btn btn-danger text-white mb-4">Cancel</button>
                    <input id="b2"  class="btn btn-success mb-4" type="submit" name="summit" value="Login"> <!-- <a id="aa"  href=".php" class="text-white"> Connect</a> -->
            </form>
        </center> 
    </div>

<?php
//     if(isset($_POST['nameu']) AND isset($_POST['emailu']) AND isset($_POST['roleu']) AND isset($_POST['passwordu'])) //login button name is "btn_login" and set this
// {
//     $name  =$_POST["nameu"];
//     $email  =$_POST["emailu"]; 
//     $role  =$_POST["roleu"];  
//     $password =$_POST["passwordu"]; 
//     extract($_POST);

//     $req = "INSERT INTO Users(username,emailuser,typeuser,passworduser) VALUES ('$name','$email','$role', '$password')";
//     $res = $db->query($req);
//     if($res) echo"sucess!";
//     else echo"failed!";
// }
?>

	<script type="text/javascript" src="vendor/js/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/js/popper.min.js"></script>
	<script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/fonts/js/all.js"></script>
	<script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
</body>
</html>