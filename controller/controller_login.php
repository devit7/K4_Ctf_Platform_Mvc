<?php

require('../koneksi/koneksi.php');

class Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function authenticate()
    {
        $koneksi = new connect();
        $query = "SELECT * FROM users ";
        $stmt = $koneksi->conn->prepare($query);
        $stmt->execute();
        $dataHasil = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dataHasil as $data) {
            if ($data['username'] == $this->username && $data['password'] == $this->password) {
                header('Location: /scoreboard');
            }
            else{
                header('Location: /login');
            }
        }
    }
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = new Login($username, $password);
    $login->authenticate();
} else {
    header('Location: /scoreboard');
}
