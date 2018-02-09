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
    public function getAllUsers(){
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM User";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'User');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getUserFromDb($id){
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM User WHERE idUser = ? LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function addUser(User $user){
        $link= PDOUtil::createPDOConnection();
        $query="INSERT INTO User(idUser,nameUser,emailUser,password) VALUES (?,?,?,?)";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1,$user->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(2, $user->getNameUser(), PDO::PARAM_STR);
        $stmt->bindValue(3, $user->getEmailUser(), PDO::PARAM_STR);
        $stmt->bindValue(4, $user->getPassword(), PDO::PARAM_STR);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
}
