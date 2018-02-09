<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryIncomeDaoImpl
 *
 * @author Win10
 */
class CategoryIncomeDaoImpl {
    public function getAllCategoriesIncome(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM CategoryIncome";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'CategoryIncome');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getCategoryIncomeFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM CategoryIncome WHERE idCategoryIncome=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
}
