<?php

// phpinfo();
// var_dump(getenv('PHP_ENV'), $_SERVER, $_REQUEST);

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? "GET";
$requestPath = $_SERVER['REQUEST_URI'] ?? '/';


function redirectForeverTo($path)
{
    header("Location: {$path}", $replace = true, $code = 301);
    exit;
}


// if ($requestMethod === "GET" and $requestPath === '/') {
//     echo "<h1>HELLO</h1>HELLO WORLD";
// } else if ($requestPath === '/old') {
//     redirectForeverTo('/');
// } else {
//     // echo "404 not found";
//     include(__DIR__ . '\includes\404.php');
// }


$routes = [
    "GET" => [
        '/' => fn () => print "test"
    ],

    "POST" => [],
    "PATCH" => [],
    "PUT" => [],
    "DELETE" => [],
    "HEAD" => [],
    "404" => fn () => include(__DIR__ . "/includes/404.php"),
    "400" => fn () => include(__DIR__ . "/includes/404.php")
];


$paths = array_merge(
    array_keys($routes['GET']),
    array_keys($routes['POST']),
    array_keys($routes['PATCH']),
    array_keys($routes['DELETE']),
    array_keys($routes['HEAD']),
    array_keys($routes['404']),
    array_keys($routes['400']),
);
