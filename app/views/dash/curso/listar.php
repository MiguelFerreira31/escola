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
    <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">Cursos Cadastrados</h2>

    <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
        <table class="table table-hover text-center align-middle">
            <thead style="background: #9a5c1fad; color: white;">
                <tr>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Imagem</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Nome</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Descrição</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Preço</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Tempo</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Editar</th>
                    <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Desativar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $index => $linha): ?>
                    <tr class="fw-semibold">
                        <td class="img-curso">
                            <img src="http://localhost/escola/public/assets/img/fe-1-<?php echo ($index % 3) + 1; ?>.png" alt="Imagem do Curso"
                                class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td><?php echo htmlspecialchars($linha['nome_curso']); ?></td>
                        <td><?php echo htmlspecialchars($linha['descricao_curso']); ?></td>
                        <td><?php echo "R$ " . number_format($linha['preco_curso'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($linha['tempo_estimado']); ?> Horas</td>
                        <td>
                            <a href="http://localhost/escola/public/servicos/editar/<?php echo $linha['id_curso']; ?>" title="Editar">
                                <i class="fa fa-pencil-alt" style="font-size: 20px; color: #9a5c1f;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn " title="Desativar" onclick="abrirModalDesativar(<?php echo $linha['id_curso'];  ?>)">
                                <i class=" fa fa-trash-alt" style="font-size: 20px; color: #ff4d4d;"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="text-center mt-4">
        <h3 style="color: #9a5c1fad;">Não encontrou o curso? Cadastre abaixo</h3>
        <a href="http://localhost/escola/public/servicos/adicionar" class="btn fw-bold px-4 py-2" style="background: #9a5c1fad; color: #ffffff; border-radius: 8px;">
            Adicionar Curso
        </a>
    </div>
</div>



<!-- MODAL DESATIVAR CURSO  -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Desativar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem Certeza que deseja desativar esse Curso?</p>
                <input type="hidden" id="idCursoDesativar" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>




<script>
    function abrirModalDesativar(idCurso) {


        if ($('#modalDesativar').hasClass('show')) {
            return;
        }

        document.getElementById('idCursoDesativar').value = idCurso;
        $('#modalDesativar').modal('show');

    }


    document.getElementById('btnConfirmar').addEventListener('click', function() {
        const idCurso = document.getElementById('idCursoDesativar').value;
        console.log(idCurso);

        if (idCurso) {
            desativarCurso(idCurso);
        }

    });

    function desativarCurso(idCurso) {

        fetch(`http://localhost/escola/public/servicos/desativar/${idCurso}`, {
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