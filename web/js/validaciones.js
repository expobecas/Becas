$(document).ready(function(){
    $('#cuota').mask("#.##0,00", {reverse: true});
    $('#salario').mask("#.##0,00", {reverse: true});
    $('#cuota_inte').mask("#.##0,00", {reverse: true});
    $('.gastos').mask("#.##0,00", {reverse: true});
});

function numeros(e){
        tecla = (document.all) ? e.keycode : e.which;

        if(tecla==8)
        {
            return true;
        }
        tecla_fin = String.fromCharCode(tecla);
        return /[0-9]/.test(tecla_fin);
    }