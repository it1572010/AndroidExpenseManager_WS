<?php
/**
 * Description of CategoryIncome
 *
 * @author Anthony
 */
class CategoryIncome implements JsonSerializable{
    
    private $idCategoryIncome;
    private $nameCategoryIncome;
    
    public function getIdCategoryIncome() {
        return $this->idCategoryIncome;
    }

    public function getNameCategoryIncome() {
        return $this->nameCategoryIncome;
    }

    public function setIdCategoryIncome($idCategoryIncome) {
        $this->idCategoryIncome = $idCategoryIncome;
    }

    public function setNameCategoryIncome($nameCategoryIncome) {
        $this->nameCategoryIncome = $nameCategoryIncome;
    }

    
    
    public function jsonSerialize() {
        
    }

}
