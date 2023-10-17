<?php
include "./db-conction/conction.php";
include "./Entities/Competence.php";
// include "./loader.php";


class CompetenceDAO
{

    // ================================================================================= //
    // ============================= Get All Stagiaiers ================================ //
    // ================================================================================= //

    public function GetAllStagiaiers()
    {
        $sql = "SELECT * FROM `Competences`";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $Stagiaiers = [];
        foreach ($result as $row) {
            $Competence = new Competence($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
            array_push($Stagiaiers, $Competence);
        }
        return $Stagiaiers;
    }


    // ================================================================================= //
    // ================================= Add Stagiaiers ================================ //
    // ================================================================================= //

    public function AddStagiaiers($Stagiaiers)
    {
        $sql = Connect::DB()->prepare("INSERT INTO Competences (`full_name`, `email`, `phone_number`, `address`, `idCity`) 
        VALUES (:FN, :Em, :Ph, :Ad ,:CT)");
        $fullName       = $Stagiaiers->GetFullName();
        $email          = $Stagiaiers->GetEmail();
        $phoneNumber    = $Stagiaiers->GetPhone_number();
        $address        = $Stagiaiers->GetAddress();
        $idCity         = $Stagiaiers->GetIdCity();

        $sql->execute([
            'FN' => $fullName,
            'Em' => $email,
            'Ph' => $phoneNumber,
            'Ad' => $address,
            'CT' => $idCity
        ]);

        $lastInsertId = Connect::DB()->lastInsertId();
        return $lastInsertId;
    }

    // ================================================================================= //
    // =============================== Delete Stagiaiers =============================== //
    // ================================================================================= //

    public function DeleteCompetence($ID)
    {
        $sql = "DELETE FROM `Competences` WHERE `id` = $ID";
        Connect::DB()->query($sql);
    }

    // ================================================================================= //
    // ============================= get Stagiares By Id =============================== //
    // ================================================================================= //
    public function getStagiaresById($ID)
    {
        $sql = "SELECT * FROM `Competences` WHERE `id` = $ID";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $Competence = new Competence($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
        }
        return $Competence;
    }

    // ================================================================================= //
    // ========================== Update Stagiares By Id =============================== //
    // ================================================================================= //

    public function UpdateTrainee($Stagiaiers)
    {
        $updateQuery = "UPDATE Competences
                            SET
                                full_name = :full_name,
                                email = :email,
                                phone_number = :phone_number,
                                address = :address,
                                idCity = :idCity
                            WHERE id = :id";

        $stm = Connect::DB()->prepare($updateQuery);

        $stm->bindValue(':full_name', $Stagiaiers->getFullName());
        $stm->bindValue(':email', $Stagiaiers->getEmail());
        $stm->bindValue(':phone_number', $Stagiaiers->GetPhone_number());
        $stm->bindValue(':address', $Stagiaiers->GetAddress());
        $stm->bindValue(':idCity', $Stagiaiers->GetIdCity());
        $stm->bindValue(':id', $Stagiaiers->GetId());

        $stm->execute();

        return $stm->rowCount();
    }


    // ================================================================================= //
    // ========================= VALIDATION required Input ============================= //
    // ================================================================================= //



    public function requiredInput($Stagiaiers)
    {
        $Errors = [];
        if (empty($Stagiaiers->GetFullName())) {
            $massegFullName = "full name is requird";
            array_push($Errors, $massegFullName);
        }

        if (empty($Stagiaiers->GetEmail())) {
            $massegEmail = " Email is requird";
            array_push($Errors, $massegEmail);
        }

        if (empty($Stagiaiers->GetPhone_number())) {
            $massegPhoneNumber = " Phone Number  is requird";
            array_push($Errors, $massegPhoneNumber);
        }

        if (empty($Stagiaiers->GetAddress())) {
            $massegAdderss = " Address  is requird";
            array_push($Errors, $massegAdderss);
        }

        return $Errors;
    }

    // ================================================================================= //
    // ============================= VALIDATION Email  ================================= //
    // ================================================================================= //

    public function isEmailExists($email, $id, $email_exist)
    {
        if ($email_exist == false) {
            $sql = "SELECT * FROM `Competences` WHERE `email` = :email";
            $stm = Connect::DB()->prepare($sql);
            $stm->bindValue(':email', $email);
        } else {
            $sql = "SELECT * FROM `Competences` WHERE `email` = :email AND `id` != :id ";
            $stm = Connect::DB()->prepare($sql);
            $stm->bindValue(':email', $email);
            $stm->bindValue(':id', $id);
        }


        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? false : true;
    }
}