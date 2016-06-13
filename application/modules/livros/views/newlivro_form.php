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
    <div class="form-group">
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="prateleira" id="prateleira" placeholder="Prateleira">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="edicao" id="edicao" placeholder="Edição">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="ano" id="ano" placeholder="Ano">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="6" name="assunto" id="assunto" placeholder="Assunto..."></textarea>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="idioma" id="idioma" placeholder="Idioma">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="editora" id="editora" placeholder="Editora">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>