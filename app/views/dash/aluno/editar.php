<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    // Exibir a mensagem
    $classeAlerta = ($tipo == 'sucesso') ? 'alert-success' : 'alert-danger';
    echo '<div class="alert ' . $classeAlerta . ' text-center fw-bold" role="alert">'
        . htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') .
        '</div>';

    // Limpar variáveis de sessão
    unset($_SESSION['mensagem']);
    unset($_SESSION['tipo-msg']);
}
?>



<form method="POST" action="http://localhost/escola/public/alunos/editar/<?php echo $alunos['id_aluno']; ?>" enctype="multipart/form-data">
    <div class="container my-5">
        <div class="row">
            <!-- Imagem do Aluno -->
            <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                <div class="image-container" style="width: 100%; max-width: 200px; aspect-ratio: 1/1; overflow: hidden; border-radius: 50%; margin: auto;">
                    <?php

                    $fotoAluno = $alunos['foto_aluno'];
                    $fotoPath = "http://localhost/escola/public/uploads/" . $fotoAluno;
                    $fotoDefault = "http://localhost/escola/public/assets/img/login-img.png" ;

                    $imagePath = (file_exists($_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $fotoAluno) && !empty($fotoAluno))
                        ? $fotoPath
                        : $fotoDefault;
                    ?>







                    <img src="<?php echo $imagePath ?>" alt="escola Logo" class="img-fluid" id="preview-img" style="cursor: pointer; border-radius: 12px;">
                </div>
                <input type="file" name="foto_aluno" id="foto_aluno" style="display: none;" accept="image/*">
            </div>

            <!-- Informações do Aluno -->
            <div class="col-12 col-md-8">
                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: #ffffff;">
                    <div class="mb-3">
                        <label for="nome_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Nome do Aluno:</label>
                        <input type="text" class="form-control" id="nome_aluno" name="nome_aluno" placeholder="Digite o nome do aluno" value="<?php echo $alunos['nome_aluno'] ?? ''; ?>" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Email:</label>
                        <input type="email" class="form-control" id="email_aluno" name="email_aluno" placeholder="exemplo@email.com" value="<?php echo $alunos['email_aluno'] ?? ''; ?>" required>
                    </div>

                    <div class="row g-3">
                        <!-- Data de Nascimento -->
                        <div class="col-12 col-md-3">
                            <label for="nasc_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Nascimento:</label>
                            <input type="date" class="form-control" id="nasc_aluno" name="nasc_aluno" value="<?php echo $alunos['data_nascimento'] ?? ''; ?>" required>
                        </div>

                        <!-- Senha -->
                        <div class="col-12 col-md-3">
                            <label for="senha_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Senha:</label>
                            <input type="text" class="form-control" id="senha_aluno" name="senha_aluno" value="<?php echo $alunos['senha_aluno'] ?? ''; ?>" required>
                        </div>

                        <!-- CPF ou CNPJ -->
                        <div class="col-12 col-md-3">
                            <label for="cpf_cnpj_aluno" class="form-label fw-bold" style="color: #9a5c1f;">CPF ou CNPJ:</label>
                            <input type="text" class="form-control" id="cpf_cnpj_aluno" name="cpf_cnpj_aluno" value="<?php echo $alunos['cpf_cnpj_aluno'] ?? ''; ?>" required>
                        </div>

                        <!-- Status do Aluno -->
                        <div class="col-12 col-md-3">
                            <label for="status_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Status Aluno:</label>
                            <select class="form-select" id="status_aluno" name="status_aluno">
                                <option value="Ativo" <?php echo (isset($alunos['status_aluno']) && $alunos['status_aluno'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                                <option value="Inativo" <?php echo (isset($alunos['status_aluno']) && $alunos['status_aluno'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                            </select>
                        </div>

                        <!-- Telefone -->
                        <div class="col-12 col-md-3">
                            <label for="telefone_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Telefone:</label>
                            <input type="tel" class="form-control" id="telefone_aluno" name="telefone_aluno" placeholder="(XX) XXXXX-XXXX" value="<?php echo $alunos['telefone_aluno'] ?? ''; ?>">
                        </div>

                        <!-- Endereço -->
                        <div class="col-12 col-md-3">
                            <label for="endereco_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Endereço:</label>
                            <input type="text" class="form-control" id="endereco_aluno" name="endereco_aluno" value="<?php echo $alunos['endereco_aluno'] ?? ''; ?>" required>
                        </div>

                        <!-- Bairro -->
                        <div class="col-12 col-md-3">
                            <label for="bairro_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Bairro:</label>
                            <input type="text" class="form-control" id="bairro_aluno" name="bairro_aluno" value="<?php echo $alunos['bairro_aluno'] ?? ''; ?>" required>
                        </div>

                        <!-- Cidade -->
                        <div class="col-12 col-md-3">
                            <label for="cidade_aluno" class="form-label fw-bold" style="color: #9a5c1f;">Cidade:</label>
                            <input type="text" class="form-control" id="cidade_aluno" name="cidade_aluno" value="<?php echo $alunos['cidade_aluno'] ?? ''; ?>" required>
                        </div>

                        <!-- Estado -->
                        <div class="col-12 col-md-3">
                            <label for="uf" class="form-label fw-bold" style="color: #9a5c1f;">Estados:</label>
                            <select class="form-select" id="id_uf" name="id_uf">
                                <option value=""> Selecione </option>
                                <?php foreach ($estados as $linha): ?>
                                    <option value="<?php echo $linha['id_uf']; ?>" <?php echo (isset($alunos['id_uf']) && $alunos['id_uf'] == $linha['id_uf']) ? 'selected' : ''; ?>>
                                        <?php echo $linha['sigla_uf']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-lg" style="background: #ffcea6; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Salvar</button>
                            <button type="button" class="btn btn-lg" style="background: #ffd8b9; color: #9a5c1f; font-weight: bold; border-radius: 12px;">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const visualizarImg = document.getElementById('preview-img');
        const arquivo = document.getElementById('foto_aluno');

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
    });
</script>