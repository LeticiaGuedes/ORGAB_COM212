<?php

class Usuarios extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os usuarios
        - Recebe requisições POST e adiciona ao banco de dados
    */
    public function index () {
        // Carrega a model "Usuario"
        $this->load->model('Usuario');

        /*
            Verifica se está recebendo um requisição de novo usuario
            Se estiver, adiciona o usuario recebido.
        */
        if(isset($_POST['nome'])) {
            $this->add();
        }

        // Obtém todos os usuarios através do método estático "getUsuarios()"
        $usuarios  = Usuario::getUsuarios();

        // Criando view
        $data           = [];
        $data['usuarios']  = $usuarios;
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('usuarios/list', $data);
        $this->load->view('layout/footer');
    }


    /*
        Adicionar requisições POST no banco de dados.
    */
    public function add () {
        $this->load->model('Usuario');

        $new_usuario = new Usuario();
        $new_usuario->nome = $_POST['nome'];
        $new_usuario->telefone = $_POST['telefone'];
        $new_usuario->endereço = $_POST['endereço'];
        $new_usuario->save();
    }


    /*
        Remove usuario
    */
    public function remove ($id=0) {
        // Helper para as funções de URL e redirecionamento
        $this->load->helper('url');

        // Caso recebe um ID do usuario
        if ($id) {
            $this->load->model('Usuario');

            $usuario = new Usuario($id);
            $usuario->delete();

            redirect(base_url('usuarios'));
        }

        else {
            echo "ERRO! Nenhum ID de usuario foi recebido!";
        }

    }


    /*
        Editar Usuario
    */
    public function edit ($id) {
        // Obtém os dados do usuario do banco de dados
        $this->load->model('Usuario');
        $usuario = new Usuario($id);



        // Construir o vetor a ser enviado para a View
        $data = [];
        $data['usuario']    = $usuario;
        $data['id']         = $id;

        // Salva no banco se receber uma requisição POST
        if(isset($_POST['nome'])){
            $usuario->nome = $_POST['nome'];
            $usuario->telefone = $_POST['telefone'];
            $usuario->endereço = $_POST['endereço'];
            $usuario->save();
        }

        $this->load->view('edit.php', $data);
    }
}