<!-- <?php

/* use function PHPSTORM_META\type;

function modals_add_user($title, $id_user, $type)
{   
    if($type == 'edit'){
        require_once '../model/users.php';
        $users = new Users();
        $dataUser = $users->getById($id_user);
            $id_user = $dataUser[0]['user_id'];
            $nama = $dataUser[0]['nama'];
            $provinsi = $dataUser[0]['provinsi'];
            $kampus = $dataUser[0]['kampus'];
            $email = $dataUser[0]['email'];
            $username = $dataUser[0]['username'];
            $password = $dataUser[0]['password'];
            $role = $dataUser[0]['role'];
    }
 */
?> -->

    <div id="modal-add-main" class="modal-add-user">
        <div class="modal-helper">
            <div class="main-kontent">
                <form id="form-register" name="form-register" method="POST" action="../controller/controller_register.php">
                    <div  class="judul">
                        <h1 id="modal-title">/ FORM ADD USER /</h1>
                    </div>
                    <br>
                    <hr>
                    <div class="kotak-form">
                        <div class="kotak-kiri">
                            <div>
                                <label for="">Nama</label>
                                <input id="nama" name="nama"  type="text">
                            </div>
                            <div>
                                <label for="">Provinsi</label>
                                <select id="provinsi" name="provinsi">
                                    <option value=""> Pilih Provinsi </option>
                                    <option>Jawa Timur</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                </select>
                            </div>
                            <div>
                                <label for="">Kampus</label>
                                <input id="kampus" name="kampus"  type="text">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input id="email" name="email"  type="email">
                            </div>
                        </div>
                        <div class="kotak-kanan">
                            <div>
                                <label for="">Username</label>
                                <input id="username" name="username"  type="text">
                            </div>
                            <div>
                                <label for="">Password</label>
                                <input id="password" name="password"  type="password">
                            </div>
                            <div>
                                <label for="">Role</label>
                                <select id="role" name="role">
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
                    <button type="submit" name="add" class="bt-reg">Submit</button>
                </form>
                <button id="modal-add-close" type="button" class="bt-close">Close</button>
            </div>
        </div>
    </div>

