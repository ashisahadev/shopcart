<?php 
require 'database.php';
$response = array();
$postdata = file_get_contents("php://input");
$delproduct="";
$qty=0;
$totamt=0;
$response = array();
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    $delProdid = mysqli_real_escape_string($con, trim($request->delProdid));
    $sql = "DELETE FROM `addcart` WHERE `addedprod` ='{$delProdid}' LIMIT 1";
    if(mysqli_query($con, $sql)){
        $countcart="SELECT * FROM addcart where `addedprod`='{$delProdid}'";
        $count_res=mysqli_query($con, $countcart);
        $countcart=mysqli_num_rows($count_res);
        $upsql="UPDATE product set totalcarts='$countcart' where id='$delProdid'"; 
          $upresult=mysqli_query($con,$upsql);
        $cartsql = "SELECT * FROM addcart";
        if($result = mysqli_query($con,$cartsql)){
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $cartList[$i]['id']    = $row['id'];
                $cartList[$i]['addedprod'] = $row['addedprod'];
                $cartList[$i]['price'] = $row['price'];
                $i++;
                $totamt+=$row['price'];
            } //while($row = mysqli_fetch_assoc($result
            $qty=$i;
            $response = array( 
                "totqty"=>$i,
                "totamt"=>$totamt,
                "message"=> "Product deleted from the cart",
                "status"=>1 
              );
        } 

    } //if(mysqli_query($con, $sql)){
     else {
        $response = array( 
            
            "message"=> "Error!.Product is not deleted.",
            "status"=>0 
          );
    }
} //if(isset($postdata) && !empty($postdata))
echo json_encode($response);
?>