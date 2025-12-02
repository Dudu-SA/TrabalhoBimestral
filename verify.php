<?php
session_start();
include('conexao.php');

if (empty($_POST['emaile']) || empty($_POST['senhae'])) {
    header('Location: login.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['emaile']);
$senha = mysqli_real_escape_string($conexao, $_POST['senhae']);


$admin_email = 'admin@adm.com';
$admin_senha = 'eeepmanoelmano';

if ($email === $admin_email && $senha === $admin_senha) {

    $_SESSION['email_admin'] = $admin_email; 
    header('Location: painel_admin.php'); 
    exit();
}

$query = "SELECT id, email FROM aluno WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conexao, $query);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION['email'] = $email; 
    header('Location: paineldelogin.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: login.php');
    exit();
}

?>