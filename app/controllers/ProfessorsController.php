<?php

class ProfessorsController extends Controller
{

    private $professorModel;

    public function __construct()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Instaciar o modelo aluno
        $this->professorModel = new Professor();
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
        $dados['prof'] = $dadosProf;

      

        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $professor = new Professor();
        $dados['professor'] = $professor->getTodosProfessor();


        $contadorAluno = new Aluno();
        $dadosAluno = $contadorAluno->contarAluno();
        $dados['contadorAluno'] = $dadosAluno;

        $contadorProfessor = new Professor();
        $dadosProfessor = $contadorProfessor->contarProfessor();
        $dados['contadorProfessor'] = $dadosProfessor;


        $contadorCurso = new Curso();
        $dadosCurso = $contadorCurso->contarCurso();
        $dados['contadorCurso'] = $dadosCurso;


    




        $dados['conteudo'] = 'dash/professor/listar';
        $this->carregarViews('dash/dashboard', $dados);
    }


    // 1- Método para listar todos os serviços
    public function desativados()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'professor') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

      

        // Buscar Estado
        $estados = new Estado();
        $dados['estados'] = $estados->getListarEstados();

        $professor = new Professor();
        $dados['professor'] = $professor->getTodosProfessorDesativado();




        // Contagem de entidades (Aluno, Professor, Curso)
        $dados = array_merge($dados, $this->contarEntidades());


        $dados['conteudo'] = 'dash/professor/desativados';
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
            $email_professor                  = filter_input(INPUT_POST, 'email_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $nome_professor                   = filter_input(INPUT_POST, 'nome_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_professor                   = filter_input(INPUT_POST, 'foto_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $data_adm_professor                   = filter_input(INPUT_POST, 'data_adm_professor', FILTER_SANITIZE_NUMBER_FLOAT);
            $senha_professor                  = filter_input(INPUT_POST, 'senha_professor', FILTER_SANITIZE_NUMBER_FLOAT);
            $status_professor                 = filter_input(INPUT_POST, 'status_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_professor               = filter_input(INPUT_POST, 'telefone_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_professor               = filter_input(INPUT_POST, 'endereco_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_professor                 = filter_input(INPUT_POST, 'bairro_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_professor                 = filter_input(INPUT_POST, 'cidade_professor', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf                        = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);




            if ($nome_professor && $email_professor && $senha_professor !== false) {


                // 3 Preparar Dados 

                $dadosprofessor = array(

                    'nome_professor'                => $nome_professor,
                    'foto_professor'                => $foto_professor,
                    
                    'email_professor'               => $email_professor,
                    'data_adm_professor'            => $data_adm_professor,
                    'senha_professor'               => $senha_professor,
                    'status_professor'              => $status_professor,
                    'telefone_professor'            => $telefone_professor,
                    'endereco_professor'            => $endereco_professor,
                    'bairro_professor'              => $bairro_professor,
                    'cidade_professor'              => $cidade_professor,
                    'id_uf'                         => $id_uf,

                );

                // 4 Inserir professor

                $id_professor = $this->professorModel->addProfessor($dadosprofessor);



                if ($id_professor) {
                    if (isset($_FILES['foto_professor']) && $_FILES['foto_professor']['error'] == 0) {

                        
                        $arquivo = $this->uploadFoto($_FILES['foto_professor']);


                        if ($arquivo) {
                            //Inserir na galeria
                         
                            $this->professorModel->addFotoprofessor($id_professor, $arquivo, $nome_professor);
                        } else {
                            //Definir uma mensagem informando que não pode ser salva
                        }
                    }

                  
                    // Mensagem de SUCESSO 
                    $_SESSION['mensagem'] = "Professor Cadastrado com Sucesso";
                    $_SESSION['tipo-msg'] = "sucesso";
                    header('Location: http://localhost/escola/public/professors/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar Ao adcionar Professor";
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


        $dados['conteudo'] = 'dash/professor/adicionar';
        $dados['prof'] = $dadosProf;

        $this->carregarViews('dash/dashboard', $dados);
    }



  // 3- Método para editar
  public function editar($id = null)
  {

      $dados = array();
      $dados['conteudo'] = 'dash/professor/editar';
      // Buscar professors 
      $prof = new Professor();
      $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
      $dados['prof'] = $dadosProf;


      if ($id === null) {
        header('Location:http://localhost/escola/public/professors/listar');
        exit;
    }


      if ($_SERVER['REQUEST_METHOD'] === 'POST') {



        // TBL Aluno
        $email_professor                  = filter_input(INPUT_POST, 'email_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome_professor                   = filter_input(INPUT_POST, 'nome_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $foto_professor                   = filter_input(INPUT_POST, 'foto_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $data_adm_professor               = filter_input(INPUT_POST, 'data_adm_professor', FILTER_SANITIZE_NUMBER_FLOAT);
        $senha_professor                  = filter_input(INPUT_POST, 'senha_professor', FILTER_SANITIZE_NUMBER_FLOAT);
        $status_professor                 = filter_input(INPUT_POST, 'status_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone_professor               = filter_input(INPUT_POST, 'telefone_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco_professor               = filter_input(INPUT_POST, 'endereco_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro_professor                 = filter_input(INPUT_POST, 'bairro_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade_professor                 = filter_input(INPUT_POST, 'cidade_professor', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_uf                            = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);




        if ($nome_professor && $email_professor && $senha_professor !== false) {


            // 3 Preparar Dados 

            $dadosProfessor = array(

                'nome_professor'                => $nome_professor,
                'foto_professor'                => $foto_professor,
                'email_professor'               => $email_professor,
                'data_adm_professor'            => $data_adm_professor,
                'senha_professor'               => $senha_professor,
                'status_professor'              => $status_professor,
                'telefone_professor'            => $telefone_professor,
                'endereco_professor'            => $endereco_professor,
                'bairro_professor'              => $bairro_professor,
                'cidade_professor'              => $cidade_professor,
                'id_uf'                         => $id_uf,

            );

            // 4 Inserir professor

            $id_professor = $this->professorModel->updateProfessor($id, $dadosProfessor);



            if ($id) {
                if (isset($_FILES['foto_professor']) && $_FILES['foto_professor']['error'] == 0) {

                    
                    $arquivo = $this->uploadFoto($_FILES['foto_professor']);


                    if ($arquivo) {
                        //Inserir na galeria
                     
                        $this->professorModel->addFotoProfessor($id, $arquivo, $nome_professor);
                    } else {
                        //Definir uma mensagem informando que não pode ser salva
                    }
                }

              
                // Mensagem de SUCESSO 
                $_SESSION['mensagem'] = "Professor Editado com Sucesso";
                $_SESSION['tipo-msg'] = "sucesso";
                header('Location: http://localhost/escola/public/professors/listar');
                exit;
            } else {
                $dados['mensagem'] = "Erro ao Editar Professor";
                $dados['tipo-msg'] = "erro";
            }
            

          
        } else {
            $dados['mensagem'] = "Preencha todos os campos obrigatórios";
            $dados['tipo-msg'] = "erro";
        }

    }



   // Buscar dados do Professor de acordo com id
        $professor = $this->professorModel->getProfessorId($id);
        $dados['professor'] = $professor;

           // Contagem de entidades (Aluno, Professor, Curso)
           $dados = array_merge($dados, $this->contarEntidades());


         // Buscar Estado
         $estados = new Estado();
         $dados['estados'] = $estados->getListarEstados();
 

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


       $resultado = $this->professorModel->desativarProfessor($id);

       header('Content-Type: application/json');

       if ($resultado) {
           $_SESSION['mensagem'] = "Professor Desativado com Sucesso";

           $_SESSION['tipo-msg'] = "sucesso";

           echo json_encode(['sucesso' => true]);
       } else {
           $_SESSION['mensagem'] = "falha ao Desativar ";

           $_SESSION['tipo-msg'] = "erro";


           echo json_encode(['sucesso' => false, "mensagem" => 'falha ao desativar Professor']);
       }

       

   }


   // 5- Método para ativar o serviço
   public function ativar($id = null)
   {

    


       if ($id === null) {
           http_response_code(400);
           echo json_encode(['sucesso' => false, "mensagem" => "ID Invalido."]);
           exit;
       }


       $resultado = $this->professorModel->ativarProfessor($id);

       header('Content-Type: application/json');

       if ($resultado) {
           $_SESSION['mensagem'] = "Professor ativado com Sucesso";

           $_SESSION['tipo-msg'] = "sucesso";

           echo json_encode(['sucesso' => true]);
       } else {
           $_SESSION['mensagem'] = "falha ao ativar ";

           $_SESSION['tipo-msg'] = "erro";


           echo json_encode(['sucesso' => false, "mensagem" => 'falha ao ativar Professor']);
       }
   }




  // 5- Método para editar
  public function perfil()
  {

      $dados = array();
      $dados['conteudo'] = 'dash/professor/perfil';
      // Buscar professors 
      $prof = new Professor();
      $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
      $dados['prof'] = $dadosProf;

 

         // Buscar Estado
         $estados = new Estado();
         $dados['estados'] = $estados->getListarEstados();
 
      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());

      $this->carregarViews('dash/dashboard', $dados);
  }





  private function uploadFoto($file)
  {

      // var_dump($file);
      $dir = '../public/uploads/professor/';

      if (!file_exists($dir)) {
          mkdir($dir, 0755, true);
      }

      $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
      $nome_arquivo = uniqid() . '.' . $ext;


      if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
          return 'professor/' . $nome_arquivo;
      }
      return false;
  }


    
}
