$(document).ready(function(){
    $('#detalle').hide(0);
    $('#id_cita').hide(0);
    $('#control_calendario').toggle();

    $('#control_tabla').click(function(){
        $('#formcita').removeClass('tablecitas').addClass('desplazar');
        $('#control_calendario').toggle();
        $('#control_tabla').toggle();
    });

    $('#control_calendario').click(function(){
        $('#formcita').removeClass('desplazar').addClass('tablecitas');
        $('#control_calendario').toggle();
        $('#control_tabla').toggle();
    });


    $(window).resize(function(){
        var size = document.body.clientWidth;
        if(size < 900)
        {
            $('#control_tabla').removeClass("m").addClass("s");
        }
        if(size >= 901 && size < 1300)
        {
            
            $('#control_tabla').removeClass("s").addClass("m");
        }
        if(size >= 1301)
        {    
            $('#control_tabla').removeClass("m");
        }
    });

    $(window).resize(function(){
        var size = document.body.clientWidth;
        $(document).ready(function(){
            if(size <=975)
            {
                $('#formcita').removeClass("s").addClass("xs");
            }
            if(size >=977 && size < 1130)
            {
                $('#formcita').removeClass("xs").addClass("s");
                $('#formcita').removeClass("m").addClass("s");
            }
            if(size >= 1131 && size < 1300)
            {
                $('#formcita').removeClass("s").addClass("m");
            }
            if(size >= 1301)
            {
                $('#formcita').removeClass("m");
            }
        });
    });

    CargarTabla();

    function CargarTabla()
    {
        $.ajax({
            type: 'GET',
            url: '../../app/controllers/dashboard/citas/calendario.php',
            dataType: 'json',
            success: function(datos)
            {
                $('#datos').empty();
                console.log(datos);
                var i = 0;
                for(i; i<datos.length; i++)
                {
                    var fila = "";
                    nombres = datos[i].primer_nombre +" "+ datos[i].segundo_nombre;
                    apellidos = datos[i].primer_apellido +" "+ datos[i].segundo_apellido;
                    fecha = datos[i].start.split(" ");
                    fila = fila.concat(
                        '<tr class="'+datos[i].id_detalle+'" id="'+datos[i].id+'">',
                        '<td>' +nombres+'</td>',
                        '<td>' +apellidos+'</td>',
                        '<td>' +datos[i].title+'</td>',
                        '<td>' +datos[i].descripcion+'</td>',
                        '<td>' +fecha[0]+'</td>',
                        '</tr>'
                    );
                    $('#datos').append(fila);
                }
                $('.tooltipped').tooltip({delay: 50});
                obtenerDatosEditar();
                document.getElementById("datos").style.cursor = "pointer";
            }
        });
    }

    function obtenerDatosEditar()
    {
        $('#cita').on('click', '#datos tr', function(e){
            e.preventDefault();
            id_cita = $(this).attr('id');
            id_detalle = $(this).attr('class');
            titulo = $(this).children('td:eq(2)').text();
            descripcion = $(this).children('td:eq(3)').text();
            fecha = $(this).children('td:eq(4)').text()
            
            $('#id').val(id_cita);
            $('#descripcionEvento').val(descripcion);
            $('#tituloEvento').val(titulo);
            $('#fecha').val(fecha);
            $('#id_detalle').val(id_detalle)

            $('#modalEventos').modal().modal('open');
        });
    }

    //Funciones para hacer el SCRUD del Calendario de Citas
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
            id:$('#id').val(),
            title:$('#tituloEvento').val(),
            start:$('#fecha').val()+" "+$('#hora').val(),
            descripcion:$('#descripcionEvento').val(),
            color:"#FF0000",
            textColor:"#FFFFFF",
            end: $('#fecha').val()+" "+$('#hora').val(),
            id_detalle: $('#id_detalle').val()
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
                LimpiarInputs();
                CargarTabla();
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
                CargarTabla();
                if(!modal)
                {
                    $('#modalEventos').modal().modal('close');
                    LimpiarInputs();
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
                LimpiarInputs();
                CargarTabla();
            },
            error:function()
            {
                alert("Error el insertar");
            }
        });
    }

    function LimpiarInputs()
    {
        $('#tituloEvento').val("");
        $('#fecha').val("");
        $('#hora').val("");
        $('#descripcionEvento').val("");
        $('#fecha').val("");
        $('#hora').val("");
        $('#id_detalle').val("");
    }
});