<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryOutcomeDaoImpl
 *
 * @author Anthony (1572010)
 */
class CategoryOutcomeDaoImpl {
    /**
     *
     * @var CategoryOutcome categoryOutcomeData 
     */
    private $categoryOutcomeData;
    
    public function setCategoryOutcomeData(CategoryOutcome $categoryOutcomeData) {
        $this->categoryOutcomeData = $categoryOutcomeData;
    }
    
    public function getAllCategoriesOutcome(){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM CategoryOutcome";
        $result=$link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'CategoryOutcome');
        PDOUtil::closePDOConnection($link);
        return $result;
    }
    
    public function getCategoryOutcomeFromDb($id){
        $link= PDOUtil::createPDOConnection();
        $query="SELECT * FROM CategoryOutcome WHERE idCategoryOutcome=? LIMIT 1";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        $result=$stmt->fetch();
        PDOUtil::closePDOConnection($link);
        return $result;
    }
}
