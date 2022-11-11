<?php

require_once '../Conection/Conn.php';

    class Publicacao extends Conn{
        private $tableProjeto;
        
        public function __construct()
        {
            parent::__construct();
            $this->tableProjeto ='projeto';
        }

        public function setCadastroPub($tit_projeto, $dti_projeto, $dtt_projeto,$res_projeto, $pub_projeto, $id)
        {
                $sql = $this->pdo->prepare("INSERT INTO $this->tableProjeto(tit_projeto,dti_projeto,dtt_projeto
                ,res_projeto,pub_projeto, fk_id_cientista)
                VALUES (:a, :b,:c,:d,:e, :f)");

                $sql->bindValue(":a", $tit_projeto);
                $sql->bindValue(":b", $dti_projeto);
                $sql->bindValue(":c", $dtt_projeto);
                $sql->bindValue(":d", $res_projeto);
                $sql->bindValue(":e", $pub_projeto);
                $sql->bindValue(":f", $id);
                $sql->execute(); 
                return true;
            }

            public function getPubli($id)
            {
                $sql = $this->pdo->prepare("SELECT * FROM $this->tableProjeto where id_projeto = :a");
    
                // ("SELECT * FROM cientista
                // INNER JOIN projeto ON cientista.id_cientista")

                    $sql->bindValue(":a", $id);
                    $sql->execute(); 
                    return true;
            }

        
}
    
?>