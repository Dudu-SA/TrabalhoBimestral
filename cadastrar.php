<?php
    session_start();
    include('conexao.php');
if(empty($_POST['nome']) || empty($_POST['date']) || empty($_POST['address'])||
       empty($_POST['numc'])|| empty($_POST['zip']) || 
       empty($_POST['responsible_name']) || empty($_POST['kinship']) || empty($_POST['course']) || empty($_POST['email']) ||
       empty($_POST['senha'])) {
        $_SESSION['mensagem'] = "Todos os campos são obrigatórios.";
        header('Location: index.php');
        exit();
    }

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $date = mysqli_real_escape_string($conexao, $_POST['date']);
    $address = mysqli_real_escape_string($conexao, $_POST['address']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']); 
    $numc = mysqli_real_escape_string($conexao, $_POST['numc']);
    $zip = mysqli_real_escape_string($conexao, $_POST['zip']);
    $nomeresponsible = mysqli_real_escape_string($conexao, $_POST['responsible_name']);
    $kinship = mysqli_real_escape_string($conexao, $_POST['kinship']);
    $course = mysqli_real_escape_string($conexao, $_POST['course']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$sqlinsert ="INSERT INTO aluno(nome, datanas, email, senha, rua, numc, cep, curso, nomer, tipor) VALUES ('$nome', '$date', '$email', '$senha', '$address', '$numc', '$zip', '$course', '$nomeresponsible', '$kinship')";    
  if(mysqli_query($conexao, $sqlinsert)) {
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso.";
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar. Tente novamente.";
        header('Location: index.php');
        exit();
    }