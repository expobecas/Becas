<div class="row">
    <div class="input-field col s12 m6 l3">   
        <input id="carnet" type="text" name="carnet" class="validate">
        <label for="carnet">N° de carnet</label>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="nombres" type="text" name="nombres" class="validate">
        <label for="nombres">Nombres</label>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="apellidos" type="text" name="apellidos" class="validate">
        <label for="apellidos">Apellidos</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <select name="genero">
            <option value="" disabled selected>Genero</option>
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
        </select>
        <?php
        Page::showSelect("Genero", "genero", $solicitud->getIdGenero(), $solicitud->getGeneros());
        ?>
    </div>

    <div class="input-field col s12 m6 l3">   
        <input id="religion" type="text" name="religion" class="validate">
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
        <input id="especificar_fam" type="text" name="especificar_fam" class="validate">
        <label for="especificar_fam">Especificar</label>
    </div>

    <div class="input-field col s12 m6 l6">   
        <input id="direccion" type="text" name="direccion" class="validate">
        <label for="direccion">Dirección</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="fijo" type="text" name="fijo" class="validate" pattern="^[0-9]\d{7}$" maxlength="8" onKeypress="return numeros(event)"/>
        <label for="fijo">Telefono fijo</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="padre" type="text" name="padre" class="validate "pattern="^[0-9]\d{7}$" maxlength="8" onKeypress="return numeros(event)"/>
        <label for="padre">Celular(padre)</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="madre" type="text" name="madre" class="validate "pattern="^[0-9]\d{7}$" maxlength="8" onKeypress="return numeros(event)"/>
        <label for="madre">Celular(madre)</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="hijo" type="text" name="hijo" class="validate" pattern="^[0-9]\d{7}$" maxlength="8" onKeypress="return numeros(event)"/>
        <label for="hijo">Celular(hijo/a)</label>
    </div>

    <div class="input-field col s12 m6 l6"> 
        <input id="lugar" type="text" name="lugar" class="validate">
        <label for="lugar">Lugar de nacimiento</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pais" type="text" name="pais" class="validate">
        <label for="pais">Pais de nacimiento</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <input id="fecha_naci" type="date" name="fecha_naci" >
        <label class="active" for="fecha_naci">Fecha de nacimiento</label>
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
        <input id="institucion_prov" type="text" name="institucion_prov" class="validate">
        <label for="institucion_prov">Nombre de la institucion proveniente</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="departamento" type="text" name="departamento" class="validate">
        <label for="departamento">Departamento</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pais" type="text" name="pais" class="validate">
        <label for="pais">Pais</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="cuota" type="text" name="cuota" class="validate">
        <label for="cuota">Cuota que pagaba</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <select id="año" name="año_realizaba">
            <option value="" disabled selected>Año que realizaba</option>
            <option value="Noveno grado">Noveno</option>
            <option value="Primero año">Primer año</option>
            <option value="Segundo año">Segundo año</option>
        </select>
    </div>
</div>