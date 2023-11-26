<?php
//Router

//get request
$request_uri =$_SERVER['REQUEST_URI'];
// berdasarkan request uri, kita tentukan halaman yang akan ditampilkan
$views_dir = 'pages/';


switch ($request_uri) {
    //Default
    case '':
    case '/':
        require __DIR__ . '/pages/index.html';
        break;
    case '/rule':
        require __DIR__ . '/pages/rule.html';
        break;
    case '/challenges':
        require __DIR__ . '/pages/challenges.html';
        break;
    case '/login':
        require __DIR__ . '/pages/login.html';
        break;
    case '/con':
        require __DIR__ . '/koneksi/koneksi.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.html';
        break;
}


?>