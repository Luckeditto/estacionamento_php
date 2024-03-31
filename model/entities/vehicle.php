<?php

    class Vehicle{
        private $id;
        private $name;
        private $license_plate;
        private $category;

        public function __construct($name, $license_plate, $category){
            $this->name = $name;
            $this->license_plate = $license_plate;
            $this->category = $category;
        }

        public function getId(){   
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getLicensePlate(){
            return $this->license_plate;
        }
        public function getCategory(){
            return $this->category;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setLicensePlate($license_plate){
            $this->license_plate = $license_plate;
        }

        public function setCategory($category){
            $this->category = $category;
        }
    }
