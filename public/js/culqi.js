 $("#response-panel").hide();
Culqi.publicKey = 'pk_test_q7B2IUAWACxYhnsW';
Culqi.settings({
  title: 'Store',
  currency: 'PEN',
  description: 'Accesorios',
  amount: 200
 });
 $('#miBoton').on('click', function (e) {
      // Abre el formulario con las opciones de Culqi.configurar
      Culqi.open();
      e.preventDefault();
  });

// Recibimos Token del Culqi.js
function culqi() {
  if (Culqi.token) {
      $(document).ajaxStart(function(){
        run_waitMe();
      });
      // Imprimir Token
      $.ajax({
         type: 'POST',
         url: './cargo',
         data: { 
          token: Culqi.token.id,
          email: Culqi.token.email
        },
         datatype: 'json',
         success: function(data) {

           var result = "";
           var obj = "";

           if(data.constructor === String){
               result = JSON.parse(data);
           }
           if(result.constructor == String){
               obj = JSON.parse(result);
           }

           if(result.object === 'charge'){
              resultdiv(result.outcome.user_message);
           }
           if(obj.object === 'error'){
              resultdiv(obj.merchant_message);
           }
           console.log("cargo");
           console.log(result);
           console.log("error");
           console.log(obj);
         },
         error: function(error) {
           resultdiv(error)
         }
      });
  } else {
    // Hubo un problema...
    // Mostramos JSON de objeto error en consola
    $('#response-panel').show();
    $('#response').html(Culqi.error.merchant_message);
    $('body').waitMe('hide');
  }
};

function run_waitMe(){
  $('body').waitMe({
    effect: 'orbit',
    text: 'Procesando pago...',
    bg: 'rgba(255,255,255,0.7)',
    color:'#28d2c8'
  });
};

function resultdiv(message){
  $('#response-panel').show();
  $('#response').html(message);
  $('body').waitMe('hide');
};