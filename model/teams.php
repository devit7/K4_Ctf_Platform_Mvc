<?php

require_once('../koneksi/koneksi.php');

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

    public function createNewTeam($team_name,$team_pass){
        try{
            $sql1= "SELECT nama_team FROM teams WHERE nama_team='$team_name' ";
            $stmt1= $this->koneksi->conn->query($sql1);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if(count($dataNamaTeams)>0){
                $pesan['pesan'] = "Nama Teams sudah terdaftar";
                return $pesan;
            }else{
                $sql = "INSERT INTO teams (team_id,nama_team,pass_team,afiliasi,website) VALUES (?,?, ?, ?, ?)";
                $stmt = $this->koneksi->conn->prepare($sql);
                $id_teams=time();
                $stmt->execute([$id_teams,$team_name,$team_pass,null,null]);
                return $id_teams;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


}

?>