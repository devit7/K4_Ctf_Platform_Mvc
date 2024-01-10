<?php

require_once('../koneksi/koneksi.php');

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

    public function createData($role)
    {
        try {
            $sql1 = "SELECT username,email FROM users  ";
            $stmt1 = $this->koneksi->conn->query($sql1);
            $dataUsername = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dataUsername as $d) :
                if ($this->username === $d['username']) {
                    $pesan['pesan'] = 'Username Alredy Exists';
                    return $pesan;
                }
                if ($this->email === $d['email']) {
                    $pesan['pesan'] = 'Email Alredy Exists';
                    return $pesan;
                }
            endforeach;

            $sql = "INSERT INTO users (id, user_id, nama, provinsi, kampus, email, username, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $statement = $stmt->execute([NULL, $this->id_user, $this->nama, $this->provinsi, $this->kampus, $this->email, $this->username, $this->password, $role]);
            return True;
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
        $stmt->execute([$id]);
        $dataUserId = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUserId;
    }

    public function update($id, $nama, $provinsi, $kampus, $email)
    {
        try {
            $sql = 'UPDATE users SET nama=?, provinsi=?, kampus=?, email=? WHERE user_id= ?';
            $stmt = $this->koneksi->conn->prepare($sql);
            $query = [$nama, $provinsi, $kampus, $email, $id];
            if ($stmt->execute($query)) {
                echo 'Berhasil';
            } else {
                echo 'gagal';
            }
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function updateAdmin($id, $nama, $provinsi, $kampus, $email, $username, $password, $role)
    {
        try {
            $sql1 = "SELECT * FROM users WHERE user_id != ?  ";
            $stmt1 = $this->koneksi->conn->prepare($sql1);
            $stmt1->execute([$id]);
            $dataUsername = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dataUsername as $d) :
                if ($this->username === $d['username']) {
                    $pesan['pesan'] = 'Username Alredy Exists';
                    return $pesan;
                }
                if ($this->email === $d['email']) {
                    $pesan['pesan'] = 'Email Alredy Exists';
                    return $pesan;
                }
            endforeach;
            
            $sql = 'UPDATE users SET nama=?, provinsi=?, kampus=?, email=?, username=?, password=?, role=? WHERE user_id= ?';
            $stmt = $this->koneksi->conn->prepare($sql);
            $query = [$nama, $provinsi, $kampus, $email, $username, $password, $role, $id];
            if ($stmt->execute($query)) {
                $pesan['pesan'] = 'Berhasil';
                return $pesan;
            } else {
                $pesan['pesan'] = 'Gagal';
                return $pesan;
            }
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function updateNewPassword($id_user, $newPassword)
    {
        try {
            $sql = 'UPDATE users SET password=? WHERE user_id= ?';
            $stmt = $this->koneksi->conn->prepare($sql);
            $query = [$this->password, $this->id_user];
            if ($stmt->execute($query)) {
                echo 'Berhasil';
            } else {
                echo 'gagal';
            }
        } catch (PDOException $e) {
            echo $sql . '<br>' . $e->getMessage();
        }
    }


    public function deleteByid($id)
    {
        try {
            $sql = 'DELETE FROM users WHERE user_id = ?';
            $stmt = $this->koneksi->conn->prepare($sql);
    
            // Bind parameter
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
    
            // Execute statement
            if ($stmt->execute()) {
                $pesan['status'] = 'Berhasil';
                return $pesan;
            } else {
                $pesan['status'] = 'Gagal';
                return $pesan;
            }
        } catch (PDOException $e) {
            // Tangani eksepsi jika terjadi kesalahan SQL
            $pesan['status'] = 'Gagal Terhapus: ' . $e->getMessage();
            return $pesan;
        }
    }
    

    public function checkHaveATeam($id)
    {
        $sql = 'SELECT * FROM user_team WHERE user_id=? AND team_id IS NOT NULL';
        $stmt = $this->koneksi->conn->prepare($sql);
        $stmt->execute([$id]);
        $dataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUser;
    }

    public function authenticate($username, $password)
    {
        $sql = 'SELECT * FROM users WHERE username=? AND password=?';
        $stmt = $this->koneksi->conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $dataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUser;
    }

    public function totalUser()
    {
        $sql = "SELECT COUNT(*) AS total_user FROM users";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function searchUser($search)
    {
        $sql = "SELECT * FROM users WHERE nama LIKE '%$search%' OR provinsi LIKE '%$search%' OR kampus LIKE '%$search%' OR email LIKE '%$search%' OR username LIKE '%$search%' OR password LIKE '%$search%' OR role LIKE '%$search%'";
        $stmt = $this->koneksi->conn->query($sql);
        $dataUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataUser;
    }
   
}
