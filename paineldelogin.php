<?php
session_start();
include('conexao.php'); 

$nome_aluno = 'Usuário'; 
$aluno_data = null; 


if (!isset($_SESSION['email'])) { 
    header('Location: login.php'); 
    exit(); 
} else {
    $email_logado = mysqli_real_escape_string($conexao, $_SESSION['email']);
    
    
    $sql_aluno = "SELECT nome, datanas, email, rua, numc, cep, curso, nomer, tipor FROM aluno WHERE email = '{$email_logado}'";
    $resultado_aluno = mysqli_query($conexao, $sql_aluno);

    if ($resultado_aluno && mysqli_num_rows($resultado_aluno) > 0) {
        $aluno_data = mysqli_fetch_assoc($resultado_aluno);
        
        $nome_aluno = ucwords(strtolower($aluno_data['nome'])); 
    } else {
        
        session_destroy();
        header('Location: login.php'); 
        exit();
    }
    
    function get_curso_name($abbr) {
        switch ($abbr) {
            case 'enf': return 'Enfermagem';
            case 'adm': return 'Administração';
            case 'info': return 'Informática';
            case 'ds': return 'Desenvolvimento de Sistemas';
            default: return 'Não Informado';
        }
    }
    
    function get_kinship_name($abbr) {
        switch ($abbr) {
            case 'mae': return 'Mãe';
            case 'pai': return 'Pai';
            case 'outro': return 'Outro';
            default: return 'Não Informado';
        }
    }
    
    $curso_nome = get_curso_name($aluno_data['curso']);
    $parentesco_nome = get_kinship_name($aluno_data['tipor']);

    $data_nasc_formatada = date('d/m/Y', strtotime($aluno_data['datanas']));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Aluno - EEEP Manoel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body { background-color: #f8f9fa; padding-top: 70px; }
        .card-header-custom { background-color: #198754; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #198754;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="index.php">
            <i class="bi bi-mortarboard-fill"></i> EEEP Manoel Mano
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Entrar (Login)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="painel.php">Painel de Estatísticas</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-white fw-bold" href="paineldelogin.php">Meu Painel</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header card-header-custom">
                    <h4 class="mb-0">Olá, <?php echo htmlspecialchars($nome_aluno); ?>! 👋</h4>
                </div>  
                <div class="card-body">
                    <p class="lead">Aqui estão as suas informações de cadastro na EEEP Manoel Mano.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row g-4">
        
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">👤 Dados Pessoais</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nome Completo:</strong> <?php echo htmlspecialchars($aluno_data['nome']); ?></p>
                    <p><strong>E-mail:</strong> <?php echo htmlspecialchars($aluno_data['email']); ?></p>
                    <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nasc_formatada); ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">📚 Informações sobre o Curso</h5>
                </div>
                <div class="card-body">
                    <p><strong>Curso Escolhido:</strong> <?php echo htmlspecialchars($curso_nome); ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">🏠 Informações de Endereço</h5>
                </div>
                <div class="card-body">
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($aluno_data['rua'] . ", " . $aluno_data['numc']); ?></p>
                    
                    <p><strong>CEP:</strong> <?php echo htmlspecialchars($aluno_data['cep']); ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">👨‍👩‍👧‍👦 Informações do Responsável</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nome do Responsável:</strong> <?php echo htmlspecialchars($aluno_data['nomer']); ?></p>
                    <p><strong>Parentesco:</strong> <?php echo htmlspecialchars($parentesco_nome); ?></p>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row mt-4 mb-5">
        <div class="col-12 text-center">
             <a href="index.php" class="btn btn-danger btn-lg">Sair do Painel</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6t6Vp/d3Vz5r/9+s11X9M/jP8t1I9G2L+5V9p8t+YV5iEwF2N3t/k0D0R5W2K7" crossorigin="anonymous"></script>
</body>
</html>