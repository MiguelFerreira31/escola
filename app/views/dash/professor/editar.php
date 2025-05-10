<form method="POST" id="form-professor" action="http://localhost/escola/public/professors/editar/<?php echo $professor['id_professor']; ?>" enctype="multipart/form-data">
  <div class="container my-5">
    <div class="row">
      <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
        <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">


          <?php

          $fotoProfessor = $professor['foto_professor'];
          $fotoPath = "http://localhost/escola/public/uploads/" . $fotoProfessor;
          $fotoDefault = "http://localhost/escola/public/assets/img/login-img.png";

          $imagePath = (file_exists($_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $fotoProfessor) && !empty($fotoProfessor))
            ? $fotoPath
            : $fotoDefault;
          ?>







          <img src="<?php echo $imagePath ?>" alt="escola Logo" class="img-fluid" id="preview-img"  style="cursor: pointer; border-radius: 12px; background: #fff;">
        </div>
        <input type="file" name="foto_professor" id="foto_professor" style="display: none;" accept="image/*">
      </div>

      <div class="col-12 col-md-8">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
          <div class="row g-3">
            <div class="col-12 col-md-6 mb-3">
              <label for="nome_professor" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Professor:</label>
              <input type="text" class="form-control" id="nome_professor" name="nome_professor" placeholder="Digite o nome do professor" value="<?php echo $professor['nome_professor'] ?? ''; ?>" required>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="Cargo_professor" class="form-label fw-bold" style="color: #9a5c1f;">Cargo do Professor:</label>
              <input type="text" class="form-control" id="Cargo_professor" name="cargo_professor" placeholder="Digite o cargo" value="<?php echo $professor['cargo_professor'] ?? ''; ?>" required>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="email_professor" class="form-label fw-bold" style="color: #9a5c1f;">Email:</label>
              <input type="email" class="form-control" id="email_professor" name="email_professor" placeholder="exemplo@email.com" value="<?php echo $professor['email_professor'] ?? ''; ?>" required>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="senha_professor" class="form-label fw-bold" style="color: #9a5c1f;">Senha:</label>
              <input type="txt" class="form-control" id="senha_professor" name="senha_professor" value="<?php echo $professor['senha_professor'] ?? ''; ?>" required>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="data_adm_professor" class="form-label fw-bold" style="color: #9a5c1f;">Data de Admissão:</label>
              <input type="date" class="form-control" id="data_adm_professor" name="data_adm_professor" value="<?php echo $professor['data_admissao_professor'] ?? ''; ?>" required>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="status_professor" class="form-label fw-bold" style="color: #9a5c1f;">Status Professor:</label>
              <select class="form-select" id="status_professor" name="status_professor">
                <option value="Ativo" <?php echo (isset($professor['status_professor']) && $professor['status_professor'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                <option value="Inativo" <?php echo (isset($professor['status_professor']) && $professor['status_professor'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
              </select>
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="telefone_professor" class="form-label fw-bold" style="color: #9a5c1f;">Telefone:</label>
              <input type="tel" class="form-control" id="telefone_professor" name="telefone_professor" placeholder="(XX) XXXXX-XXXX" value="<?php echo $professor['telefone_professor'] ?? ''; ?>">
            </div>

            <div class="col-12 col-md-6 mb-3">
              <label for="endereco_professor" class="form-label fw-bold" style="color: #9a5c1f;">Endereço:</label>
              <input type="text" class="form-control" id="endereco_professor" name="endereco_professor" value="<?php echo $professor['endereco_professor'] ?? ''; ?>" required>
            </div>
          </div>

          <div class="mt-4 text-center">
            <button type="submit" class="btn btn-lg" style="background: #ffcea6; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Editar</button>
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
      arquivo.click()

    });


    arquivo.addEventListener('change', function() {
      if (arquivo.files && arquivo.files[0]) {

        let render = new FileReader();
        render.onload = function(e) {
          visualizarImg.src = e.target.result
        }

        render.readAsDataURL(arquivo.files[0]);

      }
    });

  });
</script>