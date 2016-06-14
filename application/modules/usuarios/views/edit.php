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
    <a href="<?php echo base_url('usuarios') ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Voltar para lista de usuarios
    </a>

    <form action="<?php echo base_url("usuarios/edit/$id") ?>" method="post">
    <h3>Novo usuario</h3>

    <?php if(isset($_POST['nome'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Usuario editado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" value="<?php echo $usuario->nome ?>" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" value="<?php echo $usuario->telefone ?>" class="form-control" name="telefone" id="telefone" placeholder="Telefone">
    </div>
    <div class="form-group">
        <label for="endereço">Endereço</label>
        <input type="text" value="<?php echo $usuario->endereço ?>" class="form-control" name="endereço" id="endereço" placeholder="Endereço">
    </div>

    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
</div>


<?php $this->load->view('layout/footer') ?>