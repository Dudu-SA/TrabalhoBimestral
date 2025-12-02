<?php
include('conexao.php');


$sql_total = "SELECT COUNT(*) AS total_alunos FROM aluno"; 
$resultado_total = mysqli_query($conexao, $sql_total);
$total_alunos = 0;
if ($resultado_total) {
    $linha_total = mysqli_fetch_assoc($resultado_total);
    $total_alunos = $linha_total['total_alunos'];
}

$sql_cursos = "SELECT curso, COUNT(*) AS count_curso FROM aluno GROUP BY curso";
$resultado_cursos = mysqli_query($conexao, $sql_cursos);

$cursos_labels = [];
$cursos_counts = [];
$cursos_percent = [];

if ($resultado_cursos) {
    while ($linha = mysqli_fetch_assoc($resultado_cursos)) {
        switch ($linha['curso']) {
            case 'Enfermagem':
                $nome_curso = 'Enfermagem';
                break;
            case 'Administração':
                $nome_curso = 'Administração';
                break;
            case 'Informática':
                $nome_curso = 'Informática';
                break;
            case 'Desenvolvimento de Sistemas':
                $nome_curso = 'Desenv. de Sistemas';
                break;
            default:
                $nome_curso = 'Outro';
        }
        
        $count = (int)$linha['count_curso'];
        $porcentagem = ($total_alunos > 0) ? round(($count / $total_alunos) * 100, 2) : 0;
        
        $cursos_labels[] = $nome_curso;
        $cursos_counts[] = $count;
        $cursos_percent[] = $porcentagem;
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - EEEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-section {
            background-color: #0d6efd; 
            color: white;
            padding: 20px 0;
            margin-bottom: 20px;
        }
        .card-alunos {
            border-left: 5px solid #198754; 
        }
        .chart-container {
            position: relative;
            height: 40vh; 
            width: 80vw;
            margin: 0 auto;
        }

        .main-content {
            padding-top: 80px; 
        }
        @media (min-width: 992px) { 
            .chart-container {
                width: 40vw;
            }
        }
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
                    <a class="nav-link text-white" aria-current="page" href="index.php">
                        Página Inicial
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">
                        Entrar (Login)
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="painel.php">
                        Painel de Estatísticas
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

    <div class="container main-content"> 
        
        <header class="text-center py-4 my-4 border-bottom">
            <h1 class="display-6 fw-bold text-success">📊 Painel Administrativo e Estatístico</h1>
            <p class="lead text-muted">Análise e contagem de matrículas da EEEP Manoel Mano.</p>
        </header>
       
        <div class="text-center mt-3 mb-4 text-muted">
              Deseja voltar? <a href="index.php" class="text-decoration-none">Entre aqui</a>
        </div>
        
        <div class="row mb-4">
            <div class="col-lg-12">
                <div class="card card-alunos shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-success">🎓 Total de Alunos Cadastrados</h5>
                                <p class="card-text fs-2 fw-bold mb-0"><?php echo $total_alunos; ?></p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#198754" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.216-5A5.002 5.002 0 0 0 6 13V2a5.006 5.006 0 0 0-4.792 4.792A5.005 5.005 0 0 0 0 8.5V11a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 0-1h-.5v-1.5a.5.5 0 0 0-.5-.5.5.5 0 0 0-.5.5V11h2c-.105.37-.253.68-.415.932A6 6 0 0 1 1 14.5a.5.5 0 0 0 1 0v-.522a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V14a.5.5 0 0 0-.5.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="mt-4 mb-3 text-secondary">Contagem de Alunos por Curso</h3>
        <div class="row mb-4">
            
            <?php 
            $card_styles = [
                'Enfermagem' => ['color' => 'rgb(25, 135, 84)', 'icon' => '💉'], 
                'Administração' => ['color' => 'rgb(255, 193, 7)', 'icon' => '💼'], 
                'Informática' => ['color' => 'rgb(13, 110, 253)', 'icon' => '💻'], 
                'Desenv. de Sistemas' => ['color' => 'rgb(220, 53, 69)', 'icon' => '⚙️'], 
            ];
            
            for ($i = 0; $i < count($cursos_labels); $i++) {
                $curso = $cursos_labels[$i];
                $count = $cursos_counts[$i];
                $percent = $cursos_percent[$i];
                
                $style = $card_styles[$curso] ?? $card_styles['Outro']; 
            ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card shadow-sm h-100" style="border-left: 5px solid <?php echo $style['color']; ?>;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="card-title text-uppercase" style="color: <?php echo $style['color']; ?>;">
                                        <?php echo $style['icon']; ?> <?php echo $curso; ?>
                                    </h6>
                                    <p class="card-text fs-3 fw-bold mb-0">
                                        <?php echo $count; ?> 
                                        <small class="text-muted fs-6">(<?php echo $percent; ?>%)</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            }
            ?>
        </div>
        <hr>

        <div class="row">
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Gráfico de Pizza (Percentual por Curso)</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="chart-container">
                             <canvas id="pizzaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Gráfico de Barras (Contagem de Alunos por Curso)</h5>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="chart-container">
                             <canvas id="barrasChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        const labels = <?php echo json_encode($cursos_labels); ?>;
        const counts = <?php echo json_encode($cursos_counts); ?>;
        const percents = <?php echo json_encode($cursos_percent); ?>;
        
        const backgroundColors = [
            'rgba(255, 193, 7, 0.7)',   
            'rgba(220, 53, 69, 0.7)', 
            'rgba(25, 135, 84, 0.7)', 
            'rgba(13, 110, 253, 0.7)', 
        ];
        const borderColors = [
            'rgb(255, 193, 7)',
            'rgb(220, 53, 69)',
            'rgb(25, 135, 84)',
            'rgb(13, 110, 253)',
        ];


        new Chart(document.getElementById('pizzaChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Percentual de Alunos',
                    data: percents, 
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                
                                return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                            }
                        }
                    }
                }
            }
        });


        new Chart(document.getElementById('barrasChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Contagem de Alunos',
                    data: counts, 
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Número de Alunos'
                        },
                        ticks: {
                             callback: function(value) {if (value % 1 === 0) {return value;}}
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-C6t6Vp/d3Vz5r/9+s11X9M/jP8t1I9G2L+5V9p8t+YV5iEwF2N3t/k0D0R5W2K7" crossorigin="anonymous"></script>
</body>
</html>