$(document).ready(function() {

    $("#agregar").click(function(){
      
      var nombres = $('#nombres_inte').val();
      var apellidos = $('#apellidos_inte').val();
      var parentesco = $('#parentesco').val();
      var fecha_nacimiento = $('#fecha_naci_inte').val();
      var profesion = $('#profesion').val();
      var lugar_trabajo = $('#lugar_trabajo').val();
      var tel_trabajo = $('#tel_trabajo').val();
      var salario = $('#salario').val();

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
                      parentesco:parentesco, fecha_nacimiento:fecha_nacimiento, 
                      profesion:profesion, 
                      lugar_trabajo:lugar_trabajo, 
                      tel_trabajo:tel_trabajo,
                      salario:salario},
                    success: function()
                    {
                      //Agrega los valores a la tabla
                      $('#datos').append('<tr><td>'+nombres+'</td><td>'+apellidos+'</td><td>'+parentesco+'</td><td>'+fecha_nacimiento+'</td><td>'+profesion+'</td><td>' +lugar_trabajo+'</td><td>'+tel_trabajo+
                      '</td><td class="suma">'+salario+'</td><td>'+grado+'</td><td>'+institucion+'</td><td>'+cuota_inte+'</td></tr>');

                      //Sirve para poner los campos vacios
                      $('#nombres_inte').val('');
                      $('#apellidos_inte').val('');
                      $('#parentesco').val('');
                      $('#fecha_naci_inte').val('');
                      $('#profesion').val('');
                      $('#lugar_trabajo').val('');
                      $('#tel_trabajo').val('');
                      $('#salario').val('');

                      var datos = [];
                      $('td.suma').each(function(){
                        datos.push(parseFloat($(this).text()));
                      });
                      var suma = datos.reduce(function(a,b){return a+b;},0);
                      console.log(datos);
                      console.log(suma);
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
                                //Agrega los valores a la tabla
                                $('#datos').append('<tr><td>'+nombres+'</td><td>'+apellidos+'</td><td>'+parentesco+'</td><td>'+fecha_nacimiento+'</td><td>'+profesion+'</td><td>' +lugar_trabajo+'</td><td>'+tel_trabajo+
                                '</td><td>'+salario+'</td><td>'+grado+'</td><td>'+institucion+'</td><td>'+cuota_inte+'</td></tr>');

                                //Sirve para poner los campos vacios
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
  });