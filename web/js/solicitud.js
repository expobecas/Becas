$(document).ready(function() {

function AlertasSwal($text)
{
  swal({
    title: 'Aviso',
    text: $text,
    icon: 'warning',
    button: 'Aceptar'
  });
}

var id_solicitud = "";
    /************************************************************************************************************************************************
     **********************************************************PARA EL SLIDER 1**********************************************************************
     ************************************************************************************************************************************************/
    $("#estudiante").click(function(e){
      //Tabla solicitud
      var nombres_responsable = $('#nombres_responsable').val();
      var apellidos_responsable = $('#apellidos_responsable').val();
      var genero = $('#genero').val();
      var religion = $('#religion').val();
      var familia;

      if($('#familia').val() === 'Otros')
      {
        familia = $('#especificar_fam').val();
      }
      else
      {
        familia = $('#familia').val();
      }

      var direccion = $('#direccion').val();
      var correo = $('#correo').val();
      var fijo = $('#fijo').val();
      var madre = $('#madre').val();
      var padre = $('#padre').val();
      var hijo = $('#hijo').val();
      var lugar = $('#lugar').val();
      var pais_naci = $('#pais_naci').val();
      var fecha_naci = $('#fecha_naci').val();
      var financiados;

      if($('#financiados').val() === 'Otros')
      {
        financiados = $('#especificar_fin').val();
      }
      else
      {
        financiados = $('#financiados').val();
      }

      //Tabla institucion proveniente
      var id_institucion = "";
      var institucion_prov = $('#institucion_prov').val();
      var departamento = $('#departamento').val();
      var pais = $('#pais').val();
      var cuota = $('#cuota').val();
      var cuotapunto = cuota.replace('.', '');
      var cuotacoma = cuotapunto.replace(',', '.');
      var año_realizaba = $('#año_realizaba').val();

      if(nombres_responsable != "")
      {
        if(apellidos_responsable != "")
        {
          if($('#genero').val() != null )
          {
            if($('#religion').val() != "")
            {
              if(familia != null)
              {
                if($('#direccion').val() != "")
                {
                  if($('#correo').val() != "")
                  {
                    if($('#fijo').val() != "" || $('#madre').val() != "" || $('#padre').val() != "" || $('#hijo').val() != "")
                    {
                      if($('#lugar').val() != "")
                      {
                        if($('#pais_naci').val() != "") 
                        {
                          if($('#fecha_naci').val() != "")
                          {
                            if(financiados != null)
                            {
                              if ($('#institucion_prov').val() != "")
                              {
                                if ($('#departamento').val() != "")
                                {
                                  if ($('#pais').val() != "")
                                  {
                                    if ($('#año_realizaba').val() != null)
                                    {
                                      $.ajax({
                                        type: 'POST',
                                        url: '../../app/controllers/public/solicitud/create_institucion.php?action=create',
                                        data:{
                                        institucion_prov:institucion_prov,
                                        departamento:departamento,
                                        pais:pais,
                                        cuotacoma:cuotacoma,
                                        año_realizaba:año_realizaba},
                                        success: function(idInstitucion)
                                        {
                                          id_institucion = idInstitucion;

                                          $.ajax({
                                            type: 'POST',
                                            url : '../../app/controllers/public/solicitud/create_datos_estudiante.php?action=create',
                                            data: {genero:genero,
                                              religion:religion,
                                              familia:familia,
                                              direccion:direccion,
                                              correo:correo,
                                              fijo:fijo,
                                              madre:madre,
                                              padre:padre,
                                              hijo:hijo,
                                              lugar:lugar,
                                              pais_naci:pais_naci,
                                              fecha_naci:fecha_naci,
                                              financiados:financiados,
                                              id_institucion:id_institucion,
                                              nombres_responsable:nombres_responsable,
                                              apellidos_responsable:apellidos_responsable},
                                            success: function(idSolicitud)
                                            {
                                              id_solicitud = idSolicitud;
                                              //console.log(id);
                                              /*
                                              $('body,html').animate({
                                                scrollTop:0
                                              }, 400)
                                              $ctr.addClass("center slider-two-active").removeClass("full slider-one-active");
                                              var n = setInterval(function(){
                                                /*le da color verde*
                                              $('.progressc .circle1').removeClass('active').addClass('done');
                                              
                                              /*este pone el checke*
                                              $('.progressc .circle1 .label').html('&#10003;');
                                      
                                              /*rellena la primera mitad de la barra*
                                              $('.progressc .bar1').addClass('active');
                                      
                                              /*activamos el circulo 2 del progress*
                                              $('.progressc .circle2').addClass('active');
                                      
                                              clearInterval(n);
                                              }, 100);
                                              e.preventDefault();*/
                                            }
                                          });
                                        },
                                        error: function(e)
                                        {
                                          alert(e);
                                          alert('Ocurrio algo');
                                        }
                                      });
                                    }
                                    else
                                    {
                                      AlertasSwal('Seleccione el año que cursaba');
                                    }
                                  }
                                  else
                                  {
                                    AlertasSwal('Ingrese el pais del la institucion proveniente');
                                  }
                                }
                                else
                                {
                                  AlertasSwal('Ingrese el departamento del la institucion proveniente');
                                }
                              }
                              else
                              {
                                AlertasSwal('Ingrese de la institucion proveniente');
                              }
                            }
                            else
                            {
                              AlertasSwal('Seleccione quien financia sus estudios');
                            }
                          }
                          else
                          {
                            AlertasSwal('Ingrese la fecha de nacimiento');
                          }
                        }
                        else 
                        {
                          AlertasSwal('Ingrese el pais de nacimiento');
                        }
                      }
                      else
                      {
                        AlertasSwal('Ingrese el lugar de nacimiento');
                      }
                    }
                    else
                    {
                      AlertasSwal('Ingrese al menos un número de teléfono');
                    }
                  }
                  else
                  {
                    AlertasSwal('Ingrese un correo electrónico');
                  }
                }
                else
                {
                  AlertasSwal('Ingrese la direccion donde vive'); 
                }
              }
              else
              {
                AlertasSwal('Seleccione con la persona con las que vive');
              }
            }
            else
            {
              AlertasSwal('Ingrese la religión');
            }
          }
          else
          {
            AlertasSwal('Seleccione un genero');
          }
        }
        else
        {
          AlertasSwal('Ingrese los apellidos de padre de familia responsable ante el colegio');
        }
      }
      else
      {
        AlertasSwal('Ingrese los nombres de padre de familia responsable ante el colegio');
      }
    });

    /************************************************************************************************************************************************
     **********************************************************PARA EL SLIDER 2**********************************************************************
     ************************************************************************************************************************************************/
    //FUNCION PARA CARGAR DATOS A LA TABLA DE INTEGRANTES CADA VEZ QUE SE INSERTA UNO
    function cargarTabla()
    {
      //Agrega los valores a la tabla
      $.ajax({
        type: 'GET',
        url: '../../app/controllers/public/solicitud/table_integrantes.php',
        dataType: 'json',
        success: function(datos)
        {
          $('#datos').empty();
          console.log(datos);
          var i = 0;
          datos = JSON.parse(JSON.stringify(datos).replace(/null/g, '""'));//todos los datos con valor null se convierten en vacios
          for(i; i<datos.length; i++)
          {
            var fila = "";
            //OBTENIENDO LOS VALORES DEL ARRAY Y CREAR EL BODY DE LA TABLA CON LOS DATOS
            fila = fila.concat(
              '<tr class="integrante" id="'+datos[i].id_integrante+'">',
              '<td>'+datos[i].nombres+'</td>',
              '<td>'+datos[i].apellidos+'</td>',
              '<td>'+datos[i].parentesco+'</td>',
              '<td>'+datos[i].fecha_nacimiento+'</td>',
              '<td>'+datos[i].profesion_ocupacion+'</td>',
              '<td>'+datos[i].lugar_trabajo+'</td>',
              '<td>'+datos[i].tel_trabajo+'</td>',
              '<td class="suma">'+datos[i].salario+'</td>',
              '<td>'+datos[i].depende+'</td>',
              '<td>'+datos[i].grado+'</td>',
              '<td>'+datos[i].institucion+'</td>',
              '<td>'+datos[i].cuota+'</td>',
              '<td><a type="button" class="waves-effect waves-light btn green tooltipped boton_table editar" data-position="bottom" data-tooltip="Editar"><i class="material-icons">edit</i></a> <a type="button" class="waves-effect waves-light btn red tooltipped boton_table eliminar" data-position="bottom" data-tooltip="Eliminar"><i class="material-icons">delete</i></a> </td>',
              '</tr>'
            );
            $('#datos').append(fila);
          }
          //Para la suma de salarios
          var totalsalario = 0;
          $('td.suma').each(function(){
            totalsalario += parseFloat($(this).html()) || 0;
          });
          console.log(totalsalario);
          $('#ingreso_familiar').val(totalsalario);
          
          $('.tooltipped').tooltip({delay: 50});
          
          obtenerDatosEditar();
          obtenerDatosEliminar();
        },
        error: function()
        {
          $('#datos').append('<tr>'+'Ocurrio un error al cargar los datos'+'</tr>');
        }
      });
    }

  //funcion para obtener los datos de la fila cuando da click en el boton de editar
  function obtenerDatosEditar()
  {
    //OBTIENE LOS DATOS DE LA FILA CUANDO DÁ CLICK EN EL BOTON EDITAR
    $('#integrantes').on('click', '#datos .editar', function(e){
      e.preventDefault();
      id = $(this).parent().parent().attr('id');
      nombres = $(this).parent().parent().children('td:eq(0)').text();
      apellidos = $(this).parent().parent().children('td:eq(1)').text();
      parentesco = $(this).parent().parent().children('td:eq(2)').text();
      fecha_nacimiento = $(this).parent().parent().children('td:eq(3)').text();
      profesion = $(this).parent().parent().children('td:eq(4)').text();
      lugar_trabajo = $(this).parent().parent().children('td:eq(5)').text();
      tel_trabajo = $(this).parent().parent().children('td:eq(6)').text();
      salario = $(this).parent().parent().children('td:eq(7)').text();
      depende = $(this).parent().parent().children('td:eq(8)').text();
      grado = $(this).parent().parent().children('td:eq(9)').text();
      institucion = $(this).parent().parent().children('td:eq(10)').text();
      cuota = $(this).parent().parent().children('td:eq(11)').text();

      //CONVIERTE LA FECHA A FORMATO yyyy-MM-dd
      fechaconvert = fecha_nacimiento.replace('/', '-');
      fecha_nacimiento = fechaconvert.replace('/', '-')

      //ENVIA LOS DATOS A LOS INPUTS
      $('#id_integrante').val(id);
      $('#nombres_inte').val(nombres);
      $('#apellidos_inte').val(apellidos);
      $('#parentesco').val(parentesco);
      $('#fecha_naci_inte').val(fecha_nacimiento);
      $('#profesion').val(profesion);
      $('#lugar_trabajo').val(lugar_trabajo);
      $('#tel_trabajo').val(tel_trabajo);
      $('#salario').val(salario);
      $('#grado').val(grado);
      $('#institucion').val(institucion);
      $('#cuota_inte').val(cuota);

      if(grado != "" || institucion != "")
      {
        $('#si_integran').prop('checked', true);
        $("#depende").show(1000);
        $("#Grado").show(1000);
        $("#Institucion").show(1000);
        $("#Cuota_inte").show(1000);
      }
      else
      {
        //Sirve para resetear los radio button
        $('.estudiante').prop('checked', false);
        $('.depende').prop('checked', false);
        
        //Para que se oculten los campos
        $("#depende").hide(1000);
        $("#Grado").hide(1000);
        $("#Institucion").hide(1000);
        $("#Cuota_inte").hide(1000);
      }
      if(depende != "")
      {
        if(depende == "si")
        {
          $('#si2').prop('checked', true);
        }
        else
        {
          $('#no2').prop('checked', true);
        }
      }
      $('#modificar').show(0);
      $('#agregar').hide(0);
      $('#cancelar').show(0);
    });
  }

  function restablecer()
  {
    //Despues de guardar el integrante se vacian los inputs
    $('#id_integrante').val('');
    $('#nombres_inte').val('');
    $('#apellidos_inte').val('');
    $('#parentesco').val('');
    $('#fecha_naci_inte').val('');
    $('#profesion').val('');
    $('#lugar_trabajo').val('');
    $('#tel_trabajo').val('');
    $('#salario').val('');
    $('#grado').val('');
    $('#institucion').val('');
    $('#cuota_inte').val('');

    //Sirve para resetear los radio button
    $('.estudiante').prop('checked', false);
    $('.depende').prop('checked', false);
    
    //Para que se oculten los campos
    $("#depende").hide(1000);
    $("#Grado").hide(1000);
    $("#Institucion").hide(1000);
    $("#Cuota_inte").hide(1000);

    $('#modificar').hide(0);
    $('#agregar').show(0);
    $('#cancelar').hide(0);
  }

  $('#cancelar').click(function(){
    restablecer();
  });

  /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------PARA INSERTAR UN INTEGRANTE E INTEGRANTE ESTUDIANDO------------------------------------------------------------------------
    -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    $("#agregar").click(function(){

      console.log(id_solicitud);
      var id_integrante = "";
      //OBTENIENDO VALORES PARA INSERTAR EN LA TABLA INTEGRANTE_FAMILIA
      var nombres = $('#nombres_inte').val();
      var apellidos = $('#apellidos_inte').val();
      var parentesco = $('#parentesco').val();
      var fecha_nacimiento = $('#fecha_naci_inte').val();
      var profesion = $('#profesion').val();
      var lugar_trabajo = $('#lugar_trabajo').val();
      var tel_trabajo = $('#tel_trabajo').val();
      var salario = $('#salario').val();
      var salariopunto = salario.replace('.', '');
      var salariocoma = salariopunto.replace(',', '.');

      //OBTENIENDO VALORES PARA INSERTAR EN LA TABLA FAMILIARES_ESTUDIANDO
      var estudiante = $('.estudiante:checked').val();
      var depende = $('.depende:checked').val();
      var grado = $('#grado').val();
      var institucion = $('#institucion').val();
      var cuota_inte = $('#cuota_inte').val();

      if($('#nombres_inte').val() != "")
      {
        if($('#apellidos_inte').val() != "")
        {
          if($('#parentesco').val() != "")
          {
            if($('#fecha_naci_inte').val() != "")
            {
              if($('#profesion').val() != "")
              {
                if(estudiante == null || estudiante === 'no')
                {
                  $.ajax({
                    type: "POST",
                    url: '../../app/controllers/public/solicitud/solicitud.php?action=create',
                    data: {nombres:nombres, 
                      apellidos:apellidos, 
                      parentesco:parentesco, 
                      fecha_nacimiento:fecha_nacimiento, 
                      profesion:profesion, 
                      lugar_trabajo:lugar_trabajo, 
                      tel_trabajo:tel_trabajo,
                      salariocoma:salariocoma,
                      id_solicitud:id_solicitud},
                      success: function(idIntegrante)
                      {
                        console.log(idIntegrante);
                        //funcion para cargar los datos en la tabla
                        cargarTabla();

                        //Esta funcion vacia los inputs y resetea los radio button
                        restablecer()
                    }
                  });
                }
                else
                {
                  if(depende == null)
                  {
                    AlertasSwal('Seleccione si depende de usted o no');
                  }
                  else if(depende === 'si' || depende === 'no')
                  {
                    if($('#grado').val() != "")
                    {
                      if($('#institucion').val() != "")
                      {
                        if($('#cuota_inte').val())
                        {
                          
                        }
                        $.ajax({
                          type: "POST",
                          url: '../../app/controllers/public/solicitud/solicitud.php?action=create',
                          data: {nombres:nombres,
                            apellidos:apellidos,
                            parentesco:parentesco, fecha_nacimiento:fecha_nacimiento,
                            profesion:profesion,
                            lugar_trabajo:lugar_trabajo,
                            tel_trabajo:tel_trabajo,
                            salariocoma:salariocoma,
                            id_solicitud:id_solicitud},
                          success: function(idIntegrante)
                          {
                            console.log(idIntegrante);
                            id_integrante = idIntegrante;

                            $.ajax({
                              type: "POST",
                              url: '../../app/controllers/public/solicitud/create_familiar_estudiante.php?action=create',
                              data: {depende:depende,
                              grado:grado,
                              institucion:institucion,
                              cuota_inte:cuota_inte,
                              id_integrante:id_integrante},
                              success: function()
                              {
                                //Función para cargar datos en la tabla
                                cargarTabla();

                                //Esta funcion vacia los inputs y resetea los radio button
                                restablecer()
                              },
                              error: function()
                              {
                                alert("Algo paso");
                              }
                            });
                          }
                        });
                      }
                      else
                      {
                        AlertasSwal('Ingrese la institucion o universidad');
                      }
                    }
                    else
                    {
                      AlertasSwal('Ingrese el grado o año que está cursando');
                    }
                  }
                }
              }
              else
              {
                AlertasSwal('Ingrese la prefesion del integrante de la familia');
              }
            }
            else
            {
              AlertasSwal('Seleccione la fecha de nacimiento del integrante');
            }
          }
          else
          {
            AlertasSwal('Escriba el parentesco que tiene hacia el alumno');
          }
        }
        else
        {
          AlertasSwal('Ingrese los apellidos del integrante de la familia');
        }
      }
      else
      {
        AlertasSwal('Ingrese los nombres del integrante de la familia');
      }
    });

    /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------PARA MODIFICAR UN INTEGRANTE E INTEGRANTE ESTUDIANDO------------------------------------------------------------------------
    -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


    $('#modificar').click(function(){
      //OBTENIENDO VALORES PARA INSERTAR EN LA TABLA INTEGRANTE_FAMILIA
      var id = $('#id_integrante').val();
      var nombres = $('#nombres_inte').val();
      var apellidos = $('#apellidos_inte').val();
      var parentesco = $('#parentesco').val();
      var fecha_nacimiento = $('#fecha_naci_inte').val();
      var profesion = $('#profesion').val();
      var lugar_trabajo = $('#lugar_trabajo').val();
      var tel_trabajo = $('#tel_trabajo').val();
      var salario = $('#salario').val();
      var salariopunto = salario.replace('.', '');
      var salariocoma = salariopunto.replace(',', '.');

      //OBTENIENDO VALORES PARA INSERTAR EN LA TABLA FAMILIARES_ESTUDIANDO
      var estudiante = $('.estudiante:checked').val();
      var depende = $('.depende:checked').val();
      var grado = $('#grado').val();
      var institucion = $('#institucion').val();
      var cuota_inte = $('#cuota_inte').val();

      if($('#id_integrante').val() != "")
      {
        if($('#nombres_inte').val() != "")
        {
          if($('#apellidos_inte').val() != "")
          {
            if($('#parentesco').val() != "")
            {
              if($('#fecha_naci_inte').val() != "")
              {
                if($('#profesion').val() != "")
                {
                  if(estudiante == null || estudiante === 'no')
                  {
                    $.ajax({
                      type: "POST",
                      url: '../../app/controllers/public/solicitud/update_integrante.php?action=update',
                      data: {id:id,
                        nombres:nombres, 
                        apellidos:apellidos, 
                        parentesco:parentesco, 
                        fecha_nacimiento:fecha_nacimiento, 
                        profesion:profesion, 
                        lugar_trabajo:lugar_trabajo, 
                        tel_trabajo:tel_trabajo,
                        salariocoma:salariocoma,
                        id_solicitud:id_solicitud},
                        success: function()
                        {
                          //funcion para cargar los datos en la tabla
                          cargarTabla();

                          //Esta funcion vacia los inputs y resetea los radio button
                          restablecer()
                      }
                    });
                  }
                  else
                  {
                    if(depende == null)
                    {
                      AlertasSwal('Seleccione si depende de usted o no');
                    }
                    else if(depende === 'si' || depende === 'no')
                    {
                      if($('#grado').val() != "")
                      {
                        if($('#institucion').val() != "")
                        {
                          if($('#cuota_inte').val())
                          {
                            
                          }
                          $.ajax({
                            type: "POST",
                            url: '../../app/controllers/public/solicitud/update_integrante.php?action=update',
                            data: {id:id,
                              nombres:nombres, 
                              apellidos:apellidos, 
                              parentesco:parentesco, 
                              fecha_nacimiento:fecha_nacimiento, 
                              profesion:profesion, 
                              lugar_trabajo:lugar_trabajo, 
                              tel_trabajo:tel_trabajo,
                              salariocoma:salariocoma,
                              id_solicitud:id_solicitud},
                              success: function()
                              {
                              $.ajax({
                                type: "POST",
                                url: '../../app/controllers/public/solicitud/update_familiar_estudiante.php?action=update',
                                data: {id:id,
                                depende:depende,
                                grado:grado,
                                institucion:institucion,
                                cuota_inte:cuota_inte},
                                success: function(datos)
                                {
                                  console.log(datos);
                                  //Función para cargar datos en la tabla
                                  cargarTabla();

                                  //Esta funcion vacia los inputs y resetea los radio button
                                  restablecer()
                                },
                                error: function()
                                {
                                  alert("Algo paso");
                                }
                              });
                            }
                          });
                        }
                        else
                        {
                          AlertasSwal('Ingrese la institucion o universidad');
                        }
                      }
                      else
                      {
                        AlertasSwal('Ingrese el grado o año que está cursando');
                      }
                    }
                  }
                }
                else
                {
                  AlertasSwal('Ingrese la prefesion del integrante de la familia');
                }
              }
              else
              {
                AlertasSwal('Seleccione la fecha de nacimiento del integrante');
              }
            }
            else
            {
              AlertasSwal('Escriba el parentesco que tiene hacia el alumno');
            }
          }
          else
          {
            AlertasSwal('Ingrese los apellidos del integrante de la familia');
          }
        }
        else
        {
          AlertasSwal('Ingrese los nombres del integrante de la familia');
        }
      }
      else
      {
        AlertasSwal('No se encontro el integrante, por favor contactar al administrador');
      }
    });

    /*------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ----------------------------------------------------------------PARA ELIMINAR UN INTEGRANTE E INTEGRANTE ESTUDIANDO------------------------------------------------------------------------
    -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

    function obtenerDatosEliminar(){
      $('#integrantes').on('click', '#datos .eliminar', function(e){
        e.preventDefault();
        id = $(this).parent().parent().attr('id');
  
        //ENVIA LOS DATOS A LOS INPUTS
        $('#id_integrante').val(id);
  
        swal({
          title: 'Eliminar integrante',
          text: '¿Quiere eliminar este integrante?',
          icon: 'warning',
          dangerMode: true,
          buttons: {
            cancel: "No",
            danger: "Si"
          },
        }).then((willDelete) => {
          if(willDelete)
          {
            var id_integrante = $('#id_integrante').val();
            if($('#id_integrante').val() != "")
            {
              $.ajax({
                type: "POST",
                url: '../../app/controllers/public/solicitud/delete_integrante.php?action=delete',
                data:{id_integrante:id_integrante},
                success: function()
                {
                  cargarTabla()
                  //Esta funcion vacia los inputs y resetea los radio button
                  restablecer()
                }
              });
            }
            else
            {
              AlertasSwal('Ocurrio un error al momento de eliminar el integrante, contacte con el administrador');
            }
          }
        });
      });
    }

    /************************************************************************************************************************************************
     **********************************************************PARA EL SLIDER 3**********************************************************************
     ************************************************************************************************************************************************/

     /*----------------------------------------------------------------------------------------------------------------------------------------------
     --------------------------------------PARA INSERTAR EN LA TABLA PROPIEDAD Y EN LA VEHICULOS-----------------------------------------------------
     -----------------------------------------------------------------------------------------------------------------------------------------------*/
    var id_propiedad = "";
    //funcion para guardar en la tabla propiedad
    function GuardarPropiedad()
    {
      if($('#tipocasa').val() === 'Otro')
      {
        tipo_casa = $('#especificar_casa').val()
      }
      else
      {
        tipo_casa = $('#tipocasa').val();
      }
      cuota_mensual = $('#cuota_mensual').val();
      valor_actual = $('#valor_actual').val();
      if(tipo_casa != null)
      {
        $.ajax({
          type: 'POST',
          url: '../../app/controllers/public/solicitud/create_propiedad.php?action=create',
          data:{tipo_casa:tipo_casa,
          cuota_mensual:cuota_mensual,
          valor_actual:valor_actual},
          success: function(IdPropiedad)
          {
            id_propiedad = IdPropiedad;
          }
        });
      }
      else
      {
        AlertasSwal('Seleccione el estado de la casa que pertenece');
      }
    }
    //Funcion para guardar en la tabla propiedad y en la de vehiculos
    function GuardarPropiedad_Vehiculo()
    {
      if($('#tipocasa').val() === 'Otro')
      {
        tipo_casa = $('#especificar_casa').val()
      }
      else
      {
        tipo_casa = $('#tipocasa').val();
      }
      cuota_mensual = $('#cuota_mensual').val();
      valor_actual = $('#valor_actual').val();
      var tipo_vehiculo = $('#tipo_vehiculo').val();
      var año_vehiculo = $('#año').val();;
      var valor_vehiculo = $('#valor_vehiculo').val();
      if(tipo_casa != null)
      {
        if(tipo_vehiculo != null)
        {
          if(año_vehiculo != null)
          {
            if(valor_vehiculo != null)
            {
              $.ajax({
                type: 'POST',
                url: '../../app/controllers/public/solicitud/create_propiedad.php?action=create',
                data:{tipo_casa:tipo_casa,
                cuota_mensual:cuota_mensual,
                valor_actual:valor_actual},
                success: function(IdPropiedad)
                {
                  id_propiedad = IdPropiedad;
                  $.ajax({
                    type: 'POST',
                    url: '../../app/controllers/public/solicitud/create_vehiculo.php?action=create',
                    data:{tipo_vehiculo:tipo_vehiculo,
                    año_vehiculo:año_vehiculo,
                    valor_vehiculo:valor_vehiculo,
                    id_propiedad:id_propiedad},
                    dataType: 'json',
                    success: function(datos)
                    {
                      LimpiarinputsVehiculos();
                      console.log(datos);
                      $('#vehiculos').empty();
                      var i = 0;
                      datos = JSON.parse(JSON.stringify(datos).replace(/null/g, '""'));//todos los datos con valor null se convierten en vacios
                      for(i; i<datos.length; i++)
                      {
                        var fila = "";
                        //OBTENIENDO LOS VALORES DEL ARRAY Y CREAR EL BODY DE LA TABLA CON LOS DATOS
                        fila = fila.concat(
                          '<tr class="integrante" id="'+datos[i].id_vehiculo+'">',
                          '<td>'+datos[i].tipo_vehiculo+'</td>',
                          '<td>'+datos[i].año+'</td>',
                          '<td>'+datos[i].valor_actual+'</td>',
                          '</tr>'
                        );
                        $('#vehiculos').append(fila);
                      }
                    }
                  });
                }
              });
            }
            else
            {
              AlertasSwal('Ingrese el valor actual de su vehiculo');
            }
          }
          else
          {
            AlertasSwal('Ingrese el año de su vehiculo');
          }
        }
        else
        {
          AlertasSwal('Ingrese el tipo de su vehiculo');
        }
      }
      else
      {
        AlertasSwal('Seleccione el estado de la casa que pertenece');
      }
    }

    //Funcion para guardar en la tabla vehiculos
    function GuardarVehiculo()
    {
      console.log(id_propiedad);
      var tipo_vehiculo = $('#tipo_vehiculo').val();
      var año_vehiculo = $('#año').val();
      var valor_vehiculo = $('#valor_vehiculo').val();

      if(tipo_vehiculo != null)
      {
        if(año_vehiculo != null)
        {
          if(valor_vehiculo != null)
          {
            $.ajax({
              type: 'POST',
              url: '../../app/controllers/public/solicitud/create_vehiculo.php?action=create',
              data:{tipo_vehiculo:tipo_vehiculo,
              año_vehiculo:año_vehiculo,
              valor_vehiculo:valor_vehiculo,
              id_propiedad:id_propiedad},
              dataType: 'json',
              success: function(datos)
              {
                LimpiarinputsVehiculos();
                console.log(datos);
                $('#vehiculos').empty();
                var i = 0;
                datos = JSON.parse(JSON.stringify(datos).replace(/null/g, '""'));//todos los datos con valor null se convierten en vacios
                for(i; i<datos.length; i++)
                {
                  var fila = "";
                  //OBTENIENDO LOS VALORES DEL ARRAY Y CREAR EL BODY DE LA TABLA CON LOS DATOS
                  fila = fila.concat(
                    '<tr class="integrante" id="'+datos[i].id_vehiculo+'">',
                    '<td>'+datos[i].tipo_vehiculo+'</td>',
                    '<td>'+datos[i].año+'</td>',
                    '<td>'+datos[i].valor_actual+'</td>',
                    '</tr>'
                  );
                  $('#vehiculos').append(fila);
                }
              }
            });
          }
          else
          {
            AlertasSwal('Ingrese el valor actual de su vehiculo');
          }
        }
        else
        {
          AlertasSwal('Ingrese el año de su vehiculo');
        }
      }
      else
      {
        AlertasSwal('Ingrese el tipo de su vehiculo');
      }
    }
    
    //Cuando presione el boton con el id agregar_vehiculo que se ejecute la funcion
    $('#agregar_vehiculo').click(function(){
      if(id_propiedad == "")
      {
        GuardarPropiedad_Vehiculo();
      }
      else
      {
        GuardarVehiculo();
      }      
    });
    //Funcion para limpiar los inputs de vehiculos
    function LimpiarinputsVehiculos()
    {
      $('#tipo_vehiculo').val("");
      $('#año').val("");
      $('#valor_vehiculo').val("");
    }

    /*----------------------------------------------------------------------------------------------------------------------------------------------
     --------------------------------------PARA SUBIR E INSERTAR EN LA TABLA IMAGENES PROPIEDAD-----------------------------------------------------
     -----------------------------------------------------------------------------------------------------------------------------------------------*/
    $('#propiedad').click(function(){

      if($('#tipocasa').val() === 'Otro')
      {
        tipo_casa = $('#especificar_casa').val()
      }
      else
      {
        tipo_casa = $('#tipocasa').val();
      }
      cuota_mensual = $('#cuota_mensual').val();
      valor_actual = $('#valor_actual').val();


      if(tipo_casa != null)
      {
        if($('#imagen_casa')[0].files.length != 0)
        {
          if($('#imagen_casa')[0].files.type == 'image/jpg' || 'image/png')
          {
            $.ajax({
              type: 'POST',
              url: '../../app/controllers/public/solicitud/create_propiedad.php?action=create',
              data:{tipo_casa:tipo_casa,
              cuota_mensual:cuota_mensual,
              valor_actual:valor_actual},
              success: function(IdPropiedad)
              {
                id_propiedad = IdPropiedad;
                
                var data = new FormData();
                $.each($('#imagen_casa')[0].files, function(i, file){
                  data.append('archivo', file);
                });
                data.append('id_propiedad', id_propiedad);

                $.ajax({
                  type: 'POST',
                  url: '../../app/controllers/public/solicitud/create_img_propiedad.php?action=create',
                  processData: false,
                  data: data,
                  contentType: false,
                  success: function(resultado)
                  {
                    console.log(resultado);
                  }
                });
              }
            });
          }
          else
          {
            AlertasSwal('El tipo de la imagen debe ser jpg o png');
          }
        }
        else
        {
          AlertasSwal('Subir una imagen de su casa');
        }
      }
      else
      {
        AlertasSwal('Seleccione el estado de la casa que pertenece');
      }
    });

     
});

//Funcion para ver la imagen que ha seleccionado
function readURL(input){
  if(input.files && input.files[0])
  {
    var reader = new FileReader();

    reader.onload = function (e){
      $('#imagen_propiedad').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}