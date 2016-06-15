<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('emprestimos') ?>" method="post">
    <h3>Novo emprestimo</h3>

    <?php if(isset($_POST['data_emprestimo'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Emprestimo adicionado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        Data de Emprestimo: 
        <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="data_emprestimo" id="data_emprestimo">
    </div>
    <div class="form-group">
        Data de Devolução: 
        <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="data_devolucao" id="data_devolucao">
    </div>
    <?php // Obtém instância do CodeIgniter
        $CI1 =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI1->load->database();

        // Obtém todos os posts
        $CI1->db->order_by("titulo", "cresc");
        $result1 = $CI1->db->get('livros')->result(); ?>
    <div class="form-group">
        Titulo do Livro:
        <select name="id_livro" class="form-control" id="id_livro">
            <?php foreach ($result1 as $livro) { ?>
            <option><?php echo $livro->titulo; } ?>
    </select> 
    </div>
    <?php // Obtém instância do CodeIgniter
        $CI2 =& get_instance();

        // Carregando biblioteca do banco de dados
        $CI2->load->database();

        // Obtém todos os posts
        $CI2->db->order_by("nome", "cresc");
        $result2 = $CI2->db->get('usuarios')->result(); ?>
    <div class="form-group">
        Nome do Usuário:
        <select name="id_usuario" class="form-control" id="id_usuario">
            <?php foreach ($result2 as $usuario) { ?>
            <option><?php echo $usuario->nome; } ?>
    </select> 
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>