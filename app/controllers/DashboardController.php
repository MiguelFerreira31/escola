<?php

class DashboardController extends Controller
{


    public function index()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['userId']) || !isset($_SESSION['userTipo'])) {

            header('Location:' . BASE_URL);
            exit;
        }
        $dados = array();
        $prof = new Professor();
        $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
        $dados['titulo']        = 'Dashboard - Laska Silios';
        $dados['prof'] = $dadosProf;


        if($_SESSION['userTipo'] == 'aluno'){
            $aluno = new Aluno();
            $dadosaluno = $aluno->buscarAluno($_SESSION['userEmail']);
            $dados['aluno'] = $dadosaluno;

          



            $this->carregarViews('dash/dashboard-aluno', $dados);

        }else if($_SESSION['userTipo'] == 'professor'){
            $prof = new Professor();
            $dadosProf = $prof->buscarProfessor($_SESSION['userEmail']);
            $dados['titulo']        = 'Dashboard - Laska Silios';
            $dados['prof'] = $dadosProf;

            $contadorAluno = new Aluno();
            $dadosAluno = $contadorAluno->contarAluno();
          
            $dados['contadorAluno'] = $dadosAluno;

            $contadorProfessor = new Professor();
        $dadosProfessor = $contadorProfessor->contarProfessor();
      
        $dados['contadorProfessor'] = $dadosProfessor;


            $contadorCurso = new Curso();
            $dadosCurso = $contadorCurso->contarCurso();
          
            $dados['contadorCurso'] = $dadosCurso;


         




            $this->carregarViews('dash/dashboard', $dados);
        }

    
        
    }


    
}
