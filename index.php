<?php


$requestMethod  = $_SERVER['REQUEST_METHOD'] ?? "GET";
$requestPath    = $_SERVER['REQUEST_URI'] ?? '/';


echo "REQUEST_METHOD: $requestMethod, REQUEST_URI: $requestPath";

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
);


if (isset($routes[$requestMethod], $routes[$requestMethod][$requestPath])) {

    $routes[$requestMethod][$requestPath]();
} else if (in_array($requestPath, $paths)) {
    // the path is defined, but not for this request method;
    // so we show a 400 error (which means "Bad Request")
    $routes['400']();
} else {
    // the path isn't allowed for any request method
    // which probably means they tried a url that the
    // application doesn't support
    $routes['404']();
}
