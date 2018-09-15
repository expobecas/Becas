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


$('#imagenes').on('change', function(){
  $('#vista').html('');

  imagenes = document.getElementById('imagenes').files;
  navegador = window.URL || window.webkitURL;

  i=0;
  for(i; i<imagenes.length; i++)
  {
    tamaño = imagenes[i].size;
    tipo = imagenes[i].type;
    nombre = imagenes[i].name;

    
    if(tipo == 'image/jpeg' || tipo == 'image/jpg' || tipo == 'image/png' || tipo == 'image/gif')
    {
      url = navegador.createObjectURL(imagenes[i]);
      $('#vista').append('<img src="'+url+'" width="200" heigth="250">');
    }
    else
    {
      console.log('Suba una archivo con formato de imagen(jpg, jpeg, png ó gif)');
    }
  }
});

$('#subir').click(function(){
  //var formData = new FormData($('#imagenes')[0]);

  var data = new FormData();
  $.each($('#imagenes')[0].files, function(i, file){
    data.append('archivo', file);
  });
  console.log(data);
});