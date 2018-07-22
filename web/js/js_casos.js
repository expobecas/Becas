$(document).ready(function(){
    CargarTabla();
    $('#id_caso').hide(0);

    function CargarTabla()
    {
        $.ajax({
            type:'POST',
            url: '../../app/controllers/dashboard/casos/index_controller.php',
            dataType: 'json',
            success: function(casos)
            {
              $('#casos').empty();
              i = 0;
              for(i; i<casos.length; i++)
              {
                var fila = "";
                alumno = casos[i].primer_apellido +" "+ casos[i].segundo_apellido+', '+casos[i].primer_nombre +' '+ casos[i].segundo_nombre;
                fecha = casos[i].start.split(" ");
                fila = fila.concat(
                    '<tr id="'+casos[i].id_caso+'">',
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
        });         
    }
    
    function ObtenerDatos()
    {
        $('#tablecaso').on('click', '#casos .ver', function(e){
            e.preventDefault();

            id_caso = $(this).parent().parent().attr('id');
            alumno = $(this).parent().parent().children('td:eq(0)').text();
            fecha = $(this).parent().parent().children('td:eq(1)').text();
            estado = $(this).parent().parent().children('td:eq(2)').text();
            descripcion = $(this).parent().parent().children('td:eq(5)').text();
            n_carnet = $(this).parent().parent().children('td:eq(6)').text();

            $('#id').val(id_caso);
            $('#carnet').val(n_carnet);
            $('#alumno').val(alumno);
            $('#fecha').val(fecha);
            $('#descripcion').val(descripcion);

            $('#modalCasos').modal().modal('open');
        });
    }


    $('#eliminar_caso').click(function(){
        id_caso = $('#id').val();
        console.log(id_caso);
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
    });

    
});