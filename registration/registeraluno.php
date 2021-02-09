<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Você deve se logar primeiro";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>

  <?php include('serveraluno.php') ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Registro de Aluno</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
        <h2>Registro de Aluno</h2>
    </div>
      
    <form method="post" action="registeraluno.php">
        <?php include('errors.php'); ?>
        <p>
          (*) Campos de preenchimento obrigatório
        </p>
        <div class="input-group">
          <label>Nome*</label>
          <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
          <label>Data de Nascimento*</label>
          <input type="date" name="data_nasc" value="<?php echo $data_nasc; ?>">
        </div>
        <div class="input-group">
          <label>Sexo*</label>
          <input type="text" name="sexo" value="<?php echo $sexo; ?>">
        </div>
        <div class="input-group">
          <label>Cidade</label>
          <input type="text" name="cidade" value="<?php echo $cidade; ?>">
        </div>
        <div class="input-group">
          <label>Bairro</label>
          <input type="text" name="bairro" value="<?php echo $bairro; ?>">
        </div>
        <div class="input-group">
          <label>Rua</label>
          <input type="text" name="rua" value="<?php echo $rua; ?>">
        </div>
        <div class="input-group">
          <label>Número</label>
          <input type="number" name="numero" value="<?php echo $numero; ?>">
        </div>
        <div class="input-group">
          <label>Complemento</label>
          <input type="text" name="complemento" value="<?php echo $complemento; ?>">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="reg_aluno">Registrar</button>
        </div>
        <p>
            Voltar para a página inicial? <a href="index.php">Clique aqui</a>
        </p>
    </form>
  </body>
  </html>   