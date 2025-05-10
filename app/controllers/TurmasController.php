<?php

class TurmasController extends Controller
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



    public function sala()
    {

        $dados = array();
        // Buscar professors 
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;

      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());

        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getListarCursos();
        $dados['cursos'] = $curso;


        $turmas = new Turma();
        $turmas = $turmas->getListarSalas($_SESSION['userEmail']);
        $dados['turmas'] = $turmas;



        $dados['conteudo'] = 'dash/turma/sala';
        $this->carregarViews('dash/dashboard', $dados);
    }

    public function listar()
    {
        $dados = array();
        
        // Buscar professor com base no e-mail da sessão
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['prof'] = $dadosProf;
    
        // Carregar cursos
        $cursoModel = new Curso();
        $cursos = $cursoModel->getListarCursos();
        $dados['cursos'] = $cursos;
    
        // Carregar turmas
        $turmaModel = new Turma();
        $turmas = $turmaModel->getListarSalas($_SESSION['userEmail']);
        $dados['turmas'] = $turmas;
    
      // Contagem de entidades (Aluno, Professor, Curso)
      $dados = array_merge($dados, $this->contarEntidades());


        // Se id_curso for passado na URL, buscar os alunos da turma
        if (isset($_GET['id_curso'])) {
            $id_curso = $_GET['id_curso'];
            $turmaDetalhes = $turmaModel->getListarTurma($id_curso);
            $dados['turmaDetalhes'] = $turmaDetalhes;
        } else {
            echo "O parâmetro 'id_curso' não foi passado.";
        }
    
        // Definir o conteúdo da página
        $dados['conteudo'] = 'dash/turma/listar';
        $this->carregarViews('dash/dashboard', $dados);
    }
    


}
