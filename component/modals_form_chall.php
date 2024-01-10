<div id="modal-add-main" class="modal-add-user">
    <div class="modal-helper1">
        <div class="main-kontent">
            <form id="form-register" name="form-register" method="POST" action="../controller/controller_admin_chall.php">
                <div class="judul">
                    <h1 id="modal-title">/ FORM ADD CHALL /</h1>
                </div>
                <br>
                <hr>
                <div class="kotak-form">
                    <div class="kotak-kiri">
                        <div>
                            <label for="">Nama Chall</label>
                            <input id="nama_chall" name="nama_chall" type="text">
                        </div>
                        <div>
                            <label for="">Provinsi</label>
                            <select id="level" name="level">
                                <option value=""> Pilih Level </option>
                                <option>Easy</option>
                                <option>Medium</option>
                                <option>Hard</option>
                            </select>
                        </div>
                        <div>
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="40" rows="6"></textarea>
                        </div>
                    </div>
                    
                    <div class="kotak-kanan">
                        <div>
                            <label for="">Category</label>
                                <?php include_once '../model/chall.php';
                                $chall = new challs();
                                $data = $chall->getAllCategory();
                                ?>
                                <select id="category_id" name="category_id">
                                    <option value=""> Pilih Category </option>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?php echo $row['category_id'] ?>"><?php echo $row['nama_category'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        <div>
                                <label for="">Attachment</label>
                                <input id="attch" name="attch"  type="text">
                         </div>
                        <div>
                                <label for="">Point</label>
                                <input id="point" name="point"  type="number">
                        </div>
                            
                        <div>
                                <label for="">Flag</label>
                                <input id="flag" name="flag"  type="text">
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