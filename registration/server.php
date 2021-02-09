<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'registration');

// Registro do Usuário
if (isset($_POST['reg_user'])) {
  // receba todos os valores de entrada do formulário
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)) { array_push($errors, "Nome de Usuário é requirido"); }
  if (empty($email)) { array_push($errors, "Email é requirido"); }
  if (empty($password_1)) { array_push($errors, "Senha é requirida"); }
  if ($password_1 != $password_2) {
	array_push($errors, "As senhas não conferem");
  }

  // primeiro verifique o banco de dados para ter certeza
  // um usuário ainda não existe com o mesmo nome de usuário e / ou e-mail
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // se usuario existe
    if ($user['username'] === $username) {
      array_push($errors, "Nome de Usuário Existente");
    }

    if ($user['email'] === $email) {
      array_push($errors, "E-mail Existente");
    }
  }

  // Por fim, registre o usuário se não houver erros no formulário
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Você está logado";
  	header('location: index.php');
  }
}

// Login do Usuário
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Nome de Usuário é requirido");
    }
    if (empty($password)) {
        array_push($errors, "Senha é requirida");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        //if (mysqli_num_rows($results) == 1) {
        if (!$results || mysqli_num_rows($results) == 1){
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Você está logado";
          header('location: index.php');
        }else {
            array_push($errors, "Combinação de Nome de Usuário/Senha incorreta");
        }
    }
  }
  
  ?>