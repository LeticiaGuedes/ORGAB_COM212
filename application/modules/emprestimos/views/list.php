<?php
    $this->load->helper('url');
?>
<div class="container">

    <!--
      Bootstrap : Sistema de Grid

      http://getbootstrap.com/css/#grid
    -->
    <div class="row">
        <div class="col-sm-8">
            <h3>Emprestimos</h3>

            <!-- Para cada emprestimo, rodará o loop: -->
            <?php foreach ($emprestimos as $emprestimo): ?>
                <!--
                  Bootstrap : Paineis

                  http://getbootstrap.com/components/#panels
                -->
                <div class="panel panel-primary">
                    <!-- Data do emprestimo -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Data do empretimo: </span>
                        <?php $d=strtotime($emprestimo->data_emprestimo);
                            echo date("d/m/Y", $d); ?>
                    </div>

                    <!-- Data de Devolução do emprestimo -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Data devolução: </span>
                        <?php $d=strtotime($emprestimo->data_devolucao);
                            echo date("d/m/Y", $d); ?>
                    </div>
                    <!-- Nome do Livro Emprestado -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Titulo do livro: </span>
                        <?php echo $emprestimo->id_livro ?>
                    </div>

                    <!-- Usuário do emprestimo -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Nome do usuário: </span>
                        <?php echo $emprestimo->id_usuario ?>
                    </div>
                    
                    <!--
                        Datas com PHP
                        Na documentação tem tudo o que precisa saber como criá-las
                        http://php.net/manual/fr/datetime.format.php
                    -->
                    <div class="panel-footer">
                        <!--
                            Datas com PHP
                            Na documentação tem tudo o que precisa saber como criá-las
                            http://php.net/manual/fr/datetime.format.php
                        -->
                        <?php echo (new DateTime($emprestimo->created))->format('g:ia \o\n l jS F Y') ?>


                        <!--
                            Documentação Bootstrap Button:
                            http://getbootstrap.com/css/#buttons

                            Documentação Bootstrap Icons:
                            http://getbootstrap.com/components/#glyphicons-how-to-use
                        -->
                        <!-- Botão Excluir -->
                        <a href="<?php echo base_url('emprestimos/remove/' . $emprestimo->id_emprestimo) ?>" class="btn btn-xs btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
                        </a>

                        <span class="invisible pull-right"> - </span>

                        <!-- Botão Editar -->
                        <a href="<?php echo base_url('emprestimos/edit/' . $emprestimo->id_emprestimo) ?>" class="btn btn-xs btn-primary pull-right">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


        <!-- Renderiza o form para novos emprestimos -->
        <div class="col-sm-4">
            <?php $this->load->view('emprestimos/newemprestimo_form') ?>
        </div>
    </div>
</div>