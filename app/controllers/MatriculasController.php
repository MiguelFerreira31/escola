<?php

class MatriculasController extends Controller
{

    private $matriculaModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo matricula
        $this->matriculaModel = new Matricula();
    }


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

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());

        $dados['conteudo'] = 'dash/matricula/listar';
        $this->carregarViews('dash/dashboard-aluno', $dados);
    }



    // 2- Método para adicionar 
    public function adicionar()
    {
        $dados = array();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_NUMBER_INT);
            $id_curso = filter_input(INPUT_POST, 'id_curso', FILTER_SANITIZE_NUMBER_INT);
            $id_professor = filter_input(INPUT_POST, 'id_professor', FILTER_SANITIZE_NUMBER_INT);
            $data_matricula = (new DateTime())->format('Y-m-d H:i:s');
            $media_final = null;
    
            if ($id_aluno && $id_curso && $id_professor) {
                // Verificar se já existe uma matrícula com os mesmos dados
                if ($this->matriculaModel->verificarDuplicidade($id_aluno, $id_curso, $id_professor)) {
                    $_SESSION['mensagem'] = "Erro: Este aluno já está matriculado neste curso com este professor!";
                    $_SESSION['tipo-msg'] = "erro";
                } else {
                    // Preparar dados para inserção
                    $dadosMatricula = array(
                        'id_aluno' => $id_aluno,
                        'id_curso' => $id_curso,
                        'data_matricula' => $data_matricula,
                        'media_final' => $media_final,
                        'id_professor' => $id_professor
                    );
    
                    $id_matricula = $this->matriculaModel->addMatricula($dadosMatricula);
    
                    if ($id_matricula) {
                        $_SESSION['mensagem'] = "Aluno matriculado com sucesso!";
                        $_SESSION['tipo-msg'] = "sucesso";
                    } else {
                        $_SESSION['mensagem'] = "Erro ao adicionar a matrícula!";
                        $_SESSION['tipo-msg'] = "erro";
                    }
                }
            } else {
                $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios";
                $_SESSION['tipo-msg'] = "erro";
            }
        }
    
        // Buscar professores
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;
    
        // Carregar alunos
        $alunoModel = new Aluno();
        $dados['alunos'] = $alunoModel->getListarAluno();
    
        // Carregar cursos
        $cursoModel = new Curso();
        $dados['cursos'] = $cursoModel->getListarCursos();
    
        // Carregar todos os professores
        $professor = new Professor();
        $dados['professor'] = $professor->getTodosProfessor();
    

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());

        $dados['conteudo'] = 'dash/matricula/adicionar';
        $this->carregarViews('dash/dashboard', $dados);
    }
    



    // 4- Método para desativar o serviço
    public function desativar($id = null)
    {




        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }


        $resultado = $this->matriculaModel->desativarMatricula($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Matricula Desativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Desativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao desativar Aluno']);
        }
    }




}
