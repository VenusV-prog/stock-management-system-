<?php
    session_start();
    if($_SESSION['role'] != "Administrator" and !isset($_SESSION['role']))
    header("Location: index.php");
   // include ('login2.php')
?>
<?php
    include ('connection.php')
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
            <h2 class="text-center text-primary p-2">LIST OF ARTICLES</h2><br>
            <hr>
          
            <div class="p-2 toggle">   
               
                </script>
                <table id="tableau1" class="tab display cell-border table table-striped container-fluid col-sm-12">
                    <thead>
                        <tr>
                            <th># </th>
                            <th>Article Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Expiry date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            //session_start();
                            $mysqli = new mysqli('localhost', 'root', '', 'stock_management');

                            if (isset($_GET['delete'])) {
                            $ID = $_GET['delete'];
                            $result=mysqli_query($mysqli,"DELETE FROM article WHERE idarticle =$ID"); //die($mysqli->error());

                            $_SESSION['message'] = "Record has been deleted";
                            $_SESSION['msg_type'] = "danger";
                            //header("location: client_database.php");
                            }
                        ?>

                        <!-- <?php if(isset($_SESSION['message'])): ?>
                        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
                            <?php
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                            ?> 
                        </div>
                        <?php endif ?>  -->





                        <?php
                            $req = 'SELECT * from article ORDER BY name_art ASC;';
                            $result = mysqli_query($base, $req);
                            //var_dump($result);
                            $i = 1;
                            while ($data = mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                        <td><?php $i; ?></td>
                        <td><?php echo $data['name_art']; ?></td>
                        <td><?php echo $data['quantity_art']; ?></td>
                        <td><?php echo $data['price_art']; ?></td>
                        <td><?php echo $data['expirydate']; ?></td>
                        <td class="" colspan="4">
                            <a href="updatearticles.php?edit= <?php echo $data['idarticle']; ?>" class="btn btn-info ml-3">Edit</a>
                            <a href="listarticles.php?delete= <?php echo $data['idarticle']; ?>" class="btn btn-danger ml-5">Delete</a>
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
 <!-- <script type="text/javascript" src='DataTables/media/js/jquery.js'></script>
 <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script> -->
    <script>
        $(document).ready(function () {
            $('.tab').DataTable();
        });
    </script>
</body>
</html>