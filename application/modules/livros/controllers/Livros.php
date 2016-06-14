<?php

class Livros extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os livros
        - Recebe requisições POST e adiciona ao banco de dados
    */
    public function index () {
        // Carrega a model "Livro"
        $this->load->model('Livro');

        /*
            Verifica se está recebendo um requisição de novo Livro
            Se estiver, adiciona o livro recebido.
        */
        if(isset($_POST['titulo'])) {
            $this->add();
        }

        // Obtém todos os livros através do método estático "getLivros()"
        $livros  = Livro::getLivros();

        // Criando view
        $data           = [];
        $data['livros']  = $livros;
        $this->load->view('layout/header');
        /*$this->load->view('layout/menu');*/
        $this->load->view('livros/list', $data);
        $this->load->view('layout/footer');
    }


    /*
        Adicionar requisições POST no banco de dados.
    */
    public function add () {
        $this->load->model('Livro');

        $new_livro = new Livro();
        $new_livro->titulo = $_POST['titulo'];
        $new_livro->autor = $_POST['autor'];
        $new_livro->prateleira = $_POST['prateleira'];
        $new_livro->edicao = $_POST['edicao'];
        $new_livro->ano = $_POST['ano'];
        $new_livro->assunto = $_POST['assunto'];
        $new_livro->idioma = $_POST['idioma'];
        $new_livro->editora = $_POST['editora'];
        $new_livro->save();
    }


    /*
        Remove livro
    */
    public function remove ($id=0) {
        // Helper para as funções de URL e redirecionamento
        $this->load->helper('url');

        // Caso recebe um ID do livro
        if ($id) {
            $this->load->model('Livro');

            $livro = new Livro($id);
            $livro->delete();

            redirect(base_url('livros'));
        }

        else {
            echo "ERRO! Nenhum ID de livro foi recebido!";
        }

    }


    /*
        Editar Livro
    */
    public function edit ($id) {
        // Obtém os dados do livro do banco de dados
        $this->load->model('Livro');
        $livro = new Livro($id);



        // Construir o vetor a ser enviado para a View
        $data = [];
        $data['livro']    = $livro;
        $data['id']         = $id;

        // Salva no banco se receber uma requisição POST
        if(isset($_POST['titulo'])){
            $livro->titulo = $_POST['titulo'];
            $livro->autor = $_POST['autor'];
            $livro->prateleira = $_POST['prateleira'];
            $livro->edicao = $_POST['edicao'];
            $livro->ano = $_POST['ano'];
            $livro->assunto = $_POST['assunto'];
            $livro->idioma = $_POST['idioma'];
            $livro->editora = $_POST['editora'];
            $livro->save();
        }

        $this->load->view('edit.php', $data);
    }
}