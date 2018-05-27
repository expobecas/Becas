<div class="row">
    
    <div class="col s12 m12 l12">
        <h6>En el caso que reciba remesas familiares, llenar los siguientes campos</h6>
    </div>

    <div class="input-field col s12 m4 l4"> 
        <input id="monto" type="text" name="monto" class="validate">
        <label for="monto">Monto de remesa</label>
    </div>

     <div class="input-field col s12 m4 l4"> 
        <input id="periodo" type="text" name="periodo" class="validate">
        <label for="periodo">Periodo en el que lo recibe</label>
    </div>

    <div class="input-field col s12 m4 l4"> 
        <input id="benecfactor" type="text" name="benecfactor" class="validate">
        <label for="benecfactor">Quien lo envia(parentesco)</label>
    </div>

</div>

<div class="row">
    <div class="input-field col s12 m6 l3"> 
        <input id="alimentacion" type="text" name="alimentacion" class="gastos validate" value='<?php print($gastos_mensuales->getAlimentacion())?>'>
        <label for="alimentacion">Alimentacion (Promedio)</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="casa" type="text" name="casa" class="gastos validate" value='<?php print($gastos_mensuales->getPagoVivienda())?>'>
        <label for="casa">Alquiler de casa o pago al Banco o el FSV</label>
    </div>

    <!--<div class="input-field col s12 m6 l3"> 
        <input id="servicios" type="text" name="servicios" class="gastos validate"//>
        <label for="servicios">Servicios generales(Total)</label>
    </div>-->

    <div class="input-field col s12 m6 l3"> 
        <input id="energia_electrica" type="text" name="energia_electrica" class="gastos validate" value='<?php print($gastos_mensuales->getEnergiaElectrica())?>'/>
        <label for="energia_electrica">Energia electrica</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="agua" type="text" name="agua" class="gastos validate" value='<?php print($gastos_mensuales->getAgua())?>'/>
        <label for="agua">Agua</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="telefono" type="text" name="telefono" class="gastos validate" value='<?php print($gastos_mensuales->getTelefono())?>'/>
        <label for="telefono">Teléfono</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="vigilancia" type="text" name="vigilancia" class="gastos validate" value='<?php print($gastos_mensuales->getVigilancia())?>'/>
        <label for="vigilancia">Vigilancia</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="domesticos" type="text" name="domesticos" class="gastos validate" value='<?php print($gastos_mensuales->getServicioDomestico())?>'/>
        <label for="domesticos">Servicios domésticos</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="alcaldia" type="text" name="alcaldia" class="gastos validate" value='<?php print($gastos_mensuales->getAlcaldia())?>'/>
        <label for="alcaldia">Alcaldia</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pago_deudas" type="text" name="pago_deudas" class="gastos validate" value = '<?php print($gastos_mensuales->getPagoDeudas())?>'/>
        <label for="pago_deudas">Pago de deudas</label>
    </div>
    
    <div class="input-field col s12 m6 l3"> 
        <input id="cotizaciones" type="text" name="cotizaciones" class="gastos validate" value = '<?php print($gastos_mensuales->getCotizacion())?>'/>
        <label for="cotizaciones">Cotizaciones a la AFP, al ISSS, etc</label>
    </div>

    <!--<div class="input-field col s12 m6 l3"> 
        <input id="pago_seguros" type="text" name="pago_seguros" class="gastos validate">
        <label for="pago_seguros">Pago de seguros(Total)</label>
    </div>-->

    <div class="input-field col s12 m6 l3"> 
        <input id="seguro_personal" type="text" name="seguro_personal" class="gastos validate" value = '<?php print($gastos_mensuales->getSeguroPersonal())?>'/>
        <label for="seguro_personal">Seguro personal</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="seguro_vehiculo" type="text" name="seguro_vehiculo" class="gastos validate" value = '<?php print($gastos_mensuales->getSeguroVehiculo())?>'/>
        <label for="seguro_vehiculo">Seguro de vehiculo</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="seguro_inmuebles" type="text" name="seguro_inmuebles" class="gastos validate" value = '<?php print($gastos_mensuales->getSeguroInmuebles())?>'/>
        <label for="seguro_inmuebles">Seguro de inmuebles</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="transporte" type="text" name="transporte" class="gastos validate" value = '<?php print($gastos_mensuales->getTransporte())?>'/>
        <label for="transporte">Transporte</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="mant_vehiculo" type="text" name="mant_vehiculo" class="gastos validate" value = '<?php print($gastos_mensuales->getGastosManteVehiculo())?>'/>
        <label for="mant_vehiculo">Gastos de mantenimiento de vehiculo</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="salud" type="text" name="salud" class="gastos validate" value = '<?php print($gastos_mensuales->getSalud())?>'/>
        <label for="salud">Salud e Higiene</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pago_asociaciones" type="text" name="pago_asociaciones" class="gastos validate" value = '<?php print($gastos_mensuales->getPagosAsociasiones())?>'/>
        <label for="pago_asociaciones">Pagos de asociaciones o clubes sociales</label>
    </div>

    <!--<div class="input-field col s12 m6 l3"> 
        <input id="educacion" type="text" name="educacion" class="gastos validate">
        <label for="educacion">Educación</label>
    </div>-->

    <div class="input-field col s12 m6 l3"> 
        <input id="pago_colegiatura" type="text" name="pago_colegiatura" class="gastos validate" value = '<?php print($gastos_mensuales->getPagoColegiatura())?>'/>
        <label for="pago_colegiatura">Pago de colegiaturas</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="pago_universitaros" type="text" name="pago_universitarios" class="gastos validate" value = '<?php print($gastos_mensuales->getPagoUniversidad())?>'/>
        <label for="pago_universitaros">Pago de cuotas universitarias</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="materiales" type="text" name="materiales" class="gastos validate" value = '<?php print($gastos_mensuales->getGastosMaterialEstudios())?>'/>
        <label for="materiales">Gastos en material de estudio</label>
    </div>

    <!--<div class="input-field col s12 m6 l3"> 
        <input id="otros_pagos" type="text" name="otros_pagos" class="gastos validate">
        <label for="otros_pagos">Otros pagos o descuentos</label>
    </div>-->

    <div class="input-field col s12 m6 l3"> 
        <input id="renta" type="text" name="renta" class="gastos validate" value = '<?php print($gastos_mensuales->getImpuestoRenta())?>'/>
        <label for="renta">Impuesto sobre la renta</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="iva" type="text" name="iva" class="gastos validate" value = '<?php print($gastos_mensuales->getIva())?>'/>
        <label for="iva">IVA</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="tarjetas_credito" type="text" name="tarjetas_credito" class="gastos validate" value = '<?php print($gastos_mensuales->getTarjetaCredito())?>'/>
        <label for="tarjetas_credito">Targetas de credito</label>
    </div>

    <div class="input-field col s12 m6 l3"> 
        <input id="otros_gastos" type="text" name="otros_gastos" class="gastos validate" value = '<?php print($gastos_mensuales->getOtros())?>'/>
        <label for="otros_gastos">Otros</label>
    </div>
</div>