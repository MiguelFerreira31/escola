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
    <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">Alunos Cadastrados</h2>

    <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
        <table class="table table-hover text-center align-middle">
        <thead class="thead-custom">
    <tr>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Foto</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Nome</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Email</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Telefone</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Estado</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Editar</th>
        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Desativar</th>
    </tr>
</thead>

            <tbody>
                <?php foreach ($alunos as $linha): ?>
                    <tr class="fw-semibold">
                        <td class="img-aluno">
                            <img src="<?php
                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/escola/public/uploads/" . $linha['foto_aluno'];

                                if ($linha['foto_aluno'] != "") {
                                    if (file_exists($caminhoArquivo)) {
                                        echo ("http://localhost/escola/public/uploads/" . htmlspecialchars($linha['foto_aluno'], ENT_QUOTES, 'UTF-8'));
                                    } else {
                                        echo ("http://localhost/escola/public/uploads/aluno/sem-foto-aluno.jpg");
                                    }
                                } else {
                                    echo ("http://localhost/escola/public/uploads/aluno/sem-foto-aluno.jpg");
                                }
                            ?>" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                        </td>
                        <td><?php echo htmlspecialchars($linha['nome_aluno']); ?></td>
                        <td><?php echo htmlspecialchars($linha['email_aluno']); ?></td>
                        <td><?php echo htmlspecialchars($linha['telefone_aluno']); ?></td>
                        <td><?php echo htmlspecialchars($linha['sigla_uf']); ?></td>
                        <td>
                            <a href="http://localhost/escola/public/alunos/editar/<?php echo $linha['id_aluno']; ?>" title="Editar">
                                <i class="fa fa-pencil-alt" style="font-size: 20px; color: #9a5c1f;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" title="Desativar" onclick="abrirModalDesativar(<?php echo $linha['id_aluno'];  ?>)">
                                <i class="fa fa-ban" style="font-size: 20px; color: #ff4d4d;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <h3 style="color: #9a5c1fad;">Não encontrou o aluno? Cadastre abaixo</h3>
        <a href="http://localhost/escola/public/alunos/adicionar" class="btn fw-bold px-4 py-2" style="background:#9a5c1fad; color: #ffffff; border-radius: 8px;">
            Adicionar Aluno
        </a>
    </div>
</div>




<!-- MODAL DESATIVAR Aluno  -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem Certeza que deseja desativar esse Aluno?</p>
                <input type="hidden" id="idAlunoDesativar" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>







<script>
    function abrirModalDesativar(idAluno) {


        if ($('#modalDesativar').hasClass('show')) {
            return;
        }

        document.getElementById('idAlunoDesativar').value = idAluno;
        $('#modalDesativar').modal('show');

    }


    document.getElementById('btnConfirmar').addEventListener('click', function() {
        const idAluno = document.getElementById('idAlunoDesativar').value;
        console.log(idAluno);

        if (idAluno) {
            desativarAluno(idAluno);
        }

    });

    function desativarAluno(idAluno) {

        fetch(`http://localhost/escola/public/alunos/desativar/${idAluno}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }

            })

            .then(response => {
                // Se o codigo de resposta NÃO for OK lança pra ele uma msg de ERRO
                if (!response.ok) {

                    throw new Error(`Erro HTTP: ${reponse.status}`)
                    ''
                }
                return response.json();

            })

            .then(data => {

                if (data.sucesso) {
                    console.log('Curso desativado com sucesso');
                    $('#modalDesativar').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }), 500;

                } else {
                    alert(data.mensagem || "Ocorreu um erro ao Desativar o Curso");
                }

            })

            .catch(erro => {
                console.error("erro", erro);
                alert('erro na requisicao');

            })



    }
</script>