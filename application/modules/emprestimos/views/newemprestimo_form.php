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
        <input type="text" class="form-control" name="data_emprestimo" id="data_emprestimo" placeholder="Data de Emprestimo">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="data_devolucao" id="data_devolucao" placeholder="Data de Devolução">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="id_livro" id="id_livro" placeholder="Titulo do Livro">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="id_usuario" id="id_usuario" placeholder="Nome do Usuário">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>