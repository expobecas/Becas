  $('.button-collapse').sideNav({
      menuWidth: 280, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true, // Choose whether you can drag to open on touch screens,
      onOpen: function(el) {}, 
      onClose: function(el) {}}
  );
  $(document).ready(function() {
    $('select').material_select();
  });

$(document).ready(function(){
    CargarTabla();

    function CargarTabla()
    {
        $.ajax({
            type:'POST',
            url: '../../app/controllers/dashboard/casos/index_controller.php',
            dataType: 'json',
            success: function(casos)
            {
              $('#datos').empty();
              i = 0;
              for(i; i<casos.length; i++)
              {
                
              }
            }
        });         
    }
    

    $('#ver').on('click', '#datos tr', function(e){
        e.preventDefault();

    });
});