$(document).ready(function() {  

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
                                        },
                                        error: function()
                                        {
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
                    text: 'Ingrese al menos un número de telefóno',
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



    //Para el slider 2
    $("#agregar").click(function(){
      
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
                      salariocoma:salariocoma},
                      success: function()
                      {
                      //Agrega los valores a la tabla
                      $('#datos').append('<tr><td>'+nombres+'</td><td>'+apellidos+'</td><td>'+parentesco+'</td><td>'+fecha_nacimiento+'</td><td>'+profesion+'</td><td>' +lugar_trabajo+'</td><td>'+tel_trabajo+
                      '</td><td class="suma">'+salariocoma+'</td><td>'+grado+'</td><td>'+institucion+'</td><td>'+cuota_inte+'</td></tr>');

                      //Sirve para poner los campos vacios
                      $('#nombres_inte').val('');
                      $('#apellidos_inte').val('');
                      $('#parentesco').val('');
                      $('#fecha_naci_inte').val('');
                      $('#profesion').val('');
                      $('#lugar_trabajo').val('');
                      $('#tel_trabajo').val('');
                      $('#salario').val('');

                      //Para la suma de salarios
                      var datos = [];
                      $('td.suma').each(function () {
                        datos.push(parseFloat($(this).text()));
                      });
                      var suma = datos.reduce(function (a, b) { return a + b; }, 0);

                      console.log(datos);
                      console.log(suma);

                      $('#ingreso_familiar').val(suma);
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

                                //Para sumar los salarios
                                var datos = [];
                                $('td.suma').each(function () {
                                  datos.push(parseFloat($(this).text()));
                                });
                                var suma = datos.reduce(function (a, b) { return a + b; }, 0);

                                console.log(datos);
                                console.log(suma);

                                $('#ingreso_familiar').val(suma);

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