<?php

class HomeController extends Controller
{


    public function index()
    {

        $dados = array();

        $dados['mensagem'] = 'Bem-vindo a KiOficina';




        // Carregar as curso
        $cursoModel = new Curso();
        $curso = $cursoModel->getTodosCursos(3);
        $dados['cursos'] = $curso;

        // Carregar as curso
        $professorModel = new Professor();
        $professor = $professorModel->getTodosProfessor();
        $dados['professor'] = $professor;




        //var_dump($dados['contarClientes']);

        $this->carregarViews('home', $dados);
    }
}
