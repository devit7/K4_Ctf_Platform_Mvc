<?php
//Router

//get request
$request_uri = $_SERVER['REQUEST_URI'];
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
    case '/register':
        require __DIR__ . '/pages/register.html';
        break;
    case '/users':
        require __DIR__ . '/pages/users.html';
        break;
    case '/teams':
        require __DIR__ . '/pages/teams.html';
        break;
    case '/scoreboard':
        require __DIR__ . '/pages/scoreboard.html';
        break;
    case '/con':
        require __DIR__ . '/koneksi/koneksi.php';
        break;
    case '/team_register':
        require __DIR__ . '/pages/team_register.html';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/pages/404.html';
        break;
}
