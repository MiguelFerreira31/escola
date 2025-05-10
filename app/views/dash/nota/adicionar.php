<?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?php echo $_SESSION['tipo-msg']; ?> text-center fw-bold">
        <?php echo $_SESSION['mensagem']; ?>
    </div>
    <?php unset($_SESSION['mensagem']); ?>
<?php endif; ?>

<form method="POST" action="http://localhost/escola/public/notas/adicionar?id_curso=<?php echo $_GET['id_curso']; ?>" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <img src="http://localhost/escola/public/assets/img/login-img.png" alt="escola Logo" class="img-fluid" id="preview-img" style="width:100%; border-radius:12px;">
            </div>

            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                    <!-- Nome do Aluno -->
                    <div class="mb-3">
                        <label for="id_matricula" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Aluno:</label>
                        <select class="form-select" id="id_matricula" name="id_matricula">
                            <option selected>Selecione</option>
                            <?php foreach ($turma as $linha): ?>
                                <option value="<?php echo $linha['id_matricula']; ?>"><?php echo $linha['nome_aluno']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Avaliação -->
                    <div class="mb-3">
                        <label for="id_avaliacao" class="form-label fw-bold" style="color: #9a5c1f;">Tipo de Avaliação:</label>
                        <select class="form-select" id="id_avaliacao" name="id_avaliacao">
                            <option selected>Selecione</option>
                            <?php foreach ($avaliacao as $linha): ?>
                                <option value="<?php echo $linha['id_avaliacao']; ?>"><?php echo $linha['tipo_avaliacao']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row g-3">
                        <!-- Data da Avaliação -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="data_avaliacao" class="form-label fw-bold" style="color: #9a5c1f;">Data da Avaliação:</label>
                            <input type="date" class="form-control" id="data_avaliacao" name="data_avaliacao" required>
                        </div>

                        <!-- Nota -->
                        <div class="col-12 col-md-6 mb-3">
                            <label for="nota" class="form-label fw-bold" style="color: #9a5c1f;">Nota:</label>
                            <input type="number" class="form-control" id="nota" name="nota" step="0.01" min="0.00" max="10.00" placeholder="0.00" required>
                        </div>
                    </div>

                    <!-- Campo oculto para o id_curso -->
                    <input type="hidden" name="id_curso" value="<?php echo $_GET['id_curso']; ?>">

                    <!-- Botões -->
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-lg" style="background: #ffcea6; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Salvar</button>
                        <button type="button" class="btn btn-lg" style="background: #ffd8b9; color: #9a5c1f; font-weight: bold; border-radius: 12px;" id="btn-cancelar">Cancelar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Seleção do botão de cancelar
    const btnCancelar = document.getElementById('btn-cancelar');
    const formNota = document.querySelector('form');

    // Resetar o formulário ao clicar no botão "Cancelar"
    btnCancelar.addEventListener('click', () => {
        formNota.reset();
    });
});
</script>
