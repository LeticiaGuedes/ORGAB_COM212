<?php

class Relatorios extends CI_Controller {
    /*
        Página Inicial

        - Exibe todos os relatorios
    */
    public function index () {

        // Criando view
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('relatorios/relatorio_livros');
        $this->load->view('relatorios/relatorio_usuarios');
        $this->load->view('layout/footer');
    }

} ?>