<?php

class Usuario extends CI_Model {
    public $id_usuario;
    public $nome;
    public $telefone;
    public $endereço;
    public $quant_emprestimos;

    /*
        Construtor
    */
    public function __construct ($id_usuario=0) {
        // Carregando biblioteca do banco de dados
        $this->load->database();


        /*
            Recupera um usuario já existente do banco de dados
                @ se $id_usuario for passado como parâmetro
        */
        if ($id_usuario) {
            // Obtém o usuario que com respectivo "$id_usuario"
            $this->db->where('id_usuario', $id_usuario);
            // Obtém o primeiro resultado (index 0) da busca
            $result = $this->db->get('usuarios')->result()[0];

            // Monta o objeto usuario
            $this->id_usuario = $result->id_usuario;
            $this->nome = $result->nome;
            $this->telefone = $result->telefone;
            $this->endereço = $result->endereço;
            $this->quant_emprestimos = $result->quant_emprestimos;
        }


        /*
            Adicionar novo usuario
                @ se $id_usuario não for passado como parâmetro
        */
        else {
            // Remove os atributos id_usuario e created, já que eles serão
            //  automaticamente gerado pelo banco de dados.
            unset( $this->id_usuario );
            unset( $this->created );
        }
    }



    /*
        Adiciona ou atualiza o usuario no banco de dados
    */
    public function save () {
        // Atualiza
        //  @ verifico se o atributo "id_usuario" existe neste objeto.
        //    lembrando que este atributo é apagado se criamos um novo usuario.
        if ( isset($this->id_usuario) ) {
             $this->db->update('usuarios', $this, array('id_usuario' => $this->id_usuario));
        }

        // Salva
        else {
            $this->db->insert('usuarios', $this);
        }
    }


    /*
        Deleta o usuario do banco de dados
    */
    public function delete () {
        $this->db->delete('usuarios', array('id_usuario' => $this->id_usuario));
    }


    /*
        Obtém uma lista de todos os usuarios
    */
    public static function getUsuarios () {
        // Obtém instância do CodeIgniter
        $CI =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI->load->database();

        // Obtém todos os posts
        $CI->db->order_by("created", "desc");
        $result = $CI->db->get('usuarios')->result();

        // Monta vetor de objetos "Usuario"
        $usuarios  = [];

        foreach ($result as $usuario) {
            $tmp    = new Usuario();
            $tmp->id_usuario = $usuario->id_usuario;
            $tmp->nome = $usuario->nome;
            $tmp->telefone = $usuario->telefone;
            $tmp->endereço = $usuario->endereço;
            $tmp->quant_emprestimos = $usuario->quant_emprestimos;
            $tmp->created               = $usuario->created;

            $usuarios[] = $tmp;
        }

        return $usuarios;
    }

}