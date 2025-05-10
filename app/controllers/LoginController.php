<?php

class LoginController extends Controller{


        public function index(){

            $dados = array();
            $dados['titulo'] = 'login Nós - Ki Oficina';

            $this->carregarViews('login',$dados);

        }


}


