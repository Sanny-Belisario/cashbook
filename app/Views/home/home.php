<!--?php if ( ! defined('base_url()')) exit; 
//Busca o controller onde traz os dados do grafico
// $moviments = new MainController();
// $moviment = $moviments->buscaSaldo();
?-->
<?= $this->extend('Templates/default/index') ?>

<?= $this->section('main') ?>
<div class="wrap">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    //Transforma o array do php em um json
    var moviments = JSON.parse('<?= json_encode($moviments);?>');
    //Montagem do grafico
    google.charts.load('current', { 'packages': ['line'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        console.log(moviments)
        //Cria um table que será adicionado ao gráfico
        var data = new google.visualization.DataTable();
        //Adiciona as colunas
        data.addColumn('number', 'Dia');
        data.addColumn('number', 'Entrada');
        data.addColumn('number', 'Saída');

        var grafico = [];

        //Passa por todos os dados do json para popular o grafico
        moviments.forEach((item) => {
            var input;
            var data;
            //Pega apenas o dia da data
            var dataN = item.data.split("-");
            data = dataN[2];
            //Pega o valor de entrada
            var valorI = Math.trunc(item.valorInput);
            input = JSON.parse(JSON.stringify(valorI));
            //Pega o valor de saída
            var valorO = Math.trunc(item.valorOutput);
            var output = JSON.parse(JSON.stringify(valorO));
            //Adiciona no grafico
            grafico.push([parseInt(data), parseInt(input), parseInt(output)]);
        })

        data.addRows(grafico);

        var options = {
            chart: {
                title: 'Entradas e Saídas em Agosto',
                subtitle: 'em reais (USD)'
            },
            width: 900,
            height: 500
        };

        var chart = new google.charts.Line(document.getElementById('curve_chart'));

        chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
	<div id="curve_chart" style="width: 100%; height: 500px;"></div>
</div> 

<?= $this->endSection() ?>