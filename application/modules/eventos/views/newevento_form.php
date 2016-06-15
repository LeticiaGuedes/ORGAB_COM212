<?php
    // URL Helper
    // Para poder utilizar a função "base_url()"
    $this->load->helper('url');
?>

<!--
  Bootstrap : Formulários

  http://getbootstrap.com/css/#forms
-->
<form action="<?php echo base_url('eventos') ?>" method="post">
    <h3>Novo evento</h3>

    <?php if(isset($_POST['nome'])): ?>
        <!-- Se for enviado um post -->
        <div class="alert alert-info">Evento adicionado!</div>
    <?php endif ?>

    <!-- Campos do formulário -->
    <div class="form-group">
        Nome:
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <div class="form-group">
        Álbum:
        <input type="text" class="form-control" name="album" id="album">
    </div>
    <div class="form-group">
        Prateleira:
        <input type="text" class="form-control" name="prateleira" id="prateleira">
    </div>
    <div class="form-group">
        Ano:
        <input type="text" class="form-control" name="ano" id="ano">
    </div>
    <div class="form-group">
        Cor do álbum:
        <input type="text" class="form-control" name="cor_album" id="cor_album">
    </div>
    <div class="form-group">
        Cor do adesivo:
        <input type="text" class="form-control" name="cor_adesivo" id="cor_adesivo">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>