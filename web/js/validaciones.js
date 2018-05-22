$(document).ready(function(){
    $('#cuota').mask("#.##0,00", {reverse: true});
    $('#salario').mask("#.##0,00", {reverse: true});
    $('#cuota_inte').mask("#.##0,00", {reverse: true});
    $('.gastos').mask("#.##0,00", {reverse: true});
    $('#fijo').mask('00000000');
    $('#padre').mask('00000000');
    $('#madre').mask('00000000');
    $('#hijo').mask('00000000');

    //Validaciones de Gastos mensuales
    $('#alimentacion').mask("#.##0,00", {reverse: true});
    $('#casa').mask("#.##0,00", {reverse: true});
    $('#servicios').mask("#.##0,00", {reverse: true});
    $('#energia_electrica').mask("#.##0,00", {reverse: true});
    $('#agua').mask("#.##0,00", {reverse: true});
    $('#telefono').mask("#.##0,00", {reverse: true});
    $('#vigilancia').mask("#.##0,00", {reverse: true});
    $('#domesticos').mask("#.##0,00", {reverse: true});
    $('#alcaldia').mask("#.##0,00", {reverse: true});
    $('#pago_deudas').mask("#.##0,00", {reverse: true});
    $('#cotizaciones').mask("#.##0,00", {reverse: true});
    $('#pago_seguros').mask("#.##0,00", {reverse: true});
    $('#seguro_personal').mask("#.##0,00", {reverse: true});
    $('#seguro_vehiculo').mask("#.##0,00", {reverse: true});
    $('#seguro_inmuebles').mask("#.##0,00", {reverse: true});
    $('#transporte').mask("#.##0,00", {reverse: true});
    $('#mant_vehiculo').mask("#.##0,00", {reverse: true});
    $('#salud').mask("#.##0,00", {reverse: true});
    $('#pago_asociaciones').mask("#.##0,00", {reverse: true});
    $('#eduacion').mask("#.##0,00", {reverse: true});
    $('#pago_colegiatura').mask("#.##0,00", {reverse: true});
    $('#pago_universitarios').mask("#.##0,00", {reverse: true});
    $('#materiales').mask("#.##0,00", {reverse: true});
    $('#otros_pagos').mask("#.##0,00", {reverse: true});
    $('#renta').mask("#.##0,00", {reverse: true});
    $('#iva').mask("#.##0,00", {reverse: true});
    $('#tarjeta_credito').mask("#.##0,00", {reverse: true});
    $('#otros_gastos').mask("#.##0,00", {reverse: true});
});
//Para solo numeros telefonico
function numeros(e){
        tecla = (document.all) ? e.keycode : e.which;

        if(tecla==8)
        {
            return true;
        }
        tecla_fin = String.fromCharCode(tecla);
        return /[0-9]/.test(tecla_fin);
    }