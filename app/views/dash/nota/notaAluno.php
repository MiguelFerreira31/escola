<div class="container mt-5">
    <div class="row justify-content-center">
        <?php 
        if (isset($notaDetalhes) && count($notaDetalhes) > 0):  
            $agrupados = [];

            foreach ($notaDetalhes as $linha): 
                if (!is_array($linha) || !isset($linha['id_nota'])) continue; // Verifica se id_nota existe

                $curso = $linha['nome_curso'];
                $professor = $linha['nome_professor'];
                $mediaFinal = $linha['media_final']; 
                $id_nota = $linha['id_nota'];

                if (!isset($agrupados[$curso])) {
                    $agrupados[$curso] = [
                        'professor' => $professor,
                        'mediaFinal' => $mediaFinal,
                        'id_nota' => $id_nota, 
                        'avaliacoes' => []
                    ];
                }

                $agrupados[$curso]['avaliacoes'][] = $linha;
            endforeach;

            foreach ($agrupados as $curso => $dadosCurso):
                $professor = $dadosCurso['professor'];
                $mediaFinal = number_format((float)$dadosCurso['mediaFinal'], 2, '.' , '');
                $avaliacoes = $dadosCurso['avaliacoes'];
                $idNotaCurso = $dadosCurso['id_nota']; // Obtendo o id_nota do curso

                $corMedia = ($mediaFinal >= 7) ? " text-white" : " text-white";
                $iconeMedia = ($mediaFinal >= 7) ? "✅" : "❌";
        ?>
                <!-- Card do Curso -->
                <div class="col-md-10 mb-4">
                    <div class="card shadow-lg border-0 rounded-4" style="background: #9a5c1fad; color: #ffffff;">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold" style="color: #ffffff;"><?php echo htmlspecialchars($curso); ?></h4>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php foreach ($avaliacoes as $avaliacao): 
                                $corNota = ($avaliacao['nota'] >= 7) ? "text-success fw-bold" : "text-danger fw-bold";
                                $iconeNota = ($avaliacao['nota'] >= 7) ? "✅" : "❌";
                                $dataFormatada = date("d/m/Y", strtotime($avaliacao['data_avaliacao']));
                                $idNota = $avaliacao['id_nota'];
                            ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="background: #fff8f2; color: #9a5c1f;">
                                    <div>
                                        <strong>Avaliação:</strong> <?php echo htmlspecialchars($avaliacao['tipo_avaliacao']); ?><br>
                                        <strong>Data:</strong> <?php echo $dataFormatada; ?><br>
                                        <strong>ID Nota:</strong> <?php echo $idNota; ?> <!-- Mostra o ID da nota -->
                                    </div>
                                    <span class="<?php echo $corNota; ?>" style="font-size: 1.2em;">
                                        <?php echo number_format((float)$avaliacao['nota'], 2, '.', ''); ?> <?php echo $iconeNota; ?>
                                    </span>
                                 
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <!-- Média final destacada -->
                        <div class="card-footer text-center fw-bold py-3 rounded-bottom">
                     
                            Média Final do Curso: <?php echo $mediaFinal; ?> <?php echo $iconeMedia; ?>
                        </div>
                    </div>
                </div>
        <?php 
            endforeach;
        else: ?>
            <div class="col-md-12">
                <div class="alert alert-warning text-center p-3 rounded-3">Nenhuma nota encontrada para este aluno.</div>
            </div>
        <?php endif; ?>
    </div>
</div>

