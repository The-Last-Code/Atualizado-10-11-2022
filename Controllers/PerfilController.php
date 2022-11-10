<?php
   
    require_once "../Dao/Perfil.php";
    include '../Controllers/IClientsController.php';

    class ClientsController 
    {
        private $model;

        function __construct()
        {
            $this->model = new ClientModel();
        }

    function getAllPerfil()
    {
        $resultData = $this->model->getAllCientista($_SESSION['login']);
        $_SESSION['perfil'] = $resultData;
    }
}
?>