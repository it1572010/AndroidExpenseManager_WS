<?php
/**
 * Description of Income
 *
 * @author Anthony
 */
class Income implements JsonSerializable{
    
    private $idIncome;
    private $moneyIncome;
    private $informationIncome;
    private $timeIncome;
    private $User;
    private $CategoryIncome;
    
    public function __construct() {
        $this->User=new User();
        $this->CategoryIncome=new CategoryIncome();
    }
    
    public function getIdIncome() {
        return $this->idIncome;
    }

    public function getMoneyIncome() {
        return $this->moneyIncome;
    }

    public function getInformationIncome() {
        return $this->informationIncome;
    }

    public function getTimeIncome() {
        return $this->timeIncome;
    }

    public function getUser() {
        return $this->User;
    }

    public function getCategoryIncome() {
        return $this->CategoryIncome;
    }

    public function setIdIncome($idIncome) {
        $this->idIncome = $idIncome;
    }

    public function setMoneyIncome($moneyIncome) {
        $this->moneyIncome = $moneyIncome;
    }

    public function setInformationIncome($informationIncome) {
        $this->informationIncome = $informationIncome;
    }

    public function setTimeIncome($timeIncome) {
        $this->timeIncome = $timeIncome;
    }

    public function setUser($User) {
        $this->User = $User;
    }

    public function setCategoryIncome($CategoryIncome) {
        $this->CategoryIncome = $CategoryIncome;
    }

    public function __set($name, $value) {
        if (isset($value)) {
            switch ($name) {
                case 'idCategoryIncome':
                    $this->CategoryIncome->setIdCategoryIncome($value);
                    break;
                case 'nameCategoryIncome':
                    $this->CategoryIncome->setNameCategoryIncome($value);
                    break;
                case 'idUser':
                    $this->User->setIdUser($value);
                    break;
                case 'nameUser':
                    $this->User->setNameUser($value);
                    break;
                default:
                    break;
            }
        }
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
