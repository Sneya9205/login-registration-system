<?php

if (!class_exists('Redis')) {
    echo "Redis extension NOT installed";
    exit;
}

try {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    echo "Connected to Redis<br>";

    // Test ping
    echo "Ping: " . $redis->ping() . "<br>";

    // Set value
    $redis->set("test_key", "Hello Redis");

    // Get value
    echo "Value: " . $redis->get("test_key");

} catch (Exception $e) {
    echo "Redis Error: " . $e->getMessage();
}
?>