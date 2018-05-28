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
                    $('#datos').append('<tr><td>'+nombres+'</td><td>'+apellidos+'</td><td>'+parentesco+'</td><td>'+fecha_nacimiento+'</td><td>'+profesion+'</td><td>' +lugar_trabajo+'</td><td>'+tel_trabajo+
                    '</td><td>'+salario+'</td><td>'/**+grado+'</td><td>'+institucion+'</td><td>'+cuota+'</td></tr>'*/);
                    
                    $('#nombres_inte').val('');
                    $('#apellidos_inte').val('');
                    $('#parentesco').val('');
                    $('#fecha_naci_inte').val('');
                    $('#profesion').val('');
                    $('#lugar_trabajo').val('');
                    $('#tel_trabajo').val('');
                    $('#salario').val('');
                    }
                });
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