<?php

class Livro extends CI_Model {
    public $id_livro;
    public $titulo;
    public $autor;
    public $prateleira;
    public $edicao;
    public $ano;
    public $assunto;
    public $idioma;
    public $editora;

    /*
        Construtor
    */
    public function __construct ($id_livro=0) {
        // Carregando biblioteca do banco de dados
        $this->load->database();


        /*
            Recupera um livro já existente do banco de dados
                @ se $id_livro for passado como parâmetro
        */
        if ($id_livro) {
            // Obtém o livro que com respectivo "$id_livro"
            $this->db->where('id_livro', $id_livro);
            // Obtém o primeiro resultado (index 0) da busca
            $result = $this->db->get('livros')->result()[0];

            // Monta o objeto livro
            $this->id_livro = $result->id_livro;
            $this->titulo = $result->titulo;
            $this->autor = $result->autor;
            $this->prateleira = $result->prateleira;
            $this->edicao = $result->edicao;
            $this->ano = $result->ano;
            $this->assunto = $result->assunto;
            $this->idioma = $result->idioma;
            $this->editora = $result->editora;
        }


        /*
            Adicionar novo livro
                @ se $id_livro não for passado como parâmetro
        */
        else {
            // Remove os atributos id_livro e created, já que eles serão
            //  automaticamente gerado pelo banco de dados.
            unset( $this->id_livro );
            unset( $this->created );
        }
    }



    /*
        Adiciona ou atualiza o livro no banco de dados
    */
    public function save () {
        // Atualiza
        //  @ verifico se o atributo "id_livro" existe neste objeto.
        //    lembrando que este atributo é apagado se criamos um novo livro.
        if ( isset($this->id_livro) ) {
             $this->db->update('livros', $this, array('id_livro' => $this->id_livro));
        }

        // Salva
        else {
            $this->db->insert('livros', $this);
        }
    }


    /*
        Deleta o livro do banco de dados
    */
    public function delete () {
        $this->db->delete('livros', array('id_livro' => $this->id_livro));
    }


    /*
        Obtém uma lista de todos os livros
    */
    public static function getLivros () {
        // Obtém instância do CodeIgniter
        $CI =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI->load->database();

        // Obtém todos os posts
        $CI->db->order_by("created", "desc");
        $result = $CI->db->get('livros')->result();

        // Monta vetor de objetos "Livro"
        $livros  = [];

        foreach ($result as $livro) {
            $tmp    = new Livro();
            $tmp->id_livro = $livro->id_livro;
            $tmp->titulo = $livro->titulo;
            $tmp->autor = $livro->autor;
            $tmp->prateleira = $livro->prateleira;
            $tmp->edicao = $livro->edicao;
            $tmp->ano = $livro->ano;
            $tmp->assunto = $livro->assunto;
            $tmp->idioma = $livro->idioma;
            $tmp->editora = $livro->editora;
            $tmp->created               = $livro->created;

            $livros[] = $tmp;
        }

        return $livros;
    }

}