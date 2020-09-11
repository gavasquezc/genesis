<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.css">


  </head>

  <body class="">

@if(Session::has('flash_message2'))
<div class="col-lg-4" style="margin-left: 78%;" id="errorLog">
  <div class="alert alert-danger" ng-disabled>
  {{Session::get('flash_message2')}}
  </div>  
</div>
@endif


  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar Sesión</h5>

            <form action="logear" method="POST" id="logForm">
                {{ csrf_field() }}

              <div class="form-label-group">
              <label for="inputEmail">Correo</label>
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ingrese Email" >
              
              @if ($errors->has('email'))
              <span class="error">{{ $errors->first('email') }}</span>
              @endif    
              </div> 
                <br>
              <div class="form-label-group">
              <label for="inputPassword">Contraseña</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Ingrese Contraseña">
                
                @if ($errors->has('password'))
                <span class="error">{{ $errors->first('password') }}</span>
                @endif  
              </div>
                <br>
              <button class="btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
                <div class="text-center">¿No tienes un usuario?
                  <a class="small" href="registrar">Registrate</a>
                </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  </body>
</html>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


<script>
  $(document).ready(function() {
    setTimeout(function() {
        $("#errorLog").slideUp(1000);
     },1500);
  });
</script>
