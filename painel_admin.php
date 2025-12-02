<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['email_admin'])) {
    header('Location: login.php'); 
    exit();
}


$sql_alunos = "SELECT id, nome, email, datanas, curso FROM aluno ORDER BY id ASC";
$resultado_alunos = mysqli_query($conexao, $sql_alunos);

function get_curso_name_admin($abbr) {
    switch ($abbr) {
        case 'enf': return 'Enfermagem';
        case 'adm': return 'Administração';
        case 'info': return 'Informática';
        case 'ds': return 'Desenv. de Sistemas';
        default: return 'Não Informado';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador - EEEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body { background-color: #f8f9fa; padding-top: 70px; }
        .card-header-custom { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #dc3545;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="index.php">
            👑 Painel do Administrador
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="logout_admin.php">Sair (Admin)</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-sm mb-4">
        <div class="card-header card-header-custom">
            <h4 class="mb-0">Lista de Alunos Cadastrados</h4>
        </div>  
        <div class="card-body">
            
            <?php if (isset($_SESSION['mensagem_admin'])): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['mensagem_admin']; unset($_SESSION['mensagem_admin']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data Nasc.</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($resultado_alunos) > 0):
                            while ($aluno = mysqli_fetch_assoc($resultado_alunos)): 
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($aluno['datanas'])); ?></td>
                            <td><?php echo get_curso_name_admin($aluno['curso']); ?></td>
                            <td>
                                <a href="editar_aluno.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                                <a href="excluir_aluno.php?id=<?php echo $aluno['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?');">Excluir</a>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        else:
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Nenhum aluno cadastrado.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6t6Vp/d3Vz5r/9+s11X9M/jP8t1I9G2L+5V9p8t+YV5iEwF2N3t/k0D0R5W2K7" crossorigin="anonymous"></script>
</body>
</html>