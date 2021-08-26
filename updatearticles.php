<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'stock_management');
    $ID = 0;
    $update = false;
    $namea = '';
    $quantity = '';
    $price = '';
    $datea = '';

?>

<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?> 
    </div>
    <?php endif ?> 


<?php  
    if(isset($_GET['edit'])){
    $ID = $_GET['edit'];
    $update = true;
    $result= mysqli_query($mysqli," SELECT * FROM article WHERE idarticle =$ID"); //die($mysqli->error());
        if($result!= null){
            $row= $result-> fetch_array();
            $ID= $row['idarticle'];
            $namea= $row['name_art'];
            $quantity= $row['quantity_art'];
            $price= $row['price_art'];
            $datea= $row['expirydate'];
        }
    }

    if(isset($_POST['update'])){
        $idarticle= $_POST['id'];
        $name_art= $_POST['namea'];
        $quantity_art= $_POST['quantity'];
        $price_art= $_POST['price'];
        $expirydate= $_POST['datea'];

        $mysqli->query("UPDATE articles SET name_art = '$name_art', quantity_art = '$quantity_art', price_art = '$price_art', expirydate = '$expirydate'  WHERE idarticle =$ID");

        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
        header("location: updatearticles.php");
    }
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
            <form action="updatearticles.php" method="POST" class="col-5" style="background-color: rgb(224, 225, 226);"><br><br>
                <h4 id="h3" class="bg-white"><i class="fas fa-plus"></i>&ensp;ADD AN ARTICLE</h4><br><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" id="" placeholder="Enter article name" name="namea"  class=" form-control" value="<?php echo $namea?>">
                    </div>
                </div><br>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the quantity" name="quantity"  class="col-12 form-control" value="<?php echo $quantity ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="" id="" placeholder="Enter the price" name="price"  class="col-12 form-control" value="<?php echo $price ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="date" id="" placeholder="Enter the expiry date" name="datea"  class="col-12 form-control" value="<?php echo $datea ?>"><br>
                    </div>
                </div>
                <div class="form-group">
                    <?php if($update == true): ?>
                        <input type="submit" value="Update" class="btn btn-primary mr-5" style="height: 40px;" name="update">
                    <?php else: ?>
                    <input  class="btn btn-success mb-4" type="submit" name="submit" value="register"><a id="aa"  href="#" class="text-white"></a>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-danger text-white mb-4">Cancel</button>
                </div>
            </form>
        </center> 
    </div>


	<script type="text/javascript" src="vendor/js/jquery.min.js"></script>
	<script type="text/javascript" src="vendor/js/popper.min.js"></script>
	<script type="text/javascript" src="vendor/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/fonts/js/all.js"></script>
	<script type="text/javascript" src="vendor/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="vendor/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>
</body>
</html>