<?php
/**
 * Description of User
 *
 * @author Win10
 */
class User implements JsonSerializable{
    
    private $idUser;
    private $nameUser;
    private $emailUser;
    private $password;
    
    public function getIdUser() {
        return $this->idUser;
    }

    public function getNameUser() {
        return $this->nameUser;
    }

    public function getEmailUser() {
        return $this->emailUser;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setNameUser($nameUser) {
        $this->nameUser = $nameUser;
    }

    public function setEmailUser($emailUser) {
        $this->emailUser = $emailUser;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

        
    public function jsonSerialize() {
        
    }

}
