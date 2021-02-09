<?php

// initializing variables
$numeroturma = $descricao = $quantvagas = $nomeprofessor ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTRAR TURMA
if (isset($_POST['reg_turma'])) {
  // receive all input values from the form
  //$matricula = mysqli_real_escape_string($db, $_POST['matricula']);
  $numeroturma = mysqli_real_escape_string($db, $_POST['numeroturma']);
  $descricao = mysqli_real_escape_string($db, $_POST['descricao']);
  $quantvagas = mysqli_real_escape_string($db, $_POST['quantvagas']);
  $nomeprofessor = mysqli_real_escape_string($db, $_POST['nomeprofessor']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  //if (empty($matricula)) { array_push($errors, "Matrícula é requirida"); }
  if (empty($numeroturma)) { array_push($errors, "Número de Turma é requirido"); }
  if (empty($descricao)) { array_push($errors, "Descrição é requirida"); }
  if (empty($quantvagas)) { array_push($errors, "Quantidade de Vagas é requirida"); }
  if (empty($nomeprofessor)) { array_push($errors, "Nome do Professor é requirido"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $registrations_check_query = "SELECT * FROM registration_turma WHERE numeroturma='$numeroturma' LIMIT 1";
  $result = mysqli_query($db, $registrations_check_query);
  $registrations = mysqli_fetch_assoc($result);
  
  if ($registrations) { // if user exists
    if ($registrations['numeroturma'] === $numeroturma) {
      array_push($errors, "Número de Turma já existente");
    }
} 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO registration_turma (numeroturma, descricao, quantvagas, nomeprofessor) 
  			  VALUES('$numeroturma', '$descricao', '$quantvagas', '$nomeprofessor')";
  	mysqli_query($db, $query);
  	//$_SESSION['matricula'] = $matricula;
  	//$_SESSION['success'] = "Adicionado com sucesso";
  	header('location: registerturma.php');
  }
}


?>