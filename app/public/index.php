<?php
$request = $_SERVER['REQUEST_URI'];
$authorized_pages = ["/", "/login", "/catalog", "/controllers/loginController.php"];
if(in_array($request, $authorized_pages)) {
    switch ($request)
    {
        case '/' :
            require '../src/views/home.php';
            break;
        case '/login' :
            require '../src/views/login.php';
            break;
        case "/catalog" :
            require "../src/views/catalog.php";
            break;
        case "/controllers/loginController.php":
            require "../src/controllers/loginController.php";
            break;
        default:
            http_response_code(404);
            require '../src/views/404.php';
            break;
    }
}
else {
    http_response_code(404);
    require '../src/views/404.php';
}