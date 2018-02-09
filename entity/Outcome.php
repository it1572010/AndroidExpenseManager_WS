<?php
/**
 * Description of Outcome
 *
 * @author Anthony
 */
class Outcome implements JsonSerializable{
    
    private $idOutcome;
    private $moneyOutcome;
    private $informationOutcome;
    private $timeOutcome;
    private $User;
    private $CategoryOutcome;
    
    public function __construct() {
        $this->User=new User();
        $this->CategoryOutcome=new CategoryOutcome();
    }
    
    public function getIdOutcome() {
        return $this->idOutcome;
    }

    public function getMoneyOutcome() {
        return $this->moneyOutcome;
    }

    public function getInformationOutcome() {
        return $this->informationOutcome;
    }

    public function getTimeOutcome() {
        return $this->timeOutcome;
    }

    public function setIdOutcome($idOutcome) {
        $this->idOutcome = $idOutcome;
    }

    public function setMoneyOutcome($moneyOutcome) {
        $this->moneyOutcome = $moneyOutcome;
    }

    public function setInformationOutcome($informationOutcome) {
        $this->informationOutcome = $informationOutcome;
    }

    public function setTimeOutcome($timeOutcome) {
        $this->timeOutcome = $timeOutcome;
    }
    
    public function getUser() {
        return $this->User;
    }

    public function getCategoryOutcome() {
        return $this->CategoryOutcome;
    }

    public function setUser($User) {
        $this->User = $User;
    }

    public function setCategoryOutcome($CategoryOutcome) {
        $this->CategoryOutcome = $CategoryOutcome;
    }
    
    public function jsonSerialize() {
        
    }

    public function __set($name, $value) {
        if (isset($value)) {
            switch ($name) {
                case 'idCategoryOutcome':
                    $this->CategoryOutcome->setIdCategoryOutcome($value);
                    break;
                case 'nameCategoryOutcome':
                    $this->CategoryOutcome->setNameCategoryOutcome($value);
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
}
