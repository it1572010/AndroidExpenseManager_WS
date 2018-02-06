<?php
/**
 * Description of CategoryOutcome
 *
 * @author Anthony
 */
class CategoryOutcome implements JsonSerializable{
    
    private $idCategoryOutcome;
    private $nameCategoryOutcome;
    
    public function getIdCategoryOutcome() {
        return $this->idCategoryOutcome;
    }

    public function getNameCategoryOutcome() {
        return $this->nameCategoryOutcome;
    }

    public function setIdCategoryOutcome($idCategoryOutcome) {
        $this->idCategoryOutcome = $idCategoryOutcome;
    }

    public function setNameCategoryOutcome($nameCategoryOutcome) {
        $this->nameCategoryOutcome = $nameCategoryOutcome;
    }
    
    public function jsonSerialize() {
        
    }

}
