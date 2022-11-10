<?php
require_once '../Conection/Conn.php';


    class Login extends Conn {
        
        public $msgErro = "";   
        private $tableCientista;

        public function __construct(){
            parent::__construct();
            $this->tableCientista = 'cientista';
        }
                                              
        public function Login($cpf_cientista, $snh_cientista)
        {
            
            $sql = $this->pdo->prepare("SELECT *FROM $this->tableCientista WHERE
            cpf_cientista = :b AND snh_cientista = :g");
            $sql->bindValue(":b", $cpf_cientista);
            $sql->bindValue(":g", $snh_cientista);
            
            $sql = $this->pdo->prepare(("SELECT id_cientista FROM $this->tableCientista WHERE cpf_cientista = :b; "));
            $sql->bindValue(":b", $cpf_cientista);
            $sql->execute();
            $id=$sql->fetch();

            if($sql->rowCount() > 0)
            { 
            
                session_start();
                $_SESSION['login'] = $id['id_cientista'];
                return true; 
            }
            else
            {
                return false; 
            }
        }
    }

?>