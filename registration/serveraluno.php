<?php

// initializing variables
$nome = $sexo = $data_nasc = $cidade = $bairro =$rua = $numero = $complemento ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_aluno'])) {
  // receive all input values from the form
  //$matricula = mysqli_real_escape_string($db, $_POST['matricula']);
  $nome = mysqli_real_escape_string($db, $_POST['nome']);
  $sexo = mysqli_real_escape_string($db, $_POST['sexo']);
  $data_nasc = mysqli_real_escape_string($db, $_POST['data_nasc']);
  $cidade = mysqli_real_escape_string($db, $_POST['cidade']);
  $bairro = mysqli_real_escape_string($db, $_POST['bairro']);
  $rua = mysqli_real_escape_string($db, $_POST['rua']);
  $numero = mysqli_real_escape_string($db, $_POST['numero']);
  $complemento = mysqli_real_escape_string($db, $_POST['complemento']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($matricula)) { array_push($errors, "Matrícula é requirida"); }
  if (empty($nome)) { array_push($errors, "Nome é requirido"); }
  if (empty($sexo)) { array_push($errors, "Sexo é requirido"); }
  if (empty($data_nasc)) { array_push($errors, "Data de Nascimento é requirida"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  /* $registrations_check_query = "SELECT * FROM registration_aluno WHERE matricula='$matricula' LIMIT 1";
  $result = mysqli_query($db, $registrations_check_query);
  $registrations = mysqli_fetch_assoc($result);
  
  if ($registrations) { // if user exists
    if ($registrations['matricula'] === $matricula) {
      array_push($errors, "Matrícula já existente");
    }
} */

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO registration_aluno (nome, sexo, data_nasc, cidade, bairro, rua, numero, complemento) 
  			  VALUES('$nome', '$sexo', '$data_nasc', '$cidade', '$bairro', '$rua', '$numero', '$complemento')";
  	mysqli_query($db, $query);
  	//$_SESSION['matricula'] = $matricula;
  	//$_SESSION['success'] = "Adicionado com sucesso";
  	header('location: registeraluno.php');
  }
}
?>