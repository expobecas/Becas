
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

    $('#tel_trabajo').mask('00000000');

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
        $(e.target).val("");
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
        if(fijo.length == 8)
        {
            $('#fijo').removeClass('invalidad');
            if(fijo == madre)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#madre').val("");
            }
            if(fijo == padre)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#padre').val("");
            }
            if(fijo == hijo)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#hijo').val("");
            }
        }
        else
        {
            swal({
                title: 'Aviso',
                text: 'Ingrese un número de teléfono con 8 digitos',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#fijo').addClass('invalidad');
            $('#fijo').val("");
            
        }
    }
    if(madre != "")
    {
        if(madre.length == 8)
        {
            if(madre == padre)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#padre').val("");
            }
            if(madre == hijo)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#hijo').val("");
            }
        }
        else
        {
            swal({
                title: 'Aviso',
                text: 'Ingrese un número de teléfono con 8 digitos',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#madre').addClass('invalidad');
            $('#madre').val("");
            
        }
    }
    if(padre != "")
    {
        if(padre.length == 8)
        {
            if(padre == hijo)
            {
                swal({
                    title: 'Aviso',
                    text: 'Ese número de teléfono ya fue digitado',
                    icon: 'warning',
                    button: 'aceptar'
                });
                $('#hijo').val("");
            }
        }
        else
        {
            swal({
                title: 'Aviso',
                text: 'Ingrese un número de teléfono con 8 digitos',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#padre').addClass('invalidad');
            $('#padre').val("");
            
        }
    }
    if(hijo != "")
    {
        if(hijo.length != 8)
        {
            swal({
                title: 'Aviso',
                text: 'Ingrese un número de teléfono con 8 digitos',
                icon: 'warning',
                button: 'aceptar'
            });
            $('#hijo').addClass('invalidad');
            $('#hijo').val("");
        }
    }
}