<?php 
 $base = mysqli_connect('localhost', 'root', '', 'stock_management');
//  echo"<ol><li>";
//  if (mysqli_connect_errno($base))
//      echo"Failed to connect to $base: ".mysqli_connect_error()." </li>";
//  else 
//      echo"<p>Connected to the DB sucessful!!</p></li>";
 
// Get search term 
//$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database
$req = "SELECT * FROM article ORDER BY name_art ASC";
$result = mysqli_query($base,$req); 

// Generate array with articles data 
//$datas = mysqli_fetch_all($result);
while ($row=mysqli_fetch_array($result)) 
{
 $data[] = $row['name_art'].'|'.$row['quantity_art'].'|'.$row['price_art'];
//  $data2[] = $row['quantity_art'];
//  $data3[] = $row['price_art'];
}
//if(isset($_GET['term']))
 
// Return results as json encoded array 
//echo json_encode(array('data' => $data,'data2' => $data2,'data3' => $data3));
echo json_encode($data);
// echo json_encode($data);
// echo json_encode($data2);
// echo json_encode($data3);

// if(isset($_POST['name_art'])){
//     $json = array();
//     $id =  trim($_POST['name_art']);
//     $query = "SELECT quantity_art, price_art FROM article WHERE idarticle = idarticle";
//     $statement = $base->prepare($query);
//     $statement->bind_param('s', $id);
//     $statement->execute();
//     $statement->bind_result($nquantity_art, $nprice_art);
//     while ($statement->fetch()){
//     $name_art=array('quantity_art'=>$nquantity_art,'price_art'=>$nprice_art);
//         array_push($json,$name_art);
//     }
//     echo json_encode($json, true);

//     }
?>