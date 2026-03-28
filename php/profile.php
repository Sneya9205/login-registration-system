<?php
header('Content-Type: application/json');

require '../vendor/autoload.php';
error_log("PHP loaded");

$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->guvi->profiles;

$fullname = $_POST["fullname"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$age = $_POST["age"];

$token = $_POST["token"];
try {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    error_log("Redis connected");
} catch (Exception $e) {
    error_log("Redis error: " . $e->getMessage());
}

$user_id = $redis->get("session_$token");
error_log($user_id);
if ($user_id) {

    $document = [

        "user_id" => (int)$user_id,
        "fullname" => $fullname,
        "phone" => $phone,
        "address" => $address,
        "age" => (int)$age

    ];

    $collection->insertOne($document);

    echo json_encode(["status" => "success","message" => "Profile Saved"]);
exit;

} else {

    echo json_encode(["status" => "Invalid","message" => "Profile Not Saved"]);


}

?>