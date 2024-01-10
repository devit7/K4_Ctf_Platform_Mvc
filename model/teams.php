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

    public function __construct($id_teams = null, $nama_teams = null, $pass_teams = null, $afiliasi = null, $website = null)
    {
        $this->koneksi = new connect();
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


    public function getAll()
    {
        $query = "SELECT * FROM teams";
        $result = $this->koneksi->conn->query($query);
        $dataTeams = $result->fetchAll(PDO::FETCH_ASSOC);
        return $dataTeams;
    }

    public function createNewTeam($team_name, $team_pass, $id_user)
    {
        try {
            $sql1 = "SELECT nama_team FROM teams WHERE nama_team=? ";
            $stmt1 = $this->koneksi->conn->prepare($sql1);
            $stmt1->execute([$team_name]);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if (count($dataNamaTeams) > 0) {
                $pesan['pesan'] = "Nama Teams sudah terdaftar";
                return $pesan;
            } else {
                $sql = "INSERT INTO teams (team_id,nama_team,pass_team,afiliasi,website) VALUES (?,?, ?, ?, ?)";
                $stmt = $this->koneksi->conn->prepare($sql);
                $id_teams = uniqid();
                $stmt->execute([$id_teams, $team_name, $team_pass, null, null]);
                //table user_team insert
                $sql2 = "INSERT INTO user_team (user_id,team_id,role) VALUES (?,?,?)";
                 $stmt2 = $this->koneksi->conn->prepare($sql2);
                $stmt2->execute([$id_user, $id_teams, 'lead']);
                return $id_teams;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function createTeamAdmin(){
        try {
            $sql1 = "SELECT nama_team FROM teams WHERE nama_team=? ";
            $stmt1 = $this->koneksi->conn->prepare($sql1);
            $stmt1->execute([$this->nama_teams]);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if (count($dataNamaTeams) > 0) {
                $pesan['pesan'] = "Nama Teams Alredy Exists";
                return $pesan;
            } else {
                $sql = "INSERT INTO teams (team_id,nama_team,pass_team,afiliasi,website) VALUES (?,?, ?, ?, ?)";
                $stmt = $this->koneksi->conn->prepare($sql);
                $stmt->execute([$this->id_teams, $this->nama_teams, $this->pass_teams, $this->afiliasi, $this->website]);
                
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateAdmin($id_teams, $nama_teams, $afiliasi, $website)
    {
        try {
            $sql1 = "SELECT * FROM teams WHERE team_id!=?";
            $stmt1 = $this->koneksi->conn->prepare($sql1);
            $stmt1->execute([$id_teams]);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            foreach ($dataNamaTeams as $d) :
                if ($nama_teams === $d['nama_team']) {
                    $pesan['pesan'] = 'Nama Teams Alredy Exists';
                    return $pesan;
                }
            endforeach;

            $sql = "UPDATE teams SET nama_team=?,afiliasi=?,website=? WHERE team_id=?";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$nama_teams, $afiliasi, $website, $id_teams]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateById($id_teams, $nama_teams, $afiliasi, $website)
    {
        try {
            $sql = "UPDATE teams SET nama_team=?,afiliasi=?,website=? WHERE team_id=?";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$nama_teams, $afiliasi, $website, $id_teams]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteByid($id)
    {
        try {
            $sql = 'DELETE FROM teams WHERE team_id = ?';
            $stmt = $this->koneksi->conn->prepare($sql);

            // Bind parameter
            $stmt->bindParam(1, $id, PDO::PARAM_INT);

            // Execute statement
            if ($stmt->execute()) {
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

    public function deleteTeamById($id_teams, $password)
    {
        try {
            $sql1 = "SELECT * FROM teams WHERE team_id='$id_teams' AND pass_team='$password'";
            $stmt1 = $this->koneksi->conn->query($sql1);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            if (count($dataNamaTeams) > 0) {
                $sql2 = "DELETE FROM user_team WHERE team_id=?";
                $stmt2 = $this->koneksi->conn->prepare($sql2);
                $stmt2->execute([$id_teams]);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function joinTeam($team_name, $team_pass, $id_user)
    {
        try {
            $sql1 = "SELECT * FROM teams WHERE nama_team='$team_name' AND pass_team='$team_pass'";
            $stmt1 = $this->koneksi->conn->query($sql1);
            $dataNamaTeams = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            //jika ditemukan tapi tidak ada anggota maka yang join pertama adalah leader
            
            //jika ditemukan dan sudah ada anggota 
            if (count($dataNamaTeams) > 0) {
                $sql3= "SELECT * FROM user_team WHERE team_id = ? ";
                $stmt3 = $this->koneksi->conn->prepare($sql3);
                $stmt3->execute([$dataNamaTeams[0]['team_id']]);
                $dataUserTeam = $stmt3->fetchAll(PDO::FETCH_ASSOC);
                if(count($dataUserTeam)>0){
                    $sql2 = "INSERT INTO user_team (user_id,team_id,role) VALUES (?,?,?)";
                    $stmt2 = $this->koneksi->conn->prepare($sql2);
                    $stmt2->execute([$id_user, $dataNamaTeams[0]['team_id'], 'lead']);
                    return $dataNamaTeams[0]['team_id'];
                }else{
                    $sql2 = "INSERT INTO user_team (user_id,team_id,role) VALUES (?,?,?)";
                    $stmt2 = $this->koneksi->conn->prepare($sql2);
                    $stmt2->execute([$id_user, $dataNamaTeams[0]['team_id'], 'member']);
                    return $dataNamaTeams[0]['team_id'];
                }
            } else {
                $pesan['pesan'] = "Nama Teams atau Password salah";
                return $pesan;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listTeambyIdUser($id_user)
    {
        try {
            $sql = "SELECT * FROM teams WHERE team_id IN (SELECT team_id FROM user_team WHERE user_id=?)";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$id_user]);
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function listTeambyUser($id_user)
    {
        try {
            $sql = "SELECT * FROM users AS u JOIN user_team AS ut ON u.user_id = ut.user_id WHERE ut.team_id IN (SELECT team_id FROM user_team WHERE user_id = ?) ";
            $stmt = $this->koneksi->conn->prepare($sql);
            $stmt->execute([$id_user]);
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //laderboard all
    public function laderboardAll()
    {
        try {
            $sql = "SELECT teams.team_id AS team_id,teams.nama_team AS team_name,SUM(chall.point) AS total_points
        FROM solves JOIN teams ON solves.team_id = teams.team_id JOIN chall ON solves.chall_id = chall.chall_id
        GROUP BY teams.team_id ORDER BY total_points DESC;
        ";
            $stmt = $this->koneksi->conn->query($sql);
            $stmt->execute();
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    //limit 10
    public function laderboardAllLimit10()
    {
        try {
            $sql = "SELECT teams.nama_team AS team_name,SUM(chall.point) AS total_points
        FROM solves JOIN teams ON solves.team_id = teams.team_id JOIN chall ON solves.chall_id = chall.chall_id
        GROUP BY teams.team_id ORDER BY total_points DESC limit 10;
        ";
            $stmt = $this->koneksi->conn->query($sql);
            $stmt->execute();
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    //first blood every chall all
    public function firstBloodAll()
    {
        try {
            $sql = "SELECT
                    chall.nama_chall AS challenge_name, teams.nama_team AS team_name,categories.nama_category AS category_name, MIN(solves.date_solve) AS first_blood_time
                    FROM solves JOIN teams ON solves.team_id = teams.team_id JOIN chall ON solves.chall_id = chall.chall_id
                    JOIN categories ON chall.category_id = categories.category_id GROUP BY chall.chall_id ORDER BY first_blood_time ASC";
            $stmt = $this->koneksi->conn->query($sql);
            $stmt->execute();
            $dataTeams = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dataTeams;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function statTeamByUserId()
    {
        $sql = "SELECT
        users.nama AS nama_user,
        chall.nama_chall AS Challname,
        categories.nama_category AS Category,
        solves.date_solve AS Time FROM solves JOIN teams ON solves.team_id = teams.team_id
        JOIN chall ON solves.chall_id = chall.chall_id
        JOIN categories ON chall.category_id = categories.category_id
        JOIN users ON solves.user_id = users.user_id
        WHERE solves.user_id = ? ORDER BY solves.date_solve ASC;
    ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$_SESSION['id_user']]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function totalSolvedByUserId()
    {
        $sql = "SELECT COUNT(*) AS total_solved FROM solves WHERE user_id = ? ";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute([$_SESSION['id_user']]);
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function totalSolve()
    {
        $sql = "SELECT COUNT(*) AS total_solved FROM solves";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }



    public function totalTeam()
    {
        $sql = "SELECT COUNT(*) AS total_team FROM teams";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }


    public function dhAdminSolved()
    {
        $sql = "SELECT
        categories.nama_category AS category_name,
        COUNT(DISTINCT solves.team_id) AS total_team_solved,
        COUNT(chall.chall_id) AS total_chall FROM categories
        LEFT JOIN chall ON categories.category_id = chall.category_id
        LEFT JOIN solves ON chall.chall_id = solves.chall_id
        GROUP BY categories.nama_category
        ORDER BY categories.nama_category";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    public function searchTeam($search)
    {
        $sql = "SELECT * FROM teams WHERE nama_team LIKE '%$search%'";
        $query = $this->koneksi->conn->prepare($sql);
        $query->execute();
        $dataChall = $query->fetchAll(PDO::FETCH_ASSOC);
        return $dataChall;
    }

    
}
