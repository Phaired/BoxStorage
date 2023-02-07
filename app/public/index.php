<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request)
{
    case '/' :
        require '../src/views/home.php';
        break;
    case '/login' :
        require '../src/views/login.php';
        break;
    default:
        http_response_code(404);
        require '../src/views/404.php';
        break;
}