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
            $sqlSelect = $this->pdo->query("SELECT * FROM cientista
            INNER JOIN projeto ON cientista.id_cientista");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }
    }
?>