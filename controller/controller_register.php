<?php

class User {
    private $id_user;
    private $nama;
    private $provinsi;
    private $kampus;
    private $email;
    private $username;
    private $password;

    function __construct( $id_user, $nama, $provinsi, $kampus, $email, $username, $password){
        $this->id_user = $id_user;
        $this->nama = $nama;
        $this->provinsi = $provinsi;
        $this->kampus = $kampus;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;

    }
    public function get_Iduser(){
        return $this->id_user;
    }
    public function getterNama(){
        return $this->nama;
    }
    public function getProvinsi(){
        return $this->provinsi;
    }
    public function getKampus(){
        return $this->kampus;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getPassword(){
        return $this->password;
    }
    
    function setIduser($id_user){
        $this->id_user = $id_user;
    }
    function setterNama($nama){
        $this->nama = $nama;
    }
    function setProvinsi($provinsi){
        $this->provinsi = $provinsi;
    }
    function setKampus($kampus){
        $this->kampus = $kampus;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setUsername($username){
        $this->username = $username;
    }
    function setPassword($password){
        $this->password = $password;
    }


}

$user = new User(1, "Rizky", "Jawa Barat", "Universitas Komputer Indonesia", "dev@gmail.com", "dev", "dev");

$user->setterNama("Devit");


echo "Id User: " . $user->get_Iduser() . "<br>";
echo "Nama: " . $user->getterNama() . "<br>";
echo "Provinsi: " . $user->getProvinsi() . "<br>";
echo "Kampus: " . $user->getKampus() . "<br>";
echo "Email: " . $user->getEmail() . "<br>";
echo "Username: " . $user->getUsername() . "<br>";
echo "Password: " . $user->getPassword() . "<br>";

var_dump($user);


?>