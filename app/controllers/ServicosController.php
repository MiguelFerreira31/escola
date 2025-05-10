<?php

class ServicosController extends Controller
{

    private $cursoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo curso
        $this->cursoModel = new Curso();
    }

    // FRONT-END: Carregar a lista de serviços
    public function index()
    {

        $dados = array();
        $dados['titulo'] = 'Cursos - Laska';


        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getTodosCursos(3);
        $dados['cursos'] = $curso;

        $this->carregarViews('servicos', $dados);
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




    // ###############################################
    // BACK-END - DASHBOARD
    #################################################//

    // 1- Método para listar todos os serviços
    public function listar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'professor') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);


        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getListarCursos();
        $dados['cursos'] = $curso;


      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());



        $dados['conteudo'] = 'dash/curso/listar';
        $dados['prof'] = $dadosProf;
        $this->carregarViews('dash/dashboard', $dados);
    }

    // 2- Método para adicionar cursos
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'professor') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // TBL CURSO
            $nome_curso                   = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_curso              = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_curso             = filter_input(INPUT_POST, 'preco_curso', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_curso         = filter_input(INPUT_POST, 'tempo_estimado');
            $status_curso                 = filter_input(INPUT_POST, 'status_curso', FILTER_SANITIZE_SPECIAL_CHARS);




            if ($nome_curso && $descricao_curso && $preco_curso !== false) {


                // 3 Preparar Dados 

                $dadosCurso = array(

                    'nome_curso'              => $nome_curso,
                    'descricao_curso'         => $descricao_curso,
                    'preco_curso'             => $preco_curso,
                    'tempo_estimado'          => $tempo_estimado_curso,
                    'status_curso'            => $status_curso

                );

                // 4 Inserir Servico 



                $id_curso = $this->cursoModel->addCurso($dadosCurso);


                if ($id_curso) {


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Serviço adcionado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/escola/public/servicos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o serviço";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }


        // Buscar professors 
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);


      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/curso/adicionar';
        $dados['prof'] = $dadosProf;

        $this->carregarViews('dash/dashboard', $dados);
    }

    // 3- Método para editar
    public function editar($id = null)
    {

        $dados = array();
        $dados['conteudo'] = 'dash/curso/editar';
        // Buscar professors 
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;



        if ($id === null) {
            header('Location:http://localhost/escola/public/cursos/listar');
            exit;
        }



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // TBL CURSO
            $nome_curso                   = filter_input(INPUT_POST, 'nome_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_curso              = filter_input(INPUT_POST, 'descricao_curso', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_curso             = filter_input(INPUT_POST, 'preco_curso', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_curso         = filter_input(INPUT_POST, 'tempo_estimado');
            $status_curso                 = filter_input(INPUT_POST, 'status_curso', FILTER_SANITIZE_SPECIAL_CHARS);




            if ($nome_curso && $descricao_curso && $preco_curso !== false) {


                // 3 Preparar Dados 

                $dadosCurso = array(

                    'nome_curso'              => $nome_curso,
                    'descricao_curso'         => $descricao_curso,
                    'preco_curso'             => $preco_curso,
                    'tempo_estimado'          => $tempo_estimado_curso,
                    'status_curso'            => $status_curso

                );

                // 4 Inserir Servico 



                $id_curso = $this->cursoModel->addCurso($dadosCurso);


                if ($id_curso) {


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Curso adcionado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/escola/public/servicos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o serviço";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }




        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getCursoId($id);
        $dados['cursos'] = $curso;

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


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


        $resultado = $this->cursoModel->desativarCurso($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Curso Desativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Desativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao desativar Curso']);
        }
    }

    // 4- Método para desativar o serviço
    public function ativar($id = null)
    {




        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }


        $resultado = $this->cursoModel->ativarCurso($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Curso Ativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao ativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao ativar Curso']);
        }
    }



    public function desativados()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'professor') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);


        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getListarCursoDesativados();
        $dados['cursos'] = $curso;



      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/curso/desativados';
        $dados['prof'] = $dadosProf;
        $this->carregarViews('dash/dashboard', $dados);
    }

    
}
