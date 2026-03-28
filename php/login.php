<?php
header('Content-Type: application/json');
error_log("PHP loaded");
$redis=new Redis();
$redis->connect('localhost',6379);
$redis_status = $redis->ping();
error_log("Redis status: " . $redis_status);
$servername="localhost";
$username="root";
$dbpassword="";
$dbname="guvi";
$conn=mysqli_connect($servername,$username,$dbpassword,$dbname);
if (!$conn) {
echo json_encode([
    "message" => "DB connection failed",
    "token" => "",
    "redis" => $redis_status
]);
exit;}
$email=$_POST["email"];
$password=$_POST["password"];
error_log($email);
error_log($password);
$sql="SELECT * FROM user WHERE email=?";
if ($query=$conn->prepare($sql)){
    $query->bind_param("s",$email);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    if($row){
        $user_id = $row["id"];
        $stored_pwd = $row["password"];
        if(password_verify($password,$stored_pwd)){
            $token = bin2hex(random_bytes(32));
            $redis->setex("session_$token",3600,$user_id);
            
        echo json_encode([
            "message" => "User Verified!",
            "token" => $token,
            "redis" => $redis_status
        ]);
        }
        else{
            echo json_encode(["message"=>"User Not Logged in!", "token"=>"","redis" => $redis_status]);

        }
    }else{
        echo json_encode(["message"=>"User Not Logged in!,Row not found", "token"=>"","redis" => $redis_status]);
    }
}
else{
    echo json_encode(["message"=>"Cannot query!", "token"=>"","redis" => $redis_status]);
 
}
?>