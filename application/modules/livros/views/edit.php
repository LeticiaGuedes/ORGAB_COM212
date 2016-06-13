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
    <a href="<?php echo base_url('livros') ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Voltar para lista de livros
    </a>

    <form action="<?php echo base_url("livros/edit/$id") ?>" method="post">
    <h3>Novo livro</h3>

    <?php if(isset($_POST['titulo'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Livro editado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <label for="titulo">Titulo</label>
        <input type="text" value="<?php echo $livro->titulo ?>" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
    </div>
    <div class="form-group">
        <label for="autor">Autor</label>
        <input type="text" value="<?php echo $livro->autor ?>" class="form-control" name="autor" id="autor" placeholder="Autor">
    </div>
    <div class="form-group">
        <label for="prateleira">Prateleira</label>
        <input type="text" value="<?php echo $livro->prateleira ?>" class="form-control" name="prateleira" id="prateleira" placeholder="Prateleira">
    </div>
    <div class="form-group">
        <label for="edicao">Edição</label>
        <input type="text" value="<?php echo $livro->edicao ?>" class="form-control" name="edicao" id="edicao" placeholder="Edição">
    </div>
    <div class="form-group">
        <label for="ano">Ano</label>
        <input type="text" value="<?php echo $livro->ano ?>" class="form-control" name="ano" id="ano" placeholder="Ano">
    </div>
    <div class="form-group">
        <label for="assunto">Assunto</label>
        <textarea class="form-control" rows="6" name="assunto" id="assunto" placeholder="Assunto..."><?php echo $livro->assunto ?></textarea>
    </div>
    <div class="form-group">
        <label for="idioma">Idioma</label>
        <input type="text" value="<?php echo $livro->idioma ?>" class="form-control" name="idioma" id="idioma" placeholder="Idioma">
    </div>
    <div class="form-group">
        <label for="editora">Editora</label>
        <input type="text" value="<?php echo $livro->editora ?>" class="form-control" name="editora" id="editora" placeholder="Editora">
    </div>

    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
</div>


<?php $this->load->view('layout/footer') ?>