

    <div id="modal-add-main" class="modal-add-user">
        <div class="modal-helper1">
            <div class="main-kontent">
                <form id="form-register" name="form-register" method="POST" action="../controller/controller_admin_user.php">
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
                    <input id="id-submit" type="submit"  name="type" value="Add"  class="bt-reg">
                </form>
                <button id="modal-add-close" type="button" class="bt-close">Close</button>
            </div>
        </div>
    </div>



