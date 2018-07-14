$(document).ready(function() {
    //PARA EL SLIDER 1
    $("#estudiante").click(function(e){
      //Tabla solicitud
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
      var institucion_prov = $('#institucion_prov').val();
      var departamento = $('#departamento').val();
      var pais = $('#pais').val();
      var cuota = $('#cuota').val();
      var cuotapunto = cuota.replace('.', '');
      var cuotacoma = cuotapunto.replace(',', '.');
      var año_realizaba = $('#año_realizaba').val();

      $.ajax({
        type: 'POST',
        url: '',
        dataType: 'json',
        success: function(datos)
        {
          
        }
      });

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
                                    success: function()
                                    {
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
                                          financiados:financiados},
                                        success: function()
                                        {
                                          $('body,html').animate({
                                            scrollTop:0
                                          }, 400)
                                          $ctr.addClass("center slider-two-active").removeClass("full slider-one-active");
                                          var n = setInterval(function(){
                                            /*le da color verde*/
                                          $('.progressc .circle1').removeClass('active').addClass('done');
                                          
                                          /*este pone el checke*/
                                          $('.progressc .circle1 .label').html('&#10003;');
                                  
                                          /*rellena la primera mitad de la barra*/
                                          $('.progressc .bar1').addClass('active');
                                  
                                          /*activamos el circulo 2 del progress*/
                                          $('.progressc .circle2').addClass('active');
                                  
                                          clearInterval(n);
                                          }, 100);
                                          e.preventDefault();
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
                                  swal({
                                    title: 'Aviso',
                                    text: 'Seleccione el año que cursaba',
                                    icon: 'warning',
                                    button: 'aceptar'
                                  });
                                }
                              }
                              else
                              {
                                swal({
                                  title: 'Aviso',
                                  text: 'Ingrese el pais del la institucion proveniente',
                                  icon: 'warning',
                                  button: 'aceptar'
                                });
                              }
                            }
                            else
                            {
                              swal({
                                title: 'Aviso',
                                text: 'Ingrese el departamento del la institucion proveniente',
                                icon: 'warning',
                                button: 'aceptar'
                              });
                            }
                          }
                          else
                          {
                            swal({
                              title: 'Aviso',
                              text: 'Ingrese de la institucion proveniente',
                              icon: 'warning',
                              button: 'aceptar'
                            });
                          }
                        }
                        else
                        {
                          swal({
                            title: 'Aviso',
                            text: 'Seleccione quien financia sus estudios',
                            icon: 'warning',
                            button: 'aceptar'
                          });
                        }
                      }
                      else
                      {
                        swal({
                          title: 'Aviso',
                          text: 'Ingrese la fecha de nacimiento ',
                          icon: 'warning',
                          button: 'aceptar'
                        });
                      }
                    }
                    else 
                    {
                      swal({
                        title: 'Aviso',
                        text: 'Ingrese el pais de nacimiento',
                        icon: 'warning',
                        button: 'aceptar'
                      });
                    }
                  }
                  else {
                    swal({
                      title: 'Aviso',
                      text: 'Ingrese el lugar de nacimiento ',
                      icon: 'warning',
                      button: 'aceptar'
                    });
                  }
                }
                else
                {
                  swal({
                    title: 'Aviso',
                    text: 'Ingrese al menos un número de teléfono',
                    icon: 'warning',
                    button: 'aceptar'
                  });
                }
              }
              else
              {
                swal({
                  title: 'Aviso',
                  text: 'Ingrese un correo electrónico',
                  icon: 'warning',
                  button: 'aceptar'
                });
              }
            }
            else
            {
              swal({
                title: 'Aviso',
                text: 'Ingrese la direccion donde vive',
                icon: 'warning',
                button: 'aceptar'
              });  
            }
          }
          else
          {
            swal({
              title: 'Aviso',
              text: 'Seleccione con la persona con las que vive',
              icon: 'warning',
              button: 'aceptar'
            });
          }
        }
        else
        {
          swal({
            title: 'Aviso',
            text: 'Ingrese la religión',
            icon: 'warning',
            button: 'aceptar'
          });
        }
      }
      else
      {
        swal({
          title: 'Aviso',
          text: 'Seleccione un genero',
          icon: 'warning',
          button: 'aceptar'
        });
      }
    });

    //PARA EL SLIDER 2
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
                      salariocoma:salariocoma},
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
                    swal({
                      title: 'Aviso',
                      text: 'Seleccione si depende de usted o no',
                      icon: 'warning',
                      button: 'aceptar'
                    });
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
                            salario:salario},
                            success: function()
                            {
                            $.ajax({
                              type: "POST",
                              url: '../../app/controllers/public/solicitud/create_familiar_estudiante.php?action=create',
                              data: {depende:depende,
                              grado:grado,
                              institucion:institucion,
                              cuota_inte:cuota_inte},
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
                        swal({
                          title: 'Aviso',
                          text: 'Ingrese la institucion o universidad',
                          icon: 'warning',
                          button: 'aceptar'
                        });
                      }
                    }
                    else
                    {
                      swal({
                        title: 'Aviso',
                        text: 'Ingrese el grado o año que está cursando',
                        icon: 'warning',
                        button: 'aceptar'
                      });
                    }
                  }
                }
              }
              else
              {

                swal({
                  title: 'Aviso',
                  text: 'Ingrese la prefesion del integrante de la familia',
                  icon: 'warning',
                  button: 'aceptar'
                });
              }
            }
            else
            {
              swal({
                title: 'Aviso',
                text: 'Seleccione la fecha de nacimiento del integrante',
                icon: 'warning',
                button: 'aceptar'
              });
            }
          }
          else
          {
            swal({
              title: 'Aviso',
              text: 'Escriba el parentesco que tiene hacia el alumno',
              icon: 'warning',
              button: 'aceptar'
            });
          }
        }
        else
        {
          swal({
            title: 'Aviso',
            text: 'Ingrese los apellidos del integrante de la familia',
            icon: 'warning',
            button: 'aceptar'
          });
        }
      }
      else
      {

        swal({
          title: 'Aviso',
          text: 'Ingrese los nombres del integrante de la familia',
          icon: 'warning',
          button: 'aceptar'
        });
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
      console.log($('#nombres_inte').val());

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
                        salariocoma:salariocoma},
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
                      swal({
                        title: 'Aviso',
                        text: 'Seleccione si depende de usted o no',
                        icon: 'warning',
                        button: 'aceptar'
                      });
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
                              salariocoma:salariocoma},
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
                          swal({
                            title: 'Aviso',
                            text: 'Ingrese la institucion o universidad',
                            icon: 'warning',
                            button: 'aceptar'
                          });
                        }
                      }
                      else
                      {
                        swal({
                          title: 'Aviso',
                          text: 'Ingrese el grado o año que está cursando',
                          icon: 'warning',
                          button: 'aceptar'
                        });
                      }
                    }
                  }
                }
                else
                {

                  swal({
                    title: 'Aviso',
                    text: 'Ingrese la prefesion del integrante de la familia',
                    icon: 'warning',
                    button: 'aceptar'
                  });
                }
              }
              else
              {
                swal({
                  title: 'Aviso',
                  text: 'Seleccione la fecha de nacimiento del integrante',
                  icon: 'warning',
                  button: 'aceptar'
                });
              }
            }
            else
            {
              swal({
                title: 'Aviso',
                text: 'Escriba el parentesco que tiene hacia el alumno',
                icon: 'warning',
                button: 'aceptar'
              });
            }
          }
          else
          {
            swal({
              title: 'Aviso',
              text: 'Ingrese los apellidos del integrante de la familia',
              icon: 'warning',
              button: 'aceptar'
            });
          }
        }
        else
        {
          swal({
            title: 'Aviso',
            text: 'Ingrese los nombres del integrante de la familia',
            icon: 'warning',
            button: 'aceptar'
          });
        }
      }
      else
      {
        swal({
          title: 'Aviso',
          text: 'No se encontro el integrante, por favor contactar al administrador',
          icon: 'warning',
          button: 'aceptar'
        });
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
                  console.log("Se envio");
                  //Esta funcion vacia los inputs y resetea los radio button
                  restablecer()
                }
              });
            }
            else
            {
              swal({
                title: 'Aviso',
                text: 'Ocurrio un error al momento de eliminar el integrante, contacte con el administrador',
                icon: 'warning',
                button: 'aceptar'
              });
            }
          }
        });
      });
    }
});