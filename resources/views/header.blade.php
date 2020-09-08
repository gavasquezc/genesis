<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="I14KMFPhosSaHwjSeIYEAvpolp6cTkVqYBpYiTov">
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  	<link href="assets/css/bootstrap.css" rel="stylesheet">
  	<meta name="csrf-token" content="{!! csrf_token() !!}">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

<script src="assets/js/jquery.min.js"></script> 

    <script src="assets/js/bootstrap.min.js"></script>

	<title>Web</title>
</head>

<body>
	<div id="contenido">	
		@yield('contenido')
	</div>
</body>

</html>