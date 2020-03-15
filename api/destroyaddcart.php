<?php 
require 'database.php';
$response = array();
$sql = "TRUNCATE table addcart";
if(mysqli_query($con, $sql)){
    $response = array( 
        "status"=>1 
      );
} else {
    $response = array( 
        "status"=>0 
      );  
}
echo json_encode($response);
?>