<?php
$_SESSION['lapso'] = time();
require_once("../../app/views/dashboard/index/index_view.php");
require_once("../../app/models/graficos.class.php");

$graficos = new Graficos;

$grafica1 = $graficos->grafico1();  
$grafica2 = $graficos->grafico2();
$grafica3 = $graficos->grafico3(); 
$grafica4 = $graficos->grafico4(); 
$grafica5 = $graficos->grafico5(); 
$grafica6 = $graficos->grafico6();
$grafica7 = $graficos->grafico7();
$grafica8 = $graficos->grafico8();
$grafica9 = $graficos->grafico9();
$grafica10 = $graficos->grafico10();

echo "<script>";


//Aqui esta la funcion de la primera grafica que se imprime y se manda a llamar en el stadistics.js
echo "function grafica1(){";
echo "var ctx = document.getElementById('myChart1').getContext('2d');";
echo "var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [";
   foreach ($grafica1 as $row) {
        	echo "'".$row['tipo_usuario']."' ,";
        }
 echo "],
        datasets: [{
            label: 'usuario',
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
            borderWidth: 2
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
    type: 'pie',
    data: {
        labels: [";
   foreach ($grafica2 as $row) {
        	echo "'".$row['genero']."' ,";
        }
 echo "],
        datasets: [{
            label: 'Cantidad de solicitudes ',
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
            borderWidth: 2
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
        	echo "'".$row['tipo_patrocinador']."' ,";
        }
 echo "],
        datasets: [{
            label: 'Cantidad de patrocinadores',
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
            borderWidth: 2
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
        	echo "'".$row['estado_solicitud']."' ,";
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
            borderWidth: 2
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
        type: 'polarArea',
        data: {
            labels: [";
       foreach ($grafica5 as $row) {
                echo "'".$row['grado']."' ,";
            }
     echo "],
            datasets: [{
                label: 'Nivel del estudiante',
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
                borderWidth: 2
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

    echo "function grafica3(){";
        echo "var ctx = document.getElementById('grafico3').getContext('2d');";
        echo "var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [";
           foreach ($grafica3 as $row) {
                    echo "'".$row['tipo_patrocinador']."' ,";
                }
         echo "],
                datasets: [{
                    label: 'Cantidad de patrocinadores',
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
                    borderWidth: 2
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
        echo "function grafica6(){";
        echo "var ctx = document.getElementById('grafico6').getContext('2d');";
        echo "var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [";
           foreach ($grafica6 as $row) {
                    echo "'".$row['especialidad']."' ,";
                }
         echo "],
                datasets: [{
                    label: 'Cantidad',
                    fill: false,
                    data: [";
           foreach ($grafica6 as $row) {
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
                    borderWidth: 2
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
 echo "function grafica7(){";
    echo "var ctx = document.getElementById('grafico7').getContext('2d');";
    echo "var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [";
       foreach ($grafica7 as $row) {
                echo "'".$row['nombre_empresa']."' ,";
            }
     echo "],
            datasets: [{
                label: 'Cantidad',
                fill: false,
                data: [";
       foreach ($grafica7 as $row) {
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
                borderWidth: 2
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
  //Aqui esta la funcion de la cuarta grafica que se imprime y se manda a llamar en el stadistics.js
  echo "function grafica8(){";
    echo "var ctx = document.getElementById('grafico8').getContext('2d');";
    echo "var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [";
       foreach ($grafica8 as $row) {
                echo "'".$row['nombre_empresa']."' ,";
            }
     echo "],
            datasets: [{
                label: 'Cantidad',
                fill: false,
                data: [";
       foreach ($grafica8 as $row) {
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
                borderWidth: 2
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

 //Aqui esta la funcion de la cuarta grafica que se imprime y se manda a llamar en el stadistics.js
 echo "function grafica9(){";
    echo "var ctx = document.getElementById('grafico9').getContext('2d');";
    echo "var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [";
       foreach ($grafica9 as $row) {
                echo "'".$row['nombre_empresa']."' ,";
            }
     echo "],
            datasets: [{
                label: 'Cantidad',
                fill: false,
                data: [";
       foreach ($grafica9 as $row) {
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
                borderWidth: 2
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

    echo "function grafica10(){";
        echo "var ctx = document.getElementById('grafico10').getContext('2d');";
        echo "var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [";
           foreach ($grafica10 as $row) {
                    echo "'".$row['fecha_ini_beca']."' ,";
                }
         echo "],
                datasets: [{
                    label: 'Cantidad',
                    fill: false,
                    data: [";
           foreach ($grafica10 as $row) {
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
                    borderWidth: 2
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
    

echo "</script>";




?>