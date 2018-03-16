<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IncomeDaoImpl
 *
 * @author Anthony (1572010)
 */
class IncomeDaoImpl {

    /**
     *
     * @var Income $dataIncome
     */
    private $dataIncome;

    public function setDataIncome(Income $dataIncome) {
        $this->dataIncome = $dataIncome;
    }
    
    public function getAllIncome() {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM Income";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Income');
        PDOUtil::closePDOConnection($link);
        return $result;
    }

    public function getIncomeFromDb($id) {
        $link = PDOUtil::createPDOConnection();
        $query = "SELECT * FROM Income WHERE idIncome=? LIMIT 1";
        $stmt = $link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result = $stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getIncomeUser(){
        if(isset($dataIncome)&&!empty($dataIncome)){
            $query="Select SUM(moneyIncome) WHERE idUser=?";
            $link= PDOUtil::createPDOConnection();
            $stmt=$link->prepare($query);
            $stmt->bindValue(1, $this->dataIncome->getUser()->getIdUser(), PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE);
            $result=$stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function addIncome() {
        $link = PDOUtil::createPDOConnection();
        $query = "INSERT INTO Income(moneyIncome,informationIncome,timeIncome,User_idUser,CategoryIncome_idCategoryIncome) VALUES (?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $this->dataIncome->getMoneyIncome(), PDO::PARAM_INT);
        $stmt->bindValue(2, $this->dataIncome->getInformationIncome(), PDO::PARAM_STR);
        $stmt->bindValue(3, $this->dataIncome->getTimeIncome(), PDO::PARAM_STR);
        $stmt->bindValue(4, $this->dataIncome->getUser()->getIdUser(), PDO::PARAM_INT);
        $stmt->bindValue(5, $this->dataIncome->getCategoryIncome()->getIdCategoryIncome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if($stmt->execute()){
            $link->commit();
        }
        else{
            $link->rollBack();
        }
        $this->dataIncome=NULL;
        $result = $stmt->execute();
        PDOUtil::closePDOConnection($link);
    }

    public function updateIncome() {
        if (isset($dataIncome) && !empty($dataIncome)) {
            $link = PDOUtil::createPDOConnection();
            $query = "UPDATE Income SET moneyIncome=?,informationIncome=?,timeIncome=?,CategoryIncome_idCategoryIncome=? WHERE idIncome=?";
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->dataIncome->getMoneyIncome(), PDO::PARAM_INT);
            $stmt->bindValue(2, $this->dataIncome->getInformationIncome(), PDO::PARAM_STR);
            $stmt->bindValue(3, $this->dataIncome->getTimeIncome(), PDO::PARAM_STR);
            $stmt->bindValue(4, $this->dataIncome->getCategoryIncome()->getIdCategoryIncome(), PDO::PARAM_INT);
            $stmt->bindValue(5, $this->dataIncome->getIdIncome(), PDO::PARAM_INT);
            $result = $stmt->execute();
            PDOUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

    public function deleteIncome(Income $income) {
        $link = PDOUtil::createPDOConnection();
        $query = "DELETE FROM Income WHERE idIncome=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $income->getIdIncome(), PDO::PARAM_INT);
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
        } else {
            $link->rollBack();
        }
        PDOUtil::closePDOConnection($link);
    }

}
