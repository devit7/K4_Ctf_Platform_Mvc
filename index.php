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
        require __DIR__ . '/pages/index.php';
        break;
    /* case '/rule':
        require __DIR__ . '/pages/rule.php';
        break;
    case '/challenges':
        require __DIR__ . '/pages/challenges.php';
        break;
    case '/login':
        require __DIR__ . '/pages/login.php';
        break;
    case '/register':
        require __DIR__ . '/pages/register.php';
        break;
    case '/users':
        require __DIR__ . '/pages/users.php';
        break;
    case '/teams':
        require __DIR__ . '/pages/teams.php';
        break;
    case '/scoreboard':
        require __DIR__ . '/pages/scoreboard.php';
        break;
    case '/team_setting':
        require __DIR__ . '/pages/team_setting.php';
        break;
    case '/profile':
        require __DIR__ . '/pages/user_profile.php';
        break;
    case '/con':
        require __DIR__ . '/koneksi/koneksi.php';
        break;
    case '/team_register':
        require __DIR__ . '/pages/team_register.php';
        break; */
    /* default:
        http_response_code(404);
        require __DIR__ . '/pages/404.php';
        break; */
}
