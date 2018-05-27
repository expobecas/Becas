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

      console.log(salario);
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
          
        }
      });
    });
  });