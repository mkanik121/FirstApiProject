<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods, Content-Type,X-Requested-With,Authorization');
include('db.php');




$data = Json_decode(file_get_contents("php://input"), true);

$sid  = $data['sid'];
$name = $data['sname'];
$age  = $data['sage'];
$city = $data['scity'];
$sql  = "UPDATE students SET Name='$name',Age='$age',City='$city' WHERE Id = '$sid'";


if(mysqli_query($db,$sql)){

    echo Json_encode(array('message' => 'Data Updated Succesfully' , 'status' => true));

}else{
    echo Json_encode(array('message' => 'Data Not Updated' , 'status' => false));
}
