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

<div class="container my-5">
    <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">Matrículas Cadastradas</h2>

    <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
        <table class="table table-hover text-center align-middle">
            <thead style="background: #f0c9a9; color: #9a5c1fad;">
                <tr>
                  
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Início</th>
                    <th scope="col">Professor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matriculas as $index => $linha): ?>
                    <tr class="fw-semibold">
                      
                        <td><?php echo htmlspecialchars($linha['nome_curso']); ?></td>
                        <td><?php echo htmlspecialchars($linha['descricao_curso']); ?></td>
                        <td style="color: #9a5c1fad;">R$ <?php echo number_format($linha['preco_curso'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($linha['tempo_estimado']); ?> Horas</td>
                        <td><?php echo date("d/m/Y", strtotime($linha['data_matricula'])); ?></td>
                        <td><?php echo htmlspecialchars($linha['nome_professor']); ?></td>
                        <td class="img-aluno">
                            <img src="<?php 
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $linha['foto_professor'];

                                if (!empty($linha['foto_professor']) && file_exists($caminhoArquivo)) {
                                    echo "http://localhost/escola/public/uploads/" . htmlspecialchars($linha['foto_professor'], ENT_QUOTES, 'UTF-8');
                                } else {
                                    echo "http://localhost/escola/public/uploads/professor/sem-foto-professor.jpg";
                                }
                                ?>" 
                                alt="Professor" 
                                class="rounded-circle" 
                                style="width: 50px;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <h3 style="color: #9a5c1fad;">Consulte suas notas dos Curso abaixo:</h3>
        <a href="http://localhost/escola/public/notas/listar" class="btn fw-bold px-4 py-2" style="background: #9a5c1fad; color: #ffffff; border-radius: 8px;">
            Ver Notas
        </a>
    </div>
</div>
