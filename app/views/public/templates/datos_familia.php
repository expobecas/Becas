<div class="row">
    <form method="post" enctype='multipart/form-data'>
        <div class="input-field col s12 m6 l3">
            <select id="casa" name="tipocasa">
                <option value="" disabled selected>La casa en la que vive es</option>
                <option value="Propia">Propia</option>
                <option value="Alquilada">Alquilada</option>
                <option value="La está pagando al banco">La está pagando al banco</option>
                <option value="La está pagando al FSV">La está pagando al FSV</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="especificar_casa"> 
            <input id="especificar_casa" type="text" name="especificar_casa" class="validate"/>
            <label for="especificar_casa">Especificar</label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="cuota_mensual" type="text" name="cuota_mensual" class="validate"/>
            <label for="cuota_mensual">Cuánto paga de vivienda mensualmente</label>
        </div>

        <div class="input-field col s12 m6 l3">
            <input id="valor_actual" type="text" name="valor_actual" class="validate"/>
            <label for="valor_actual">Valor de la casa si es propia</label>
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
            <input id="tipo" type="text" name="tipo" class="validate"/>
            <label for="tipo">Tipo de vehículo</label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="año_vehiculo"> 
            <input id="año" type="text" name="año" class="validate"/>
            <label for="año">Año del vehiculo</label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="vehiculo"> 
            <input id="valor_vehiculo" type="text" name="valor_vehiculo" class="validate"/>
            <label for="valor_vehiculo">Valor del vehiculo</label>
        </div>

        <div class="file-field input-field col s12 m6 l3">
            <div class="btn blue">
                <span>Agregar</span>
                <input type="file" name="croquis" class="botones_integrante"/>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="fotos de la vivienda">
            </div>
        </div>
    </form>
</div>


<div class="row">
    <div class="input-field col s12 m12 l12">
        <div class="divider grey"></div>
    </div>

    <form id="frmIntegrante" method="POST">
        <div class="input-field col s12 m6 l3" id="idintegrante"> 
            <input id="id_integrante" type="text" name="id_integrante" class="validate"/>
        </div>

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
                <input name="group1" type="radio" class="estudiante" id="si_integran" value="si"/>
                <label for="si_integran">Si</label>
                &nbsp;
                &nbsp;
                <input name="group1" type="radio" class="estudiante" id="no_integran" value="no"/>
                <label for="no_integran">No</label>
            </div>
        </div>

        <div class="col s12 m6 l3 ocultar" id="depende">
            <h6>¿Depende de usted?</h6>
            <div>
                <input name="group2" type="radio" class="depende" id="si2" value="si"/>
                <label for="si2">Si</label>
                &nbsp;
                &nbsp;
                <input name="group2" type="radio" class="depende" id="no2" value="no"/>
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
            <a type="submit" id="agregar" class="waves-effect waves-light btn blue botones_integrante">Agregar</a>
            <a type="submit" id="modificar" class="waves-effect waves-light btn blue botones_integrante">Modificar</a>
            <a type="button" id="cancelar" class="waves-effect waves-light btn blue botones_integrante">Cancelar</a>
        </div>
    
        <div class="col s12 m12 l12">
            <table class="responsive-table centered striped bordered margen_top" id="integrantes">
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
                    <th>Depende</th>
                    <th>Grado o Año</th>
                    <th>Institución</th>
                    <th>Cuota</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody id="datos">

                </tbody>
            </table>
        </div>

        
    </form>
</div>