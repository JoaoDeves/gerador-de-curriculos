<?php
// caputra dados
$nome = htmlspecialchars($_POST['nome'] ?? '');
$dataNascimento = $_POST['dataNascimento'] ?? '';
$idade = htmlspecialchars($_POST['idade'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$telefone = htmlspecialchars($_POST['telefone'] ?? '');
$endereco = htmlspecialchars($_POST['endereco'] ?? '');
$objetivo = htmlspecialchars($_POST['objetivo'] ?? '');

// formação e experiência
$formacoes = $_POST['formacao'] ?? [];
$instituicoes = $_POST['instituicao'] ?? [];
$periodosFormacao = $_POST['periodoFormacao'] ?? [];

$cargos = $_POST['cargo'] ?? [];
$empresas = $_POST['empresa'] ?? [];
$periodosExp = $_POST['periodoExp'] ?? [];
$descricoesExp = $_POST['descricaoExp'] ?? [];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Currículo de <?php echo $nome; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #000;
        }
        h1, h2, h3 {
            color: #003366;
        }
        hr {
            border-top: 2px solid #003366;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .no-print {
            margin-bottom: 20px;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background: #fff !important;
                color: #000 !important;
            }
        }
    </style>
</head>
<body class="container mt-4">

    <!-- botões -->
    <div class="no-print mb-3">
        <button class="btn btn-primary" onclick="window.print()">🖨️ Imprimir / Salvar como PDF</button>
        <a href="../index.php" class="btn btn-secondary">← Voltar</a>
    </div>

    <!-- cabeçalho -->
    <h1><?php echo $nome; ?></h1>
    <p><strong>Idade:</strong> <?php echo $idade ? $idade . " anos" : ''; ?></p>
    <p><strong>E-mail:</strong> <?php echo $email; ?></p>
    <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
    <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>

    <!-- objetivo -->
    <?php if ($objetivo): ?>
        <hr>
        <h2>Objetivo Profissional</h2>
        <p><?php echo nl2br($objetivo); ?></p>
    <?php endif; ?>

    <!-- formação -->
    <?php if (!empty($formacoes)): ?>
        <hr>
        <h2>Formação Acadêmica</h2>
        <?php for ($i = 0; $i < count($formacoes); $i++): ?>
            <?php if (!empty($formacoes[$i])): ?>
                <p>
                    <strong>Curso:</strong> <?php echo htmlspecialchars($formacoes[$i]); ?><br>
                    <strong>Instituição:</strong> <?php echo htmlspecialchars($instituicoes[$i] ?? ''); ?><br>
                    <strong>Período:</strong> <?php echo htmlspecialchars($periodosFormacao[$i] ?? ''); ?>
                </p>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endif; ?>

    <!-- experiência -->
    <?php if (!empty($cargos)): ?>
        <hr>
        <h2>Experiências Profissionais</h2>
        <?php for ($i = 0; $i < count($cargos); $i++): ?>
            <?php if (!empty($cargos[$i])): ?>
                <p>
                    <strong>Cargo:</strong> <?php echo htmlspecialchars($cargos[$i]); ?><br>
                    <strong>Empresa:</strong> <?php echo htmlspecialchars($empresas[$i] ?? ''); ?><br>
                    <strong>Período:</strong> <?php echo htmlspecialchars($periodosExp[$i] ?? ''); ?><br>
                    <strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($descricoesExp[$i] ?? '')); ?>
                </p>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endif; ?>

    <script>
        // --- abre janela de impressão ---
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
