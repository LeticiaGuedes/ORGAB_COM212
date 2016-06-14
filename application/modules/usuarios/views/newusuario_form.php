<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('usuarios') ?>" method="post">
    <h3>Novo usuário</h3>

    <?php if(isset($_POST['nome'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Usuario adicionado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="endereço" id="endereço" placeholder="Endereço">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>