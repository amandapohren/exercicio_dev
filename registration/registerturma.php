<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  ?>

  <?php include('serverturma.php') ?>
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
      
    <form method="post" action="registerturma.php">
        <?php include('errors.php'); ?>
        <p>
          (*) Campos de preenchimento obrigatório
        </p>
        <div class="input-group">
          <label>Número da Turma*</label>
          <input type="number" name="numeroturma" value="<?php echo $numeroturma; ?>">
        </div>
        <div class="input-group">
          <label>Descrição*</label>
          <input type="text" name="descricao" value="<?php echo $descricao; ?>">
        </div>
        <div class="input-group">
          <label>Quantidade de Vagas*</label>
          <input type="number" name="quantvagas" value="<?php echo $quantvagas; ?>">
        </div>
        <div class="input-group">
          <label>Nome do Professor*</label>
          <input type="text" name="nomeprofessor" value="<?php echo $nomeprofessor; ?>">
        </div>
        <div class="input-group">
          <button type="submit" class="btn" name="reg_turma">Registrar Turma</button>
        </div>
        <p>
        Voltar para a página inicial? <a href="index.php">Clique aqui</a>
        </p>
    </form>
  </body>
  </html>   