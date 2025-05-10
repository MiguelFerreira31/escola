<div class="container my-5">
    <h2 class="text-center fw-bold" style="color: #9a5c1f;">Meu Perfil</h2>

    <div class="row justify-content-center">
        <!-- Foto do Professor -->
        <div class="col-md-4 text-center">
            <div class="card shadow-lg border-0 rounded-4 p-3">
                <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">
                    <img src="<?php
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $prof['foto_professor'];

                                if (!empty($prof['foto_professor']) && file_exists($caminhoArquivo)) {
                                    echo "http://localhost/escola/public/uploads/" . htmlspecialchars($prof['foto_professor'], ENT_QUOTES, 'UTF-8');
                                } else {
                                    echo "http://localhost/escola/public/uploads/sem-foto-servico.png";
                                }
                                ?>"
                        alt="Foto do Professor"
                        class="img-fluid shadow"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <input type="file" name="foto_professor" id="foto_professor" style="display: none;" accept="image/*">
            </div>
        </div>

        <!-- Informações do Professor -->
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Nome do Professor:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['nome_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Admissão:</label>
                        <input type="date" class="form-control" value="<?php echo $prof['data_admissao_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Email:</label>
                        <input type="email" class="form-control" value="<?php echo $prof['email_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Senha:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['senha_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">CPF/CNPJ:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['cpf_cnpj_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Status:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['status']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Telefone:</label>
                        <input type="tel" class="form-control" value="<?php echo $prof['telefone_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Endereço:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['endereco_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Bairro:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['bairro_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Cidade:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['cidade_professor']; ?>" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bold" style="color: #9a5c1f;">Estado:</label>
                        <input type="text" class="form-control" value="<?php echo $prof['sigla_uf']; ?>" readonly>
                    </div>
                </div>

                <!-- Botão de edição -->
                <div class="text-center mt-4">
                    <a href="http://localhost/escola/public/professors/editar/<?php echo $prof['id_professor'] ?>">
                        <button class="btn btn-lg" style="background: #ffcea6; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Editar Perfil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>