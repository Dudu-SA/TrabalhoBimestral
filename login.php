<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Página de cadastro com Bootstrap 5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szQ/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Bootstrap 5 Sign Up Page</title>
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
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10 col-sm-12">
                    <div class="text-center my-5">
                        <img src="https://eeepmanoelmano.com.br/assets/logo-escola-vertical-dark-814d04a6.svg" alt="logo" width="200">
                    </div>

                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-5 text-center">Entrar</h1>
                            
                            <form action="verify.php" method="POST" class="row g-3 needs-validation" novalidate="" autocomplete="off">
                                
                                <div class="col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" id="email" name="emaile" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Por favor, informe seu E-mail.
                                    </div>
                                </div>
                                
								<div class="col-md-6">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" id="senha" name="senhae" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Por favor, informe sua Senha.
                                    </div>
                                </div>
                                
                                
								
                                <div class="col-12 mt-4">
                                    <div class="form-check"></div> 
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success w-100">Entar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="text-center mt-5 text-muted">
                        Não tem uma conta? <a href="index.php" class="text-decoration-none">Cadastre-se aqui</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5S9G5p5+X5N2w2P5y1d4Lw+q5P4Jp5qXzK9n3L2S5G5p5+Q5x5T5z4Y3X0k1k2k3v7G5/n5R2Q3p7Y2X9w3w3S5/q" crossorigin="anonymous"></script>
    
    <script>
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