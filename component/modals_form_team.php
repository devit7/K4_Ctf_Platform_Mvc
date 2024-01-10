

<div id="modal-add-main" class="modal-add-user">
        <div class="modal-helper1">
            <div class="main-kontent">
                <form id="form-register" name="form-register" method="POST" action="../controller/controller_admin_team.php">
                    <div  class="judul">
                        <h1 id="modal-title">/ FORM ADD TEAM /</h1>
                    </div>
                    <br>
                    <hr>
                    <div class="kotak-form">
                        <div class="kotak-kiri">
                            <div>
                                <label for="">Nama Team</label>
                                <input id="nama_team" name="nama_team"  type="text">
                            </div>
                            <div>
                                <label for="">Password Team</label>
                                <input id="pass_team" name="pass_team"  type="password">
                            </div>
                        </div>
                        <div class="kotak-kanan">
                            <div>
                                <label for="">Afiliasi</label>
                                <input id="afiliasi" name="afiliasi"  type="text">
                            </div>
                            <div>
                                <label for="">Website</label>
                                <input id="website" name="website"  type="text">
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



