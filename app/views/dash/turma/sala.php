<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipo-msg'])) {

    $mensagem = $_SESSION['mensagem'];
    $tipo = $_SESSION['tipo-msg'];

    // Exibir mensagem
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
    <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">Minhas Turmas</h2>

    <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
        <table class="table table-hover text-center align-middle">
            <thead style="background: #9a5c1fad; color: white;">
                <tr>

                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Nome</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Descrição</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Alunos</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;"> </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($turmas as $linha): ?>
    <tr class="fw-semibold">
        <td><?php echo htmlspecialchars($linha['nome_curso']); ?></td>
        <td><?php echo htmlspecialchars($linha['descricao_curso']); ?></td>
        <td><?php echo htmlspecialchars($linha['total_alunos']); ?></td>
        <td>
            <!-- Link com o parâmetro id_curso -->
            <a href="http://localhost/escola/public/turmas/listar?id_curso=<?php echo $linha['id_curso']; ?>" class="btn fw-bold px-4 py-2" style="background: #9a5c1fad; color: #ffffff; border-radius: 8px;">Ver</a>
        </td>
    </tr>
<?php endforeach; ?>


            </tbody>
        </table>
    </div>
  

</div>


<div class="text-center mt-4">
        <h3 style="color: #9a5c1fad;">Precisa adicionar Aluno? clique abaixo</h3>
        <a href="http://localhost/escola/public/matriculas/adicionar" class="btn fw-bold px-4 py-2" style="background:  #9a5c1fad; color: #ffffff; border-radius: 8px;">
            Adicionar Aluno
        </a>
    </div>