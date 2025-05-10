<form method="POST" id="form-professor" action="http://localhost/escola/public/professors/adicionar" enctype="multipart/form-data">
  <div class="container my-5">
    <div class="row">
      <!-- Coluna para imagem -->
      <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
        <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">
          <img src="http://localhost/escola/public/assets/img/login-img.png" alt="escola Logo" class="img-fluid" id="preview-img" style="cursor: pointer; border-radius: 12px;">
        </div>
        <input type="file" name="foto_professor" id="foto_professor" style="display: none;" accept="image/*">
      </div>

      <!-- Coluna para os campos do formulário -->
      <div class="col-12 col-md-8">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">

          <div class="row g-3">
            <!-- Nome do Professor -->
            <div class="col-12 col-md-6 mb-3">
              <label for="nome_professor" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Professor:</label>
              <input type="text" class="form-control" id="nome_professor" name="nome_professor" placeholder="Digite o nome do professor" required>
            </div>

            <!-- Cargo -->
            <div class="col-12 col-md-6 mb-3">
              <label for="Cargo_professor" class="form-label fw-bold" style="color: #9a5c1f;">Cargo do Professor:</label>
              <input type="text" class="form-control" id="Cargo_professor" name="cargo_professor" placeholder="Digite o cargo" required>
            </div>

            <!-- Email -->
            <div class="col-12 col-md-6 mb-3">
              <label for="email_professor" class="form-label fw-bold" style="color: #9a5c1f;">Email:</label>
              <input type="email" class="form-control" id="email_professor" name="email_professor" placeholder="exemplo@email.com" required>
            </div>

            <!-- Senha -->
            <div class="col-12 col-md-6 mb-3">
              <label for="senha_professor" class="form-label fw-bold" style="color: #9a5c1f;">Senha:</label>
              <input type="password" class="form-control" id="senha_professor" name="senha_professor" required>
            </div>

            <!-- Data de Admissão -->
            <div class="col-12 col-md-6 mb-3">
              <label for="data_adm_professor" class="form-label fw-bold" style="color: #9a5c1f;">Data de Admissão:</label>
              <input type="date" class="form-control" id="data_adm_professor" name="data_adm_professor" required>
            </div>

            <!-- Status -->
            <div class="col-12 col-md-6 mb-3">
              <label for="status_professor" class="form-label fw-bold" style="color: #9a5c1f;">Status Professor:</label>
              <select class="form-select" id="status_professor" name="status_professor">
                <option selected>Ativo</option>
                <option>Inativo</option>
              </select>
            </div>

            <!-- Telefone -->
            <div class="col-12 col-md-6 mb-3">
              <label for="telefone_professor" class="form-label fw-bold" style="color: #9a5c1f;">Telefone:</label>
              <input type="tel" class="form-control" id="telefone_professor" name="telefone_professor" placeholder="(XX) XXXXX-XXXX">
            </div>

            <!-- Endereço -->
            <div class="col-12 col-md-6 mb-3">
              <label for="endereco_professor" class="form-label fw-bold" style="color: #9a5c1f;">Endereço:</label>
              <input type="text" class="form-control" id="endereco_professor" name="endereco_professor" required>
            </div>

            <!-- Estado -->
            <div class="col-12 col-md-6 mb-3">
              <label for="id_uf" class="form-label fw-bold" style="color: #9a5c1f;">Estado:</label>
              <select class="form-select" id="id_uf" name="id_uf">
                <option selected>Selecione</option>
                <?php foreach ($estados as $linha): ?>
                  <option value="<?php echo $linha['id_uf']; ?>"><?php echo $linha['sigla_uf']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

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
    const visualizarImg = document.getElementById('preview-img');
    const arquivo = document.getElementById('foto_professor');

    visualizarImg.addEventListener('click', function() {
      arquivo.click();
    });

    arquivo.addEventListener('change', function() {
      if (arquivo.files && arquivo.files[0]) {
        let render = new FileReader();
        render.onload = function(e) {
          visualizarImg.src = e.target.result;
        };
        render.readAsDataURL(arquivo.files[0]);
      }
    });

    // Seleção do botão de cancelar
    const btnCancelar = document.getElementById('btn-cancelar');
    const formProfessor = document.getElementById('form-professor');

    // Resetar o formulário ao clicar no botão "Cancelar"
    btnCancelar.addEventListener('click', () => {
      formProfessor.reset();
    });
  });
</script>
