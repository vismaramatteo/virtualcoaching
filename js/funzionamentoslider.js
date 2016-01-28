$(document).ready(function() {
          $("#slider").slider({
              range: "min",
              animate: false,
              value:0,
              min: 0,
              max: 100,
              step: 10,
              slide: function(event, ui) {
              
                update(1,ui.value); //changed
              }
             
          });

          $("#slider2").slider({
              range: "min",
              animate: false,
              value:0,
              min: 0,
              max: 100,
              step: 10,
              slide: function(event, ui) {
              	
                update(2,ui.value); //changed
              }
          });
		  
		   $("#slider3").slider({
              range: "min",
              animate: false,
              value:0,
              min: 0,
              max: 100,
              step: 10,
              slide: function(event, ui) {
              	
                update(3,ui.value); //changed
                }
          });

          //Added, set initial value.
          $("#amount").val(0);
          $("#duration").val(0);
		  $("#fondamentali").val(0);
          $("#amount-label").text(0);
          $("#duration-label").text(0);
		  $("#fondamentali-label").text(0);
          
          update();
      });

      //changed. now with parameter
      function update(slider,val) {
        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)
        var $amount = slider == 1?val:$("#slider").slider( "value" );
        var $duration = slider == 2?val:$("#slider2").slider( "value" );
		var $fondamentali = slider == 3?val:$("#slider3").slider( "value" );
		var $total = $amount +  $duration + $fondamentali;
        
        
		var PrimoNome,SecondoNome;
        if( slider == 1)
        {
        	PrimoNome="#slider2";
            SecondoNome="#slider3";
        }
        else if( slider == 2)
        {
        	PrimoNome="#slider";
            SecondoNome="#slider3";
        }
        else
        {
        	PrimoNome="#slider";
            SecondoNome="#slider2";
        }
        
        if($(PrimoNome).slider( "value" ) < $(SecondoNome).slider( "value" ))
        {
        	var temp;
        	temp=PrimoNome;
            PrimoNome=SecondoNome;
            SecondoNome=temp;
        }
		
		//var fatto=false;
        
 		if($total>100)
        {
        	var t= $total-100;
            if($(PrimoNome).slider( "value" )>=t)
            {
				$(PrimoNome).slider( "value",$(PrimoNome).slider( "value" )-t );
                fatto=true;
                update(1,ui.value);
                update(2,ui.value);
                update(3,ui.value);
            }
            else
            {
             	t=t-$(PrimoNome).slider( "value" );
                $(PrimoNome).slider( "value",0);
                update(1,ui.value);
                update(2,ui.value);
                update(3,ui.value);
            }
            
    /*        
            if(!fatto)
            {
                if($(SecondoNome).slider( "value" )>=t)
                {
                    $(SecondoNome).slider( "value",$(SecondoNome).slider( "value" )-t );
                    fatto=false;
                    update(1,ui.value);
                    update(2,ui.value);
                    update(3,ui.value);
                }
                else
                {
                    $(SecondoNome).slider( "value",0);
                    fatto=false;
                    update(1,ui.value);
                    update(2,ui.value);
                    update(3,ui.value);
                }
            }
  */          
        }

		
        /* commented
        $amount = $( "#slider" ).slider( "value" );
        $duration = $( "#slider2" ).slider( "value" );
         */

         $( "#amount" ).val($amount);
         $( "#amount-label" ).text($amount);
         $( "#duration" ).val($duration);
         $( "#duration-label" ).text($duration);
         $( "#fondamentali" ).val($fondamentali);
         $( "#fondamentali-label" ).text($fondamentali);

         $('#slider a ').html($amount);
         $('#slider2 a ').html($duration);
		 $('#slider3 a ').html($fondamentali);
      }