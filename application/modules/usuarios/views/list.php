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
            <h3>Usuários</h3>

            <!-- Para cada usuario, rodará o loop: -->
            <?php foreach ($usuarios as $usuario): ?>
                <!--
                  Bootstrap : Paineis

                  http://getbootstrap.com/components/#panels
                -->
                <div class="panel panel-primary">
                    <!-- Nome do Usuario -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Nome: </span>
                        <?php
                        echo $usuario->nome ?>
                    </div>

                    <!-- Telefone do Usuario -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Telefone: </span>
                        <?php echo $usuario->telefone ?>
                    </div>
                    <!-- Endereço do Usuario -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Endereço: </span>
                        <?php echo $usuario->endereço ?>
                    </div>

                    <!-- Quantidade de emprestimos do Usuario -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Quantidade de emprestimos: </span>
                        <?php echo $usuario->quant_emprestimos ?>
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
                        <?php echo (new DateTime($usuario->created))->format('g:ia \o\n l jS F Y') ?>


                        <!--
                            Documentação Bootstrap Button:
                            http://getbootstrap.com/css/#buttons

                            Documentação Bootstrap Icons:
                            http://getbootstrap.com/components/#glyphicons-how-to-use
                        -->
                        <!-- Botão Excluir -->
                        <a href="<?php echo base_url('usuarios/remove/' . $usuario->id_usuario) ?>" class="btn btn-xs btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
                        </a>

                        <span class="invisible pull-right"> - </span>

                        <!-- Botão Editar -->
                        <a href="<?php echo base_url('usuarios/edit/' . $usuario->id_usuario) ?>" class="btn btn-xs btn-primary pull-right">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


        <!-- Renderiza o form para novos usuarios -->
        <div class="col-sm-4">
            <?php $this->load->view('usuarios/newusuario_form') ?>
        </div>
    </div>
</div>