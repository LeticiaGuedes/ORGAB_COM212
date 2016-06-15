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
        <input type="date" value="<?php $d=strtotime($emprestimo->data_emprestimo);
                            echo date("Y-m-d", $d); ?>" class="form-control" name="data_emprestimo" id="data_emprestimo" placeholder="Data de Emprestimo">
    </div>
    <div class="form-group">
        <label for="data_devolucao">Data de Devolução</label>
        <input type="date" value="<?php $d=strtotime($emprestimo->data_devolucao);
                            echo date("Y-m-d", $d); ?>" class="form-control" name="data_devolucao" id="data_devolucao" placeholder="Data de Devolução">
    </div>

    <button type="submit" class="btn btn-success pull-right">Adicionar</button>
</form>
</div>


<?php $this->load->view('layout/footer') ?>