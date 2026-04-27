<?php
$servername = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'clients_management';

$conn = mysqli_connect($servername, $user, $pass, $dbname);

if($conn){
    echo 'connected';
}else{
    echo 'not connected';
}
?>