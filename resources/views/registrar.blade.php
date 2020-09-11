<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.css">

</head>

<body>

@if(Session::has('flash_message'))
<div class="col-lg-4" style="margin-left: 78%;" id="hechoReg">
	<div class="alert alert-success" ng-disabled>
	{{Session::get('flash_message')}}
	</div>	
</div>
@endif

<div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-8 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registro</h5>

            <form action="registroUsu" method="POST" id="regForm">
				{{ csrf_field() }}

            <div class="form-label-group">
				<label for="inputName">Nombres</label>
					<input type="text" id="inputName" name="name" class="form-control" placeholder="Ingrese Nombres" autofocus>
						@if ($errors->has('name'))
						<span class="error">{{ $errors->first('name') }}</span>
						@endif       
			</div>
                <br>
            <div class="form-label-group">
				<label for="inputEmail">Correo</label>
					<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Ingrese correo" >
						@if ($errors->has('email'))
						<span class="error">{{ $errors->first('email') }}</span>
						@endif    
			</div> 
				<br>				
			<div class="form-label-group">
				<label for="inputPassword">Contraseña</label>
					<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Ingrese contraseña">
						@if ($errors->has('password'))
						<span class="error">{{ $errors->first('password') }}</span>
						@endif  
			</div>
                <br>
             <button class="btn btn-lg btn-info btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Registrar</button>
				<div class="text-center"> ¿Ya tienes una cuenta?
					<a class="small" href="{{url('login')}}">Inicia sesión</a>
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
		    $("#hechoReg").slideUp(1000);
		 },1500);
	});
		</script>