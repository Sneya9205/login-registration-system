<?php
echo "Received ". $_REQUEST["name"];
$servername="localhost";
$username="root";
$password="";
$dbname="guvi";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql="INSERT INTO user (name,email,password)VALUES(?,?,?)";
if($query=$conn->prepare($sql)){
    $name=$_POST["name"];
    $mail=$_POST["email"];
    $pwd=$_POST["password"];
    $hash = password_hash($pwd, PASSWORD_BCRYPT);
    $query->bind_param("sss",$name,$mail,$hash);
    $query->execute();
    echo "User inserted successfully";
}
else{
    echo "Failed to insert". $conn->error();
}
$conn->close();
?>