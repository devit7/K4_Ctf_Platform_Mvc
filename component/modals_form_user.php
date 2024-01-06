<?php

function modals_add_user($title,  $type)
{
    if($type == 'edit'){
        $nama = $_POST['nama'];
        $provinsi = $_POST['provinsi'];
        $kampus = $_POST['kampus'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $id_user = $_POST['id_user'];
    }

    echo '<div id="modal-add-main" class="modal-add-user">
        <div class="modal-helper">
            <div class="main-kontent">
                <form name="form-register" method="POST" action="../controller/controller_register.php">
                    <div class="judul">
                        <h1>/ FORM '.$title.' USER /</h1>
                    </div>
                    <br>
                    <hr>
                    <div class="kotak-form">
                        <div class="kotak-kiri">
                            <div>
                                <label for="">Nama</label>
                                <input name="nama" type="text">
                            </div>
                            <div>
                                <label for="">Provinsi</label>
                                <select name="provinsi">
                                    <option value=""> Pilih Provinsi </option>
                                    <option>Jawa Timur</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                </select>
                            </div>
                            <div>
                                <label for="">Kampus</label>
                                <input name="kampus" type="text">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input name="email" type="email">
                            </div>
                        </div>
                        <div class="kotak-kanan">
                            <div>
                                <label for="">Username</label>
                                <input name="username" type="text">
                            </div>
                            <div>
                                <label for="">Password</label>
                                <input name="password" type="password">
                            </div>
                            <div>
                                <label for="">Role</label>
                                <select name="role">
                                    <option value=""> Pilih Role </option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <button type="submit" name="submit" class="bt-reg">Submit</button>
                </form>
                <button id="modal-add-close" type="button" class="bt-close">Close</button>
            </div>
        </div>
    </div>'; 


}
