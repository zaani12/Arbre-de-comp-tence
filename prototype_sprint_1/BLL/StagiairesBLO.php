<?php

class StagiairesBLO
{

    private $studentDao;
    public function __construct()
    {
        $this->studentDao = new StagiairesDAO();
    }

    public function GetAllStagiaiers()
    {
        return $this->studentDao->GetAllStagiaiers();
    }


    public function AddStagiaiers($Stagiaiers)
    {
        return $this->studentDao->AddStagiaiers($Stagiaiers);
    }


    public function DeleteStagiaire($ID)
    {
        return $this->studentDao->DeleteStagiaire($ID);
    }

    public function getStagiaresById($ID)
    {
        return $this->studentDao->getStagiaresById($ID);
    }


    public function UpdateDataTrainee($Stagiaiers)
    {
        return $this->studentDao->UpdateDataTrainee($Stagiaiers);
    }
    
}
