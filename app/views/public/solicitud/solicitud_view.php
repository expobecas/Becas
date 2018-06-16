<!--Progress circle-->
<div class="progressc">
    <div class="circle1">
        <span class="label">1</span>
        <span class="title">Personal</span>
    </div>
    <span class="bar1"></span>
    <div class="circle2">
        <span class="label">2</span>
        <span class="title">Familiar</span>
    </div>
    <span class="bar2"></span>
    <div class="circle3">
        <span class="label">3</span>
        <span class="title">Gastos</span>
    </div>
</div>

<div class="containers slider-one-active ">
    <div class="slider-ctr z-depth-4">
        <div class="slider">
            
            <!--Formulario 1, slider 1, Datos del estudiante -->
            <div class="slider-form slider-one">
                <form method="POST" id="frmEstudiante" enctype='multipart/form-data'>
                    <h2>Datos del estudiante</h2>
                    <?php
                    include_once("../../app/views/public/templates/datos_estudiantes.php");
                    ?>
                    <a type="submit" id="estudiante" class="waves-effect waves-light btn blue first margen_one">Siguiente</a>
                </form>
            </div>
            

            <!--Formulario 2, slider 2, Datos de la familia -->
            <div class="slider-form slider-two" >
                <h2>Datos del grupo familiar del estudiante</h2>
                <?php
                include_once("../../app/views/public/templates/datos_familia.php");
                ?>
                <a class="waves-effect waves-light btn blue regresaruno margen_second">Regresar</a>
                <button class="waves-effect waves-light btn blue second margen_second">Siguiente</button>
            </div>

            
                <!--Formulario 3, slider 3, Gastos mensuales-->
            <div class="slider-form slider-three ">
                <form method="POST" id="frmGastos" enctype='multipart/form-data'>
                    <h2>Gastos mensuales y remesas</h2>
                    <?php
                    include_once("../../app/views/public/templates/gastos_mensuales.php");
                    ?>
                    <a class="waves-effect waves-light btn blue regresardos margen_three">Regresar</a>
                    <button type="submit" name="enviar" class="waves-effect waves-light btn blue three next margen_three">Finalizar</button>
                </form>
            </div>            
        </div>
    </div>
</div>