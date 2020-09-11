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
            <div class="row">

            	<div class="col-sm-7" id="selecPub" style="background-color: currentColor;"></div>
                
                    <div class="col-sm-7" id="ultimaPub">

                    	<div class="" >

                    		<div class="card border-info" >

                    			<img class="card-img-top" src="imagenes/3.jpg" alt="Card image cap">
						    	<div class="card-body">
						      		<h5 class="card-title">ola</h5>
						      			<p class="card-text">ke ase</p>
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
						                  				<a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne" aria-expanded="false" aria-controls="accordionBodyOne" class="collapsed ">
						                    			<center><h4>Comentarios </h4></center>
						                  				</a>
						                			</div>
						              			</div>
						            		</div>

					           				<div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false" data-parent="accordion">
						              			<div class="card-block col-12">
						                			<ul class="list-group list-group-flush">
						                

				                    		<li class="list-group-item">No hay comentario</li>
				                    		
				                    	  
													</ul>
						              			</div>
						            		</div>
						        		</div>

								        <form method="POST" action="guardaComentario" accept-charset="UTF-8" class="form-horizontal" id="comentForm" files="true">

								        	<div class="form-group">
								        	<br>
								        	<input type="hidden" name="_token" id="token"  value="<?= csrf_token(); ?>"> 

								        	<input type="text" id="id_pu" value="" name="id_publ" hidden="" >

										    <textarea class="form-control col-11" id="comentario" rows="1" placeholder="Ingrese comentario"></textarea>

										</form>

										<button type="button" class="btn btn-outline-info" style="float: right; margin-top: -43px;" id="comSave"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
											</svg>
										</button>
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
						  	
						  	<a href="#" id="" class="list-group-item list-group-item-action verPublicacion" idPublication="">una publicacion</a>
						  	
						</div>
					</div>

               </div>


            </div>

    </div>
</section>






</body>
</html>



  <script src="assets/js/bootstrap.min.js"></script>

    <!--Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/publicaciones.js"></script>