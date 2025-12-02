<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['email_admin'])) {
    header('Location: login.php'); 
    exit();
}

$id_aluno = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_aluno > 0) {
    // Primeiro, busca o nome do aluno para a mensagem de feedback
    $sql_select = "SELECT nome FROM aluno WHERE id = {$id_aluno}";
    $resultado_select = mysqli_query($conexao, $sql_select);
    $nome_aluno = '';
    
    if ($resultado_select && mysqli_num_rows($resultado_select) > 0) {
        $aluno = mysqli_fetch_assoc($resultado_select);
        $nome_aluno = htmlspecialchars($aluno['nome']);
    }

    // Executa a exclusão
    $sql_delete = "DELETE FROM aluno WHERE id = {$id_aluno}";
    
    if (mysqli_query($conexao, $sql_delete)) {
        $_SESSION['mensagem_admin'] = "Aluno **{$nome_aluno}** (ID: {$id_aluno}) excluído com sucesso.";
    } else {
        $_SESSION['mensagem_admin'] = "Erro ao excluir aluno (ID: {$id_aluno}): " . mysqli_error($conexao);
    }
} else {
    $_SESSION['mensagem_admin'] = "ID de aluno inválido para exclusão.";
}

header('Location: painel_admin.php');
exit();
?>