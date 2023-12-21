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

    public function createNewTeam($team_name,$team_pass,$id_user){
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
                //table user_team insert
                $sql2 = "INSERT INTO user_team (user_id,team_id,role) VALUES (?,?,?)";
                $stmt2 = $this->koneksi->conn->prepare($sql2);
                $stmt2->execute([$id_user,$id_teams,'lead']);
                return $id_teams;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function joinTeam($team_name,$team_pass,$id_user){
        try{
            $sql1= "SELECT * FROM teams WHERE nama_team='$team_name' AND pass_team='$team_pass'";
            $stmt1= $this->koneksi->conn->query($sql1);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if(count($dataNamaTeams)>0){
                $sql2 = "INSERT INTO user_team (user_id,team_id,role) VALUES (?,?,?)";
                $stmt2 = $this->koneksi->conn->prepare($sql2);
                $stmt2->execute([$id_user,$dataNamaTeams[0]['team_id'],'member']);
                return $dataNamaTeams[0]['team_id'];
            }else{
                $pesan['pesan'] = "Nama Teams atau Password salah";
                return $pesan;
            }
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function listTeambyIdUser($id_user){
        try{
            $sql = "SELECT * FROM teams WHERE team_id IN (SELECT team_id FROM user_team WHERE user_id=?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$id_user]);
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function listTeambyUser($id_user){
        try{
            $sql="SELECT u.nama, ut.role FROM users AS u JOIN user_team AS ut ON u.user_id = ut.user_id WHERE ut.team_id IN (SELECT team_id FROM user_team WHERE user_id = ?) ";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$id_user]);
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }


}

?>