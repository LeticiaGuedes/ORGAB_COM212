<?php $this->load->view('layout/header')?>

<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<div class="container">
    <a href="<?php echo base_url('emprestimos') ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Voltar para lista de emprestimos
    </a>

    <form action="<?php echo base_url("emprestimos/edit/$id") ?>" method="post">
    <h3>Novo emprestimo</h3>

    <?php if(isset($_POST['data_emprestimo'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Emprestimo editado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <label for="data_emprestimo">Data de Emprestimo</label>
        <input type="text" value="<?php echo $emprestimo->data_emprestimo ?>" class="form-control" name="data_emprestimo" id="data_emprestimo" placeholder="Data de Emprestimo">
    </div>
    <div class="form-group">
        <label for="data_devolucao">Data de Devolução</label>
        <input type="text" value="<?php echo $emprestimo->data_devolucao ?>" class="form-control" name="data_devolucao" id="data_devolucao" placeholder="Data de Devolução">
    </div>
    <div class="form-group">
        <label for="id_livro">Nome do Livro</label>
        <input type="text" value="<?php echo $emprestimo->id_livro ?>" class="form-control" name="id_livro" id="id_livro" placeholder="Nome do Livro">
    </div>
    <div class="form-group">
        <label for="id_usuario">Nome do Usuário</label>
        <input type="text" value="<?php echo $emprestimo->id_usuario ?>" class="form-control" name="id_usuario" id="id_usuario" placeholder="Nome do Usuário">
    </div>

    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
</div>


<?php $this->load->view('layout/footer') ?>