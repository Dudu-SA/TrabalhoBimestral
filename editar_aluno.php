<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['email_admin'])) {
    header('Location: login.php'); 
    exit();
}

$id_aluno = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$aluno_data = null;

if ($id_aluno > 0) {
    // Busca dados do aluno
    $sql_aluno = "SELECT * FROM aluno WHERE id = {$id_aluno}";
    $resultado_aluno = mysqli_query($conexao, $sql_aluno);
    
    if ($resultado_aluno && mysqli_num_rows($resultado_aluno) > 0) {
        $aluno_data = mysqli_fetch_assoc($resultado_aluno);
    } else {
        $_SESSION['mensagem_admin'] = "Aluno não encontrado.";
        header('Location: painel_admin.php');
        exit();
    }
} else {
    header('Location: painel_admin.php');
    exit();
}

// Processamento do formulário de edição
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $date = mysqli_real_escape_string($conexao, $_POST['date']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $address = mysqli_real_escape_string($conexao, $_POST['address']);
    $numc = mysqli_real_escape_string($conexao, $_POST['numc']);
    $zip = mysqli_real_escape_string($conexao, $_POST['zip']);
    $course = mysqli_real_escape_string($conexao, $_POST['course']);
    $nomeresponsible = mysqli_real_escape_string($conexao, $_POST['responsible_name']);
    $kinship = mysqli_real_escape_string($conexao, $_POST['kinship']);
    
    // ATENÇÃO: A senha não está sendo atualizada aqui. Adicione campos de senha se necessário.
    
    $sql_update = "UPDATE aluno SET 
                   nome = '$nome', datanas = '$date', email = '$email', 
                   rua = '$address', numc = '$numc', cep = '$zip', 
                   curso = '$course', nomer = '$nomeresponsible', tipor = '$kinship' 
                   WHERE id = {$id_aluno}";
    
    if (mysqli_query($conexao, $sql_update)) {
        $_SESSION['mensagem_admin'] = "Informações do aluno **{$nome}** atualizadas com sucesso.";
        header('Location: painel_admin.php');
        exit();
    } else {
        $_SESSION['mensagem_admin'] = "Erro ao atualizar: " . mysqli_error($conexao);
        header('Location: painel_admin.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno - EEEP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        body { background-color: #f8f9fa; padding-top: 70px; }
        .card-header-custom { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #dc3545;">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="painel_admin.php">
            👑 Painel do Administrador
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="painel_admin.php">Voltar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header card-header-custom">
            <h4 class="mb-0">Editar Aluno: <?php echo htmlspecialchars($aluno_data['nome']); ?> (ID: <?php echo $aluno_data['id']; ?>)</h4>
        </div>
        <div class="card-body p-5">
            <form method="POST" class="row g-3 needs-validation" novalidate="" autocomplete="off">

                <h5 class="mt-4">👤 Informações Pessoais</h5>
                <div class="col-md-6">
                    <label for="name" class="form-label">Nome Completo do Aluno</label>
                    <input type="text" id="name" name="nome" class="form-control" value="<?php echo htmlspecialchars($aluno_data['nome']); ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="date" class="form-label">Data de Nascimento</label>
                    <input type="date" id="date" name="date" class="form-control" value="<?php echo htmlspecialchars($aluno_data['datanas']); ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($aluno_data['email']); ?>" required>
                </div>
                
                <h5 class="mt-4">🏠 Informações de Endereço</h5>
                <div class="col-md-8">
                    <label for="inputAddress" class="form-label">Endereço (Rua, Av.)</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value="<?php echo htmlspecialchars($aluno_data['rua']); ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="inputAddress2" class="form-label">Número</label>
                    <input type="text" class="form-control" id="inputAddress2" name="numc" value="<?php echo htmlspecialchars($aluno_data['numc']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputZip" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="inputZip" name="zip" value="<?php echo htmlspecialchars($aluno_data['cep']); ?>" required>
                </div>
                 <h5 class="mt-4">👨‍👩‍👧‍👦 Informações do Responsável</h5>
                <div class="col-md-8">
                    <label for="responsible_name" class="form-label">Nome Completo do Responsável</label>
                    <input type="text" id="responsible_name" name="responsible_name" class="form-control" value="<?php echo htmlspecialchars($aluno_data['nomer']); ?>" required>
                </div>
                <div class="col-md-4">
                    <label for="kinship" class="form-label">Parentesco</label>
                    <select id="kinship" name="kinship" class="form-select" required>
                        <option disabled value="">Selecione...</option>
                        <?php 
                        $parentescos = ['mae' => 'Mãe', 'pai' => 'Pai', 'tio' => 'Tio(a)', 'avo' => 'Avô(ó)', 'irmao' => 'Irmão(ã)', 'outro' => 'Outro'];
                        foreach ($parentescos as $value => $label):
                            $selected = ($aluno_data['tipor'] == $value) ? 'selected' : '';
                        ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <h5 class="mt-4">📚 Informações sobre o Curso</h5>
                <div class="col-md-6">
                    <label for="course" class="form-label">Curso</label>
                    <select id="course" name="course" class="form-select" required>
                        <option disabled value="">Selecione o Curso...</option>
                        <?php 
                        $cursos = ['enf' => 'Enfermagem', 'adm' => 'Administração', 'info' => 'Informática', 'ds' => 'Desenvolvimento de Sistemas'];
                        foreach ($cursos as $value => $label):
                            $selected = ($aluno_data['curso'] == $value) ? 'selected' : '';
                        ?>
                        <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $label; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary w-100">Salvar Alterações</button>
                    <a href="painel_admin.php" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6t6Vp/d3Vz5r/9+s11X9M/jP8t1I9G2L+5V9p8t+YV5iEwF2N3t/k0D0R5W2K7" crossorigin="anonymous"></script>
<script>
    // Script de validação do Bootstrap
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
</body>
</html>