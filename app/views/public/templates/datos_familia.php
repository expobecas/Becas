<form id="frmIntegrante" method="POST">
    <div class="row">
        <div class="input-field col s12 m6 l3" id="idintegrante"> 
            <input id="id_integrante" type="text" name="id_integrante" class="validate"/>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="nombres_inte" type="text" name="nombres_inte" class="validate"/>
            <label for="nombres_inte">Nombres<span class="required">*</span></label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="apellidos_inte" type="text" name="apellidos_inte" class="validate"/>
            <label for="apellidos_inte">Apellidos<span class="required">*</span></label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="parentesco" type="text" name="parentesco" class="validate"/>
            <label for="parentesco">Parentesco<span class="required">*</span></label>
        </div>

        <div class="input-field col s12 m6 l3">
            <input id="fecha_naci_inte" type="text" name="fecha_naci_inte" class="datepicker" required/>
            <label for="fecha_naci_inte">Fecha de nacimiento<span class="required">*</span></label>
        </div>

        <div class="input-field col s12 m6 l3"> 
            <input id="profesion" type="text" name="profesion" class="validate"/>
            <label for="profesion">Profesion u ocupacion<span class="required">*</span></label>
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
            <h6>¿Depende de usted?<span class="required">*</span></h6>
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
            <label for="grado">Grado o año(ciclo-año)<span class="required">*</span></label>
        </div>


        <div class="input-field col s12 m6 l3 ocultar" id="Institucion"> 
            <input id="institucion" type="text" name="institucion" class="validate">
            <label for="institucion">Institución educativa<span class="required">*</span></label>
        </div>

        <div class="input-field col s12 m6 l3 ocultar" id="Cuota_inte"> 
            <input id="cuota_inte" type="text" name="cuota_inte" class="validate">
            <label for="cuota_inte">Cuota de escolaridad</label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6 l3">
            <a type="submit" id="agregar" class="waves-effect waves-light btn blue botones_integrante">Agregar</a>
            <a type="submit" id="modificar" class="waves-effect waves-light btn blue botones_integrante">Modificar</a>
            <a type="button" id="cancelar" class="waves-effect waves-light btn grey botones_integrante">Cancelar</a>
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
    </div>
</form>