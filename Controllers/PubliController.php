<?php
include '../Dao/Publicacao.php';

class PubliController 
{
    private $model;

    function __construct()
    {
        $this->model = new Publicacao();
        $this->getAllPerfil();
    }

    function getAllPerfil()
    {
        $id=$_GET['id'];
        $resultData = $this->model->getPubli($id);
        $_SESSION['pub'] = $resultData;
        header('location: ../View/Pub.php');
    }
}

new PubliController();

?>