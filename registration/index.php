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

  <!DOCTYPE html>
  <html>
  <head>
    <title>Portal de Alunos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
        <h2>Onde você deseja ir?</h2>
    </div>
    <form method="post"> 
        <p>
            <a href="registeraluno.php">Registrar Aluno</a>
        </p>        
        <p>
            <a href="registerturma.php">Registrar Turma</a>
        </p>  
        <p>
            <a href="dologout.php">Sair</a>
        </p>
    </form>
  </body>
  </html>   
