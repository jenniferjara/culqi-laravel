<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Culqi Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="waitMe.min.css"/>
  </head>
  <body>
    <div class="container">
      <h1>Culqi PHP - LARAVEL Example</h1>
      <a id="miBoton" class="btn btn-primary" href="#" >Pay</a>
      <br/><br/><br/>
      <div class="panel panel-default" id="response-panel">
        <div class="panel-heading">Response</div>
        <div class="panel-body" id="response">
        </div>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://checkout.culqi.com/v2/"></script>
    <script src="waitMe.min.js"></script>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    <script type="text/javascript" src="js/culqi.js" ></script>
  </body>
</html>