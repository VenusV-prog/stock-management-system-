<?php
    include ('connectionpdo.php');
    include ('connection.php');
    session_start();
    if($_SESSION['role'] != "Administrator" and !isset($_SESSION['role']))
    header("Location: index.php");
   // include ('login2.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>listarticles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="vendor/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fonts/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-1.12.1/jquery-ui.min.css">
  
</head>

<body style="background-color: rgb(224, 225, 226);">
    <nav class="navbar navbar-expand-sm navbar-dark container-fluid d-flex justify-content-between" style="height:43px; background-color: rgb(40, 44, 21);">
        <!-- Brand -->
      <nav>
        <a class="navbar-brand" href="#" style="font-size: 15px;">Stock Management</a>
        <button id="btnside" class="btn btn-sm btnSideBar openbtn closebtn ml-5" type="button" style="background:none" aria-hidden="true"><i class="fa fa-list text-white font-weight-bold"style="font-size:20px;" aria-hidden="true"></i></button>
      </nav>
      
      <nav class="navbar navbar-expand-sm text-white"> 
        <?php echo 'Welcome '.$_SESSION['user_name'];?>
        <a class="nav-link text-white" href="#"><i class="fa fa-user mr-2" style="font-size:20px;" aria-hidden="true"></i></a>
        <a href="logout.php">Logout</a>
      </nav>
      
    </nav>
    
<div class="container-fluid">
    <div class="row">
    <div class="sidebar col-2 mt-2" id="div1" style="background-color: #1e2331;"><br>
        <h3 class="text-white">WELCOME</h3>
        <h3 class="text-white"><?php echo $_SESSION['user_name'];?></h3>
        <div id="accordion" >
            <div id="a0" class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseOne">
                        <div id="div0" class="d-flex justify-content-between m-2">
                            <span class="text-primary"><i class=""></i> Articles</span><i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="articles.php" class="text-dark">Articles</a> </li> 
                        <li class="list-group-item"><a href="addarticle.php" class="text-dark">Add Articles</a> </li> 
                        <li class="list-group-item"><a href="listarticles.php" class="text-dark"> list articles</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                
            <div id="a0"class="card">
                <div class="card-header">
                <a  class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                    <div id="div0" class="d-flex justify-content-between m-2">
                        <span ><i class=""></i> Sales</span><i class="fas fa-chevron-right"></i>
                    </div>
                </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="receipt2.php" class="text-dark"> Sale</a></li> 
                            <li class="list-group-item"><a href="listsales.php" class="text-dark"> Receipt</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="a0"class="card">
                    <div class="card-header">
                    <a  class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                        <div id="div0" class="d-flex justify-content-between m-2">
                            <span ><i class=""></i> Utilities</span><i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="listsellers.php" class="text-dark"> List all Sellers</a></li>
                                <li class="list-group-item"><a href="listsellers.php" class="text-dark"> Add a Seller</a></li> 
                            </ul>
                        </div>
                    </div>
				</div>
        </div>
    </div>





   <div class="col-md-10 col-sm-12 container-fluid pt-4 pl-2">
    <div class="row ml-3 no-gutters">
        <div class="col-12 shadow-lg p-2 " style="background-color: white;">
            <div class="text-right">
                <button class="btn btn-sm text-dark fermer"><i class="fa fa-chevron-down"></i></button>
                <button class="btn btn-sm text-dark"><i class="fa fa-times"></i></button>
            </div>
            <h2 class="text-center text-primary p-2">LIST OF USERS</h2><br>
            <div class="justify-content-end">
                <button type="button" data-target="#newseller" data-toggle="modal" class="btn btn-primary">ADD NEW SELLER</button>
            </div>
            <hr>
          
            
            <div class="modal" id="newseller">
                <center><br><br>
                    <form id="addform" action="listsellers.php" method="POST" class="col-5" style="background-color: rgb(224, 225, 226);"><br><br>
                        <h4 id="h3" class="bg-white"><i class="fas fa-plus"></i>&ensp;ADD NEW SELLER</h4><br><br>
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
                                <select name="role" id="" class="form-control" value="" required>
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
                        <button id="b1" type="submit" class="btn btn-danger text-white mb-4" data-dismiss="modal">Close</button>
                            <input id="b2"  class="btn btn-success mb-4" type="submit" name="summit" value="Register"> <!-- <a id="aa"  href=".php" class="text-white"> Connect</a> -->
                    </form>
                </center>
            </div>
            
            <?php
                if(isset($_POST['nameu']) AND isset($_POST['emailu']) AND isset($_POST['role']) AND isset($_POST['passwordu'])) //login button name is "btn_login" and set this
                {
                    $name  =$_POST["nameu"];
                    $email  =$_POST["emailu"]; 
                    $role  =$_POST["role"];  
                    $password =$_POST["passwordu"]; 
                    extract($_POST);

                    $req = "INSERT INTO Users(username,emailuser,typeuser,passworduser) VALUES ('$name','$email','$role', '$password')";
                    $res = $db->query($req);
                    if($res) echo "sucess!";
                    else echo "failed!";
                }
            ?>
            
            
            
            
            
            <div class="p-2 toggle">   
                </script>
                <table id="tableau1" class="tab display cell-border table table-striped container-fluid col-sm-12">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'stock_management');

                            if (isset($_GET['delete'])) {
                            $ID = $_GET['delete'];
                            $result=mysqli_query($mysqli,"DELETE FROM Users WHERE iduser =$ID"); //die($mysqli->error());

                            $_SESSION['message'] = "Record has been deleted";
                            $_SESSION['msg_type'] = "danger";
                            //header("location: client_database.php");
                            }
                        ?>

                        <!-- <?php //if(isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?//= $_SESSION['msg_type'] ?>">
                            <?php
                            // echo $_SESSION['message'];
                            // unset($_SESSION['message']);
                            ?> 
                        </div>
                        <?php //endif ?>  -->





                        <?php
                            $req = 'SELECT * from Users ORDER BY username ASC;';
                            $result = mysqli_query($base, $req);
                            //var_dump($result);
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                        <td><?php $i; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['emailuser']; ?></td>
                        <td><?php echo $data['typeuser']; ?></td>
                        <td><?php echo $data['passworduser']; ?></td>
                        <td class="" colspan="4">
                            <a href="updateseller.php?edit= <?php //echo $data['idarticle']; ?>" class="btn btn-info ml-3">Edit</a>
                        </td> 
                        <td>
                            <a href="listsellers.php?delete= <?php echo $data['iduser']; ?>" class="btn btn-danger ml-5">Delete</a>
                        </td>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

       </div>



</div>





    
	<script type="text/javascript" src="vendor/js/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/js/popper.min.js"></script>
	<script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/fonts/js/all.js"></script>
	<script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <script>
		$('.btnSideBar').click(function(){
		   $('.sidebar').toggle("slide",300);
		});
    </script>
 <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
 <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
 <script>
     $(document).ready(function () {
         $('.tab').DataTable();
     });</script>

<script>
    $('#addform').submit(function() {
    // submission stuff
    $('#newseller').modal('hide');
    return false;
    });
</script>
</body>
</html>