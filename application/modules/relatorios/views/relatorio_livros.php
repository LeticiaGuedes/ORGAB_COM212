<div class="container">

    <!--
      Bootstrap : Sistema de Grid

      http://getbootstrap.com/css/#grid
    -->
    <div class="row">
        <div class="col-sm-8">
            <h3>Livros Emprestamos</h3>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    <?php
    // Obtém instância do CodeIgniter
    $CI1 =& get_instance();
    
    // Carregando biblioteca do banco de dados
    $CI1->load->database();
    
    // Obtém todos os posts
    $CI1->db->order_by("total_emp", "desc");
    $result1 = $CI1->db->get('livros')->result();
    ?>
    data: {
        labels: [<?php foreach ($result1 as $livro) { ?>"<?php echo $livro->titulo;?>",<?php }?>],
        datasets: [{
            label: 'Quantidade de emprestimos',
            data: [<?php foreach ($result1 as $livro) { ?>"<?php echo $livro->total_emp; ?>",<?php }?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</div>
</div>
</div>