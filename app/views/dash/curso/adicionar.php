<form method="POST" action="http://localhost/escola/public/servicos/adicionar" enctype="multipart/form-data">

<div class="container my-5">

  <div class="row">
    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
      <img src="http://localhost/escola/public/assets/img/login-img.png" alt="escola Logo" class="img-fluid" id="preview-img" style="width:100%; ">
    </div>

    <div class="col-12 col-md-8">
      <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
        <div class="mb-3">
          <label for="nome_curso" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Serviço:</label>
          <input type="text" class="form-control" id="nome_curso" name="nome_curso" placeholder="Digite o nome do serviço" required>
        </div>

        <div class="mb-3">
          <label for="descricao_curso" class="form-label fw-bold" style="color: #9a5c1f;">Descrição do Serviço:</label>
          <textarea class="form-control" id="descricao_curso" name="descricao_curso" rows="3" placeholder="Digite a descrição do serviço" required></textarea>
        </div>

        <div class="row g-3">
          <!-- Preço Base -->
          <div class="col-12 col-md-4 mb-3">
            <label for="preco_base_curso" class="form-label fw-bold" style="color: #9a5c1f;">Preço Base:</label>
            <input type="text" class="form-control" id="preco_base_curso" name="preco_curso" placeholder="R$" required>
          </div>

          <!-- Tempo Estimado -->
          <div class="col-12 col-md-4 mb-3">
            <label for="tempo_estimado_curso" class="form-label fw-bold" style="color: #9a5c1f;">Tempo Estimado:</label>
            <input type="time" class="form-control" id="tempo_estimado_curso" name="tempo_estimado">
          </div>

          <!-- Status do Serviço -->
          <div class="col-12 col-md-4 mb-3">
            <label for="status_curso" class="form-label fw-bold" style="color: #9a5c1f;">Status do Serviço:</label>
            <select class="form-select" id="status_curso" name="status_curso">
              <option selected>Ativo</option>
              <option>Inativo</option>
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
