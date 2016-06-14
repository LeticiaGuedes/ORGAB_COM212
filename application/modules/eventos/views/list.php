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
            <h3>Eventos</h3>

            <!-- Para cada evento, rodará o loop: -->
            <?php foreach ($eventos as $evento): ?>
                <!--
                  Bootstrap : Paineis

                  http://getbootstrap.com/components/#panels
                -->
                <div class="panel panel-primary">
                    <!-- Nome do evento -->
                    <div class="panel-heading">
                        <?php echo $evento->nome ?>
                    </div>

                    <!-- Álbum do evento -->
                    <div class="panel-body">
                        <?php echo $evento->album ?>
                    </div>
                    <!-- Prateleira do evento -->
                    <div class="panel-heading">
                        <?php echo $evento->prateleira ?>
                    </div>

                    <!-- Ano do evento -->
                    <div class="panel-body">
                        <?php echo $evento->ano ?>
                    </div>
                    <!-- Cor do álbum do evento -->
                    <div class="panel-heading">
                        <?php echo $evento->cor_album ?>
                    </div>

                    <!-- Cor do adesivo do álbum -->
                    <div class="panel-body">
                        <?php echo $evento->cor_adesivo ?>
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
                        <?php echo (new DateTime($evento->created))->format('g:ia \o\n l jS F Y') ?>


                        <!--
                            Documentação Bootstrap Button:
                            http://getbootstrap.com/css/#buttons

                            Documentação Bootstrap Icons:
                            http://getbootstrap.com/components/#glyphicons-how-to-use
                        -->
                        <!-- Botão Excluir -->
                        <a href="<?php echo base_url('eventos/remove/' . $evento->id_evento) ?>" class="btn btn-xs btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
                        </a>

                        <span class="invisible pull-right"> - </span>

                        <!-- Botão Editar -->
                        <a href="<?php echo base_url('eventos/edit/' . $evento->id_evento) ?>" class="btn btn-xs btn-primary pull-right">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


        <!-- Renderiza o form para novos eventos -->
        <div class="col-sm-4">
            <?php $this->load->view('eventos/newevento_form') ?>
        </div>
    </div>
</div>