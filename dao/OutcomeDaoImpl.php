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
    /**
     *
     * @var Outcome $data
     */
    private $dataOutcome;
    public function getAllOutcome(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM Outcome";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Outcome');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getOutcomeFromDb($id){
        $query="SELECT * FROM Outcome WHERE idOutcome=? LIMIT 1";
        $link= PDOUtil::createPDOConnection();
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getOutcomeUser(){
        if(isset($dataOutcome)&&!empty($dataOutcome)){
            $query="Select SUM(moneyOutcome) WHERE idUser=?";
            $link= PDOUtil::createPDOConnection();
            $stmt=$link->prepare($query);
            $stmt->bindValue(1, $this->dataOutcome->getUser()->getIdUser(), PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE);
            $result=$stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }
    
    public function addOutcome(){
        if(isset($dataOutcome) && !empty($dataOutcome)){
            $link= PDOUtil::createPDOConnection();
            $query="INSERT INTO Outcome(moneyOutcome,informationOutcome,timeOutcome,User_idUser,CategoryOutcome_idCategoryOutcome) VALUES (?,?,?,?,?)";
            $stmt=$link->prepare($query);
            $stmt->bindValue(1, $this->dataOutcome->getMoneyOutcome(), PDO::PARAM_INT);
            $stmt->bindValue(2, $this->dataOutcome->getInformationOutcome(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->dataOutcome->getTimeOutcome(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->dataOutcome->getUser()->getIdUser(), PDO::PARAM_INT);
            $stmt->bindValue(5, $this->dataOutcome->getCategoryOutcome()->getIdCategoryOutcome(), PDO::PARAM_INT);
            $result = $stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }
    
    public function updateOutcome(){
        if(isset($dataOutcome) && !empty($dataOutcome)){
            $link= PDOUtil::createPDOConnection();
            $query="UPDATE Outcome SET moneyOutcome=?,informationOutcome=?,timeOutcome=?,CategoryOutcome_idCategoryOutcome=? WHERE idOutcome=?";
            $stmt=$link->prepare($query);
            $stmt->bindValue(1, $this->dataOutcome->getMoneyOutcome(), PDO::PARAM_INT);
            $stmt->bindValue(2, $this->dataOutcome->getInformationOutcome(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->dataOutcome->getTimeOutcome(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->dataOutcome->getCategoryOutcome()->getIdCategoryOutcome(), PDO::PARAM_INT);
            $stmt->bindValue(5, $this->dataOutcome->getIdOutcome(), PDO::PARAM_INT);
            $result=$stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
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