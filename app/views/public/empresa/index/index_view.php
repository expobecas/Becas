<div class="row">
   <div class="slider col l8 push-l3">
      <ul class="slides">
         <li>
            <img src="../../../web/img/empresa/slider/imagen2.png"> <!-- random image -->
            <div class="caption center-align">
               <h5 class="light grey-text text-lighten-3">
               </h5>
            </div>
         </li>
         <li>
            <img src="../../../web/img/empresa/slider/imagen1.png"> <!-- random image -->
            <div class="caption left-align">
               <h3>Nota!</h3>
               <h5 class="light grey-text text-lighten-3">
                  <p>Todos los datos proporcionados, serán <strong>verificados</strong> mediante 
                     mecanismos confiables definidos por el ITR, incluyendo la
                     <strong>visita domiciliar</strong>.
               </h5>
            </div>
         </li>
         <li>
            <img src="../../../web/img/empresa/slider/imagen4.png"> <!-- random image -->
            <div class="caption left-align">
               <h3>En caso...</h3>
               <h5 class="light grey-text text-lighten-3">de encontrarse inconsistencia,
                  falta de información y de documentos que den fe de su situación
                  socioeconómica real, el ITR se reserva el derecho de tomar
                  medidas correspondientes en relación a la asignación de su cuota.
               </h5>
            </div>
         </li>
         <li>
            <img src="../../../web/img/empresa/slider/imagen3.png"> <!-- random image -->
            <div class="caption center-align">
               <h3>¡A tomar en cuenta!</h3>
               <h5 class="light grey-text text-lighten-3">En el transcurso del proceso de su formación académica, la cuota
                  podrá tener modificaciones debido a politicas internas de la institución.
               </h5>
            </div>
         </li>
      </ul>
   </div>
</div>
<!--CARDS INFORMATIVAS-CARD 1-->
<div class="row">
<div class="col offset-l3 s12 m2 l2">
   <div class="card horizontal">
      <div class="card-stacked">
         <div class="card-content">
            <p class="fecha_cajita col">Hoy es:<br/> <strong><?php print(date('d/m/Y')); ?></strong></p>
         </div>
      </div>
   </div>
</div>
<!--CARD 2-->
<div class="col s12 m2 l3">
   <div class="card horizontal">
      <div class="card-stacked">
         <div class="card-content">
            <i class="material-icons date-1 date-2 col">assignment_ind</i>
            <p class="fecha_cajita col">Sitio web</br><a href=""><strong>Ir al sitio</strong></a></p>
         </div>
      </div>
   </div>
</div>
<!--CARD 3-->
<div class="col s12 m2 l3">
   <div class="card horizontal">
      <div class="card-stacked">
         <div class="card-content">
            <i class="material-icons date-1 date-3 col">book</i>
            <p class="fecha_cajita col">Facebook</br><a href=""><strong>Ir al sitio</strong></a></p>
         </div>
      </div>
   </div>
</div>
<?php
  $hoy = date('Y-m-j');
  $a = "'";
  $fechainicio = "$_SESSION[fecha_creacion]";
  $fecha_aviso1 = strtotime('+30 day', strtotime($fechaUsu));
  $fecha_aviso1 = date ('Y-m-j',$fecha_aviso1);
  $fecha_aviso2 = strtotime('+60 day', strtotime($fechaUsu));
  $fecha_aviso2 = date ('Y-m-j',$fecha_aviso2);
  $fecha_aviso3 = strtotime('+86 day', strtotime($fechaUsu));
  $fecha_aviso3 = date ('Y-m-j',$fecha_aviso3);
  $fecha_aviso4 = strtotime('+87 day', strtotime($fechaUsu));
  $fecha_aviso4 = date ('Y-m-j',$fecha_aviso4);
  $fecha_aviso5 = strtotime('+88 day', strtotime($fechaUsu));
  $fecha_aviso5 = date ('Y-m-j',$fecha_aviso5);
  $fecha_aviso6 = strtotime('+89 day', strtotime($fechaUsu));
  $fecha_aviso6 = date ('Y-m-j',$fecha_aviso6);
  $fecha_aviso7 = strtotime('+90 day', strtotime($fechaUsu));
  $fecha_aviso7 = date ('Y-m-j',$fecha_aviso7);
  $fecha_aviso8 = strtotime('+91 day', strtotime($fechaUsu));
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
          var $toastContent = $("<span><h6>Faltan 5 dias para que cambies tu contraseña.</h6></span><a class='.$a.'btn-flat toast-action'.$a.' href='.$a.'../dashboard/usuarios/cambiar_contrasena.php?id='.$_SESSION['id_usuario'].''.$a.'>Go!</a>");
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