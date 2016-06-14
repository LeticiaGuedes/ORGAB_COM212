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
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="album" id="album" placeholder="Álbum">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="prateleira" id="prateleira" placeholder="Prateleira">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="ano" id="ano" placeholder="Ano">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="cor_album" id="cor_album" placeholder="Cor do álbum">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" name="cor_adesivo" id="cor_adesivo" placeholder="Cor do adesivo">
    </div>
    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>