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

function espacios(e)
{
    if(e.target.value.trim() == "")
    {
        Materialize.toast('Este campo no puede estar vacio', 3000);
        $(e.target).addClass('invalidad');
    }
    else
    {
        $(e.target).removeClass('invalidad');
    }
}

function telefonos(e)
{
    fijo = $('#fijo').val();
    madre = $('#madre').val();
    padre = $('#padre').val();
    hijo = $('#hijo').val();
    if(fijo != "")
    {
        if(fijo == madre)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#madre').val("");
        }
        if(fijo == padre)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#padre').val("");
        }
        if(fijo == hijo)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#hijo').val("");
        }
    }
    if(madre != "")
    {
        if(madre == padre)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#padre').val("");
        }
        if(madre == hijo)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#hijo').val("");
        }
    }
    if(padre != "")
    {
        if(padre == hijo)
        {
            swal({
                title: 'Aviso',
                text: 'Ese número de telefóno ya fue agregado',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#hijo').val("");
        }
    }
}