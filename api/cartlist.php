<?php 
require 'database.php';
$response = array();
$cartsql = "SELECT * FROM addcart";
$qty=0;
$totamt=0;
if($result = mysqli_query($con,$cartsql)){
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        // $cartList[$i]['id']    = $row['id'];
        //         $cartList[$i]['addedprod'] = $row['addedprod'];
        //         $cartList[$i]['price'] = $row['price'];
                $i++;
                $totamt+=$row['price'];
    }
    $qty=$i; //while($row = mysqli_fetch_assoc
    $response = array( 
        "totqty"=>$i,
        "totamt"=>$totamt,
        
      );
} else {
    $response = array( 
        "totqty"=>0,
        "totamt"=>0,
        
      );  
}//if($result = mysqli_query($con,$cartsql
echo json_encode($response);
?>