  $(document).ready(function() {
    alert("dentro de la funcion"); //ESTE MENSAJE LO MUESTRA
    $("#tipo").change(function(){
        alert("dentro de la funcion"); //ESTE MENSAJE NO LO MUESTRA
        if($(this).val() == "3")
        { 
          alert("dentro del if");  //ESTE MENSAJE LO MUESTRA
          $("#formpatro").show(1000);
        }
        else
        {
            alert("dentro del else"); //ESTE MENSAJE LO MUESTRA
          $("#formpatro").hide(1000);
        }
      });
  });