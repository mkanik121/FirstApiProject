<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');




// $data = Json_decode(file_get_contents("php://input"), true);

// $name  = $data['name'];

// $sql  = "SELECT * FROM students WHERE Name LIKE '%{$name}%'";

$searchValue  = isset($_GET['search']) ? $_GET['search'] : die();
include('db.php');

$sql = "SELECT * FROM students WHERE Name LIKE '%{$searchValue}%'";
$query = mysqli_query($db,$sql) or die("mysqli Error");


if(mysqli_num_rows($query) > 0){
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo Json_encode($output);

}else{
    echo Json_encode(array('message' => 'Data Not Deleted' , 'status' => false));
}
