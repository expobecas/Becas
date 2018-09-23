$(document).ready(function(){
    $('.button-collapse').sideNav({
        menuWidth: 240,
        edge: 'left',
        closeOnClick: true,
        draggable: true,
        onOpen: function(el) { },
        onClose: function(el) { },
        
    }
  );

/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------FUNCIONES PARA EL INDEX.PHP DE CASOS--------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    CargarTabla();
    $('.id_caso').hide(0);
    $('#guardar').hide(0);
    $('#cancelar_cambios').hide(0);
    $('#guardar_seguimiento').hide(0);
    $('#cancelar_seguimiento').hide(0);
    $('#frmcrear').hide(0);

    $('#buscar_caso').on('keyup', function(){
        CargarTabla();
    });

    $('#tablecaso').on('click', '#casos .seguimiento', function(e){
        e.preventDefault();
        id_caso = $(this).parent().parent().attr('id');
        $('#id_caso').val(id_caso);
        CargarTablaSeguimineto();
        $('#modalSeguimiento').modal().modal('open');//Abre modal
    });

    function CargarTabla()
    {
        buscar = $('#buscar_caso').val();
        $.ajax({
            type:'POST',
            url: '../../../app/controllers/public/jefes/casos/index_controller.php',
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
                            '<td>',
                            '<a class="ver tooltipped" data-position="bottom" data-delay="50" data-tooltip="Detalle del caso"><img src="../../../web/img/admin/icon/ver.png"></a>',
                            '</td>',
                            '<td>',
                            '<a class="seguimiento tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver Seguimientos del caso"><img src="../../../web/img/admin/icon/ver.png"></a>',
                            '</td>',
                            '<td class="descripcion">'+casos[i].descripcion+'</td>',
                            '</tr>'
                        );
                        $('#casos').append(fila);
                    }
                    $('.descripcion').hide(0);
                    $('.carnet').hide(0);
                    $('.tooltipped').tooltip({delay: 50});
                    document.getElementById("casos").style.cursor = "default";
                    //$(".ver").style.cursor = "pointer";
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

    function ObtenerDatos()
    {
        $('#tablecaso').on('click', '#casos .ver', function(e){
            e.preventDefault();

            //Se guardan en variables los datos de la fila
            id_caso = $(this).parent().parent().attr('id');
            n_carnet = $(this).parent().parent().children('td:eq(0)').text();
            alumno = $(this).parent().parent().children('td:eq(1)').text();
            fecha = $(this).parent().parent().children('td:eq(2)').text();
            estado = $(this).parent().parent().children('td:eq(3)').text();
            descripcion = $(this).parent().parent().children('td:eq(7)').text();

            //Se le da los valores a los inputs
            $('#id').val(id_caso);
            $('#carnet').val(n_carnet);
            $('#alumno').val(alumno);
            $('#fecha').val(fecha);
            $('#descripcion').val(descripcion);
            $.ajax({
                type: 'POST',
                url: '../../../app/controllers/public/jefes/casos/load_imagenes_casos.php',
                data: {id_caso:id_caso},
                dataType: 'json',
                success: function(imagenes)
                {
                    console.log(imagenes);
                    $('#vistas').empty();
                    i = 0;
                    for(i; i<imagenes.length; i++)
                    {
                        $('#vistas').append('<img class="materialboxed" id="'+imagenes[i].id_img_caso+'" src="../../../web/img/casos/'+imagenes[i].imagen_caso+'" width="200" heigth="250">');
                    }
                    $('.materialboxed').materialbox();
                }
            });

            $('#modalCasos').modal().modal('open');//Abre modal
        });
    }

    function CargarTablaSeguimineto()
    {
        $.ajax({
            type: 'POST',
            url: '../../../app/controllers/public/jefes/seguimientos/index_controller.php',
            data: {id_caso:id_caso},
            dataType: 'json',
            success: function(seguimientos)
            {
                console.log(seguimientos);

                $('#seguimientos').empty();
                $('#periodo').empty();
                if(seguimientos != '')
                {
                    i = 0;
                    for(i; i<seguimientos.length; i++)
                    {
                        var fila = "";
                        fila = fila.concat(
                            '<tr id="'+seguimientos[i].id_seguimiento+'">',
                            '<td>'+seguimientos[i].periodo+'</td>',
                            '<td class="celda">'+seguimientos[i].descripcion+'</td>',
                            '<td class="celda">'+seguimientos[i].soluciones+'</td>',
                            /*'<td>',
                            '<a class="ver tooltipped" data-position="bottom" data-delay="50" data-tooltip="Detalle del caso"><img src="../../../web/img/admin/icon/ver.png"></a>',
                            '</td>',*/
                            '</tr>'
                        );
                        $('#seguimientos').append(fila);

                        var formulario = '';
                        formulario = formulario.concat(
                            '<div class="card z-depth-3">',
                                '<div class="divider linea"></div>',
                                '<h4 class="center" id="titulo">Seguimiento del '+seguimientos[i].periodo+'</h4>',
                                '<div class="divider linea"></div>',
                                '<div class="row">',
                                    '<div class="input-field col l12 m12 s12">',
                                        '<textarea id="descripcion_segui_'+i+'" class="materialize-textarea negrita" name="descripcion_segui"></textarea>',
                                        '<label for="descripcion_segui" class="active">Descripción</label>',
                                    '</div>',
                                '</div>',
                                '<div class="row">',
                                    '<div class="input-field col l12 m12 s12">',
                                        '<textarea id="soluciones_'+i+'" class="materialize-textarea negrita" name="soluciones"></textarea>',
                                        '<label for="soluciones" class="active">Soluciones o acuerdos</label>',
                                    '</div>',
                                '</div>',
                            '</div>'
                        );
                        $('#periodo').append(formulario);
                        $('.idseguimiento').hide(0);
                        $('#descripcion_segui_'+i+'').val(seguimientos[i].descripcion);
                        $('#soluciones_'+i+'').val(seguimientos[i].soluciones);

                    }
                    $('.tooltipped').tooltip({delay: 50});
                    

                }
                else
                {
                    var fila = "";
                    fila = fila.concat('<tr> <td colspan="3"> <h5 class="center">No ha realizado seguimientos para este caso</h5> </td> </tr>');
                    $('#seguimientos').append(fila);
                }
            }
        });
    }
});