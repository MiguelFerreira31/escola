<?php if (isset($turmaDetalhes) && count($turmaDetalhes) > 0): ?>
    <div class="container my-5">
        <h2 class="text-center fw-bold py-3" style="background: #9a5c1fad; color: white; border-radius: 12px;">
            Turma: <?php echo htmlspecialchars($turmaDetalhes[0]['nome_curso']); ?>
        </h2>

        <h4 class="fw-bold py-3 text-center" style="background: #9a5c1fad; color: white; border-radius: 12px;">Alunos Matriculados:</h4>

        <div class="table-responsive rounded-3 shadow-lg p-3" style="background: #ffffff;">
            <table class="table table-hover text-center align-middle">
                <thead style="background: #9a5c1fad; color: white;">
                    <tr>
                        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Nome</th>
                        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Email</th>
                        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Telefone</th>
                        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Notas</th>
                        <th scope="col" class="text-center" style="font-size: 1.2em; font-weight: bold;">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($turmaDetalhes as $aluno): ?>
                        <tr class="fw-semibold">
                            <td><?php echo htmlspecialchars($aluno['nome_aluno']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['email_aluno']); ?></td>
                            <td><?php echo htmlspecialchars($aluno['telefone_aluno']); ?></td>
                            <td> <a href="http://localhost/escola/public/notas/notaAluno?id_aluno=<?php echo $aluno['id_aluno']; ?>" class="btn fw-bold px-4 py-2" style="background: #9a5c1fad; color: #ffffff; border-radius: 8px;">Ver</a></td>
                            <td> <a href="#" onclick="abrirModalDesativar(<?php echo $aluno['id_matricula'];  ?>)" class="btn btn-danger fw-bold px-4 py-2" style=" color: #ffffff; border-radius: 8px;">X</a></td>
                    
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="container my-5">
        <p class="text-center" style="font-size: 1.2em; color: #ff4d4d; font-weight: bold;">Não há alunos matriculados nesta turma.</p>
    </div>
<?php endif; ?>

<div class="text-center mt-4">
    <h3 style="color: #9a5c1fad;">Precisa adcionar nota? clique abaixo</h3>
    <a href="http://localhost/escola/public/notas/adicionar?id_curso=<?php echo $aluno['id_curso']; ?>" class="btn fw-bold px-4 py-2" style="background:  #9a5c1fad; color: #ffffff; border-radius: 8px;">
        Adicionar Nota
    </a>
</div>







<!-- MODAL DESATIVAR Aluno  -->
<div class="modal" tabindex="-1" id="modalDesativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir aluno da turma</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Tem Certeza que deseja excluir o aluno da turma <?php echo htmlspecialchars($turmaDetalhes[0]['nome_curso']); ?> ?</p>
                <input type="hidden" id="idMatriculaDesativar" value="">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnConfirmar">Desativar</button>
            </div>
        </div>
    </div>
</div>







<script>
    function abrirModalDesativar(idMatricula) {


        if ($('#modalDesativar').hasClass('show')) {
            return;
        }

        document.getElementById('idMatriculaDesativar').value = idMatricula;
        $('#modalDesativar').modal('show');

    }


    document.getElementById('btnConfirmar').addEventListener('click', function() {
        const idMatricula = document.getElementById('idMatriculaDesativar').value;
        console.log(idMatricula);

        if (idMatricula) {
            desativarMatricula(idMatricula);
        }

    });

    function desativarMatricula(idMatricula) {

        fetch(`http://localhost/escola/public/matriculas/desativar/${idMatricula}`, {
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
                    console.log('Aluno desmatriculado com sucesso');
                    $('#modalDesativar').modal('hide');
                    setTimeout(() => {
                        location.reload();
                    }), 500;

                } else {
                    alert(data.mensagem || "Ocorreu um erro ao Desmatricular o aluno");
                }

            })

            .catch(erro => {
                console.error("erro", erro);
                alert('erro na requisicao');

            })



    }
</script>