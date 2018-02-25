<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDaoImpl
 *
 * @author Win10
 */
class UserDaoImpl {

    /**
     *
     * @var User $data
     */
    private $data;

    public function setData(User $data) {
        $this->data = $data;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM User";
        $link = PDOUtil::createPDOConnection();
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $result->execute();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function getUserFromDb($id) {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM User WHERE idUser = ? LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE,'User');
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function addUser() {
        if (isset($data) && !empty($data)) {
            $link = PDOUtil::createPDOConnection();
            $query = "INSERT INTO User(nameUser,emailUser,password) VALUES (?,?,?)";
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getNameUser(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getEmailUser(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->data->getPassword(), PDO::PARAM_STR);
            $result = $stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function login() {
        if (isset($this->data) && !empty($this->data)) {
            $query = "SELECT u.* FROM user u WHERE u.email = ? AND u.password = MD5(?) LIMIT 1";
            $link = PDOUtil::createPDOConnection();
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getEmailUser(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getPassword(), PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE);
            $stmt->execute();
            $result = $stmt->fetch();
            $this->data = NULL;
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function updateAlokasiDana() {
        if (isset($data) && !empty($data)) {
            $link = PDOUtil::createPDOConnection();
            $query = "Update User SET alokasiUser=? WHERE idUser=?";
            $stmt=$link->prepare($query);
            $stmt->bindValue(1, $this->data->getAlokasiUser(), PDO::PARAM_INT);
            $stmt->bindValue(2, $this->data->getIdUser(), PDO::PARAM_INT);
            $result=$stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

}
