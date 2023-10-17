<?php
define('Root', dirname(__FILE__));
error_reporting(E_ALL);

require_once Root . '../db-conction/conction.php';
require_once Root . '../Entities/Stagiaire.php';
require_once Root . '../Entities/City.php';
require_once Root . '../DAL/StagiaireDAO.php';
require_once Root . '../DAL/CityDAO.php';
require_once Root . '../BLL/CityBLO.php';
require_once Root . '../BLL/StagiaireBLO.php';