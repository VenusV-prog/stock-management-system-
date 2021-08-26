<?php
    include ('connection.php')
?>

<!DOCTYPE html>
<html>
<head>
	<title>add article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	
    <div class="container">
        <div class="row" style="height: 50px;">
            
        </div>
        <center><br><br>
            <form action="addarticle.php" method="POST" class="col-5" style="background-color: rgb(224, 225, 226);"><br><br>
                <h4 id="h3" class="bg-white"><i class="fas fa-plus"></i>&ensp;ADD AN ARTICLE</h4><br><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" id="" placeholder="Enter article name" name="namea"  class=" form-control">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the quantity" name="quantity"  class="col-12 form-control"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the price" name="price"  class="col-12 form-control"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="date" id="" placeholder="Enter the expiry date" name="datea"  class="col-12 form-control"><br>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger text-white mb-4">Cancel</button>
                <input  class="btn btn-success mb-4" type="submit" name="submit" value="register"><a id="aa"  href="#" class="text-white"></a>
            </form>
        </center> 
    </div>

    <?php
       if (isset($_POST['namea']) and isset($_POST['quantity']) and isset($_POST['price']) and isset($_POST['datea']) ) {
           extract($_POST);
        
            $sql= "insert into article (name_art, quantity_art, price_art, expirydate)
               values('$namea', '$quantity','$price', '$datea')";
               $res = mysqli_query($base, $sql);
               var_dump($res);
                if($res){
                echo"<h4>Article registered sucessfully!!</h4>";
               }
               else{
               echo"<h4>Add failed try again!! </h4>";
            }
        }
                
    ?>

    <?php
       // $bd = new PDO("mysql:host=localhost;dbname=stock_management","root","");
      //  extract($_POST);
      //  if (isset($_POST['namea']) and isset($_POST['quantity']) and isset($_POST['price']) and isset($_POST['datea']) ){
         //   $req = "insert into article (name_art, quantity_art, price_art, expirydate) values ('$namea', '$quantity','$price', '$datea')";
          //  $res = $bd->query($req);
          //  if($res) echo "Article registered sucessfully!!";
          //  else echo "Add failed try again!! ";
       // }
       // $bd = null;
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