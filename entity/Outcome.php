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
    
    public function jsonSerialize() {
        
    }

}
