<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Acesso</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Nome de Usuário</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Senha</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Entrar</button>
  	</div>
  	<p>
  		Não possui registro? <a href="register.php">Registre aqui</a>
  	</p>
  </form>
</body>
</html>