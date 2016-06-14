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
    <a href="<?php echo base_url('eventos') ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        Voltar para lista de eventos
    </a>

    <form action="<?php echo base_url("eventos/edit/$id") ?>" method="post">
    <h3>Novo evento</h3>

    <?php if(isset($_POST['nome'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Evento editado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" value="<?php echo $evento->nome ?>" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group">
        <label for="album">Álbum</label>
        <input type="text" value="<?php echo $evento->album ?>" class="form-control" name="album" id="album" placeholder="Álbum">
    </div>
    <div class="form-group">
        <label for="prateleira">Prateleira</label>
        <input type="text" value="<?php echo $evento->prateleira ?>" class="form-control" name="prateleira" id="prateleira" placeholder="Prateleira">
    </div>
    <div class="form-group">
        <label for="ano">Ano</label>
        <input type="text" value="<?php echo $evento->ano ?>" class="form-control" name="ano" id="ano" placeholder="Ano">
    </div>
    <div class="form-group">
        <label for="cor_album">Cor do álbum</label>
        <input type="text" value="<?php echo $evento->cor_album ?>" class="form-control" name="cor_album" id="cor_album" placeholder="Cor do álbum">
    </div>
    <div class="form-group">
        <label for="cor_adesivo">Cor do adesivo</label>
        <input type="text" value="<?php echo $evento->cor_adesivo ?>" class="form-control" name="cor_adesivo" id="cor_adesivo" placeholder="Cor do adesivo">
    </div>

    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
</div>


<?php $this->load->view('layout/footer') ?>