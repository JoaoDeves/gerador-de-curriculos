$(document).ready(function() {

    // calcular idade automaticamente
    $('#dataNascimento').on('change', function() {
        const dataNascimento = new Date($(this).val());
        const hoje = new Date();

        let idade = hoje.getFullYear() - dataNascimento.getFullYear();
        const mes = hoje.getMonth() - dataNascimento.getMonth();

        if (mes < 0 || (mes === 0 && hoje.getDate() < dataNascimento.getDate())) {
            idade--;
        }

        $('#idade').val(idade + ' anos');
    });

    // adicionar formação acadêmica
    $('#addFormacao').click(function() {
        const novaFormacao = `
            <div class="formacao-item border p-3 mb-3 rounded position-relative">
                <button type="button" class="btn btn-danger btn-sm btn-remove removeFormacao">×</button>
                <div class="mb-3">
                    <label class="form-label">Curso</label>
                    <input type="text" class="form-control" name="formacao[]" placeholder="Ex: Administração">
                </div>
                <div class="mb-3">
                    <label class="form-label">Instituição</label>
                    <input type="text" class="form-control" name="instituicao[]" placeholder="Ex: Universidade Federal">
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Período</label>
                        <input type="text" class="form-control" name="periodoFormacao[]" placeholder="Ex: 2020 - 2024">
                    </div>
                </div>
            </div>
        `;
        $('#formacoesContainer').append(novaFormacao);
    });

    // remover formação
    $(document).on('click', '.removeFormacao', function() {
        $(this).closest('.formacao-item').remove();
    });

    // adicionar experiência profissional
    $('#addExperiencia').click(function() {
        const novaExperiencia = `
            <div class="experiencia-item border p-3 mb-3 rounded position-relative">
                <button type="button" class="btn btn-danger btn-sm btn-remove removeExperiencia">×</button>
                <div class="mb-3">
                    <label class="form-label">Cargo</label>
                    <input type="text" class="form-control" name="cargo[]" placeholder="Ex: Analista de TI">
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
                    <textarea class="form-control" name="descricaoExp[]" rows="2" placeholder="Descreva suas principais atividades..."></textarea>
                </div>
            </div>
        `;
        $('#experienciasContainer').append(novaExperiencia);
    });

    // remover experiência
    $(document).on('click', '.removeExperiencia', function() {
        $(this).closest('.experiencia-item').remove();
    });

    // mascara telefone
    document.getElementById("telefone-js").addEventListener("keypress", function(event) {
        const key = event.key;
        if (!/[0-9()\ -]/.test(key)) {
            event.preventDefault();
        }
    });

    // envio do formulário
    $('#curriculoForm').on('submit', function() {
        console.log("📄 Enviando formulário para gerar_curriculo.php via PHP...");
    });
});