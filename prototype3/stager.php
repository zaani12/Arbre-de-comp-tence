
<?php
class stager
{
    private $id;
    private $nom;
    private $prenom;
    private $Ville_id;

    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        return $this->id = $id;
    }

    function getNom()
    {
        return $this->nom;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }


    function getprenom()
    {
        return $this->prenom;
    }

    function setprenom($prenom)
    {
       return $this->prenom = $prenom;
    }



    public function getVilleId()
    {
        return $this->Ville_id;
    }
    public function setVilleId($Ville_id)
    {
        $this->Ville_id = $Ville_id;
    }

   }
?>