//Para saber si esta en la pestaña o no
var window_focus = true;

$(window).focus(function(){
    window_focus = true;
}).blur(function(){
    window_focus = false;
    getLogonTime();
    getLogoffTime();
});

//Obtiene la hora cuando cargo la pagina
getLogonTime();
function getLogonTime()
{var now=new Date();
    var Horas=now.getHours();
    Horas=((Horas>12)?Horas-12:Horas);
    var Minutos=((now.getMinutes()<10)?":0":":")+now.getMinutes();
    var Segundos=((now.getSeconds()<10)?":0":":")+now.getSeconds();
    onHoras=now.getHours();
    onMinutos=now.getMinutes();
    onSegundos=now.getSeconds();
    OnTimeValue=(Horas+Minutos+Segundos);
    //console.log("Hora de entrada: "+OnTimeValue);
}

//Obtiene la hora actual
function getLogoffTime()
{
    var d = new Date();
    var Horas=d.getHours();
    Horas=((Horas>12)?Horas-12:Horas);
    var Minutos=((d.getMinutes()<10)?":0":":")+d.getMinutes();
    var Segundos=((d.getSeconds()<10)?":0":":")+d.getSeconds();
    OffTimeValue=(Horas+Minutos+Segundos);
    //console.log("Hora de actual: "+OffTimeValue);
    offHoras=d.getHours();
    offMinutos=d.getMinutes();
    offSegundos=d.getSeconds();
    timer();
}

//El tiempo que ha estado en la pagina
function timer(){
    if(offSegundos>=onSegundos)
    {
        logSegundos=offSegundos-onSegundos;
    }
    else
    {
        offMinutos-=1;
        logSegundos=(offSegundos+60)-onSegundos;
    }
    if(offMinutos>=onMinutos)
    {
        logMinutos=offMinutos-onMinutos;
    }
    else
    {
        offHoras-=1;
        logMinutos=(offMinutos+60)-onMinutos;
    }
    
    logHoras=offHoras-onHoras;
    logHoras=((logHoras<10)?"0":":")+logHoras;
    logMinutos=((logMinutos<10)?":0":":")+logMinutos;
    logSegundos=((logSegundos<10)?":0":":")+logSegundos;
    PageTimeValue=(" "+logHoras+logMinutos+logSegundos);
    //console.log("tiempo en la pagina: " +PageTimeValue);
    if(window_focus == false)
    {
        //console.log(logMinutos);
        if(logSegundos == ':3500')
        {
            window.location = '../../dashboard/ingresar/logout.php?id=1';
        }
    }
    
}
$(document).ready(function(){
    getLogoffTime();
    setInterval(function(){
        //console.log('en foco?' + window_focus);
        getLogoffTime();
    }, 1000);
});