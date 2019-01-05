 <!--Gráficas de demostración-->
 <div class="row">
 <!--Gráfica1 -->
     <div class="col s12 m4 l4 offset-l3 white">
         <h4>Usuarios por tipo</h4>
         <canvas id="myChart1" width="400" height="400"></canvas>
     </div> 
 <!--Gráfica2-->
     <div class="col s12 m4 l4 white">
         <h4>Solicitudes por genero</h4>
         <canvas id="myChart2" width="400" height="400"></canvas>
     </div> 
 </div>
 <div class="row">
     <!--Gráfica3-->    
     <div class="col s12 m4 l4 offset-l3 white">
         <h4>Patrocinadores por tipo</h4>
         <canvas id="grafico3" width="400" height="400"></canvas>
     </div> 
 <!--Gráfica4-->    
     <div class="col s12 m4 l4 push-l1 white">
         <h4>Solicitudes por tipo</h4>
         <canvas id="grafico4" width="400" height="400"></canvas>
     </div> 
 <!--Gráfica5-->  
     <div class="col s12 m4 l4 offset-l3 white">
         <h4>Estudiantes por grado</h4>
         <canvas id="grafico5" width="400" height="400"></canvas>
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