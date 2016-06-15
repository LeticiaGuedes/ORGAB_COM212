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
            <h3>Livros</h3>

            <!-- Para cada livro, rodará o loop: -->
            <?php foreach ($livros as $livro): ?>
                <!--
                  Bootstrap : Paineis

                  http://getbootstrap.com/components/#panels
                -->
                <div class="panel panel-primary">
                    <!-- Titulo do Livro -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Titulo: </span>
                        <?php echo $livro->titulo ?>
                    </div>

                    <!-- Autor do Livro -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Autor: </span>
                        <?php echo $livro->autor ?>
                    </div>
                    <!-- Prateleira do Livro -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Prateleira: </span>
                        <?php echo $livro->prateleira ?>
                    </div>

                    <!-- Edição do Livro -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Edição: </span>
                        <?php echo $livro->edicao ?>
                    </div>
                    <!-- Ano do Livro -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Ano: </span>
                        <?php echo $livro->ano ?>
                    </div>

                    <!-- Assunto do Livro -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Assunto: </span>
                        <?php echo $livro->assunto ?>
                    </div>
                    <!-- Idioma do Livro -->
                    <div class="panel-heading">
                        <span style="font-weight:bold;font-size:16px;">Idioma: </span>
                        <?php echo $livro->idioma ?>
                    </div>

                    <!-- Editora do Livro -->
                    <div class="panel-body">
                        <span style="font-weight:bold;font-size:16px;">Editora: </span>
                        <?php echo $livro->editora ?>
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
                        <?php echo (new DateTime($livro->created))->format('g:ia \o\n l jS F Y') ?>


                        <!--
                            Documentação Bootstrap Button:
                            http://getbootstrap.com/css/#buttons

                            Documentação Bootstrap Icons:
                            http://getbootstrap.com/components/#glyphicons-how-to-use
                        -->
                        <!-- Botão Excluir -->
                        <a href="<?php echo base_url('livros/remove/' . $livro->id_livro) ?>" class="btn btn-xs btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
                        </a>

                        <span class="invisible pull-right"> - </span>

                        <!-- Botão Editar -->
                        <a href="<?php echo base_url('livros/edit/' . $livro->id_livro) ?>" class="btn btn-xs btn-primary pull-right">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                        </a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>


        <!-- Renderiza o form para novos livros -->
        <div class="col-sm-4">
            <?php $this->load->view('livros/newlivro_form') ?>
        </div>
    </div>
</div>