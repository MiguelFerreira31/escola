<?php if (isset($_SESSION['mensagem'])): ?>
    <div class="alert alert-<?php echo $_SESSION['tipo-msg']; ?> text-center fw-bold">
        <?php echo $_SESSION['mensagem']; ?>
    </div>
    <?php unset($_SESSION['mensagem']); ?>
<?php endif; ?>

<form method="POST" action="http://localhost/escola/public/matriculas/adicionar" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                <img src="http://localhost/escola/public/assets/img/login-img.png" alt="escola Logo" class="img-fluid" id="preview-img" style="width:100%; border-radius:12px;">
            </div>

            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                
                    <div class="mb-3">
                        <label for="id_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Aluno:</label>
                        <select class="form-select" id="id_aluno" name="id_aluno">
                            <option selected>Selecione</option>
                            <?php foreach ($alunos as $linha): ?>
                                <option value="<?php echo $linha['id_aluno']; ?>"><?php echo $linha['nome_aluno']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                   
                    <div class="mb-3">
                        <label for="id_cursos" class="form-label fw-bold" style="color: #9a5c1f;">Curso:</label>
                        <select class="form-select" id="id_cursos" name="id_curso">
                            <option selected>Selecione</option>
                            <?php foreach ($cursos as $linha): ?>
                                <option value="<?php echo $linha['id_curso']; ?>"><?php echo $linha['nome_curso']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                    <label for="id_professors" class="form-label fw-bold" style="color: #9a5c1f;">Professor:</label>
                        <select class="form-select" id="id_professors" name="id_professor">
                            <option selected>Selecione</option>
                            <?php foreach ($professor as $linha): ?>
                                <option value="<?php echo $linha['id_professor']; ?>"><?php echo $linha['nome_professor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                     

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
