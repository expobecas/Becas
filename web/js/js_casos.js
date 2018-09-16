$(document).ready(function(){
    CargarTabla();
    $('#id_caso').hide(0);
    $('#guardar').hide(0);
    $('#cancelar_cambios').hide(0);

    function CargarTabla()
    {
        buscar = $('#buscar_caso').val();
        $.ajax({
            type:'POST',
            url: '../../app/controllers/dashboard/casos/index_controller.php',
            data: {buscar:buscar},
            dataType: 'json',
            success: function(casos)
            {
                $('#casos').empty();
                if(casos != "")
                {
                    i = 0;
                    for(i; i<casos.length; i++)
                    {
                        var fila = "";
                        alumno = casos[i].primer_apellido +" "+ casos[i].segundo_apellido+', '+casos[i].primer_nombre +' '+ casos[i].segundo_nombre;
                        fecha = casos[i].start.split(" ");
                        fila = fila.concat(
                            '<tr id="'+casos[i].id_caso+'">',
                            '<td>'+casos[i].n_carnet+'</td>',
                            '<td>'+alumno+'</td>',
                            '<td>'+casos[i].fecha+'</td>',
                            '<td>'+casos[i].estado_solicitud+'</td>',
                            '<td>'+fecha[0]+'</td>',
                            '<td><a class="ver tooltipped" data-position="bottom" data-delay="50" data-tooltip="Detalle del caso"><img src="../../web/img/admin/icon/ver.png"></a></td>',
                            '<td class="descripcion">'+casos[i].descripcion+'</td>',
                            '<td class="carnet">'+casos[i].n_carnet+'</td>',
                            '</tr>'
                        );
                        $('#casos').append(fila);
                    }
                    $('.descripcion').hide(0);
                    $('.carnet').hide(0);
                    $('.tooltipped').tooltip({delay: 50});
                    document.getElementById("casos").style.cursor = "default";
                    ObtenerDatos();
                }
                else if(buscar != '' && casos == '')
                {
                    var fila = "";
                    fila = fila.concat('<tr> <td colspan="7"> <h5 class="center">No se encontro ningun resultado</h5> </td> </tr>');
                    $('#casos').append(fila);
                }
                else
                {
                    swal({
                        title: 'Aviso',
                        text: 'No hay casos, por favor genere un caso',
                        icon: 'warning',
                        button: 'aceptar'
                      }).then(value =>
                        {
                          location.href = '../solicitudes/index.php'
                        });
                }
            }
        });         
    }

    $('#buscar_caso').on('keyup', function(){
        CargarTabla();
    });
    
    //Con esta funcion se obtienen los datos de la fila cuando se presiona detalle del caso
    function ObtenerDatos()
    {
        $('#tablecaso').on('click', '#casos .ver', function(e){
            e.preventDefault();

            //Se guardan en variables los datos de la fila
            id_caso = $(this).parent().parent().attr('id');
            alumno = $(this).parent().parent().children('td:eq(0)').text();
            fecha = $(this).parent().parent().children('td:eq(1)').text();
            estado = $(this).parent().parent().children('td:eq(2)').text();
            descripcion = $(this).parent().parent().children('td:eq(5)').text();
            n_carnet = $(this).parent().parent().children('td:eq(6)').text();

            //Se le da los valores a los inputs
            $('#id').val(id_caso);
            $('#carnet').val(n_carnet);
            $('#alumno').val(alumno);
            $('#fecha').val(fecha);
            $('#descripcion').val(descripcion);

            $('#modalCasos').modal().modal('open');//Abre modal
        });
    }

    //Modificar caso
    $('#modificar_caso').click(function(){//La función se va ejecutar cuando presione el boton con la id eliminar_caso
        $('#descripcion').prop('disabled', false);
        $('#guardar').show(0);
        $('#cancelar_cambios').show(0);
        $('#modificar_caso').hide(0);
        $('#eliminar_caso').hide(0);
        $('#cancelar').hide(0);
    });

    $('#cancelar_cambios').click(function(){//La función se va ejecutar cuando presione el boton con la id eliminar_caso
        $('#descripcion').prop('disabled', true);
        $('#guardar').hide(0);
        $('#cancelar_cambios').hide(0);
        $('#modificar_caso').show(0);
        $('#eliminar_caso').show(0);
        $('#cancelar').show(0);
    });

    $('#guardar').click(function(){
        id_caso = $('#id').val();//Obtengo el id del caso y la guardo en una variable
        descripcion = $('#descripcion').val();//Obtengo la descripcion del caso y la guardo en una variable
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/dashboard/casos/update_controller.php',
            data:{
                id_caso:id_caso,
                descripcion:descripcion
            },
            success: function()
            {
                $('#descripcion').prop('disabled', true);
                $('#guardar').hide(0);
                $('#cancelar_cambios').hide(0);
                $('#modificar_caso').show(0);
                $('#eliminar_caso').show(0);
                $('#cancelar').show(0);
                $('#modalCasos').modal().modal('close');
                CargarTabla();
            }
        });
    });

    //Eliminar caso
    $('#eliminar_caso').click(function(){//La función se va ejecutar cuando presione el boton con la id eliminar_caso
        id_caso = $('#id').val();//Obtengo el id del caso y la guardo en una variable

        swal({
          title: 'Eliminar Caso',
          text: '¿Quiere eliminar este Caso?',
          icon: 'warning',
          dangerMode: true,
          buttons: {
            cancel: "No",
            danger: "Si"
          },
        }).then((willDelete) => {
          if(willDelete)
          {
            $.ajax({
                type: 'POST',
                url: '../../app/controllers/dashboard/casos/delete_controller.php',
                data:{id_caso:id_caso},
                success: function()
                {
                    $('#modalCasos').modal().modal('close');
                    CargarTabla();
                }
            });
          }
        
        });
    });
});