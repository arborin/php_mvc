<?php

// phpinfo();
// var_dump(getenv('PHP_ENV'), $_SERVER, $_REQUEST);

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? "GET";
$requestPath = $_SERVER['REQUEST_URI'] ?? '/';



if ($requestMethod === "GET" and $requestPath === '/') {
    echo "<h1>HELLO</h1>HELLO WORLD";
} else {
    // echo "404 not found";
    echo (__DIR__ . '/includes/404.php');
}
