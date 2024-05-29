<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');




$data = Json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];
include('db.php');

$sql = "SELECT * FROM Students WHERE Id = '$student_id'";

$query = mysqli_query($db,$sql) or die("mysqli Error");

if(mysqli_num_rows($query) > 0){
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo Json_encode($output);

}else{
    echo Json_encode(array('message' => 'No Record Found.' , 'status' => false));
}
