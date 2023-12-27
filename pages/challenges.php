<?php
include('../component/check_sesion.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challeges</title>
    <link rel="stylesheet" href="../css/challenges.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <div class="layar">
        <!-- Navbar -->
        <?php
        include '../component/navbar.php';
        ?>
        <!-- Content -->
        <div class="container-chall ">
            <div class="vertical-text ">
                <h1>Challenges</h1>
            </div>
            <!-- Kategori -->
            <div class="kategori">
                <?php
                require_once '../model/chall.php';
                $chall = new Challs();
                $dataCategory = $chall->getAllCategory();
                foreach ($dataCategory as $category) :
                $isActive = isset($_GET['category']) && $_GET['category'] == $category['nama_category'];
                ?>
                    <a href="?category=<?= $category['nama_category']; ?>">
                        <div class="kategori-1 <?php echo $isActive ? 'active' : ''; ?>">
                            <h1><?php echo $category['nama_category']; ?></h1>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <!-- Darftar nama2 soal -->
            <div class="judul-soal ">
                <?php
                if (isset($_GET['category'])) {
                    $name_category = $_GET['category'];
                } else {
                    $name_category = 'Web Exploit';
                }
                $dataChall = $chall->getSoalByCateName($name_category);
                foreach ($dataChall as $c) :
                ?>
                    <a href="?category=<?= isset($_GET['category']) ? $_GET['category'] : 'Web Exploit'; ?>&soal=<?= $c['chall_id']; ?>">
                        <div class="soal-1">
                            <div class="judul">
                                <h1><?= $c['nama_chall'] ?></h1>
                                <p><?= $c['level'] ?></p>
                            </div>
                            <div class="point">
                                <h1><?= $c['point'] ?></h1>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <!-- Deskripsi -->
            <div class="deskripsi ">
                <?php
                if (isset($_GET['soal'])) {
                    $id_soal = $_GET['soal'];
                } else {
                    $id_soal = '1234';
                }
                $dataSoal = $chall->getByIdSoal($id_soal);
                foreach ($dataSoal as $challData) :
                ?>
                    <div class="detail-des">
                        <div class="judul-des">
                            <h1><?=$challData['nama_chall']?></h1>
                            <h1>[ <?= $challData['point']?> ]</h1>
                        </div>
                        <div class="jk">
                            <h2>/ <?= $challData['nama_category'] ?> /</h2>
                            <h2>/ <?= $challData['level'] ?> /</h2>
                        </div>
                        <div class="desk-2">
                            <h2>Des :</h2>
                            <p>
                                <?= $challData['description'] ?>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="atch">
                        <h2>Attachment :</h2>
                        <div class="atch-isi">
                            <a href=""><?= $challData['attch'] ?></a>
                        </div>
                    </div>
                    <hr>
                    <!-- Flag Form -->
                    <div class="flag">
                        <form name="form-flag" action="">
                            <h2>Flag </h2>
                            <input id="in-flag" name="flag" type="text" placeholder="K4CTF{admin}">
                            <button id="btn-flag" onclick="checkFlag()" type="button">submit</button>
                        </form>

                    </div>
                    <hr>
                    <!-- Solve Team -->
                    <div class="solper">
                        <h2>Solved By :</h2>
                        <div class="solved">
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="solved-1">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="solved-1">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                            <div class="">
                                <h4>> Devit</h4>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="link-myteam" class="Myteam">
                <h1>My Team</h1>
            </div>
        </div>
    </div>

    <script>
        let idpindah = document.getElementById('link-myteam');

        idpindah.addEventListener('click', () => {
            window.location.href = './team_register.php'
        })


        function checkFlag() {
            console.log('t');
            let flag_form = document.forms['form-flag'];
            let newFrom = new FormData(flag_form);
            console.log(newFrom);
            let flag_key = newFrom.keys();
            for (let i of flag_key) {
                let isi = newFrom.get(i);
                console.log('isis' + isi);
                if (isi.trim() == '') {
                    alert('Wrong Flag !!');
                } else if (isi == 'K4CTF{admin}') {
                    alert('Nice Solved !!');
                } else {
                    alert('Wrong Flag !!');
                }
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            let categoryLinks = document.querySelectorAll('.kategori-1');

            categoryLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    categoryLinks.forEach(function (el) {
                        el.classList.remove('active');
                    });

                    this.classList.add('active');
                });
            });
        });
    </script>
    </script>
</body>

</html>