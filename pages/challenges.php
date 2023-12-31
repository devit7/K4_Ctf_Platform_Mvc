<?php
include('../component/check_sesion.php');
require_once '../model/chall.php';
session_chall();

$chall = new Challs();
if(!isset($_GET['category'])){ 
    $dataFirst = $chall->getFirstCategoryAndChall();
    if($dataFirst){
        header('Location: ./challenges.php?category='.$dataFirst[0]['nama_category'].'&soal='.$dataFirst[0]['chall_id']);
    }else{
        header('Location: ./challenges.php?status=belum tersedia');
    }
}
//categoryhelper
if(isset($_GET['category']) && !isset($_GET['soal'])){//jika ada category tapi tidak ada soal
    $dataCategoryHelper = $chall->getCategoryHelper($_GET['category']);
    if($dataCategoryHelper){
        header('Location: ./challenges.php?category='.$dataCategoryHelper[0]['nama_category'].'&soal='.$dataCategoryHelper[0]['chall_id']);
    }else{
        header('Location: ./challenges.php?status=belum tersedia');
    }
}

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
        include_once '../component/navbar.php';
        ?>
        <!-- Content -->
        <div class="container-chall ">
            <div class="vertical-text ">
                <h1>Challenges</h1>
            </div>
            <!-- Kategori -->
            <div class="kategori">
                <?php
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
                        <?php
                        if (isset($_GET['soal'])) {
                            $id_soal = $_GET['soal'];
                        } 
                        require_once '../model/teams.php';
                        $team = new Teams();
                        $team_id=$team->listTeamByUser($_SESSION['id_user']);
                        $dataSoal=$chall->isChallSolved($id_soal,$team_id[0]['team_id']);
                        if ($dataSoal) {
                        ?>
                        <div class="solved-flag">
                            <p> Solved At <?=$dataSoal[0]['date_solve']?>  </p>
                        </div>
                        <?php
                        } else {
                        ?>
                        <form name="form-flag" method="POST" action="../controller/controller_check_flag.php">
                            <h2>Flag </h2>
                            <input type="hidden" name="id_chall" value="<?= isset($_GET['soal']) ? $_GET['soal']:'' ?>">
                            <input id="in-flag" name="flag" type="text" placeholder="K4CTF{admin}">
                            <button id="btn-flag" type="submit">submit</button>
                        </form>
                        <?php
                        }
                        ?>

                    </div>
                    <hr>
                    <!-- Solve Team -->
                    <div class="solper">
                        <h2>Solved By :</h2>
                        <div class="solved">
                            <?php
                            if (isset($_GET['soal'])) {
                                $id_soal = $_GET['soal'];
                            }
                            $dataSolved = $chall->getSolveByChallId($id_soal);
                            foreach ($dataSolved as $solved) :
                            ?>
                            <div>
                                <h4>> Team [ <?= $solved['nama_team'] ?> ] at <?=$solved['date_solve']?></h4>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div id="link-myteam" class="Myteam">
                <h1>My Team</h1>
            </div>
        </div>
        <?php
        include '../component/modals.php';
        if (isset($_GET['status'])) {
            $pesan = htmlspecialchars($_GET['status'],ENT_QUOTES,'UTF-8');// sanitized input wkwkw
            createModal('Register Failed', $pesan);
        }
        ?>
    </div>

    <script>
        let idpindah = document.getElementById('link-myteam');

        idpindah.addEventListener('click', () => {
            window.location.href = './team_register.php'
        })
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
        //get query url
        let url = new URL(window.location.href);
        let status = url.searchParams.get('status');

        let close_modal_join = document.getElementById('close-modal-join');
        let modal_join = document.getElementById('modal-join');

        if (status === 'gagal') {
            modal_join.style.display = 'flex';
        }

        close_modal_join.addEventListener('click', () => {
            modal_join.style.display = 'none';
            if (status === 'gagal') {
                url.searchParams.delete('status');
                history.replaceState({}, document.title, url.href); //untuk menghilangkan status di url
            }
        });
    </script>
</body>

</html>