@extends('header')

@section('contenido')

<nav class="navbar fixed-top navbar-expand-lg navbar-default" style="background-color: #AA66CC;">
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publicaciones">Publicaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<style>

.nav-link{

color:white;

}

</style>
@endsection