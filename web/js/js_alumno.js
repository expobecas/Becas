$(document).ready(function(){
    $('.button-collapse').sideNav({
        menuWidth: 290,
        edge: 'left',
        closeOnClick: true,
        draggable: true,
        onOpen: function(el) { },
        onClose: function(el) { },
    }
  );
  });
  $(document).ready(function(){
    $('ul.tabs').tabs();
  });