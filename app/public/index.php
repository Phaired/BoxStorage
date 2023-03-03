<?php
require '../src/router/Router.php';

$router = new Router();

$router->map('GET', '/', function() {
    require dirname(__DIR__).'/src/views/home.php';
});

$router->map('POST', '/catalogController.php', function() {
    require dirname(__DIR__).'/src/controllers/catalogController.php';
});


$router->map('GET', '/login', function() {
    require dirname(__DIR__).'/src/views/login.php';
});


$router->map('GET', '/signup', function() {
    require dirname(__DIR__) . '/src/views/signup.php';
});

$router->map('GET','/logout', function () {
    require dirname(__DIR__).'/src/controllers/logoutController.php';
});

$router->map('POST','/controllers/signupController.php', function () {
    require dirname(__DIR__).'/src/controllers/signupController.php';
});

$router->map('POST','/controllers/loginController.php', function () {
    require dirname(__DIR__).'/src/controllers/loginController.php';
});

$router->map('GET', '/catalog', function() {
    require dirname(__DIR__).'/src/views/catalog.php';
});

$router->map('GET', '/admin', function() {
    require dirname(__DIR__).'/src/views/admin.php';
});

$router->map('POST', '/admin', function() {
    require dirname(__DIR__).'/src/views/admin.php';
});

$match = $router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    require dirname(__DIR__).'/src/views/404.php';
}