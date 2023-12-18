<?php

require('../koneksi/koneksi.php');

class Teams
{
    private $id_teams;
    private $nama_teams;
    private $pass_teams;
    private $afiliasi;
    private $website;
    private $koneksi;

    public function __construct($id_teams =null,$nama_teams=null,$pass_teams=null,$afiliasi=null,$website=null)
    {
        $this->koneksi=new connect();
        if ($id_teams != null && $nama_teams != null && $pass_teams != null && $afiliasi != null && $website != null) {
            $this->id_teams = $id_teams;
            $this->nama_teams = $nama_teams;
            $this->pass_teams = $pass_teams;
            $this->afiliasi = $afiliasi;
            $this->website = $website;
        }
    }

    public function getIdteams()
    {
        return $this->id_teams;
    }
    public function getNamaTeams()
    {
        return $this->nama_teams;
    }
    public function getPassTeams()
    {
        return $this->pass_teams;
    }
    public function getAfiliasi()
    {
        return $this->afiliasi;
    }
    public function getWebsite()
    {
        return $this->website;
    }

    public function setIdteams($id_teams)
    {
        $this->id_teams = $id_teams;
    }
    public function setNamaTeams($nama_teams)
    {
        $this->nama_teams = $nama_teams;
    }
    public function setPassTeams($pass_teams)
    {
        $this->pass_teams = $pass_teams;
    }
    public function setAfiliasi($afiliasi)
    {
        $this->afiliasi = $afiliasi;
    }
    public function setWebsite($website)
    {
        $this->website = $website;
    }


    public function getAll(){
        $query = "SELECT * FROM teams";
        $result = $this->koneksi->conn->query($query);
        $dataTeams = $result->fetchAll(PDO::FETCH_ASSOC);
        return $dataTeams;
    }

    public function createData(){
        try{
            $sql1= "SELECT nama_teams FROM teams WHERE nama_teams='$this->nama_teams' ";
            $stmt1= $this->koneksi->conn->query($sql1);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if(count($dataNamaTeams)>0){
                $pesan['pesan'] = "Nama Teams sudah terdaftar";
                return $pesan;
            }else{
                $sql = "INSERT INTO teams (nama_teams,pass_teams,afiliasi,website) VALUES (?, ?, ?, ?)";
                $stmt = $this->koneksi->conn->prepare($sql);
                $stmt->execute([$this->nama_teams,$this->pass_teams,$this->afiliasi,$this->website]);
                return "1";
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


}

?>