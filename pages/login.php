<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <!-- Navbar -->
    <?php
    include '../component/navbar.php';
    ?>
    <!-- Content -->
    <div class="content-utama">
        <div class="form-login">
            <!-- Form login -->
            <form name="form-login" method="POST" action="../controller/controller_login.php">
                <h2>/ FORM LOGIN /</h2>
                <hr>
                <br>
                <div>
                    <label for="">Username</label>
                    <input id="username" name="username" type="text" value="" placeholder="username">
                </div>
                <br>
                <div>
                    <label for="">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password">
                </div>
                <br>
                <br>
                <hr>
                <br>
                <button id="login" type="submit" class="login">Login</button>
            </form>
            <a href="./register.php"><button class="regis">Register</button></a>
        </div>
        <!-- Modals Crerate Teams -->
        <div id="modal-join" class="main-modal">
            <div class="modal-helper">
                <div class="modal-content">
                    <div class="modal-header">
                        <img class="img-failed" src="https://iili.io/JTtz0Xt.png" alt="">
                    </div>
                    <div class="modal-body">
                        <h1>Login Failed</h1>
                        <br>
                        <span>Invalid Username or Password</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="bt-cancel" id="close-modal-join">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->
    </div>
    <script type="text/javascript" src="../js/login.js"></script>
    <script>
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
            history.replaceState({}, document.title, url.href);//untuk menghilangkan status di url
        }
    });
    </script>
    <!-- 
    
    <script>
        
        let form = document.forms['form-login'];
        
        function login(){
            let username = document.getElementById('username');
            let password = document.getElementById('password');
            if( username.value == '' && password.value == '' ){
                alert('data anda kosong');
            }else if( username.value == 'admin' && password.value == 'admin'){
                alert(`hallo ${username.value}`);
                document.location.href = './challenges.html';
            }else if(username.value.trim()=='' && password.value.trim()=='' ){
                alert('Harap Isi Form Login !!');
            }else if(password.value.trim()==''){
                alert('Password Kosong');
            }else if(username.value.trim()==''){
                alert('Username Kosong');
            }else{
                alert('Password atau Username Salah !!');
            }

            //Ngeluarin Isi Nya :] 
            let dataForm = new FormData(document.forms[0]);

            let isinya = [...dataForm.entries()];
            console.log(isinya);

            for(let i=0; i<isinya.length;i++){
                console.log(isinya[i][0]+' : '+isinya[0][i]);
            }
            //bisa memakai
            for(let keyname of dataForm.keys()){
                
                let value =dataForm.get(keyname);

                console.log(`Data keyname = ${keyname} | Value = ${value}`)
            } 
        }

        //form.addEventListener('submit',login);
        let logins =document.getElementById('login'); 
        logins.addEventListener('click',login)
    </script> -->
</body>

</html>