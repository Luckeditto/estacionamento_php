<?php

class ParkingRegister{

    private $id;
    private $vehicle;
    private $entranceTime; //cant be after exitTime
    private $exitTime;//cant be before entranceTime
    private $lengthOfStay; //can only be determined when entranceTime and exitTime exist
    private $totalCharge;//its determined by the difference in time between exit and entrance * category.

    public function __construct($vehicle, $entranceTime, $exitTime){
        $this->vehicle = $vehicle;
        $this->entranceTime = $entranceTime;
        $this->exitTime = $exitTime;
    }

    public function getId(){
        return $this->id;
    }

    public function getVehicle(){
        return $this->vehicle;
    }

    public function getEntranceTime(){
        return $this->entranceTime;
    }

    public function getExitTime(){
        return $this->exitTime;
    }

    public function getLengthOfStay(){
        return $this->lengthOfStay;
    }
    public function getTotalCharge(){
        return $this->totalCharge;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setVehicle($vehicle){
        $this->vehicle = $vehicle;
    }

    public function setEntranceTime($entranceTime){
        $this->entranceTime = $entranceTime;
    }

    public function setExitTime($exitTime){
        $this->exitTime = $exitTime;
    }

    public function setLengthOfStay($lengthOfStay){
        $this->lengthOfStay = $lengthOfStay;
    }

    public function setTotalCharge($totalCharge){
        $this->totalCharge = $totalCharge;
    }
}
