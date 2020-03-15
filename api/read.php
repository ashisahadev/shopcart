<?php 
require 'database.php';
$shopList = [];

$sql = "SELECT * FROM product order by id desc";

if($result = mysqli_query($con,$sql)){
    $i=0;
    while($row = mysqli_fetch_assoc($result)){
        $shopList[$i]['id']    = $row['id'];
        $shopList[$i]['bname'] = $row['bname'];
        $shopList[$i]['pname'] = $row['pname'];
        $shopList[$i]['quantity'] = $row['quantity'];
        $shopList[$i]['price'] = $row['price'];
        $shopList[$i]['mrf'] = $row['mrf'];
        $shopList[$i]['imageurl'] = $row['imageurl'];
        $shopList[$i]['offertext'] = $row['offertext'];
        $shopList[$i]['totalcarts'] = $row['totalcarts'];
       
        $i++;
    }
    echo json_encode($shopList);
} else {
    http_response_code(404);
}
?>