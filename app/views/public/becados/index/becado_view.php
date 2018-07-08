

<!--VISTA DE INFORMACIÓN EN GENERAL-->
<div class="row">
   <form method="POST">
      <div class="cajita-solicitud col s12 m7 offset-l3 l8">
         <div class="card horizontal">
            <img src="../../../web/img/becado/icons/man.png" class="foto-becado">
            <div class="card-stacked">
               <div class="card-content">
                  <h5><strong><?php print($estudiantes->getNombre1().' '.$estudiantes->getApellido1())?></strong></h5>
                  <li><div class="divider"></div></li>
                  <div class="input-field col l3 s12 offset-l1">
                     <p class="titulo-font">Carnet: <?php print($estudiantes->getNum_carnet())?></p>
                  </div>
                  <div class="input-field col l3 s12">
                     <p class="titulo-font">Grado: <?php print($estudiantes->getGrado())?></p>
                  </div>
                  <div class="input-field col l5 s12">
                     <p class="titulo-font">Especialidad: <?php print($estudiantes->getEspecialidad())?></p>
                  </div>
                  <div class="input-field col l5 s12 offset-l4">
                     <p class="titulo-font">!Bienvenido/a¡</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</form>
</div>
<!--CARDS INFORMATIVAS-CARD 1-->
<div class="row">
   <div class="col offset-l3 s12 m2">
      <div class="card horizontal">
         <div class="card-stacked">
            <div class="card-content">
               <i class="material-icons date-1 col push-l3">date_range</i>
               <p class="fecha_cajita col push-l2">Hoy es:<br/> <strong><?php print(date('d/m/Y')); ?></strong></p>
            </div>
         </div>
      </div>
   </div>
   <!--CARD 2-->
   <div class="col s12 m2">
      <div class="card horizontal">
         <div class="card-stacked">
            <div class="card-content">
               <i class="material-icons date-1 date-2 col push-l3">assignment_ind</i>
               <p class="fecha_cajita col">Reporte de notas</br><a href=""><strong>Ir al sitio</strong></a></p>
            </div>
         </div>
      </div>
   </div>
   <!--CARD 3-->
   <div class="col s12 m2">
      <div class="card horizontal">
         <div class="card-stacked">
            <div class="card-content">
               <i class="material-icons date-1 date-3 col push-l3">book</i>
               <p class="fecha_cajita col">Diario Pedagogico </br><a href=""><strong>Ir al sitio</strong></a></p>
            </div>
         </div>
      </div>
   </div>
   <!--CARD 4-->
   <div class="col s12 m2">
      <div class="card horizontal">
         <div class="card-stacked">
            <div class="card-content">
               <i class="material-icons date-1 date-4 col push-l3">book</i>
               <p class="fecha_cajita col push-l2">Aula Virtual </br><a href=""><strong>Ir al sitio</strong></p>
            </div>
         </div>
      </div>
   </div>
</div>
<!--FORM DE CONTACTO-->
<div class="row">
<form class="col s12 l8 offset-l3 white color-text">
   <div class="card horizontal">
      <div class="card-stacked">
         <img src="../../../web/img/becado/icons/logo.axd.png" class="chatting col push-l2">
         <div class="card-content contacto-ad">
            <h5>Departamento de trabajo social</h5>
            <p >Visita las oficinas para más información
            </p>
            <p >o envía un mensaje al
               encargado/da del departamento.
            </p>
         </div>
      </div>
   </div>
</form>
<div class="row">

</div>

