<?php
include "./DAL/CityDAO.php";
// include "./loader.php";


class CityBLO
{

    private $CityDAO;


    public function __construct()
    {
        $this->CityDAO = new CityDAO();
    }

    // ================================================================================= //
    // ================================ get All City =================================== //
    // ================================================================================= //

    public function getAllCity()
    {
        return $this->CityDAO->getAllCity();
    }


    // ================================================================================= //
    // =============================== get City By Id ================================== //
    // ================================================================================= //

    public function getCityById($ID)
    {
        return $this->CityDAO->getCityById($ID);
    }
}