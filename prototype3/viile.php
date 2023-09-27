<?php
class ville{
    private $id;
    private $villeName;

    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        return $this->id = $id;
    }

    function getvilleName()
    {
        return $this->villeName;
    }

    function setvilleName($villeName)
    {
        $this->villeName = $villeName;
    }
}