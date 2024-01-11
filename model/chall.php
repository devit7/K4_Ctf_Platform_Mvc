<?php
require_once('../koneksi/koneksi.php');

class Challs
{
    private $chall_id;
    private $nama_chall;
    private $level;
    private $deskripsi;
    private $attch;
    private $category;
    private $point;
    private $flag;
    private $koneksi;

    public function __construct($chall_id = null, $nama_chall = null, $level = null, $deskripsi = null, $attch = null, $category = null, $point = null, $flag = null)
    {
        $this->koneksi = new connect();
        if ($chall_id != null && $nama_chall != null && $level != null && $deskripsi != null && $attch != null && $category != null && $point != null && $flag != null) {
            $this->chall_id = $chall_id;
            $this->nama_chall = $nama_chall;
            $this->level = $level;
            $this->deskripsi = $deskripsi;
            $this->attch = $attch;
            $this->category = $category;
            $this->point = $point;
            $this->flag = $flag;
        }
    }

    public function getchall_id()
    {
        return $this->chall_id;
    }
    public function getnama_chall()
    {
        return $this->nama_chall;
    }
    public function getlevel()
    {
        return $this->level;
    }
    public function getdeskripsi()
    {
        return $this->deskripsi;
    }
    public function getattch()
    {
        return $this->attch;
    }
    public function getcategory()
    {
        return $this->category;
    }
    public function getpoint()
    {
        return $this->point;
    }
    public function getflag()
    {
        return $this->flag;
    }

    public function setchall_id($chall_id)
    {
        $this->chall_id = $chall_id;
    }
    public function setnama_chall($nama_chall)
    {
        $this->nama_chall = $nama_chall;
    }
    public function setlevel($level)
    {
        $this->level = $level;
    }
    public function setdeskripsi($deskripsi)
    {
        $this->deskripsi = $deskripsi;
    }
    public function setattch($attch)
    {
        $this->attch = $attch;
    }
    public function setcategory($category)
    {
        $this->category = $category;
    }
    public function setpoint($point)
    {
        $this->point = $point;
    }
    public function setflag($flag)
    {
        $this->flag = $flag;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM challs";
        $query = $this->koneksi->conn->query($sql);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function getAlldanCatego()
    {
        $sql = "SELECT * FROM chall JOIN categories ON chall.category_id = categories.category_id";
        $query = $this->koneksi->conn->query($sql);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }


    public function getSolveByChallId($id_chall)
    {
        $sql = "SELECT solves.*, teams.nama_team FROM solves JOIN teams ON solves.team_id = teams.team_id WHERE solves.chall_id = ? ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$id_chall]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function getFirstCategoryAndChall()
    {
        $sql = "SELECT chall.*, categories.nama_category FROM chall JOIN categories ON chall.category_id = categories.category_id LIMIT 1 ";
        $query = $this->koneksi->conn->query($sql);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        //jika data kosong
        if (count($dataChall) == 0) {
           return false;
        }
        return $dataChall;
    }

    public function getCategoryHelper($nama_category){
        $sql = "SELECT chall.*, categories.nama_category FROM chall JOIN categories ON chall.category_id = categories.category_id where nama_category=? LIMIT 1 ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$nama_category]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        //jika data kosong
        if (count($dataChall) == 0) {
           return false;
        }
        return $dataChall;
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM categories";
        $query = $this->koneksi->conn->query($sql);
        $dataCategory = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataCategory;
    }

    public function getSoalByCateName($category)
    {
        $sql = "SELECT chall.*, categories.nama_category FROM chall JOIN categories ON chall.category_id = categories.category_id WHERE categories.nama_category = ?";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$category]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function getByIdSoal($id)
    {
        $sql = "SELECT chall.*, categories.nama_category FROM chall JOIN categories ON chall.category_id = categories.category_id WHERE chall.chall_id = ?";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$id]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }
    public function createNewChall()
    {
        try {
            //check nama chall sudah ada
            $sql1 = "SELECT * FROM chall WHERE nama_chall = ?";
            $query = $this->koneksi->conn->prepare($sql1);
            $query->execute([$this->nama_chall]);
            $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
            if(count($dataChall) > 0){
                return false;
            }
            $sql = "INSERT INTO chall (chall_id, nama_chall, level, description, attch,  point, flag,category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $id_chall = uniqid();
           /*  echo $this->nama_chall.$this->level.$this->deskripsi.$this->attch.$this->point.$this->flag.$this->category;
            die(); */
            $stmt->execute([$id_chall, $this->nama_chall, $this->level, $this->deskripsi, $this->attch,  $this->point, $this->flag, $this->category]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function updateChallenge($id)
    {
        try {
            //check nama chall sudah ada
            $sql1 = "SELECT * FROM chall WHERE chall_id != ?";
            $query = $this->koneksi->conn->prepare($sql1);
            $query->execute([$id]);
            $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dataChall as $d) :
                if ($this->nama_chall === $d['nama_chall']) {
                    return false;
                }
            endforeach;

            $sql = "UPDATE chall SET nama_chall = ?, level = ?, description = ?, attch = ?, category_id = ?, point = ?, flag = ? WHERE chall_id = ?";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$this->nama_chall, $this->level, $this->deskripsi, $this->attch, $this->category, $this->point, $this->flag, $id]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteChallByid($id)
    {
        try {
            $sql = 'DELETE FROM challs WHERE chall_id = ?';
            $stmt = $this->koneksi->conn->prepare($sql);
    
            // Execute statement
            if ($stmt->execute([$id])) {
                return true;
            } else {
                $pesan['pesan'] = 'Gagal';
                return $pesan;
            }
        } catch (PDOException $e) {
            // Tangani eksepsi jika terjadi kesalahan SQL
            $pesan['pesan'] = 'Gagal Terhapus: ' . $e->getMessage();
            return $pesan;
        }
    }


    public function checkFlag($flag, $id_chall,$id_team)
    {
        $sql = "SELECT * FROM chall WHERE flag = ? AND chall_id = ?";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$flag, $id_chall]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($dataChall) > 0) {
            $sql1= "INSERT INTO solves (solve_id, team_id, chall_id,user_id,date_solve) VALUES (?,?,?,?,?)";
            $stmt1 = $this->koneksi->conn->prepare($sql1);
            $id_solve = time();
            $date = date("Y-m-d H:i:s");
            $iduser = $_SESSION['id_user'];
            $stmt1->execute([$id_solve,$id_team,$id_chall,$iduser,$date]);
            return true;
        } else {
            return false;
        }
    }

    public function isChallSolved($id_chall,$team_id)
    {
        $sql = "SELECT * FROM solves WHERE chall_id = ? AND team_id = ?";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$id_chall, $team_id]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($dataChall) > 0) {
            return $dataChall;
        } else {
            return false;
        }
    }


