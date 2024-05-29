<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods, Content-Type,X-Requested-With,Authorization');
include('db.php');




$data = Json_decode(file_get_contents("php://input"), true);

$name = $data['sname'];
$age  = $data['sage'];
$city = $data['scity'];
$sql  = "INSERT INTO students (Name,Age,City)VALUES('$name','$age','$city')";


if(mysqli_query($db,$sql)){

    echo Json_encode(array('message' => 'Data Inserted Succesfully' , 'status' => true));

}else{
    echo Json_encode(array('message' => 'Data Not Inserted' , 'status' => false));
}
