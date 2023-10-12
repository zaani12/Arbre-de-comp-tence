<?php

class CityBLO
{

    private $CityDAO;
    public function __construct()
    {
        $this->CityDAO = new CityDAO();
    }

    public function getAllCity()
    {
        return $this->CityDAO->getAllCity();
    }

    public function getCityById($ID)
    {
        return $this->CityDAO->getCityById($ID);
    }
}
