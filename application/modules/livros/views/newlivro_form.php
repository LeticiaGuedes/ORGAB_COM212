<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('livros') ?>" method="post">
    <h3>Novo livro</h3>

    <?php if(isset($_POST['titulo'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Livro adicionado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <?php 
    ?>
    <div class="form-group">
        Titulo:
        <input type="text" class="form-control" name="titulo" id="titulo">
    </div>
    
    <div class="form-group">
        Autor:
        <input type="text" class="form-control" name="autor" id="autor">
    </div>
    <div class="form-group">
        Prateleira:
        <input type="text" class="form-control" name="prateleira" id="prateleira">
    </div>
    <div class="form-group">
        Edição:
        <input type="text" class="form-control" name="edicao" id="edicao">
    </div>
    <div class="form-group">
        Ano:
        <input type="text" class="form-control" name="ano" id="ano">
    </div>
    <div class="form-group">
        Assunto:
        <textarea class="form-control" rows="6" name="assunto" id="assunto"></textarea>
    </div>
    <div class="form-group">
        Idioma:
        <input type="text" class="form-control" name="idioma" id="idioma">
    </div>
    <div class="form-group">
        Editora:
        <input type="text" class="form-control" name="editora" id="editora">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>