    public function totalCategory(){
        $sql = "SELECT COUNT(*) AS total_category FROM categories";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }


    public function totalChall(){
        $sql = "SELECT COUNT(*) AS total_chall FROM chall";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function searchChall($search){
        $sql = "SELECT chall.*, categories.nama_category FROM chall JOIN categories ON chall.category_id = categories.category_id WHERE chall.nama_chall LIKE '%$search%' OR chall.level LIKE '%$search%' OR chall.point LIKE '%$search%' OR categories.nama_category LIKE '%$search%' ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function searchCategory($search){
        $sql = "SELECT * FROM categories WHERE nama_category LIKE '%$search%' ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

//ADMIN CATEGORY
    public function createCategory($nama_category){
        try 
        {
            //check jika nama category sudah ada
            $sql = "SELECT * FROM categories WHERE nama_category = ?";
            $query = $this->koneksi->conn->prepare($sql);
            $query->execute([$nama_category]);
            $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
            if(count($dataChall) > 0){
                return false;
            }
            $sql = "INSERT INTO categories (category_id, nama_category) VALUES (?, ?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $id_category = uniqid();
            $stmt->execute([$id_category, $nama_category]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteCategoryByid($id)
    {
        try {
            $sql = 'DELETE FROM categories WHERE category_id = ?';
            $stmt = $this->koneksi->conn->prepare($sql);
    
            // Execute statement
            if ($stmt->execute([$id])) {
                return true;
            } else {
                $pesan['pesan'] = 'Gagal';
                return $pesan;
            }
        } catch (PDOException $e) {
            // Tangani eksepsi jika terjadi kesalahan SQL
            $pesan['pesan'] = 'Gagal Terhapus: ' . $e->getMessage();
            return $pesan;
        }
    }

    public function updateCategory($id,$nama_category){
        try {
            $sql = 'UPDATE categories SET nama_category = ? WHERE category_id = ?';
            $stmt = $this->koneksi->conn->prepare($sql);
    
            // Execute statement
            if ($stmt->execute([$nama_category,$id])) {
                return true;
            } else {
                $pesan['pesan'] = 'Gagal';
                return $pesan;
            }
        } catch (PDOException $e) {
            // Tangani eksepsi jika terjadi kesalahan SQL
            $pesan['pesan'] = 'Gagal Terupdate: ' . $e->getMessage();
            return $pesan;
        }
    }

    public function dhMiddle(){
        $sql= "SELECT t.nama_team, c.nama_chall, s.date_solve
        FROM solves s
        JOIN teams t ON s.team_id = t.team_id
        JOIN chall c ON s.chall_id = c.chall_id ORDER BY s.date_solve DESC LIMIT 5";
        $query = $this->koneksi->conn->query($sql);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;

    }

}
