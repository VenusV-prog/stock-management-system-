<?php
    include ('connection.php');

    session_start();
    if($_SESSION['role'] != "Administrator" and !isset($_SESSION['role']))
    header("Location: index.php");
   // include ('login2.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>add page</title>
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
    <link rel="stylesheet" type="text/css" href="vendor/jquery-ui-themes-1.12.1/themes/flick/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href=""> 
</head>

<body style="background-color: rgb(224, 225, 226);">





    <nav class="navbar navbar-expand-sm navbar-dark container-fluid d-flex justify-content-between" style="height:43px; background-color: rgb(40, 44, 21);">
        <!-- Brand -->
      <nav>
        <a class="navbar-brand" href="#" style="font-size: 15px;">Stock Management</a>
        <button id="btnside" class="btn btn-sm btnSideBa openbtn closebtn ml-5" type="button" style="background:none" aria-hidden="true"><i class="fa fa-list text-white font-weight-bold"style="font-size:20px;" aria-hidden="true"></i></button>
      </nav>
      
      <nav class="navbar navbar-expand-sm text-white"> 
        <?php echo 'Welcome '.$_SESSION['user_name'];?>
        <a class="nav-link text-white" href="#"><i class="fa fa-user mr-2" style="font-size:20px;" aria-hidden="true"></i></a>
        <a href="logout.php">Logout</a>
      </nav>
      
    </nav>
    

<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-2 mt-2" id="div1" style="background-color: #1e2331; height: 700px;"><br>
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

        <div class="col-sm-10 container">

            <div class="row mt-3 img-responsive">
                <!--<div class="col-md-6">
                    <img src="stock_images/Stock1.png" alt="" style="height: 600px; width: auto;">
                </div> -->
                
                        <div class="col-md-3">
                        
                            <div class="card mb-4 box-shadow shadow-lg round color" style="height: 200px; width: 150px;">
                                    
                                <div class="card-body">
                                    <div class="text-center mt-5">
                                        <div>
                                            <button type="button" class="text-white btn btn-primary" data-toggle="modal" data-target="#mymodal">Add a new article</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow shadow-lg round color" style="height: 200px; width: 150px;">
                                
                                <div class="card-body">
                                    <div class="text-center mt-5">
                                        <div>
                                            <a class="text-dark" href="listarticles.php">Display list of articles</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                        <div class="col-md-3">
                        
                            <div class="card mb-4 box-shadow shadow-lg round color" style="height: 200px; width: 150px;">
                                
                                <div class="card-body">
                                    <div class="text-center mt-5">
                                        <div>
                                            <a class="text-dark" href="receipt2.php">Display receipts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-3">
                            <div class="card mb-4 box-shadow shadow-lg round color" style="height: 200px; width: 150px;">
                                
                                <div class="card-body">
                                    <div class="text-center mt-5">
                                        <div>
                                            <a class="text-dark" href="listsales.php">Dispay complete transaction</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

        <div class="modal" id="mymodal">
        <center><br><br>
            <form action="articles.php" method="POST" class="col-5" style="background-color: rgb(224, 225, 226);"><br><br>
                <h4 id="h3" class="bg-white"><i class="fas fa-plus"></i>&ensp;ADD AN ARTICLE</h4><br><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" id="" placeholder="Enter article name" name="namea"  class=" form-control" required>
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the quantity" name="quantity"  class="col-12 form-control" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the price" name="price"  class="col-12 form-control" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="date" id="" placeholder="Enter the expiry date" name="datea"  class="col-12 form-control" required><br>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger text-white mb-4" data-dismiss="modal">Close</button>
                <input  class="btn btn-success mb-4" type="submit" name="submit" value="register"><a id="aa"  href="#" class="text-white"></a>
            </form>
        </center> 


        <?php
       if (isset($_POST['namea']) and isset($_POST['quantity']) and isset($_POST['price']) and isset($_POST['datea']) ) {
           extract($_POST);
        
            $sql= "insert into article (name_art, quantity_art, price_art, expirydate)
               values('$namea', '$quantity','$price', '$datea')";
               $res = mysqli_query($base, $sql);
               //var_dump($res);
                if($res){
                echo"<h4>Article registered sucessfully!!</h4>";
               }
               else{
               echo"<h4>Add failed try again!! </h4>";
            }
        }
                
    ?>
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
		$("#btnside").click(function(){
		   $("#div1").toggle("slide",300);
		});
    </script>
</body>
</html>