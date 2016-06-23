<div class="container">

    <!--
      Bootstrap : Sistema de Grid

      http://getbootstrap.com/css/#grid
    -->
    <div class="row">
        <div class="col-sm-8">
            <h3>Emprestimos dos Usuários</h3>
<canvas id="myChart2" width="400" height="400"></canvas>
<script>
var ctx2 = document.getElementById("myChart2");
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    <?php
    // Obtém instância do CodeIgniter
    $CI2 =& get_instance();
    
    // Carregando biblioteca do banco de dados
    $CI2->load->database();
    
    // Obtém todos os posts
    $CI2->db->order_by("quant_emprestimos", "desc");
    $result2 = $CI2->db->get('usuarios')->result();
    ?>
    data: {
        labels: [<?php foreach ($result2 as $usuario) { ?>"<?php echo $usuario->nome;?>",<?php }?>],
        datasets: [{
            label: 'Quatidade de emprestimos',
            data: [<?php foreach ($result2 as $usuario) { ?>"<?php echo $usuario->quant_emprestimos; ?>",<?php }?>],
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