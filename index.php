<?php 

$username = "root";
$servername ="127.0.0.1";
$password = "";
$dbname = inscription;

$conn = new mysqli($servername , $username , $password , $dbname);

if($conn->connect_error){
    die("erreur de connexion :" . $conn->connect_error);
}else{
    echo "connexion reussie";
} 
?>