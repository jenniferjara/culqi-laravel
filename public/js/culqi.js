 $("#response-panel").hide();
Culqi.publicKey = 'pk_test_q7B2IUAWACxYhnsW';
Culqi.settings({
  title: 'Store',
  currency: 'PEN',
  description: 'Accesorios',
  amount: 100
 });
 $('#miBoton').on('click', function (e) {
      Culqi.open();
      e.preventDefault();
  });


function culqi() {
  if (Culqi.token) {
      $(document).ajaxStart(function(){
        run_waitMe();
      });

      $.ajax({
         type: 'POST',
         url: 'cargo',
         data: { 
          token: Culqi.token.id,
          email: Culqi.token.email
        },
         datatype: 'json',
         success: function(data, status) {
            console.log(data);
            console.log(status);

           if(data.object === 'charge'){
               resultdiv(data.outcome.user_message);
           }
           if(data.object === 'error'){
               resultdiv(data.user_message);
           }
         },
         error: function(error) {
           resultdiv(error)
         }
      });
  } else {
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