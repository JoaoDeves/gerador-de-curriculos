# PHP

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary no-print">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Gerador de Currículos</span>
        </div>
    </nav>

    <div class="container mt-4 no-print" id="formularioContainer">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Preencha seus dados</h4>
                    </div>
                    <div class="card-body">
                        <form id="curriculoForm" method="POST" action="php/gerar_curriculo.php">
                            <!-- dados pessoais -->
                            <h5 class="mb-3">Dados Pessoais</h5>
                            
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome Completo *</label>
                                <input type="text" class="form-control" id="nome" name="nome" required placeholder="Ex: Ronaldo Moraes">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dataNascimento" class="form-label">Data de Nascimento *</label>
                                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="idade" class="form-label">Idade</label>
                                    <input type="text" class="form-control" id="idade" name="idade" readonly placeholder="Calculado automaticamente">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">E-mail *</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="Ex: ronaldo.m@email.com">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefone-js" class="form-label">Telefone *</label>
                                    <input type="tel" class="form-control" id="telefone-js" name="telefone" maxlength="15" required placeholder="(99) 99999-9999">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="endereco" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Ex: Rua Palmeiras, 315">
                            </div>

                            <div class="mb-3">
                                <label for="objetivo" class="form-label">Objetivo Profissional</label>
                                <textarea class="form-control" id="objetivo" name="objetivo" rows="3" placeholder="Descreva seu objetivo profissional..."></textarea>
                            </div>

                            <!-- formação acadêmica -->
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Formação Acadêmica</h5>
                                <button type="button" class="btn btn-success btn-sm" id="addFormacao">
                                    + Adicionar
                                </button>
                            </div>
                            
                            <div id="formacoesContainer">
                                <div class="formacao-item border p-3 mb-3 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Curso</label>
                                        <input type="text" class="form-control" name="formacao[]" placeholder="Ex: Odontologia">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Instituição</label>
                                        <input type="text" class="form-control" name="instituicao[]" placeholder="Ex: Faculdade Estadual do Rio">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Período</label>
                                            <input type="text" class="form-control" name="periodoFormacao[]" placeholder="Ex: 2020 - 2024">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- experiências profissionais -->
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Experiências Profissionais</h5>
                                <button type="button" class="btn btn-success btn-sm" id="addExperiencia">
                                    + Adicionar
                                </button>
                            </div>
                            
                            <div id="experienciasContainer">
                                <div class="experiencia-item border p-3 mb-3 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Cargo</label>
                                        <input type="text" class="form-control" name="cargo[]" placeholder="Ex: Suporte de TI">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Empresa</label>
                                        <input type="text" class="form-control" name="empresa[]" placeholder="Ex: ACME Ltda">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Período</label>
                                        <input type="text" class="form-control" name="periodoExp[]" placeholder="Ex: Jan 2020 - Dez 2022">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Descrição das atividades</label>
                                        <textarea class="form-control" name="descricaoExp[]" rows="2" placeholder="Descreva suas atividades..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- botão de envio -->
                            <hr>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Gerar Currículo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3 text-muted no-print">
        <small>Gerador de Currículos - Projeto Prático em PHP e JavaScript</small>
    </footer>

    <!-- dependências -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
