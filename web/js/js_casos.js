$(document).ready(function(){

    function AlertasSwal($text)
    {
        swal({
            title: 'Aviso',
            text: $text,
            icon: 'warning',
            button: 'Aceptar'
        });
    }
    function getUrlVars() 
    {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) 
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }
    /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    -------------------------------------FUNCIONES PARA EL CREATE_CASO.PHP DE CASOS--------------------------------------------------------------------------------------------------------------
    ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    id_caso = 0;
    $('#aprobar').click(function(){
        getUrlVars();
        id = decodeURI(getUrlVars()["id"]);
        descripcion_c = $('#descripcion_c').val();
        accion = 'aprobar';
        createCaso();        
    });

    $('#rechazar').click(function(){
        getUrlVars();
        id = decodeURI(getUrlVars()["id"]);
        descripcion_c = $('#descripcion_c').val();
        accion = 'rechazar';
        createCaso();        
    });

    function createCaso()
    {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/dashboard/casos/create_caso.php?action=create',
            data: {
                id:id,
                descripcion_c:descripcion_c,
                accion:accion
                },
            success: function(idCaso)
            {
                console.log(idCaso);
                id_caso = idCaso;
                createImagenCaso();
            }
        });
    }

    function createImagenCaso()
    {
        var data = new FormData();
        
        imagenes = $('#imagenes')[0].files;
        i = 0;
        for(i; i<imagenes.length; i++)
        {
            nombre = imagenes[i].name;
            tipo = imagenes[i].type;

            if(tipo == 'image/jpeg' || tipo == 'image/jpg' || tipo == 'image/png' || tipo == 'image/gif')
            {
                
                data.append('archivo['+i+']', imagenes[i]);
            }
        }
        
        data.append('id_caso', id_caso);

        for (var value of data)
        {
            //console.log(value); 
        }


        $.ajax({
            type: 'POST',
            url: '../../app/controllers/dashboard/casos/create_imagenes_caso.php?action=create',
            processData: false,
            data: data,
            contentType: false,
            success: function(datos)
            {
                console.log(datos);
            }
        });
    }


    $('#imagenes').on('change', function(){
        $('#vista').html('');
      
        imagenes = document.getElementById('imagenes').files;
     
        i=0;
        for(i; i<imagenes.length; i++)
        {
            tamaño = imagenes[i].size;
            tipo = imagenes[i].type;
            nombre = imagenes[i].name;
            var reader = new FileReader();
            
            if(tipo == 'image/jpeg' || tipo == 'image/jpg' || tipo == 'image/png' || tipo == 'image/gif')
            {
                
                reader.onload = function(e)
                {
                    $('#vista').append('<img src="'+e.target.result+'" width="200" heigth="250">');
                }
                
            }
            else
            {
                AlertasSwal('El archivo '+nombre+' no es un tipo de imagen(jpg, jpeg, png ó gif)');
            }
            reader.readAsDataURL(imagenes[i]);
        }
    });
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
                            '<td>',
                            '<a class="ver tooltipped" data-position="bottom" data-delay="50" data-tooltip="Detalle del caso"><img src="../../web/img/admin/icon/ver.png"></a>',
                            '<a class="seguimiento tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver Seguimientos del caso"><img src="../../web/img/admin/icon/ver.png"></a>',
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

    $('#guardar_seguimiento').click(function(){
        
        periodo = $('#periodos').val();
        descripcion_segui = $('#crear_descripcion').val();
        solucion = $('#crear_solucion').val();

        if(periodo != '')
        {
            if(descripcion_segui != '')
            {
                if(solucion != '')
                {
                    $.ajax({
                        type: 'POST',
                        url: '../../app/controllers/dashboard/seguimientos/create_seguimiento.php?action=create',
                        data:{
                            id_caso:id_caso,
                            periodo:periodo,
                            descripcion_segui:descripcion_segui,
                            solucion:solucion
                        },
                        success: function(datos)
                        {
                            console.log(datos);
                        }
                    });
                }
                else
                {
                    AlertasSwal('Describa las soluciones o acuerdos');
                }
            }
            else
            {
                AlertasSwal('Describa el seguimiento');
            }
        }
        else
        {
            AlertasSwal('Seleccione el periodo para hacer el seguimiento del caso');
        }
    });
    function CargarTablaSeguimineto()
    {
        $.ajax({
            type: 'POST',
            url: '../../app/controllers/dashboard/seguimientos/index_controller.php',
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
                            '<td>',
                            '<a class="ver tooltipped" data-position="bottom" data-delay="50" data-tooltip="Detalle del caso"><img src="../../web/img/admin/icon/ver.png"></a>',
                            '</td>',
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
                    fila = fila.concat('<tr> <td colspan="4"> <h5 class="center">No ha realizado seguimientos para este caso</h5> </td> </tr>');
                    $('#seguimientos').append(fila);
                }
                cmbPeriodos();
            }
        });
    }

    function cmbPeriodos()
    {
        $.ajax({
            url: '../../app/controllers/dashboard/seguimientos/cmb_periodos_controller.php',
            dataType: 'json',
            success: function(periodos)
            {
                $('#periodos').empty();
                $('#periodos').append('<option value="" disabled selected>Seleccione un periodo</option>');
                console.log(periodos);
                i = 0;
                for(i; i<periodos.length; i++)
                {
                    var option = '';
                    option = option.concat(
                        '<option value="'+periodos[i].id_periodo+'">'+periodos[i].periodo+'</option>'
                    );
                    $('#periodos').append(option);
                }
                $('select').material_select();
            }
        });
    }

    //Con esta funcion se obtienen los datos de la fila cuando selecciona un caso y los carga en el modal de detalles del caso
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
            descripcion = $(this).parent().parent().children('td:eq(6)').text();

            //Se le da los valores a los inputs
            $('#id').val(id_caso);
            $('#carnet').val(n_carnet);
            $('#alumno').val(alumno);
            $('#fecha').val(fecha);
            $('#descripcion').val(descripcion);
            $.ajax({
                type: 'POST',
                url: '../../app/controllers/dashboard/casos/load_imagenes_casos.php',
                data: {id_caso:id_caso},
                dataType: 'json',
                success: function(imagenes)
                {
                    console.log(imagenes);
                    $('#vistas').empty();
                    i = 0;
                    for(i; i<imagenes.length; i++)
                    {
                        $('#vistas').append('<img id="'+imagenes[i].id_img_caso+'" src="../../web/img/casos/'+imagenes[i].imagen_caso+'" width="200" heigth="250">');
                    }
                }
            });

            $('#modalCasos').modal().modal('open');//Abre modal
        });
    }

    $('#tab_table').click(function(){
        $('#crear_seguimiento').show(0);
    });
    $('#tab_periodo').click(function(){
        $('#crear_seguimiento').hide(0);
    });
    $('#crear_seguimiento').click(function(){
        $('#guardar_seguimiento').show(0);
        $('#cancelar_seguimiento').show(0);
        $('#reporte').hide(0);
        $('#crear_seguimiento').hide(0);
        $('#cerrar').hide(0);
        $('#frmmostrar').hide(0);
        $('#frmcrear').show(0);
    });

    $('#cancelar_seguimiento').click(function(){
        $('#guardar_seguimiento').hide(0);
        $('#cancelar_seguimiento').hide(0);
        $('#reporte').show(0);
        $('#crear_seguimiento').show(0);
        $('#cerrar').show(0);
        $('#frmmostrar').show(0);
        $('#frmcrear').hide(0);
    });

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