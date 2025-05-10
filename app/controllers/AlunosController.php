<?php

class AlunosController extends Controller
{

    private $alunoModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo aluno
        $this->alunoModel = new Aluno();
    }



    // ###############################################
    // BACK-END - DASHBOARD
    #################################################//



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


        // Carregar os alunos
        $alunoModel = new Aluno();
        $aluno = $alunoModel->getListarAluno();
        $dados['alunos'] = $aluno;


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();


        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/aluno/listar';
        $dados['prof'] = $dadosProf;
        $this->carregarViews('dash/dashboard', $dados);
    }


    // 1- Método para listar todos os serviços
    public function desativados()
    {



        $dados = array();
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);


        // Carregar os alunos
        $alunoModel = new Aluno();
        $aluno = $alunoModel->getListarAlunoDesativado();
        $dados['alunos'] = $aluno;


        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/aluno/desativados';
        $dados['prof'] = $dadosProf;
        $this->carregarViews('dash/dashboard', $dados);
    }


    // 2- Método para adicionar Alunos
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'professor') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {



            // TBL Aluno
            $email_aluno                  = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_aluno                   = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_aluno                   = filter_input(INPUT_POST, 'foto_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $nasc_aluno                   = filter_input(INPUT_POST, 'nasc_aluno', FILTER_SANITIZE_NUMBER_FLOAT);
            $senha_aluno                  = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_NUMBER_FLOAT);
            $cpf_cnpj_aluno               = filter_input(INPUT_POST, 'cpf_cnpj_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_aluno                 = filter_input(INPUT_POST, 'status_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_aluno               = filter_input(INPUT_POST, 'telefone_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_aluno               = filter_input(INPUT_POST, 'endereco_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_aluno                 = filter_input(INPUT_POST, 'bairro_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_aluno                 = filter_input(INPUT_POST, 'cidade_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                        = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);




            if ($nome_aluno && $email_aluno && $senha_aluno !== false) {


                // 3 Preparar Dados 

                $dadosAluno = array(

                    'nome_aluno'                => $nome_aluno,
                    'foto_aluno'                => $foto_aluno,
                    'cpf_cnpj_aluno'            => $cpf_cnpj_aluno,
                    'email_aluno'               => $email_aluno,
                    'nasc_aluno'                => $nasc_aluno,
                    'senha_aluno'               => $senha_aluno,
                    'status_aluno'              => $status_aluno,
                    'telefone_aluno'            => $telefone_aluno,
                    'endereco_aluno'            => $endereco_aluno,
                    'bairro_aluno'              => $bairro_aluno,
                    'cidade_aluno'              => $cidade_aluno,
                    'id_uf'                     => $id_uf,

                );

                // 4 Inserir Aluno

                $id_aluno = $this->alunoModel->addAluno($dadosAluno);



                if ($id_aluno) {
                    if (isset($_FILES['foto_aluno']) && $_FILES['foto_aluno']['error'] == 0) {


                        $arquivo = $this->uploadFoto($_FILES['foto_aluno']);


                        if ($arquivo) {
                            //Inserir na galeria

                            $this->alunoModel->addFotoAluno($id_aluno, $arquivo, $nome_aluno);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }


                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Aluno Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/escola/public/alunos/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar Ao adcionar aluno";
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

        // Buscar aluno
        $alunos = new Aluno();
        $dados['alunos'] = $alunos->getListarAluno();

        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();


        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/aluno/adicionar';
        $dados['prof'] = $dadosProf;

        $this->carregarViews('dash/dashboard', $dados);
    }

    // 3- Método para editar
    public function editar($id = null)
    {
        $dados = array();
        $dados['conteudo'] = 'dash/aluno/editar';

        if ($id === null) {
            header('Location:http://localhost/escola/public/alunos/listar');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // TBL Aluno
            $email_aluno    = filter_input(INPUT_POST, 'email_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_aluno     = filter_input(INPUT_POST, 'nome_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_aluno     = filter_input(INPUT_POST, 'foto_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $nasc_aluno     = filter_input(INPUT_POST, 'nasc_aluno', FILTER_SANITIZE_NUMBER_FLOAT);
            $senha_aluno    = filter_input(INPUT_POST, 'senha_aluno', FILTER_SANITIZE_NUMBER_FLOAT);
            $cpf_cnpj_aluno = filter_input(INPUT_POST, 'cpf_cnpj_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_aluno   = filter_input(INPUT_POST, 'status_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_aluno = filter_input(INPUT_POST, 'telefone_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_aluno = filter_input(INPUT_POST, 'endereco_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_aluno   = filter_input(INPUT_POST, 'bairro_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_aluno   = filter_input(INPUT_POST, 'cidade_aluno', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf          = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($nome_aluno && $email_aluno && $senha_aluno !== false) {
                // 3 Preparar Dados 
                $dadosAluno = array(
                    'nome_aluno'    => $nome_aluno,
                    'foto_aluno'    => $foto_aluno,
                    'cpf_cnpj_aluno' => $cpf_cnpj_aluno,
                    'email_aluno'   => $email_aluno,
                    'nasc_aluno'    => $nasc_aluno,
                    'senha_aluno'   => $senha_aluno,
                    'status_aluno'  => $status_aluno,
                    'telefone_aluno' => $telefone_aluno,
                    'endereco_aluno' => $endereco_aluno,
                    'bairro_aluno'  => $bairro_aluno,
                    'cidade_aluno'  => $cidade_aluno,
                    'id_uf'         => $id_uf,
                );

                // 4 Atualizar Aluno
                $id_aluno = $this->alunoModel->updateAluno($id, $dadosAluno);

                if ($id_aluno) {
                    if (isset($_FILES['foto_aluno']) && $_FILES['foto_aluno']['error'] == 0) {
                        $arquivo = $this->uploadFoto($_FILES['foto_aluno']);
                        if ($arquivo) {
                            $this->alunoModel->addFotoAluno($id, $arquivo, $nome_aluno);
                        }
                    }

                    // ✅ Mensagem de Sucesso
                    $_SESSION['mensagem'] = "Aluno atualizado com sucesso!";
                    $_SESSION['tipo-msg'] = "sucesso";
                } else {
                    $dados['mensagem'] = "Erro ao atualizar aluno";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }

        $dados = array();
        $alunos = $this->alunoModel->getAlunoId($id);
        $dados['alunos'] = $alunos;

        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();


        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());

        $dados['titulo'] = 'Dashboard - Laska Silios';

        if ($_SESSION['userTipo'] == 'aluno') {
            $aluno = new Aluno();
            $dadosaluno = $aluno->buscarAluno($_SESSION['userEmail']);
            $dados['aluno'] = $dadosaluno;

            $dados['conteudo'] = 'dash/aluno/editar';
            $this->carregarViews('dash/dashboard-aluno', $dados);
            return;
        } else if ($_SESSION['userTipo'] == 'professor') {
            $prof = new Professor();
            $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
            $dados['prof'] = $dadosProf;

            $dados['conteudo'] = 'dash/aluno/editar';
            $this->carregarViews('dash/dashboard', $dados);
            return;
        }
    }


    // 4- Método para desativar o serviço
    public function desativar($id = null)
    {




        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }


        $resultado = $this->alunoModel->desativarAluno($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Aluno Desativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Desativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao desativar Aluno']);
        }
    }



    // 5- Método para sativar o serviço
    public function ativar($id = null)
    {




        if ($id === null) {
            http_response_code(400);
            echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
            exit;
        }


        $resultado = $this->alunoModel->ativarAluno($id);

        header('Content-Type: application/json');

        if ($resultado) {
            $_SESSION['mensagem'] = "Aluno ativado com Sucesso";

            $_SESSION['tipo-msg'] = "sucesso";

            echo json_encode(['sucesso' => true]);
        } else {
            $_SESSION['mensagem'] = "falha ao Desativar ";

            $_SESSION['tipo-msg'] = "erro";


            echo json_encode(['sucesso' => false, "mensagem" => 'falha ao ativar Aluno']);
        }
    }



    // 5- Método para editar
    public function perfil()
    {


        $dados = array();
        $dados['conteudo'] = 'dash/aluno/perfil';
        // Buscar professors 
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

        $aluno = new Aluno();
        $dadosAluno = $aluno->buscarAluno($_SESSION['userEmail']);
        $dados['aluno'] = $dadosAluno;


        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());

        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();



        $this->carregarViews('dash/dashboard-aluno', $dados);
    }







    private function uploadFoto($file)
    {

        // var_dump($file);
        $dir = '../public/uploads/aluno/';

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid() . '.' . $ext;


        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'aluno/' . $nome_arquivo;
        }
        return false;
    }
}
