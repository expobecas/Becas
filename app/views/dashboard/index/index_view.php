 <!--Gráficas de demostración-->
 <div class="row">
      <!--Gráfica3-->    
      <div class="col s12 m12 l8 offset-l3 white titulo-font">
         <h5>Patrocinadores por categoría</h5>
         <canvas id="grafico3" width="600" height="200"></canvas>
     </div> 
 </div>
 <div class="row">
 <!--Gráfica1 -->
     <div class="col s12 m6 l4 offset-l3 white titulo-font">
         <h5>Usuarios por categoría</h5>
         <canvas id="myChart1" width="340" height="200"></canvas>
     </div> 
 <!--Gráfica2-->
     <div class="col s12 m6 l4 white titulo-font">
         <h5>Solicitudes por género</h5>
         <canvas id="myChart2" width="340" height="200"></canvas>
     </div> 
 </div>
 <div class="row">
      <!--Gráfica5-->  
      <div class="col s12 m6 l4 offset-l3 white titulo-font">
         <h5>Estudiantes por grado</h5>
         <canvas id="grafico5" width="340" height="200"></canvas>
     </div>
 <!--Gráfica4-->    
     <div class="col s12 m6 l4 white titulo-font">
         <h5>Estado de las solicitudes</h5>
         <canvas id="grafico4" width="340" height="200"></canvas>
     </div>
</div>
<div class="row">
      <!--Gráfica5-->  
      <div class="col s12 m4 l4 offset-l3 white titulo-font">
         <h5> Cantidad de estudiantes por especialidad</h5>
         <canvas id="grafico6" width="340" height="200"></canvas>
     </div>
 <!--Gráfica4-->    
     <div class="col s12 m4 l4 white titulo-font">
         <h5>Becas ingresadas</h5>
         <canvas id="grafico7" width="340" height="200"></canvas>
     </div>  
</div>
<div class="row">
      <!--Gráfica5-->  
      <div class="col s12 m4 l4 offset-l3 white titulo-font">
         <h5>Cantidad de becas por patrocinador</h5>
         <canvas id="grafico8" width="340" height="200"></canvas>
     </div>
 <!--Gráfica4-->    
     <div class="col s12 m4 l4 white titulo-font">
         <h5>Cantidad de pagos por patrocinador</h5>
         <canvas id="grafico9" width="340" height="200"></canvas>
     </div>
</div>
<div class="row">
      <!--Gráfica3-->    
      <div class="col s12 m4 l8 offset-l3 white titulo-font">
         <h5>Cantidad de solicitudes ingresadas en una fecha</h5>
         <canvas id="grafico10" width="600" height="200"></canvas>
     </div> 
 </div>
 </div>
</div>
</div>
<?php
  $hoy = date('Y-m-j');
  $a = "'";
  $fechainicio = "$_SESSION[fecha_creacion]";
  $fecha_aviso1 = strtotime('+30 day', strtotime($fechainicio));
  $fecha_aviso1 = date ('Y-m-j',$fecha_aviso1);
  $fecha_aviso2 = strtotime('+60 day', strtotime($fechainicio));
  $fecha_aviso2 = date ('Y-m-j',$fecha_aviso2);
  $fecha_aviso3 = strtotime('+86 day', strtotime($fechainicio));
  $fecha_aviso3 = date ('Y-m-j',$fecha_aviso3);
  $fecha_aviso4 = strtotime('+87 day', strtotime($fechainicio));
  $fecha_aviso4 = date ('Y-m-j',$fecha_aviso4);
  $fecha_aviso5 = strtotime('+88 day', strtotime($fechainicio));
  $fecha_aviso5 = date ('Y-m-j',$fecha_aviso5);
  $fecha_aviso6 = strtotime('+89 day', strtotime($fechainicio));
  $fecha_aviso6 = date ('Y-m-j',$fecha_aviso6);
  $fecha_aviso7 = strtotime('+90 day', strtotime($fechainicio));
  $fecha_aviso7 = date ('Y-m-j',$fecha_aviso7);
  $fecha_aviso8 = strtotime('+91 day', strtotime($fechainicio));
  $fecha_aviso8 = date ('Y-m-j',$fecha_aviso8);


  if($hoy >= $fecha_aviso1 && $hoy < $fecha_aviso2){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Pasó un mes desde tu último cambio de contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy >= $fecha_aviso2 && $hoy < $fecha_aviso3){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Pasaron 2 meses desde tu último cambio de contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso3){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 5 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso4){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 4 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso5){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 3 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso6){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 2 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso7){
      print('<script>
      $(document).ready(function(){
          toast();
      });
      function toast() {
          var $toastContent = $("<span><h6>Faltan 1 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
          Materialize.toast($toastContent, 6000);
      }
      </script>');
  }else if($hoy == $fecha_aviso8){
    print('<script>
    $(document).ready(function(){
        toast();
    });
    function toast() {
        var $toastContent = $("<span><h6>¡Tendras que cambiar tu contraseña ya mismo! O tu proximo inicio de sesion no sera permitido.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../usuarios/update.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
        Materialize.toast($toastContent, 6000);
    }
    </script>');
}
  ?>