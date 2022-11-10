
<?php
session_start();

if (empty($_SESSION["login"])) {
	header('location: LoginCadastro.php');
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styleFormPubli.css">
    <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
    <title>Formulário</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="./img/cientistas.png" alt="">
        </div>
        <div class="form">
            <form action="../Controllers/CadastroController.php" method="POST">
                <input type="hidden" name="acao" value="cadastroPub">
                <div class="form-header">
                    <div class="title">
                        <h1>Criar Publicação</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label >Titulo</label>
                        <input  type="text" name="tit_projeto" placeholder="Título" required>
                    </div>

                    <div class="input-box">
                        <label>Data de Início</label>
                        <input  type="date" placeholder="Data de Início" name="dti_projeto" required>
                    </div>
                    <div class="input-box">
                        <label >Data Final</label>
                        <input  type="date" placeholder="Data de Termino" name="dtt_projeto" required>
                    </div>
                    <div class="input-box">
                        <label >Resumo</label>
                        <textarea placeholder="Mensagem" name="res_projeto" required  cols="30" rows="10"></textarea>
                    </div> 
                </div>

                
                    <select name="pub_projeto" class="field">
						<option value="">Tipo de acesso</option>
						<option value="1">Publico</option>
						<option value="0">Privado</option>
					</select>
                
                <div class="continue-button">
                    <button class="btn1" type="submit">Criar Publicação</button>
                    <a class="btn2" href="Home.php">Voltar</a>
                </div>

                   
                
            </form>
        </div>
    </div>
</body>

</html>