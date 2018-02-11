<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OutcomeDaoImpl
 *
 * @author Win10
 */
class OutcomeDaoImpl {
    public function getAllOutcome(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM Outcome";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Outcome');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getOutcomeFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM Outcome WHERE idOutcome=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function addOutcome(Outcome $outcome){
        $link= PDOUtil::createPDOConnection();
        $query="INSERT INTO Outcome(idOutcome,moneyOutcome,informationOutcome,timeOutcome,User_idUser,CategoryOutcome_idCategoryOutcome) VALUES (?,?,?,?,?,?)";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1,$outcome->getIdOutcome(), PDO::PARAM_INT);
        $stmt->bindValue(2, $outcome->getMoneyOutcome(), PDO::PARAM_INT);
        $stmt->bindValue(3, $outcome->getInformationOutcome(), PDO::PARAM_STR);
        $stmt->bindValue(4, $outcome->getTimeOutcome(), PDO::PARAM_STR);
        $stmt->bindValue(5, $outcome->getUser()->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(6, $outcome->getCategoryOutcome()->getIdCategoryOutcome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function updateOutcome(Outcome $outcome){
        $link= PDOUtil::createPDOConnection();
        $query="UPDATE Outcome SET moneyOutcome=?,informationOutcome=?,timeOutcome=?,User_idUser=?,CategoryOutcome_idCategoryOutcome=? WHERE idOutcome=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $outcome->getMoneyOutcome(), PDO::PARAM_INT);
        $stmt->bindValue(2, $outcome->getInformationOutcome(), PDO::PARAM_STR);
        $stmt->bindValue(3, $outcome->getTimeOutcome(), PDO::PARAM_STR);
        $stmt->bindValue(4, $outcome->getCategoryOutcome()->getIdCategoryOutcome(), PDO::PARAM_INT);
        $stmt->bindValue(5,$outcome->getIdOutcome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function deleteOutcome(Outcome $outcome){
        $link= PDOUtil::createPDOConnection();
        $query="DELETE FROM Outcome WHERE idOutcome=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1,$outcome->getIdOutcome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
}
