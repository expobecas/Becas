$(document).ready(function(){
    $('#cuota').mask("#.##0,00", {reverse: true});
    $('#salario').mask("#.##0,00", {reverse: true});
    $('#cuota_inte').mask("#.##0,00", {reverse: true});
    $('.gastos').mask("#.##0,00", {reverse: true});
    $('#cuota_mensual').mask("#.##0,00", {reverse: true});
    $('#valor_actual').mask("#.##0,00", {reverse: true});
    $('#valor_vehiculo').mask("#.##0,00", {reverse: true});
    $('#fijo').mask('00000000');
    $('#padre').mask('00000000');
    $('#madre').mask('00000000');
    $('#hijo').mask('00000000');
    $('#año').mask('0000');
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