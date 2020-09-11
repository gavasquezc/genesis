@include('navBar')
<!DOCTYPE html>
<html>
<head>
	<title>Web</title>

	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  	<link href="assets/css/bootstrap.css" rel="stylesheet">

</head>
<body>

<section id="" class="">
    <div class="container">
        
        <div class="col-sm-12">

            <div class="head_title">
                        <h3>Publicaciones</h3>
                        <div class="separator"></div>
            </div>

                <input type="text" id="idUS" value="{{ ucfirst(Auth()->user()->id ) }}" hidden="">
            
            <div class="row">

            	<div class="col-sm-7" id="selecPub" style="display: none;"></div>
                
                    <div class="col-sm-7" id="ultimaPub">

                    	<div class="" >

                    		<div class="card border-info" >


	                    	@foreach($lastPublicacion as $publicar)

	                    	<?php

	                    	$foto = $publicar->pu_foto;
	                    	$titulo = $publicar->pu_titulo;
	                    	$desc = $publicar->pu_desc;

	                    	?>

	                    	@endforeach 

							    <img class="card-img-top" src="imagenes/{{$foto}}" alt="Card image cap">
							    <div class="card-body">
							      <h5 class="card-title">{{$titulo}}</h5>
							      <p class="card-text">{{$desc}}</p>
							    </div>  
							</div>


						<section class="">
					      		<div class="my-auto">
					      
					        		<div id="accordion" role="tablist" aria-multiselectable="true">

					          <!-- Accordion Item 1 -->
						        <div class="card">
						            <div class="card-header" role="tab" id="accordionHeadingOne">
						              <div class="mb-0 row">
						                <div class="col-12 no-padding accordion-head">
						                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne" aria-expanded="false" aria-controls="accordionBodyOne"
						                    class="collapsed ">
						                    <center><h4>Comentarios </h4></center>
						                    
						                    
						                  </a>
						                </div>
						              </div>
						            </div>

					           		<div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false" data-parent="accordion">
						              <div class="card-block col-12">
						                <ul class="list-group list-group-flush">
						                <?php foreach ($lastPublicacion as $publicar){

				                    	$coment = $publicar->co_desc;

				                    	} 

				                    	if ($coment == null) { ?>

				                    		<li class="list-group-item">No hay comentario</li>
				                    		
				                    	<?php }else{
				                    	foreach ($lastPublicacion as $publicar){ ?>

										  <li class="list-group-item">{{$publicar->co_desc}}</li>

										  <?php }
										  } ?>   
										</ul>
						              </div>
						            </div>
						        </div>

						        <form method="POST" action="guardaComentario" accept-charset="UTF-8" class="form-horizontal" id="comentForm" files="true">

						        <div class="form-group">
						        <br>
						        <input type="hidden" name="_token" id="token"  value="<?= csrf_token(); ?>"> 

						        <input type="text" id="id_pu" value="{{$publicar->id_publications}}" name="id_publ" hidden="" >

						        

								    <textarea class="form-control col-11" id="comentario" rows="1" placeholder="Ingrese comentario"></textarea>

								</form>

								<button type="button" class="btn btn-outline-info" style="float: right; margin-top: -43px;" id="comSave" onclick="saveComent()"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
									</svg></button>

								    
								</div>
        						</div>
					    	</section>

						</div>
					</div>

					<div class="col-sm-5" >
						<div class="list-group">
						  	<a href="#" class="list-group-item list-group-item-action active">
						    	Publicaciones
						  	</a>
						  	@foreach($publicacion as $publication)
						  	<a href="#" id="" class="list-group-item list-group-item-action verPublicacion" idPublication="{{$publication->id_publications}}">{{$publication->pu_titulo}}</a>
						  	@endforeach
						</div>
					</div>

               </div>


            </div>

    </div>
</section>




</body>
</html>


<style type="text/css">.row > div{
  background: #f2f2f2;
  padding: 30px;
}</style>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

    <!--Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/publicaciones.js"></script>