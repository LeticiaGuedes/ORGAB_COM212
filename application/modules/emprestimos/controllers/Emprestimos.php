<?php

class Emprestimos extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os emprestimos
        - Recebe requisições POST e adiciona ao banco de dados
    */
    public function index () {
        // Carrega a model "Emprestimo"
        $this->load->model('Emprestimo');

        /*
            Verifica se está recebendo um requisição de novo Emprestimo
            Se estiver, adiciona o emprestimo recebido.
        */
        if(isset($_POST['data_emprestimo'])) {
            $this->add();
        }

        // Obtém todos os emprestimos através do método estático "getEmprestimos()"
        $emprestimos  = Emprestimo::getEmprestimos();

        // Criando view
        $data           = [];
        $data['emprestimos']  = $emprestimos;
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('emprestimos/list', $data);
        $this->load->view('layout/footer');
    }


    /*
        Adicionar requisições POST no banco de dados.
    */
    public function add () {
        $this->load->model('Emprestimo');

        $new_emprestimo = new Emprestimo();
        $new_emprestimo->data_emprestimo = $_POST['data_emprestimo'];
        $new_emprestimo->data_devolucao = $_POST['data_devolucao'];
        $new_emprestimo->id_livro = $_POST['id_livro'];
        $new_emprestimo->id_usuario = $_POST['id_usuario'];
        $new_emprestimo->save();
    }


    /*
        Remove emprestimo
    */
    public function remove ($id=0) {
        // Helper para as funções de URL e redirecionamento
        $this->load->helper('url');

        // Caso recebe um ID do emprestimo
        if ($id) {
            $this->load->model('Emprestimo');

            $emprestimo = new Emprestimo($id);
            $emprestimo->delete();

            redirect(base_url('emprestimos'));
        }

        else {
            echo "ERRO! Nenhum ID de emprestimo foi recebido!";
        }

    }


    /*
        Editar Emprestimo
    */
    public function edit ($id) {
        // Obtém os dados do emprestimo do banco de dados
        $this->load->model('Emprestimo');
        $emprestimo = new Emprestimo($id);



        // Construir o vetor a ser enviado para a View
        $data = [];
        $data['emprestimo']    = $emprestimo;
        $data['id']         = $id;

        // Salva no banco se receber uma requisição POST
        if(isset($_POST['data_emprestimo'])){
            $emprestimo->data_emprestimo = $_POST['data_emprestimo'];
            $emprestimo->data_devolucao = $_POST['data_devolucao'];
            $emprestimo->save();
        }

        $this->load->view('edit.php', $data);
    }
}