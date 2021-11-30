<div id="container"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Perbandingan Stock barang'
        },
        xAxis: {
            categories: [
                'barang',
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Stock'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php foreach ($data_barang as $barang) : ?> {
                    name: '<?php echo $barang['nama']; ?>',
                    data: [<?php echo $barang['stock']; ?>]
                },
            <?php endforeach ?>
        ]
        //format data original
        /*[{
            name: 'Tokyo',
            data: [49]

        }, {
            name: 'New York',
            data: [83]

        }, {
            name: 'London',
            data: [48]

        }, {
            name: 'Berlin',
            data: [42]

        }]*/
    });
</script>