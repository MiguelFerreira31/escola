<div class="container my-5">
    <h2 class="text-center fw-bold" style="color: #9a5c1f;">Meu Perfil</h2>

    <div class="row justify-content-center">
        <!-- Foto do Aluno -->
        <div class="col-md-4 text-center">
            <div class="card shadow-lg border-0 rounded-4 p-3">
                <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">
                    <img src="<?php
                    $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $aluno['foto_aluno'];

                    if (!empty($aluno['foto_aluno']) && file_exists($caminhoArquivo)) {
                        echo "http://localhost/escola/public/uploads/" . htmlspecialchars($aluno['foto_aluno'], ENT_QUOTES, 'UTF-8');
                    } else {
                        echo "http://localhost/escola/public/uploads/sem-foto-servico.png";
                    }
                    ?>" 
                    alt="Foto do Aluno" 
                    class="img-fluid shadow"
                    style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <input type="file" name="foto_aluno" id="foto_aluno" style="display: none;" accept="image/*">
            </div>
        </div>

        <!-- Informações do Aluno -->
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Nome do Aluno:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['nome_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Data de Nascimento:</label>
                        <input type="date" class="form-control" value="<?php echo $aluno['data_nascimento']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Email:</label>
                        <input type="email" class="form-control" value="<?php echo $aluno['email_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Senha:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['senha_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">CPF/CNPJ:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['cpf_cnpj_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Status:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['status']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Telefone:</label>
                        <input type="tel" class="form-control" value="<?php echo $aluno['telefone_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Endereço:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['endereco_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Bairro:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['bairro_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Cidade:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['cidade_aluno']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Estado:</label>
                        <input type="text" class="form-control" value="<?php echo $aluno['sigla_uf']; ?>" readonly>
                    </div>
                </div>

                <!-- Botão de edição -->
                <div class="text-center mt-4">
                    <a href="http://localhost/escola/public/alunos/editar/<?php echo $aluno['id_aluno'] ?>">
                        <button class="btn btn-lg" style="background: #ffcea6; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Editar Perfil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
