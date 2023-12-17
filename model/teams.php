<?php

require('../koneksi/koneksi.php');

class Teams{

    private $id_team;
    private $nama_team;
    private $pass_team;
    private $afilliasi;
    private $website;
    private $koneksi;
    
    public function __construct($id_team = null, $nama_team = null, $pass_team = null, $afilliasi = null, $website = null)
    {
        $this->koneksi = new connect();
        if ($id_team != null && $nama_team != null && $pass_team != null && $afilliasi != null && $website != null) {
            $this->id_team = $id_team;
            $this->nama_team = $nama_team;
            $this->pass_team = $pass_team;
            $this->afilliasi = $afilliasi;
            $this->website = $website;
        }
    }
    public function getIdteam()
    {
        return $this->id_team;
    }
    public function getNamaTeam()
    {
        return $this->nama_team;
    }
    public function getPassTeam()
    {
        return $this->pass_team;
    }
    public function getAfilliasi()
    {
        return $this->afilliasi;
    }
    public function getWebsite()
    {
        return $this->website;
    }

    function setIdteam($id_team)
    {
        $this->id_team = $id_team;
    }
    function setNamaTeam($nama_team)
    {
        $this->nama_team = $nama_team;
    }
    function setPassTeam($pass_team)
    {
        $this->pass_team = $pass_team;
    }
    function setAfilliasi($afilliasi)
    {
        $this->afilliasi = $afilliasi;
    }
    function setWebsite($website)
    {
        $this->website = $website;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM teams";
        $query = $this->koneksi->conn->query($sql);
        $dataTeams = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataTeams;
    }

    

}

?>