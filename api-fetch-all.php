



<?php
header('Content-Type: application/Json');
header('Access-Control-Allow-Origin: *');
include('db.php');

$sql = "SELECT * FROM Students";

$query = mysqli_query($db,$sql) or die("mysqli Error");

if(mysqli_num_rows($query) > 0){
    $output = mysqli_fetch_all($query, MYSQLI_ASSOC);
    echo Json_encode($output);

}else{
    echo Json_encode(array('message' => 'No Record Found.' , 'status' => false));
}