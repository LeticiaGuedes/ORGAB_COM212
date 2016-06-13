<?php

class Emprestimo extends CI_Model {
    public $id_emprestimo;
    public $data_emprestimo;
    public $data_devolucao;
    public $id_livro;
    public $id_usuario;

    /*
        Construtor
    */
    public function __construct ($id_emprestimo=0) {
        // Carregando biblioteca do banco de dados
        $this->load->database();


        /*
            Recupera um emprestimo já existente do banco de dados
                @ se $id_emprestimo for passado como parâmetro
        */
        if ($id_emprestimo) {
            // Obtém o emprestimo que com respectivo "$id_emprestimo"
            $this->db->where('id_emprestimo', $id_emprestimo);
            // Obtém o primeiro resultado (index 0) da busca
            $result = $this->db->get('emprestimos')->result()[0];

            // Monta o objeto emprestimo
            $this->id_emprestimo = $result->id_emprestimo;
            $this->data_emprestimo = $result->data_emprestimo;
            $this->data_devolucao = $result->data_devolucao;
            $this->id_livro = $result->id_livro;
            $this->id_usuario = $result->id_usuario;
        }


        /*
            Adicionar novo emprestimo
                @ se $id_emprestimo não for passado como parâmetro
        */
        else {
            // Remove os atributos id_emprestimo e created, já que eles serão
            //  automaticamente gerado pelo banco de dados.
            unset( $this->id_emprestimo );
            unset( $this->created );
        }
    }



    /*
        Adiciona ou atualiza o emprestimo no banco de dados
    */
    public function save () {
        // Atualiza
        //  @ verifico se o atributo "id_emprestimo" existe neste objeto.
        //    lembrando que este atributo é apagado se criamos um novo emprestimo.
        if ( isset($this->id_emprestimo) ) {
             $this->db->update('emprestimos', $this, array('id_emprestimo' => $this->id_emprestimo));
        }

        // Salva
        else {
            $this->db->insert('emprestimos', $this);
        }
    }


    /*
        Deleta o emprestimo do banco de dados
    */
    public function delete () {
        $this->db->delete('emprestimos', array('id_emprestimo' => $this->id_emprestimo));
    }


    /*
        Obtém uma lista de todos os emprestimos
    */
    public static function getEmprestimos () {
        // Obtém instância do CodeIgniter
        $CI =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI->load->database();

        // Obtém todos os posts
        $CI->db->order_by("created", "desc");
        $result = $CI->db->get('emprestimos')->result();

        // Monta vetor de objetos "Emprestimo"
        $emprestimos  = [];

        foreach ($result as $emprestimo) {
            $tmp    = new Emprestimo();
            $tmp->id_emprestimo = $emprestimo->id_emprestimo;
            $tmp->data_emprestimo = $emprestimo->data_emprestimo;
            $tmp->data_devolucao = $emprestimo->data_devolucao;
            $tmp->id_livro = $emprestimo->id_livro;
            $tmp->id_usuario = $emprestimo->id_usuario;
            $tmp->created               = $emprestimo->created;

            $emprestimos[] = $tmp;
        }

        return $emprestimos;
    }

}