<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/navbar.css">
</head>

<body>
    <div class="">
        <!-- Navbar -->
        <nav class="navbar ">
            <a href="../pages/index.php" class="logo">
                <img src="https://iili.io/J27Kips.png" alt="">
                <span class="">K4-CTF</span>
            </a>

            <ul class="nav-clean ">
                <li><a href="../pages/rule.php">Rule</a></li>
                <li><a href="../pages/users.php">Users</a></li>
                <li><a href="../pages/teams.php">Teams</a></li>
                <li><a href="../pages/scoreboard.php">Scoreboard</a></li>
                <li><a href="../pages/challenges.php">Challenges</a></li>
            </ul>

            <?php if (isset($_SESSION['id_user'])) : ?>
                <div class="nav-log">
                    <a class="us" href="../pages/user_profile.php"><span>Hello <?= $_SESSION['id_user'] ?></span>
                    </a>
                    <div class="login-button">
                        <a href="../controller/controller_logout.php">
                            <span>Logout &rarr;</span>
                        </a>
                    </div>
                </div>
            <?php else : ?>
                <div class="login-button">
                    <a href="../pages/login.php">
                        <span>Login &rarr;</span>
                    </a>
                </div>
            <?php endif; ?>
        </nav>
    </div>
</body>

</html>