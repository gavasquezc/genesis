$("#guardapublic").click(function(){

	var token = $('#token').val();

  	var form = '#formPublicacion';

	var titulo = $("#titulo").val();
	var descripcion = $("#descripcion").val();


  if ((titulo == "") || (descripcion == "") ) {
    $("#msj-danger").fadeIn(); 
  }else{

  var file_data = $('#imgUpload1').prop('files')[0];
  var archivos = new FormData();
  archivos.append('imgUpload1', file_data);
  archivos.append('titulo',titulo);
  archivos.append('descripcion',descripcion);

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
     
    console.log(data);           
    },
    error:function(msj) {

    $('#msj-success2').fadeOut();

        }

    });
  }
});