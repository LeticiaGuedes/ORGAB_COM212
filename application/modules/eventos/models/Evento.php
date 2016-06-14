<?php

class Evento extends CI_Model {
    public $id_evento;
    public $nome;
    public $album;
    public $prateleira;
    public $ano;
    public $cor_album;
    public $cor_adesivo;

    /*
        Construtor
    */
    public function __construct ($id_evento=0) {
        // Carregando biblioteca do banco de dados
        $this->load->database();


        /*
            Recupera um evento já existente do banco de dados
                @ se $id_evento for passado como parâmetro
        */
        if ($id_evento) {
            // Obtém o evento que com respectivo "$id_evento"
            $this->db->where('id_evento', $id_evento);
            // Obtém o primeiro resultado (index 0) da busca
            $result = $this->db->get('eventos')->result()[0];

            // Monta o objeto evento
            $this->id_evento = $result->id_evento;
            $this->nome = $result->nome;
            $this->album = $result->album;
            $this->prateleira = $result->prateleira;
            $this->ano = $result->ano;
            $this->cor_album = $result->cor_album;
            $this->cor_adesivo = $result->cor_adesivo;
        }


        /*
            Adicionar novo evento
                @ se $id_evento não for passado como parâmetro
        */
        else {
            // Remove os atributos id_evento e created, já que eles serão
            //  automaticamente gerado pelo banco de dados.
            unset( $this->id_evento );
            unset( $this->created );
        }
    }



    /*
        Adiciona ou atualiza o evento no banco de dados
    */
    public function save () {
        // Atualiza
        //  @ verifico se o atributo "id_evento" existe neste objeto.
        //    lembrando que este atributo é apagado se criamos um novo evento.
        if ( isset($this->id_evento) ) {
             $this->db->update('eventos', $this, array('id_evento' => $this->id_evento));
        }

        // Salva
        else {
            $this->db->insert('eventos', $this);
        }
    }


    /*
        Deleta o evento do banco de dados
    */
    public function delete () {
        $this->db->delete('eventos', array('id_evento' => $this->id_evento));
    }


    /*
        Obtém uma lista de todos os eventos
    */
    public static function getEventos () {
        // Obtém instância do CodeIgniter
        $CI =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI->load->database();

        // Obtém todos os posts
        $CI->db->order_by("created", "desc");
        $result = $CI->db->get('eventos')->result();

        // Monta vetor de objetos "evento"
        $eventos  = [];

        foreach ($result as $evento) {
            $tmp    = new Evento();
            $tmp->id_evento = $evento->id_evento;
            $tmp->nome = $evento->nome;
            $tmp->album = $evento->album;
            $tmp->prateleira = $evento->prateleira;
            $tmp->ano = $evento->ano;
            $tmp->cor_album = $evento->cor_album;
            $tmp->cor_adesivo = $evento->cor_adesivo;
            $tmp->created               = $evento->created;

            $eventos[] = $tmp;
        }

        return $eventos;
    }

}