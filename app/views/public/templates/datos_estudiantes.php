<div class="row">
    <div class="input-field col s12 m6 l3">
        <?php
           Page::showSelect("Genero", "genero", $solicitud->getIdGenero(), $solicitud->getGeneros());
        ?>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="religion" type="text" name="religion" class="validate" onchange="espacios(event)" value='<?php print($solicitud->getReligion())?>' required/>
        <label for="religion">Religión</label>
    </div>

     <div class="input-field col s12 m6 l3">
        <select id="familia" name="familia">
            <option value="" disabled selected>Personas con las que vive</option>
            <option value="Ambos padres">Ambos padres</option>
            <option value="Solo madre">Sólo madre</option>
            <option value="Solo padre">Sólo padre</option>
            <option value="Otros">Otros</option>
        </select>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="especificar_familia"> 
        <input id="especificar_fam" type="text" name="especificar_fam" class="validate"/>
        <label for="especificar_fam">Especificar</label>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="direccion" type="text" name="direccion" class="validate" onchange="espacios(event)" value='<?php print($solicitud->getDireccion())?>' required/>
        <label for="direccion">Dirección</label>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="correo" type="email" name="correo" class="validate" onchange="espacios(event)" value='<?php print($solicitud->getCorreo())?>' required/>
        <label for="correo">Correo Electrónico</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="fijo" type="text" name="fijo" class="validate" onchange="telefonos(event)" value='<?php print($solicitud->getTelFijo())?>'/>
        <label for="fijo">Telefono fijo</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="madre" type="text" name="madre" class="validate" onchange="telefonos(event)" value='<?php print($solicitud->getCelMama())?>'/>
        <label for="madre">Celular(madre)</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="padre" type="text" name="padre" class="validate" onchange="telefonos(event)" value='<?php print($solicitud->getCelPapa())?>'/>
        <label for="padre">Celular(padre)</label>
    </div>    

    <div class="input-field col s12 m6 l3"> 
        <input id="hijo" type="text" name="hijo" class="validate" onchange="telefonos(event)" value='<?php print($solicitud->getCelHijo())?>'/>
        <label for="hijo">Celular(hijo/a)</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="lugar" type="text" name="lugar" class="validate" onchange="espacios(event)" value='<?php print($solicitud->getLugarNacimiento())?>' required/>
        <label for="lugar">Lugar de nacimiento</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pais_naci" type="text" name="pais_naci" class="validate" onchange="espacios(event)" value='<?php print($solicitud->getPaisNacimiento())?>' required/>
        <label for="pais_naci">Pais de nacimiento</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <input id="fecha_naci" type="text" name="fecha_naci" class="datepicker" value='<?php print($solicitud->getFechaNacimiento())?>' required/>
        <label for="fecha_naci">Fecha de nacimiento</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <select id="financiados" name="financiados">
            <option value="" disabled selected>Sus estudios son financiados por</option>
            <option value="Sus padres">Sus padres</option>
            <option value="Usted mismo">Usted mismo</option>
            <option value="Becado(a)">Becado(a)</option>
            <option value="Otros">Otros</option>
        </select>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="especificar_finan"> 
        <input id="especificar_fin" type="text" name="especificar_fin" class="validate">
        <label for="especificar_fin">Especificar</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="institucion_prov" type="text" name="institucion_prov" class="validate" onchange="espacios(event)" value='<?php print($institucion_proveniente->getNombre())?>' required/>
        <label for="institucion_prov">Nombre de la institucion proveniente</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="departamento" type="text" name="departamento" class="validate" onchange="espacios(event)" value='<?php print($institucion_proveniente->getLugar())?>' required/>
        <label for="departamento">Departamento</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pais" type="text" name="pais" class="validate" onchange="espacios(event)" value='<?php print($institucion_proveniente->getLugar())?>' />
        <label for="pais">Pais</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="cuota" type="text" name="cuota" class="validate" onchange="espacios(event)" value='<?php print($institucion_proveniente->getCuotaPagaba())?>'/>
        <label for="cuota">Cuota que pagaba</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <select id="año_realizaba" name="año_realizaba">
            <option value="" disabled selected>Año que realizaba</option>
            <option value="Noveno grado">Noveno</option>
            <option value="Primero año">Primer año</option>
            <option value="Segundo año">Segundo año</option>
        </select>
    </div>
</div>