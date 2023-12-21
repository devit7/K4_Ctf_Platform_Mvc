<?php
require_once ('../koneksi/koneksi.php');

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

    public function __construct($chall_id = null, $nama_chall = null, $level = null, $deskripsi = null, $attch = null, $category = null, $point = null, $flag = null){
        $this->koneksi = new connect();
        if($chall_id != null && $nama_chall != null && $level != null && $deskripsi != null && $attch != null && $category != null && $point != null && $flag != null){
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

    public function getchall_id(){
        return $this->chall_id;
    }
    public function getnama_chall(){
        return $this->nama_chall;
    }
    public function getlevel(){
        return $this->level;
    }
    public function getdeskripsi(){
        return $this->deskripsi;
    }
    public function getattch(){
        return $this->attch;
    }
    public function getcategory(){
        return $this->category;
    }
    public function getpoint(){
        return $this->point;
    }
    public function getflag(){
        return $this->flag;
    }

    public function setchall_id($chall_id){
        $this->chall_id = $chall_id;
    }
    public function setnama_chall($nama_chall){
        $this->nama_chall = $nama_chall;
    }
    public function setlevel($level){
        $this->level = $level;
    }
    public function setdeskripsi($deskripsi){
        $this->deskripsi = $deskripsi;
    }
    public function setattch($attch){
        $this->attch = $attch;
    }
    public function setcategory($category){
        $this->category = $category;
    }
    public function setpoint($point){
        $this->point = $point;
    }
    public function setflag($flag){
        $this->flag = $flag;
    }

    public function getAll(){
        $sql = "SELECT * FROM challs";
        $query = $this->koneksi->conn->query($sql);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function createNewChall(){
        try{
        $sql = "INSERT INTO challs (chall_id, nama_chall, level, deskripsi, attch, category, point, flag) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->koneksi->conn->query($sql);
        $id_chall = time();
        $stmt->execute(null,[$id_chall, $this->nama_chall, $this->level, $this->deskripsi, $this->attch, $this->category, $this->point, $this->flag]);
        $dataChall = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
        
    
}

?>