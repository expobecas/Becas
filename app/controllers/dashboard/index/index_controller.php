<?php
require_once("../../app/views/dashboard/index/index_view.php");
require_once("../../app/models/graficos.class.php");

$graficos = new Graficos;

$grafica1 = $graficos->grafico1();  
$grafica2 = $graficos->grafico2();
$grafica3 = $graficos->grafico3(); 
$grafica4 = $graficos->grafico4(); 
$grafica5 = $graficos->grafico5(); 

echo "<script>";


//Aqui esta la funcion de la primera grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica1(){";
echo "var ctx = document.getElementById('myChart1').getContext('2d');";
echo "var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [";
   foreach ($grafica1 as $row) {
        	echo "'".$row['id_tipo']."' ,";
        }
 echo "],
        datasets: [{
            label: 'producto',
            data: [";
   foreach ($grafica1 as $row) {
        	echo "".$row['Cantidad Ingresada'].",";
        }      
  echo "],
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
}";
//fin de la funcion --------------------------

//Aqui esta la funcion de la segunda grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica2(){";
echo "var ctx = document.getElementById('myChart2').getContext('2d');";
echo "var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [";
   foreach ($grafica2 as $row) {
        	echo "'".$row['genero']."' ,";
        }
 echo "],
        datasets: [{
            label: 'Cantidad de clientes ',
            data: [";
   foreach ($grafica2 as $row) {
        	echo "".$row['Cantidad Ingresada'].",";
        }      
  echo "],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 206, 86, 0.2)'
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
}";
//fin de la funcion --------------------------


//Aqui esta la funcion de la tercera grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica3(){";
echo "var ctx = document.getElementById('grafico3').getContext('2d');";
echo "var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [";
   foreach ($grafica3 as $row) {
        	echo "'".$row['talla']."' ,";
        }
 echo "],
        datasets: [{
            label: 'Cantidad de productos en una talla',
            data: [";
   foreach ($grafica3 as $row) {
        	echo "".$row['Cantidad Ingresada'].",";
        }      
  echo "],
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
}";
//fin de la funcion --------------------------

//Aqui esta la funcion de la cuarta grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica4(){";
echo "var ctx = document.getElementById('grafico4').getContext('2d');";
echo "var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [";
   foreach ($grafica4 as $row) {
        	echo "'".$row['nombre']."' ,";
        }
 echo "],
        datasets: [{
            label: 'Cantidad',
            fill: false,
            data: [";
   foreach ($grafica4 as $row) {
        	echo "".$row['Cantidad Ingresada'].",";
        }      
  echo "],
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
}";
//fin de la funcion --------------------------

//Aqui esta la funcion de la quinta grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica5(){";
    echo "var ctx = document.getElementById('grafico5').getContext('2d');";
    echo "var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [";
       foreach ($grafica5 as $row) {
                echo "'".$row['nombre']."' ,";
            }
     echo "],
            datasets: [{
                label: 'Precios de productos',
                data: [";
       foreach ($grafica5 as $row) {
                echo "".$row['Cantidad Ingresada'].",";
            }      
      echo "],
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
    }";
    //fin de la funcion --------------------------


echo "</script>";

?>