<?php


class CityDAO
{
    public function getAllCity()
    {
        $sql = "SELECT * FROM `city`";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $Cities = [];
        foreach ($result as $row) {
            $City = new City($row['idCity'], $row['city_name']);
            array_push($Cities, $City);
        }
        return $Cities;
    }


    public function getCityById($ID)
    {
        $sql = "SELECT * FROM `city` WHERE idCity = $ID";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $City = new City($row['idCity'], $row['city_name']);
        }
        return $City->getCityName();
    }
}


//idCity
//city_name