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
        <div class="container-chall " >
            <div class="vertical-text ">
                <h1>Challenges</h1>
            </div>
            <!-- Kategori -->
            <div class="kategori">
                <div >
                    <h1>Web Exploit</h1>
                </div>
                <div>
                    <h1>Crypto</h1>
                </div>
                <div>
                    <h1>Forensic</h1>
                </div>
                <div>
                    <h1>Reverse Engineering</h1>
                </div>
                <div>
                    <h1>Blockchain</h1>
                </div>
                <div>
                    <h1>Misc</h1>
                </div>
                <div>
                    <h1>Binary Exploit</h1>
                </div>
            </div>
            <!-- Darftar nama2 soal -->
            <div class="judul-soal ">
                <div class="soal-1">
                    <div class="judul">
                        <h1>My Head</h1>
                        <p>Easy</p>
                    </div>
                    <div class="point">
                        <h1>100pt</h1>
                    </div>
                </div>
                <div class="soal-1">
                    <div class="judul">
                        <h1>Git Git</h1>
                        <p>Medium</p>
                    </div>
                    <div class="point">
                        <h1>200pt</h1>
                    </div>
                </div>
            </div>
            <!-- Deskripsi -->
            <div class="deskripsi ">
                <div class="detail-des">
                    <div class="judul-des">
                        <h1>MY HEAD</h1>
                        <h1>[ 100pt ]</h1>
                    </div>
                    <div class="jk">
                        <h2>/ Web Exploit /</h2>
                        <h2>/ Easy /</h2>
                    </div>
                    <div class="desk-2">
                        <h2>Des :</h2>
                        <p>
                            Seseorang telah melakukan peretasan pada website ini, dan mengganti gambar pada halaman utama.
                            lakukan analisa pada gambar yang ada pada halaman utama, dan cari tahu siapa yang telah melakukan peretasan.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="atch">
                    <h2>Attachment :</h2>
                    <div class="atch-isi">
                        <a href="">- Download</a>
                        <a href="http://mpiie.my.id">- http://mpiie.my.id</a>
                    </div>
                </div>
                <hr>
                <!-- Flag Form -->
                <div class="flag">
                    <form name="form-flag" action="">
                        <h2>Flag </h2>
                        <input id="in-flag" name="flag" type="text" placeholder="K4CTF{admin}" >
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
            </div>
            <div id="link-myteam" class="Myteam">
                    <h1 >My Team</h1>
            </div>
        </div>
    </div>

    <script>
        let idpindah=document.getElementById('link-myteam');
    
        idpindah.addEventListener('click',()=>{
            window.location.href='./team_register.php'
        })
        
        
        function checkFlag(){
        console.log('t');
        let flag_form = document.forms['form-flag'];
        let newFrom = new FormData(flag_form);
        console.log(newFrom);
        let flag_key = newFrom.keys();
        for(let i of flag_key){
            let isi = newFrom.get(i);
            console.log('isis'+isi);
            if(isi.trim() ==''){
                alert('Wrong Flag !!');
            }else if (isi == 'K4CTF{admin}'){
                alert('Nice Solved !!');
            }else{
                alert('Wrong Flag !!');
            }
        }
    }

    </script>
</body>
</html>