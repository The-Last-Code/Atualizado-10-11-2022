<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $tableCientista;
        private $tableTelefone;
        private $tableArea_atuacao_cientista;
        private $tableProjeto;

        function __construct()
        {
            parent::__construct();
            $this->tableCientista = 'cientista';
            $this->tableTelefone = 'telefone';
            $this->tableArea_atuacao_cientista = 'area_atuacao_cientista';
            $this->tableProjeto = 'projeto';
        }
        
        function getAllCientista($id)
        {   
            $sqlSelect = $this->pdo->query("SELECT tit_projeto, dti_projeto, dtt_projeto, email_cientista, res_projeto, nom_cientista FROM projeto
            JOIN cientista WHERE fk_id_cientista = $id AND id_cientista = $id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }
    }
?>

