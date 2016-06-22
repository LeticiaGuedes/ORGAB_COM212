<?php

class Eventos extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os eventos
        - Recebe requisições POST e adiciona ao banco de dados
    */
    public function index () {
        // Carrega a model "Evento"
        $this->load->model('Evento');

        /*
            Verifica se está recebendo um requisição de novo evento
            Se estiver, adiciona o evento recebido.
        */
        if(isset($_POST['nome'])) {
            $this->add();
        }

        // Obtém todos os eventos através do método estático "getEventos()"
        $eventos  = Evento::getEventos();

        // Criando view
        $data           = [];
        $data['eventos']  = $eventos;
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('eventos/list', $data);
        $this->load->view('layout/footer');
    }


    /*
        Adicionar requisições POST no banco de dados.
    */
    public function add () {
        // Obtém instância do CodeIgniter
        $CI1 =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI1->load->database();

        // Obtém todos os posts
        $CI1->db->order_by("nome", "cresc");
        $this->load->helper('url');
        $result1 = $CI1->db->get('eventos')->result();
        //Testa se já existe um evento com o mesmo nome e data no BD
        foreach ($result1 as $evento){
            if((($evento->nome)==($_POST['nome']))&&(($evento->ano)==($_POST['ano']))){
                redirect(base_url('eventos'));
            }
        }
        $this->load->model('Evento');

        $new_evento = new Evento();
        $new_evento->nome = $_POST['nome'];
        $new_evento->album = $_POST['album'];
        $new_evento->prateleira = $_POST['prateleira'];
        $new_evento->ano = $_POST['ano'];
        $new_evento->cor_album = $_POST['cor_album'];
        $new_evento->cor_adesivo = $_POST['cor_adesivo'];
        $new_evento->save();
    }


    /*
        Remove evento
    */
    public function remove ($id=0) {
        // Helper para as funções de URL e redirecionamento
        $this->load->helper('url');

        // Caso recebe um ID do evento
        if ($id) {
            $this->load->model('Evento');

            $evento = new Evento($id);
            $evento->delete();

            redirect(base_url('eventos'));
        }

        else {
            echo "ERRO! Nenhum ID de evento foi recebido!";
        }

    }


    /*
        Editar evento
    */
    public function edit ($id) {
        // Obtém os dados do evento do banco de dados
        $this->load->model('Evento');
        $evento = new Evento($id);



        // Construir o vetor a ser enviado para a View
        $data = [];
        $data['evento']    = $evento;
        $data['id']         = $id;

        // Salva no banco se receber uma requisição POST
        if(isset($_POST['nome'])){
            $evento->nome = $_POST['nome'];
            $evento->album = $_POST['album'];
            $evento->prateleira = $_POST['prateleira'];
            $evento->ano = $_POST['ano'];
            $evento->cor_album = $_POST['cor_album'];
            $evento->cor_adesivo = $_POST['cor_adesivo'];
            $evento->save();
        }

        $this->load->view('edit.php', $data);
    }
}