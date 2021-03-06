<!--Progress circle-->
<div class="stiky z-depth-1">
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
            <span class="title">Propiedad</span>
        </div>
        <span class="bar3"></span>
        <div class="circle4">
            <span class="label">4</span>
            <span class="title">Gastos</span>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s6 m3 l3 margin_inputs"> 
            <input id="ingreso_mensual" type="text" name="ingreso_mensual" class="validate"/>
            <label for="ingreso_mensual" id="label_ingreso">Ingreso Mensual</label>
        </div>
        <div class="input-field col s6 m3 l3 margin_inputs"> 
            <input id="ingreso_remesa" type="text" name="ingreso_remesa" class="validate"/>
            <label for="ingreso_remesa" id="label_remesa">(+)Ingreso Remesa</label>
        </div>
        <div class="input-field col s6 m3 l3 margin_inputs"> 
            <input id="gasto_mensual" type="text" name="gasto_mensual" class="validate"/>
            <label for="gasto_mensual" id="label_gasto">(-)Gasto Mensual</label>
        </div>
        <div class="input-field col s6 m3 l3 margin_inputs"> 
            <input id="saldo" type="text" name="saldo" class="validate"/>
            <label for="saldo" id="label_saldo">(=)Saldo</label>
        </div>
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

            <!--Formulario 3, slider 3, Datos de la familia -->
            <div class="slider-form slider-three" >
                <h2>Datos de la propiedad</h2>
                <?php
                include_once("../../app/views/public/templates/datos_propiedad.php");
                ?>
                <a class="waves-effect waves-light btn blue regresardos margen_three">Regresar</a>
                <button id="propiedad" class="waves-effect waves-light btn blue three margen_three">Siguiente</button>
            </div>
            
                <!--Formulario 4, slider 4, Gastos mensuales-->
            <div class="slider-form slider-four">
                <form method="POST" id="frmGastos" enctype='multipart/form-data'>
                    <h2>Gastos mensuales y remesas</h2>
                    <?php
                    include_once("../../app/views/public/templates/gastos_mensuales.php");
                    ?>
                </form>
                <a class="waves-effect waves-light btn blue regresarthree margen_four">Regresar</a>
                <button id="enviar" name="enviar" class="waves-effect waves-light btn blue four next margen_four">Finalizar</button>
            </div>            
        </div>
    </div>
</div>