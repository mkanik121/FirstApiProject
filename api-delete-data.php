<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods, Content-Type,X-Requested-With,Authorization');
include('db.php');




$data = Json_decode(file_get_contents("php://input"), true);

$sid  = $data['sid'];

$sql  = "DELETE FROM students WHERE Id = '$sid'";


if(mysqli_query($db,$sql)){

    echo Json_encode(array('message' => 'Data Deleted Succesfully' , 'status' => true));

}else{
    echo Json_encode(array('message' => 'Data Not Deleted' , 'status' => false));
}
