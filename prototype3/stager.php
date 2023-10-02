
<?php
class stager
{
    private $id;
    private $nom;
    private $prenom;

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
    public function getVille()
    {
        return $this->Ville;
    }
    public function setVille($Ville)
    {
        $this->Ville = $Ville;
    }

   }
?>