<?php

class StagiairesDAO
{
    public function GetAllStagiaiers()
    {
        $sql = "SELECT * FROM `stagiaires`";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $Stagiaiers = [];
        foreach ($result as $row) {
            $Stagiaire = new Stagiaires($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
            array_push($Stagiaiers, $Stagiaire);
        }
        return $Stagiaiers;
    }


    public function AddStagiaiers($Stagiaiers)
    {
        // $sql = "INSERT "


        $sql = Connect::DB()->prepare("INSERT INTO stagiaires (`full_name`, `email`, `phone_number`, `address`, `idCity`) 
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

    public function DeleteStagiaire($ID)
    {
        $sql = "DELETE FROM `stagiaires` WHERE `id` = $ID";
        Connect::DB()->query($sql);
    }

    public function getStagiaresById($ID)
    {
        $sql = "SELECT * FROM `stagiaires` WHERE `id` = $ID";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $Stagiaire = new Stagiaires($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
        }
        return $Stagiaire;
    }

         public function UpdateDataTrainee($Stagiaiers)
    {




        $Update = "UPDATE stagiaires
                    SET
                    full_name='" . $Stagiaiers->GetFullName() . "',
                        email='" . $Stagiaiers->GetEmail() . "',
                        phone_number='" . $Stagiaiers->GetPhone_number() . "',
                        address='" . $Stagiaiers->GetAddress() . "',
                        idCity='" . $Stagiaiers->GetIdCity() . "'
                    WHERE id=" . $Stagiaiers->GetId();

        $stm = Connect::DB()->prepare($Update);
        $stm->execute();
        return $stm->rowCount();
    } 

    // ====================================validation============


    // public function validateStagiaires($Stagiaires)
    // {
    //     $errors = [];

    //     // Perform validation for each field in the Stagiaires object
    //     if (empty($Stagiaires->GetFullName())) {
    //         $errors['full_name'] = 'Full name is required.';
    //     }

    //     if (empty($Stagiaires->GetEmail()) || !filter_var($Stagiaires->GetEmail(), FILTER_VALIDATE_EMAIL)) {
    //         $errors['email'] = 'Valid email is required.';
    //     }

    //     // Add more validation rules for other fields as needed

    //     return $errors;
    // }
}
