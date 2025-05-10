<?php

class NotasController extends Controller
{


    private function contarEntidades()
    {
        $dados = [];

        // Contar Alunos
        $contadorAluno = new Aluno();
        $dados['contadorAluno'] = $contadorAluno->contarAluno();

        // Contar Professores
        $contadorProfessor = new Professor();
        $dados['contadorProfessor'] = $contadorProfessor->contarProfessor();

        // Contar Cursos
        $contadorCurso = new Curso();
        $dados['contadorCurso'] = $contadorCurso->contarCurso();

        return $dados;
    }




    public function listar()
    {

        $dados = array();
        // Buscar professors
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

        $aluno = new Aluno();
        $dadosAluno = $aluno->buscarAluno($_SESSION['userEmail']);
        $dados['aluno'] = $dadosAluno;


        // Carregar os matriculas do aluno
        $matricula = new Aluno();
        $matricula = $matricula->getAlunoMatriculado($_SESSION['userEmail']);
        $dados['matriculas'] = $matricula;


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $notas = new Nota();
        $notas = $notas->getListarNota($_SESSION['userEmail']);
        $dados['notas'] = $notas;

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());

        $dados['conteudo'] = 'dash/nota/listar';
        $this->carregarViews('dash/dashboard-aluno', $dados);
    }



    public function adicionar()
    {
        $notaModel = new Nota();
        $dados = array();

        // Buscar professor
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

        // Buscar avaliações
        $avaliacaoModel = new Nota();
        $dadosAval = $avaliacaoModel->getTipoAvaliacao();
        $dados['avaliacao'] = $dadosAval;

        $turmaModel = new Turma();

        if (!isset($_GET['id_curso']) || empty($_GET['id_curso'])) {
            die("Erro: O parâmetro 'id_curso' não foi passado.");
        }

        $id_curso = $_GET['id_curso'];
        $turma = $turmaModel->getListarTurma($id_curso);
        $dados['turma'] = $turma;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_matricula = filter_input(INPUT_POST, 'id_matricula', FILTER_SANITIZE_NUMBER_INT);
            $id_avaliacao = filter_input(INPUT_POST, 'id_avaliacao', FILTER_SANITIZE_NUMBER_INT);
            $nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $data_avaliacao = filter_input(INPUT_POST, 'data_avaliacao', FILTER_SANITIZE_STRING);

            if ($id_avaliacao && $id_matricula && $nota !== false) {
                $dadosAluno = array(
                    'id_avaliacao' => $id_avaliacao,
                    'nota' => $nota,
                    'id_matricula' => $id_matricula,
                    'data_avaliacao' => $data_avaliacao
                );

                // Insere a nota no banco
                $id_nota = $notaModel->addNota($dadosAluno);

                if ($id_nota) {
                    // Calcula e atualiza a média final do aluno
                    $notaModel->calcularMediaFinal($id_matricula);

                    $_SESSION['mensagem'] = '<div class="alert alert-success text-center fw-bold" role="alert">Nota cadastrada com sucesso</div>';
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/escola/public/turmas/listar/?id_curso=' . $id_curso);
                    exit;
                } else {
                    $_SESSION['mensagem'] = '<div class="alert alert-danger text-center fw-bold" role="alert">Erro: Já existe uma nota cadastrada para essa avaliação.</div>';
                    $_SESSION['tipo-msg'] = "erro";
                }
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios.";
                $_SESSION['tipo-msg'] = "erro";
            }
        }

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/nota/adicionar';
        $this->carregarViews('dash/dashboard', $dados);
    }



    public function notaAluno()
    {

        $dados = array();
        // Buscar professors
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

        $aluno = new Aluno();
        $dadosAluno = $aluno->buscarAluno($_SESSION['userEmail']);
        $dados['aluno'] = $dadosAluno;


        // Carregar os matriculas do aluno
        $matricula = new Aluno();
        $matricula = $matricula->getAlunoMatriculado($_SESSION['userEmail']);
        $dados['matriculas'] = $matricula;


        // Carregar turmas
        $notaModel = new Nota();

        // Se id_aluno for passado na URL, buscar as notas do aluno
        if (isset($_GET['id_aluno'])) {
            $id_aluno = $_GET['id_aluno'];
            $notaDetalhes = $notaModel->getListarNotaAluno($id_aluno);
            $dados['notaDetalhes'] = $notaDetalhes;
        } else {
            // Caso o parâmetro 'id_aluno' não seja passado, exibe uma mensagem ou redireciona.
            echo "O parâmetro 'id_aluno' não foi passado.";
            exit;  // Finaliza a execução para evitar que o código continue
        }


      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/nota/notaAluno';
        $this->carregarViews('dash/dashboard', $dados);
    }


}
