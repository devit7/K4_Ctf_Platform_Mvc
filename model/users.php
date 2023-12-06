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

    public function __construct($id_user = null, $nama = null, $provinsi = null, $kampus = null, $email = null, $username = null, $password = null)
    {
        $this->koneksi = new connect();
        if ($id_user != null && $nama != null && $provinsi != null && $kampus != null && $email != null && $username != null && $password != null) {
            $this->id_user = $id_user;
            $this->nama = $nama;
            $this->provinsi = $provinsi;
            $this->kampus = $kampus;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
        }
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


    public function createData()
    {
        try {
            $sql = "INSERT INTO users (id, user_id, nama, provinsi, kampus, email, username, password, team_id, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $statement = $stmt->execute([NULL, $this->id_user, $this->nama, $this->provinsi, $this->kampus, $this->email, $this->username, $this->password, null, 'free']);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM users';
        $stmt = $this->koneksi->conn->query($sql);
        $dataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUser;
    }

    public function getByid($id)
    {
        $sql = 'SELECT * FROM users WHERE user_id=?';
        $stmt = $this->koneksi->conn->prepare($sql);
        $stmt->execute([ $id ]);
        $dataUserId = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUserId;
    }

    public function update($id, $nama,$provinsi,$kampus,$email ){
        try{
        $sql = 'UPDATE users SET nama=?, provinsi=?, kampus=?, email=? WHERE user_id= ?';
        $stmt = $this->koneksi->conn->prepare($sql);
        $query=[$nama,$provinsi,$kampus,$email,$id];
        if($stmt->execute($query)){
            echo'Berhasil';
        }else{
            echo 'gagal';
        }
        }catch (PDOException $e) {
            echo $sql . '<br>'. $e->getMessage();
        }
    }

    public function deleteByid($id)
    {
        $sql = 'DELETE FROM users WHEN user_id=:id';
        $stmt = $this->koneksi->conn->query($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // check status

        if ($stmt->execute()) {
            $pesan['status'] = 'Berhasil Terhapus';
            return $pesan;
        } else {
            $pesan['status'] = 'gagal terhapus';
            return $pesan;
        }
    }

    public function authenticate($username, $password){
        $sql = 'SELECT * FROM users WHERE username=? AND password=?';
        $stmt = $this->koneksi->conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $dataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUser;
    }
}
