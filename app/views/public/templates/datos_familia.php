<div class="row">
    <div class="input-field col s12 m6 l3">
        <select id="casa">
            <option value="" disabled selected>La casa en la que vive es</option>
            <option value="1">Propia</option>
            <option value="2">Alquilada</option>
            <option value="3">La está pagando al banco</option>
            <option value="4">La está pagando al FSV</option>
            <option value="5">Otro</option>
        </select>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="especificar_casa"> 
        <input id="especificar_casa" type="text" name="especificar_casa" class="validate">
        <label for="especificar_casa">Especificar</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="cuota_mensual" type="text" name="cuota_mensual" class="validate">
        <label for="cuota_mensual">Cuánto paga de vivienda mensualmente</label>
    </div>

    <div class="input-field col s12 m6 l3">
        <input id="valor_actual" type="text" name="valor_actual" class="validate">
        <label for="valor_actual">¿Cuál es el valor actual de su casa?</label>
    </div>

    <div class="col s12 m6 l3 margen_radio">
        <h6 for="">¿Posee vehículo su grupo familiar?</h6>
        <div>
            <input name="group3" type="radio" id="si_vehiculo"/>
            <label for="si_vehiculo">Si</label>
            &nbsp;
            &nbsp;
            <input name="group3" type="radio" id="no_vehiculo"/>
            <label for="no_vehiculo">No</label>
        </div>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="tipo"> 
        <input id="tipo" type="text" name="tipo" class="validate">
        <label for="tipo">Tipo de vehículo</label>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="año_vehiculo"> 
        <input id="año" type="text" name="año" class="validate">
        <label for="año">Año del vehiculo</label>
    </div>

    <div class="input-field col s12 m6 l3 ocultar" id="valor_vehiculo"> 
        <input id="valor_actual" type="text" name="valor_actual" class="validate">
        <label for="valor_actual">Valor actual</label>
    </div>


    <div class="col s12 m6 l3 margen_radio">
        <h6 for="">¿Posee deudas en su grupo familiar?</h6>
        <div>
            <input name="group4" type="radio" id="si_deudas"/>
            <label for="si_deudas">Si</label>
            &nbsp;
            &nbsp;
            <input name="group4" type="radio" id="no_deudas"/>
            <label for="no_deudas">No</label>
        </div>
    </div>
    
    <div class="input-field col s12 m6 l3 ocultar" id="monto_mensual"> 
        <input id="monto" type="text" name="monto" class="validate">
        <label for="monto">Monto total mensual</label>
    </div>

    <div class="file-field input-field col s12 m6 l3">
        <div class="btn blue">
            <span>Agregar</span>
            <input type="file" multiple>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="fotos de la vivienda">
        </div>
    </div>
</div>

<div class="row">
    <div class="input-field col s12 m12 l12">
        <div class="divider grey"></div>
    </div>
    <form id="frmIntegrante" method="POST">
        <div class="input-field col s12 m6 l3"> 
            <input id="nombres_inte" type="text" name="nombres_inte" class="validate"/>
            <label for="nombres_inte">Nombres</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="apellidos_inte" type="text" name="apellidos_inte" class="validate"/>
            <label for="apellidos_inte">Apellidos</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="parentesco" type="text" name="parentesco" class="validate"/>
            <label for="parentesco">Parentesco</label>
        </div>

        <div class="input-field col s12 m6 l3">
            <input id="fecha_naci_inte" type="date" name="fecha_naci_inte"/>
            <label class="active" for="fecha_naci_inte">Fecha de nacimiento</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="profesion" type="text" name="profesion" class="validate"/>
            <label for="profesion">Profesion u ocupacion</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="lugar_trabajo" type="text" name="lugar_trabajo" class="validate"/>
            <label for="lugar_trabajo">Lugar de Trabajo</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="tel_trabajo" type="text" name="tel_trabajo" class="validate" pattern="^[0-9]\d{7}$" maxlength="8"/>
            <label for="tel_trabajo">Teléfono del trabajo</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="salario" type="text" name="salario" class="validate"/>
            <label for="salario">Salario</label>
        </div>

        <div class="col s12 m6 l3">
            <h6>¿Este integrante está estudiando?</h6>
            <div>
                <input name="group1" type="radio" id="si_integran"/>
                <label for="si_integran">Si</label>
                &nbsp;
                &nbsp;
                <input name="group1" type="radio" id="no_integran"/>
                <label for="no_integran">No</label>
            </div>
        </div>

        <div class="col s12 m6 l3 ocultar" id="depende">
            <h6>¿Depende de usted?</h6>
            <div>
                <input name="group2" type="radio" id="si2" />
                <label for="si2">Si</label>
                &nbsp;
                &nbsp;
                <input name="group2" type="radio" id="no2" />
                <label for="no2">No</label>
            </div>
        </div>


        <div class="input-field col s12 m6 l3 ocultar" id="Grado"> 
            <input id="grado" type="text" name="grado" class="validate">
            <label for="grado">Grado o año(ciclo-año)</label>
        </div>


        <div class="input-field col s12 m6 l3 ocultar" id="Institucion"> 
            <input id="institucion" type="text" name="institucion" class="validate">
            <label for="institucion">Institución educativa</label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="Cuota_inte"> 
            <input id="cuota_inte" type="text" name="cuota_inte" class="validate">
            <label for="cuota_inte">Cuota de escolaridad</label>
        </div>

        <div class="col s12 m6 l3">
            <button type="submit" id="agregar" onclick="Clear();" class="waves-effect waves-light btn blue">Agregar</button>
        </div>
    </form>
    <div class="col s12 m12 l12">
    <table class="responsive-table highlight centered margen_top" id="integrantes">
        <thead>
          <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Parentesco</th>
              <th>Fecha de nacimiento</th>
              <th>Profesion</th>
              <th>Lugar de trabajo</th>
              <th>Teléfono de trabajo</th>
              <th>Salario</th>
              <th>Grado o Año</th>
              <th>Institución</th>
              <th>Cuota</th>
          </tr>
        </thead>
        <tbody id="datos">

        </tbody>
    </table>
    </div>
</div>