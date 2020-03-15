<?php 
require 'database.php';
$response = array();
$postdata = file_get_contents("php://input");
$readproduct="";
$response = array();
$cartList = [];
$qty=0;
$totamt=0;
$countcart=0;
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);
    $addProdid = mysqli_real_escape_string($con, trim($request->addProdid));
    $addProdprice=mysqli_real_escape_string($con, trim($request->addProdprice));
    $sql = "INSERT INTO `addcart`(`addedprod`,`price`) VALUES ('{$addProdid}','{$addProdprice}')";
    if(mysqli_query($con,$sql))
    {
    
        $countcart="SELECT * FROM addcart where `addedprod`='{$addProdid}'";
        $count_res=mysqli_query($con, $countcart);
        $countcart=mysqli_num_rows($count_res);
        $upsql="UPDATE product set totalcarts='$countcart' where id='$addProdid'"; 
          $upresult=mysqli_query($con,$upsql);
          $cartsql = "SELECT * FROM addcart";
          
        //   if($upresult = mysqli_query($con,$upsql)){

        //   } //if($upresult = mysqli_query($con,$upsql)
          if($result = mysqli_query($con,$cartsql)){
            $i=0;
            while($row = mysqli_fetch_assoc($result)){
                $cartList[$i]['id']    = $row['id'];
                $cartList[$i]['addedprod'] = $row['addedprod'];
                $cartList[$i]['price'] = $row['price'];
                $i++;
                $totamt+=$row['price'];
            } //while($row = mysqli_fetch_assoc($result)){
                $qty=$i; 
                $response = array( 
                    "totqty"=>$i,
                    "totamt"=>$totamt,
                    "message"=> "Product Adding to the cart" 
                  );
                //echo json_encode($cartList);
          } else {
            $response = array( 
                "totqty"=>0,
                "totamt"=>0,
                "message"=> "Error!.Try again." 
              );
        } //if($result = mysqli_query($con,$cartsql)
    } // if(mysqli_query($con,$sql))

} //if(isset($postdata) && !empty($postdata
echo json_encode($response);
?>