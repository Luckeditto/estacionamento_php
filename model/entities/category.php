<?php

    class Category{
        private $id;
        private $name;
        private $parking_charge;
        private $vehicles = array();

        public function __construct($name, $parking_charge, $vehicles){
            $this->name = $name;
            $this->parking_charge = $parking_charge;
            $this->vehicles = $vehicles;
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function getParkingCharge(){
        return $this->parking_charge;
        }

        public function setParkingCharge($parking_charge){
            $this->parking_charge = $parking_charge;
        }

        public function getVehicles(){
            return $this->vehicles;
        }
    }
