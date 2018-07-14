$(document).ready(function(){
    $('#Calendario').fullCalendar({
        header:{
            left:'prev,today,next, month, basicWeek, basicDay',
            center:'title',
            right:''
        },
        customButtons:
        {
            Next:
            {
                text:"Next >>",
                click:function()
                {
                    
                }
            }
        },
        dayClick:function(date,jsEvent,view){
            $('#fecha').val(date.format());
            $('#modalEventos').modal().modal('open');
        },

        //Cargar datos de la base de datos hacia el calendario 
        events:'../../app/controllers/dashboard/citas/calendario.php',

        eventClick: function(calEvent, jsEvent, view){
            $('#titulo').html(calEvent.title);
            
            $('#id').val(calEvent.id);
            $('#descripcionEvento').val(calEvent.descripcion);
            $('#tituloEvento').val(calEvent.title);
            FechaHora = calEvent.start._i.split(" ");
            $('#fecha').val(FechaHora[0]);
            $('#hora').val(FechaHora[1]);

            $('#modalEventos').modal().modal('open');
        },

        editable: true,
        eventDrop:function(calEvent)
        {
            $('#id').val(calEvent.id);
            $('#descripcionEvento').val(calEvent.descripcion);
            $('#tituloEvento').val(calEvent.title);

            var FechaHora = calEvent.start.format().split("T");
            $('#fecha').val(FechaHora[0]);
            $('#hora').val(FechaHora[1]);

            Recolectardatos();
            EnviardatosModificar(NuevoEvento, true);
        }

        /*eventClick: function(calEvent, jsEvent, view){
            $('#titulo').html(calEvent.title);
            $('#descripcion').html(calEvent.descripcion);
            $('#modalEventos').modal().modal('open');
        }*/
    });

    var NuevoEvento;
    $('#agregar').click(function(){
        Recolectardatos();
        EnviardatosCrear(NuevoEvento);
    });

    $('#modificar').click(function(){
        Recolectardatos();
        EnviardatosModificar(NuevoEvento);
    });

    $('#eliminar').click(function(){
        Recolectardatos();
        EnviardatosEliminar(NuevoEvento);
    });


    function Recolectardatos(){
        NuevoEvento= {
            id: $('#id').val(),
            title:$('#tituloEvento').val(),
            start:$('#fecha').val()+" "+$('#hora').val(),
            descripcion:$('#descripcionEvento').val(),
            color:"#FF0000",
            textColor:"#FFFFFF",
            end: $('#fecha').val()+" "+$('#hora').val()
        };
    }

    function EnviardatosCrear(objEvento)
    {
        $.ajax({
            type:'POST', 
            url:'../../app/controllers/dashboard/citas/create_controller.php?action=create',
            data: objEvento,
            success: function(data)
            {
                $('#Calendario').fullCalendar('refetchEvents');
                $('#modalEventos').modal().modal('close');
            },
            error:function()
            {
                alert("Error el insertar");
            }
        });
    }
    function EnviardatosModificar(objEvento, modal)
    {
        $.ajax({
            type:'POST', 
            url:'../../app/controllers/dashboard/citas/update_controller.php?action=update',
            data: objEvento,
            success: function(data)
            {
                $('#Calendario').fullCalendar('refetchEvents');
                if(!modal)
                {
                    $('#modalEventos').modal().modal('close');
                }
            },
            error:function()
            {
                alert("Error el insertar");
            }
        });
    }

    function EnviardatosEliminar(objEvento)
    {
        $.ajax({
            type:'POST', 
            url:'../../app/controllers/dashboard/citas/delete_controller.php?action=delete',
            data: objEvento,
            success: function(data)
            {
                $('#Calendario').fullCalendar('refetchEvents');
                $('#modalEventos').modal().modal('close');
            },
            error:function()
            {
                alert("Error el insertar");
            }
        });
    }
});