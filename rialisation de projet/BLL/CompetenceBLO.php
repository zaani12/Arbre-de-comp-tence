<?php
include "./DAL/CompetenceeDAO.php";
// include "./loader.php";

class CompetenceBLO
{

    public $ErrorMasseg = [];
    private $studentDao;
    public function __construct()
    {
        $this->studentDao = new CompetenceDAO();
    }

    // ================================================================================= //
    // ============================= Get All Stagiaiers ================================ //
    // ================================================================================= //

    public function GetAllStagiaiers()
    {
        return $this->studentDao->GetAllStagiaiers();
    }

    // ================================================================================= //
    // ============================== Is Email Exists ================================== //
    // ================================================================================= //

    public function IsEmailExists($Email, $id, $email_exist)
    {
        return $this->studentDao->IsEmailExists($Email, $id, $email_exist);
    }

    // ================================================================================= //
    // =============================== Add Stagiaiers ================================== //
    // ================================================================================= //

    public function AddStagiaiers($Stagiaiers)
    {
        $requiredInput  = $this->studentDao->requiredInput($Stagiaiers);
        if (empty($requiredInput)) {

            if ($this->IsEmailExists($Stagiaiers->getEmail(), $Stagiaiers->GetId(), false)) {
                return $this->studentDao->AddStagiaiers($Stagiaiers);
            } else {
                $ErrorMassegeEmailExists = "Error Massege Email Exists";
                array_push($this->ErrorMasseg, $ErrorMassegeEmailExists);
            }
        } else {
            foreach ($requiredInput as $Error) {
                array_push($this->ErrorMasseg, $Error);
                array_push($this->ErrorMasseg,);
            }
        }
    }

    // ================================================================================= //
    // ============================== Delete Competencee ================================= //
    // ================================================================================= //

    public function DeleteCompetencee($ID)
    {
        return $this->studentDao->DeleteCompetencee($ID);
    }

    public function getStagiaresById($ID)
    {
        return $this->studentDao->getStagiaresById($ID);
    }


    // ================================================================================= //
    // ============================== Update Competencee ================================= //
    // ================================================================================= //

    public function UpdateTrainee($Stagiaiers)
    {

        $requiredInput  = $this->studentDao->requiredInput($Stagiaiers);
        if (empty($requiredInput)) {

            if ($this->IsEmailExists($Stagiaiers->getEmail(), $Stagiaiers->GetId(), true)) {
                return $this->studentDao->UpdateTrainee($Stagiaiers);
            } else {
                $ErrorMassegeEmailExists = "Error... Massege Email Exists";
                array_push($this->ErrorMasseg, $ErrorMassegeEmailExists);
            }
        } else {
            foreach ($requiredInput as $Error) {
                array_push($this->ErrorMasseg, $Error);
            }
        }
    }
}