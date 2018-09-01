  $(document).ready(function() {
    $("#tipo").change(function(){
    
        if($(this).val() == "3")
        { 
          $("#formpatro").show(1000);
        }
        else
        {
          $("#formpatro").hide(0);
        }
      });
  });