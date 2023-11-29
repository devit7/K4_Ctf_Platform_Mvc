<?php

require('../koneksi/koneksi.php');

class Users
{

    private $id_user;
    private $nama;
    private $provinsi;
    private $kampus;
    private $email;
    private $username;
    private $password;
    private $koneksi;

    public function __construct($id_user, $nama, $provinsi, $kampus, $email, $username, $password)
    {
        $this->koneksi = new connect();
        $this->id_user = $id_user;
        $this->nama = $nama;
        $this->provinsi = $provinsi;
        $this->kampus = $kampus;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }
    public function get_Iduser()
    {
        return $this->id_user;
    }
    public function getterNama()
    {
        return $this->nama;
    }
    public function getProvinsi()
    {
        return $this->provinsi;
    }
    public function getKampus()
    {
        return $this->kampus;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }

    function setIduser($id_user)
    {
        $this->id_user = $id_user;
    }
    function setterNama($nama)
    {
        $this->nama = $nama;
    }
    function setProvinsi($provinsi)
    {
        $this->provinsi = $provinsi;
    }
    function setKampus($kampus)
    {
        $this->kampus = $kampus;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }
    function setUsername($username)
    {
        $this->username = $username;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }


    function simpanDB()
    {

        try {
            $sql = "INSERT INTO users (id, user_id, nama, provinsi, kampus, email, username, password) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $statement = $stmt->execute([NULL,$this->id_user = time(), $this->nama, $this->provinsi, $this->kampus, $this->email, $this->username, $this->password]);
            //echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
}



if (isset($_POST['submit'])) {
    $user = new Users(2, $_POST['nama'], $_POST['provinsi'], $_POST['kampus'], $_POST['email'], $_POST['username'], $_POST['password']);
    $user->simpanDB();
    echo "berhasil";
} else {
    echo "gagal";
}
