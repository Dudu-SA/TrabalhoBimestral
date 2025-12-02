<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro EEEP Manoel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <style>

        body {
            height: 100vh;
            margin: 0;
            position: relative;
            overflow-y: auto; 
        }

        .background-image {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://pbs.twimg.com/media/FZ5-ZpgWQAEoe6q.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1; 
            filter: brightness(0.6); 
        }

        .cadastro-content {
            position: relative; 
            z-index: 2; 
        }
        

        .cadastro-section {
            min-height: 100vh;
            display: flex;
            align-items: center; 
            justify-content: center;
            padding: 2rem 0; 
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            margin: 20px 0; 
        }
        
        .bloco-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-bottom: 1rem;
            min-height: 100%; 
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    
    <div class="background-image"></div>

    <div class="cadastro-content">

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
        <section class="w-100 cadastro-section">
            <div class="container">
                <div class="row justify-content-center">
                    
                    <div class="col-xxl-10 col-xl-11 col-lg-12 col-md-12 col-sm-12"> 
                        
                        <div class="card shadow-lg">
                            <div class="card-body p-5">
                                
                                <div class="text-center mb-3"> 
                                    <img src="https://eeepmanoelmano.com.br/assets/logo-escola-vertical-dark-814d04a6.svg" alt="logo" width="120"> 
                                </div>
                                
                                <h1 class="fs-4 card-title fw-bold mb-5 text-center">Cadastro</h1>
                                
                                <form action="cadastrar.php" method="POST" class="row g-3 needs-validation" novalidate="" autocomplete="off">
                                    
                                    <div class="row g-3">
                                    
                                        <div class="col-lg-6 col-md-12">
                                            <div class="bloco-info">
                                                <h5 class="mb-3">👤 Informações Pessoais</h5>
                                                
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label for="name" class="form-label">Nome Completo do Aluno</label>
                                                        <input type="text" id="name" name="nome" class="form-control" required> 
                                                        <div class="invalid-feedback">Por favor, informe seu nome completo.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="date" class="form-label">Data de Nascimento</label>
                                                        <input type="date" id="date" name="date" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, informe sua data de nascimento.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="email" class="form-label">E-mail</label>
                                                        <input type="email" id="email" name="email" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, informe seu E-mail.</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="senha" class="form-label">Senha</label>
                                                        <input type="password" id="senha" name="senha" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, informe sua Senha.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="bloco-info">
                                                <h5 class="mb-3">🏠 Informações de Endereço</h5>
                                                
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="inputAddress" class="form-label">Endereço (Rua, Av.)</label>
                                                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" required>
                                                        <div class="invalid-feedback">Por favor, informe o endereço.</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="inputAddress2" class="form-label">Número</label>
                                                        <input type="text" class="form-control" id="inputAddress2" name="numc" placeholder="1234" required>
                                                        <div class="invalid-feedback">Por favor, informe o número.</div>
                                                    </div>
                                                    <div class="col-8">
                                                        <label for="inputCity" class="form-label">Cidade</label>
                                                        <input type="text" class="form-control" id="inputCity" name="city" required>
                                                        <div class="invalid-feedback">Por favor, informe a cidade.</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputZip" class="form-label">CEP</label>
                                                        <input type="text" class="form-control" id="inputZip" name="zip" required>
                                                        <div class="invalid-feedback">Por favor, informe o CEP.</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputState" class="form-label">Estado</label>
                                                        <select id="inputState" name="state" class="form-select" required>
                                                            <option selected disabled value="">Escolha...</option>
                                                            <option value="AC">Acre</option>
                                                            <option value="AL">Alagoas</option>
                                                            <option value="AM">Amazonas</option>
                                                            <option value="AP">Amapá</option>
                                                            <option value="BA">Bahia</option>
                                                            <option value="CE">Ceará</option>
                                                            <option value="DF">Distrito Federal</option>
                                                            <option value="ES">Espírito Santo</option>
                                                            <option value="GO">Goiás</option>
                                                            <option value="MA">Maranhão</option>
                                                            <option value="MG">Minas Gerais</option>
                                                            <option value="MT">Mato Grosso</option>
                                                            <option value="MS">Mato Grosso do Sul</option>
                                                            <option value="PA">Pará</option>
                                                            <option value="PE">Pernambuco</option>
                                                            <option value="PI">Piauí</option>
                                                            <option value="RN">Rio Grande do Norte</option>
                                                            <option value="RJ">Rio de Janeiro</option>
                                                            <option value="RO">Rondônia</option>
                                                            <option value="RR">Roraima</option>
                                                            <option value="RS">Rio Grande do Sul</option>
                                                            <option value="SC">Santa Catarina</option>
                                                            <option value="SE">Sergipe</option>
                                                            <option value="SP">São Paulo</option>
                                                            <option value="PR">Paraná</option>
                                                            <option value="TO">Tocantins</option>

                                                        </select>
                                                        <div class="invalid-feedback">Por favor, selecione um estado.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="bloco-info">
                                                <h5 class="mb-3">👨‍👩‍👧‍👦 Informações do Responsável</h5>
                                                
                                                <div class="row g-3">
                                                    <div class="col-sm-8">
                                                        <label for="responsible_name" class="form-label">Nome Completo do Responsável</label>
                                                        <input type="text" id="responsible_name" name="responsible_name" class="form-control" required>
                                                        <div class="invalid-feedback">Por favor, informe o nome do responsável.</div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <label for="kinship" class="form-label">Parentesco</label>
                                                        <select id="kinship" name="kinship" class="form-select" aria-label="Default select example" required>
                                                            <option selected disabled value="">Selecione...</option>
                                                            <option value="mae">Mãe</option>
                                                            <option value="pai">Pai</option>
                                                            <option value="tio">Tio(a)</option>
                                                            <option value="avo">Avô(ó)</option>
                                                            <option value="irmao">Irmão(ã)</option>
                                                            <option value="outro">Outro</option>
                                                        </select>
                                                        <div class="invalid-feedback">Por favor, selecione o parentesco.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-12">
                                            <div class="bloco-info">
                                                <h5 class="mb-3">📚 Informações sobre o Curso</h5>
                                                
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="course" class="form-label">Curso</label>
                                                        <select id="course" name="course" class="form-select" aria-label="Default select example" required>
                                                            <option selected disabled value="">Selecione o Curso...</option>
                                                            <option value="enf">Enfermagem</option>
                                                            <option value="adm">Administração</option>
                                                            <option value="info">Informática</option>
                                                            <option value="ds">Desenvolvimento de Sistemas</option>
                                                        </select>
                                                        <div class="invalid-feedback">Por favor, selecione o Curso.</div>
                                                    </div>
                                                    <div class="col-sm-6 d-flex align-items-end">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                                    </div>
                                </form>
                                

                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6t6Vp/d3Vz5r/9+s11X9M/jP8t1I9G2L+5V9p8t+YV5iEwF2N3t/k0D0R5W2K7" crossorigin="anonymous"></script>
</body>
</html>