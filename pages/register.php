<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body>
    <!-- Navbar -->
    <?php
    include '../component/navbar.php';
    ?>
    <div class="kotak1">
        <!-- Content KOtak -->
           <div class="main-kontent">
            <form name="form-register" method="POST" action="../controller/controller_register.php">
                <div class="judul">
                    <h1>/ FORM REGISTER /</h1>
                </div>
                <br>
                <hr>
                <div class="kotak-form">
                        <div class="kotak-kiri">
                            <div>
                                <label for="">Nama</label>
                                <input name="nama" type="text" >
                            </div>
                            <div>
                                <label for="">Provinsi</label>
                                <select name="provinsi" >
                                    <option value=""> Pilih Provinsi </option>
                                    <option >Jawa Timur</option>
                                    <option >Jawa Barat</option>
                                    <option >Jawa Tengah</option>
                                </select>
                            </div>
                            <div>
                                <label  for="">Kampus</label>
                                <input name="kampus" type="text" >
                            </div>
                        </div>
                        <div class="kotak-kanan">
                            <div>
                                <label for="">Email</label>
                                <input name="email" type="email">
                            </div>
                            <div>
                                <label for="">Username</label>
                                <input name="username" type="text" >
                            </div>
                            <div>
                                <label for="">Password</label>
                                <input name="password" type="password" >
                            </div>
                        </div>
                </div>
                <br>
                <hr>
                <br>
                <button type="submit" name="submit" class="bt-reg">Submit</button>
            </form>
            <a href="./login.php"><button class="bt-log">Login</button>
            </a>
           </div>
    </div>
    <script type="text/javascript" src="../js/register.js"></script>
</body>
</html>