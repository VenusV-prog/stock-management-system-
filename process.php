<?php
    require_once "connection.php";

    header('Content-type: application/json; charset=utf-8');

    if(isset($_POST['one'])){
    $json = array();
    $id =  trim($_POST['one']);
    $query = "SELECT quantity_art, price_art FROM article WHERE idarticle = idarticle";
    $statement = $databaseConnection->prepare($query);
    $statement->bind_param('s', $id);
    $statement->execute();
    $statement->bind_result($nquantity_art, $nprice_art);
    while ($statement->fetch()){
    $name_art=array('quantity_art'=>$nquantity_art,'price_art'=>$nprice_art);
        array_push($json,$user);
    }
    echo json_encode($json, true);

    }
 ?>