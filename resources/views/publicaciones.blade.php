@include('navBar')

@extends('header')


<center style="margin-top: 80px;">
    Welcome {{ ucfirst(Auth()->user()->name ) }}
</center>



<section id="" class="">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="sections">
          
          <div class="card" style="">
            <div class="card-header">
              Publicaciones

                <a class="newPublicacion" href="#" style="float: right;"> 
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-bookmark-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                  </svg>
                </a>

                <a class="listPublicacion" href="#" style="float: right;"> 
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                  <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                </svg>
                </a>
                 
              
            </div>

            <div class="card-body">
              <h5 class="card-title"></h5>
              
              <div class="x_content">
                 <table class="table table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                   <tbody>
                  <?php foreach ($public as $publicacion):?>
                  <tr>
                  <td >{{ $publicacion->id_publications }}</td>
                    <td >{{ $publicacion->pu_titulo }}</td>
                    <td >{{ $publicacion->pu_desc }} </td>
                    <td ><img src="imagenes/{{$publicacion->pu_foto}}" class="img-thumbnail" width="100" height="100"></td> 
                    <td style="width: 0px;"><a class="edit" publica="{{$publicacion->id_publications}}" href="#" data-toggle="modal" data-target="#editaPublicacion" > 
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    </a>
                    <div class="modal fade" id="editaPublicacion" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-lg">

                    <div class="modal-content">
                  
                      <div class="modal-body text-center">

                        <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

                        <div class="card text-center">
                          <div class="card-header">
                           Publicación
                          </div>
                        <div class="card-body">
                          <h5 class="card-title">Editar Publicación</h5>
                          <form method="POST" action="editPublicacion" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" id="formPublicacion2" files="true">
            
                         <input type="hidden" name="_token" id="token"  value="<?= csrf_token(); ?>"> 

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Titulo</label>
                            <input type="text" class="form-control" id="titulo2" placeholder="Ingrese titulo">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Descripción</label>
                            <input type="text" class="form-control" id="descripcion2" placeholder="Ingrese descripción">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="">Foto</label>
                          <input type="file" name="file" class="form-control" id="imgUpload2" accept="image/*">
                        </div>
                        
                        <input type="text" class="form-control" id="id" hidden="">
                      </form>
                      </div>

                       <div id="msj-success2" class="alert alert-success alert-dismissible" role="alert" style="display: none">
                          <strong>Registro Agregado Correctamente.</strong>
                        </div>

                        <div id="msj-danger2" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
                          <strong id="msj">Debe llenar los campos</strong>
                      </div>
                
                    </div>
                    <div class="card-footer text-muted">
                      <button type="button" data-dismiss=modal class="btn btn-default">Cerrar</button>
                      <button type="button" class="btn btn-info" id="updatepublic">Guardar</button>
                    </div>
                </div>

                      
              </div>
            </div>
            </div>
            </td>

            <td>
              <a class="elimina" publicaDel="{{$publicacion->id_publications}}" href="#" data-toggle="modal" data-target="#deletPublicacion" > 
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </a>

              <!-- eliminar modal -->
              <div class="modal fade" id="deletPublicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash-o"></i> Eliminar Publicación</h5>
                                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                
                                  <div class="modal-body">
                                    <div id="eliminados">
                                  
                                    </div> 
                                    
                                  </div>
            
                
                              </div>
                          </div>
                      </div>
              
              
            </td>
                    
              </tr>
            <?php endforeach ?>           
              </tbody>
              </table>

              </div>


              <!-- registro de publicacion -->
            <div class="publicacionesForm" style="display: none;">
              <form method="POST" action="guardaPublicacion" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal" id="formPublicacion" files="true">
            
              <input type="hidden" name="_token" id="token"  value="<?= csrf_token(); ?>"> 

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Titulo</label>
                    <input type="text" class="form-control" id="titulo" placeholder="Ingrese titulo">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" placeholder="Ingrese descripción">
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Foto</label>
                  <input type="file" name="file" class="form-control" id="imgUpload1" accept="image/*">
                </div>

                <input type="text" id="idUs" value="{{ ucfirst(Auth()->user()->id ) }}">
                
                <button type="button" class="btn btn-primary" id="guardapublic">Guardar</button>
              </form>

              </div>

              <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none">
                <strong>Registro Agregado Correctamente.</strong>
              </div>

          <div id="msj-danger" class="alert alert-danger alert-dismissible" role="alert" style="display: none">
            <strong id="msj">Debe llenar los campos</strong>
        </div>









            
            </div>
          </div>

                                
                                 


         </div>
      </div>
    </div>
  </div>
</section>











<!--Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/publicaciones.js"></script>



