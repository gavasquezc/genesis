$("#guardapublic").click(function(){

	var token = $('#token').val();

  	var form = '#formPublicacion';

	var titulo = $("#titulo").val();
	var descripcion = $("#descripcion").val();
  var idUs = $("#idUs").val();


  if ((titulo == "") || (descripcion == "") ) {
    $("#msj-danger").fadeIn(); 
  }else{

  var file_data = $('#imgUpload1').prop('files')[0];
  var archivos = new FormData();
  archivos.append('imgUpload1', file_data);
  archivos.append('titulo',titulo);
  archivos.append('descripcion',descripcion);
  archivos.append('idUs',idUs);

	$.ajax({

    url: $(form).attr('action'),
    type: $(form).attr('method'),

    headers:    {'X-CSRF-TOKEN':token},
    type:       'POST',
    dataType:   'json',
    data: archivos,
   // data: {"_token": "{{ csrf_token() }}",archivos},
    processData: false,
    contentType: false,
    cache       : false,


    success: function(data){
      
    $("#msj-success").fadeIn();
    $("#formPublicacion")[0].reset();
    setTimeout('document.location.reload()',100);
     
    console.log(data);           
    },
    error:function(msj) {

    $('#msj-success').fadeOut();

        }

    });
  }
});



$(".newPublicacion").click(function(){

	$(".publicacionesForm").fadeIn();

	$('.x_content').fadeOut();


});


$(".listPublicacion").click(function(){

	$(".publicacionesForm").fadeOut();

	$('.x_content').fadeIn();

	$('#msj-success').fadeOut();


});



$(".edit").click(function(event){

var id_pu = $(this).attr("publica");

$.get( `obtenerpublic/${id_pu}`, function(response){

	$('#programasupdate').empty();
			response.forEach(element =>{

				$('#titulo2').val(element.pu_titulo)
				$('#descripcion2').val(element.pu_desc)
				$('#id').val(element.id_publications)

		})



})

});



$("#updatepublic").click(function(){

	var token = $('#token').val();

  	var form = '#formPublicacion2';

	var titulo2 = $("#titulo2").val();
	var descripcion2 = $("#descripcion2").val();
	var id = $("#id").val();


  if ((titulo2 == "") || (descripcion2 == "") ) {
    $("#msj-danger2").fadeIn(); 
  }else{

  var file_data = $('#imgUpload2').prop('files')[0];
  var archivos = new FormData();
  archivos.append('imgUpload2', file_data);
  archivos.append('titulo2',titulo2);
  archivos.append('descripcion2',descripcion2);
  archivos.append('id',id);

	$.ajax({

    url: $(form).attr('action'),
    type: $(form).attr('method'),

    headers:    {'X-CSRF-TOKEN':token},
    type:       'POST',
    dataType:   'json',
    data: archivos,
   // data: {"_token": "{{ csrf_token() }}",archivos},
    processData: false,
    contentType: false,
    cache       : false,


    success: function(data){
      
    $("#msj-success2").fadeIn();
    $("#formPublicacion2")[0].reset();
    setTimeout('document.location.reload()',100);
     
    console.log(data);           
    },
    error:function(msj) {

    $('#msj-success2').fadeOut();

        }

    });
  }
});


$(".elimina").click(function(event){

  var id_pu = $(this).attr("publicaDel");

$.get( `obtenerpublic/${id_pu}`, function(response){

  $('#eliminados').empty();
      response.forEach(element =>{

        $("#eliminados").append(` ¿Desea borrar la publicación ${element.pu_titulo}?
          <br><br><br>

          <div class="modal-footer">
            <button type="button" data-dismiss=modal class="btn btn-default">Cerrar</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal" onclick="borrarpublic(${id_pu})"> Eliminar</button>
          </div>
            `)

    })



})

});

function borrarpublic(id_pu){
    var idd = id_pu;
  $.get(`eliminarpublication/${idd}`,function(response){
    if (response == 1) {

       alert("Registro eliminado")

      setTimeout('document.location.reload()',100);
    }
    else{
      alert("error")
    }
  });
}



//$("#comSave").click(function(event){

  function saveComent(){

	var comentario = $('#comentario').val();
	var id_pu = $('#id_pu').val();
	var token = $('#token').val();
  var idUS = $('#idUS').val();

  	if(token == '' ){
    alert('Lo siento existe un error con el token.');
        $('#_token').focus();
        return false;
    }else{
    	varurl = 'guardaComentario';
    	data = {"comentario":comentario,"id_pu":id_pu,"idUS":idUS}
		$.ajax({
			cache: false,
			headers:    {'X-CSRF-TOKEN':token},
			type:       'POST',
			url : varurl,
			datatype:'json',
			data : data,

			success: function(data){

				$("#comentForm")[0].reset();

        if (data == 1) {

          alert("Ya ha comentado esta publicación");

      }else{
          alert("Se envió comentario");
      }

			},

		    error:function(msj) {

		       alert("Error");

		    }

		});

    }

//});
}



$(".verPublicacion").click(function(event){

  var id_pub = $(this).attr("idPublication");

  $('#ultimaPub').fadeOut();

  $('#selecPub').fadeIn();

  var token = $('#token').val();

  $.get(`getPublicacion/${id_pub}`, function(response, id_pub){

    console.log(response); 
    $('#selecPub').empty();

    response.forEach(element=> {

      var foto = element.pu_foto;
      var titulo = element.pu_titulo;
      var desc = element.pu_desc;

      var comentario = element.co_desc;

      if(comentario == null){
      
      var comentario = "No hay comentarios";
      }else{

      var comentario = element.co_desc;
      }
      

      $("#selecPub").append(`


        <div class="" >
          <div class="card border-info" >

            <img class="card-img-top" src="imagenes/${foto}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${titulo}</h5>
                  <p class="card-text">${desc}</p>
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

                  <?php foreach ($publication as $comentarios):?>

                    <div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false" data-parent="accordion">
                      <div class="card-block col-12">
                        <ul class="list-group list-group-flush">

                          <li class="list-group-item">${element.co_desc}</li>
                                
                        </ul>
                      </div>
                    </div>

                    <?php endforeach ?>

                </div>

                    <form method="POST" action="guardaComentario" accept-charset="UTF-8" class="form-horizontal" id="comentForm" files="true">

                    <div class="form-group">
                    <br>
                    <input type="hidden" name="_token" id="token" value="${token}"> 

                    <input type="text" id="id_pu" value="${element.id_publications}" name="id_publ" hidden >

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



            `)  

      });


  });



});







