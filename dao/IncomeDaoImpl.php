<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IncomeDaoImpl
 *
 * @author Win10
 */
class IncomeDaoImpl {
    public function getAllIncome(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM Income";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Income');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getIncomeFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM Income WHERE idIncome=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function addIncome(Income $income){
        $link= PDOUtil::createPDOConnection();
        $query="INSERT INTO Income(idIncome,moneyIncome,informationIncome,timeIncome,User_idUser,CategoryIncome_idCategoryIncome) VALUES (?,?,?,?,?,?)";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1,$income->getIdIncome(), PDO::PARAM_INT);
        $stmt->bindValue(2, $income->getMoneyIncome(), PDO::PARAM_INT);
        $stmt->bindValue(3, $income->getInformationIncome(), PDO::PARAM_STR);
        $stmt->bindValue(4, $income->getTimeIncome(), PDO::PARAM_STR);
        $stmt->bindValue(5, $income->getUser()->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(6, $income->getCategoryIncome()->getIdCategoryIncome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function updateIncome(Income $income){
        $link= PDOUtil::createPDOConnection();
        $query="UPDATE Income SET moneyIncome=?,informationIncome=?,timeIncome=?,CategoryIncome_idCategoryIncome=? WHERE idIncome=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $income->getMoneyIncome(), PDO::PARAM_INT);
        $stmt->bindValue(2, $income->getInformationIncome(), PDO::PARAM_STR);
        $stmt->bindValue(3, $income->getTimeIncome(), PDO::PARAM_STR);
        $stmt->bindValue(4, $income->getCategoryIncome()->getIdCategoryIncome(), PDO::PARAM_INT);
        $stmt->bindValue(5, $income->getIdIncome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
    
    public function deleteIncome(Income $income){
        $link= PDOUtil::createPDOConnection();
        $query="DELETE FROM Income WHERE idIncome=?";
        $stmt=$link->prepare($query);
        $stmt->bindValue(1, $income->getIdIncome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }
}
