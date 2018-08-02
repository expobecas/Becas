<form method="post" enctype='multipart/form-data'>
    <div class="row">
        <div class="input-field col s12 m6 l3">
            <select id="tipocasa" name="tipocasa">
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
            <input id="tipo_vehiculo" type="text" name="tipo_vehiculo" class="validate"/>
            <label for="tipo_vehiculo">Tipo de vehículo</label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="año_vehiculo"> 
            <input id="año" type="text" name="año" class="validate"/>
            <label for="año">Año del vehiculo</label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="vehiculo"> 
            <input id="valor_vehiculo" type="text" name="valor_vehiculo" class="validate"/>
            <label for="valor_vehiculo">Valor del vehiculo</label>
        </div>

        <div class="col s12 m6 l3" id="botones_vehiculo">
            <a type="submit" id="agregar_vehiculo" class="waves-effect waves-light btn blue botones_integrante">Agregar</a>
            <a type="submit" id="modificar_vehiculo" class="waves-effect waves-light btn blue botones_integrante">Modificar</a>
            <a type="button" id="cancelar_vehiculo" class="waves-effect waves-light btn grey botones_integrante">Cancelar</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col s12 m12 l12" id="tablevehiculos">
            <table class="responsive-table centered striped bordered margen_top" id="tablevehiculo">
                <thead>
                <tr>
                    <th>Tipo vehiculo</th>
                    <th>Año del vehiculo</th>
                    <th>Valor actual</th>
                </tr>
                </thead>
                <tbody id="vehiculos">

                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col s12 m6 l3">
            <img id="imagen_propiedad" class="imagenes_propiedad">
            <div class="file-field input-field">
                <div class="btn blue">
                    <span>Agregar</span>
                    <input type="file" name="imagen_casa" id="imagen_casa" class="botones_integrante" onchange="readURL(this);"/>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" id="imagen_prop" placeholder="fotos de la vivienda">
                </div>
            </div>
        </div>
    </div>
</form>