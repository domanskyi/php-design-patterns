<?php

interface Services {
    public function getCost();
    public function getDescription();
}

class Inspection implements Services
{
    public function getCost() {
        return 10;
    }

    public function getDescription() {
        return 'Inspection';
    }
}

class Diagnostics implements Services
{
    private $_inspection;

    public function __construct(Inspection $inspection) {
        $this->_inspection = $inspection;
    }

    public function getCost() {
        return $this->_inspection->getCost() + 2;
    }

    public function getDescription() {
        return $this->_inspection->getDescription().', diagnostic';
    }
}

class Repair implements Services
{
    private $_inspection;

    public function __construct(Inspection $inspection) {
        $this->_inspection = $inspection;
    }

    public function getCost() {
        return $this->_inspection->getCost() + 15;
    }

    public function getDescription() {
        return $this->_inspection->getDescription().', repair';
    }
}

$p = new Diagnostics(new Inspection);//12
echo $p->getCost();
?>