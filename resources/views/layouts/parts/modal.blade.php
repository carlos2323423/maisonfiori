<!-- Modal de USUARIOS -->
<div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="h4 text-gray-900 mb-4">Crear un {{ucfirst($name)}}</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    @if ($errors->any())
                        <span aria-hidden="true" onclick="clear_errors()">×</span>
                    @else
                        <span aria-hidden="true" onclick="">×</span>
                    @endif                    
                </button>
            </div>
            <div class="modal-body">
                <p>Selecciona "Cerrar sesión" a continuación si estás listo para finalizar tu sesión actual.</p>                    
                <form id="register_list_form" class="user" method="POST" action="{{ $accionformsent }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($spaces as $space)
                        @php
                            $foundMatch = false;
                        @endphp
                        @if (!in_array($space, ['created_at', 'updated_at', 'id']))
                            @foreach ($list_options as $propiedad => $valores)
                                @if ($propiedad === $space.'es')
                                    @include('layouts.parts.dropdown_form')
                                    @php
                                        $foundMatch = true;
                                    @endphp
                                @endif                                    
                            @endforeach
                            @if (!$foundMatch)
                                @switch($space)                                    
                                    @case('ingreso')
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input name="{{ $space }}" type="date" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="Fecha de ingreso" value="{{ old( $space ) }}">
                                            </div>
                                        </div>
                                        @break
                                    @case('foto')
                                        <div class="form-group">
                                            <div>
                                                <div class="d-flex justify-content-center mb-4">                                                                                                    
                                                    <img src="{{ old('imageuser') ? old('imageuser') : $imageuser }}" class="rounded-circle" alt="ejemplo de avatar" style="width: 200px;" id="MODAL_id_avatar" />                                                                                                        
                                                </div>
                                                <div id="dropzone" class="dropzone">
                                                    <p>Arrastra y suelta los archivos aquí o haz clic para seleccionar los archivos</p>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="btn btn-primary btn-rounded" id="foto_imputcontainer">
                                                        <label class="form-label text-white m-1" for="MODAL_id_{{ $space }}" onclick="inputfile_restaur('MODAL_id_{{ $space }}')">Seleccionar archivo</label>
                                                        <input name="{{ $space }}" type="file" class="form-control d-none" id="MODAL_id_{{ $space }}" />                                                                                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @break        
                                    @case('password')
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input name="{{ $space }}" type="password" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="Contraseña" value="{{ old( $space ) }}">
                                            </div>
                                            <div class="col-sm-6">                                                                                                
                                                <input name="password_confirmation" type="password" class="form-control form-control-user" id="Repeat_MODAL_id_{{ $space }}" placeholder="Repetir contraseña" value="{{ old('password_confirmation') }}">
                                            </div>
                                        </div>
                                        @break 
                                    @default
                                        <div class="form-group">                                    
                                            <input name="{{ $space }}" type="" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="{{ $space }}" value="{{ old( $space ) }}">
                                        </div>
                                        @break                           
                                @endswitch                                        
                            @endif
                            @error($space)
                                <div style="display: flex; justify-content: center;">
                                    <div>
                                        <span class="invalid-feedback" role="alert" style="display: block; text-align: center;">
                                            <strong>{{ $message }}</strong>                                        
                                        </span>
                                        </div>
                            </div>                                
                        @enderror                            
                    @endif
                @endforeach
                <button type="submit" class="btn btn-primary btn-user btn-block">                    
                    {{ __('Registrar') . ' ' . ucfirst($name) }}

                </button>
                <hr>
                @if ($register_buttons == true)
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Registrarse con Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Registrarse con Facebook
                    </a>                    
                @endif
            </form>  
            <div class="text-center">
                <a class="small" href="forgot-password.html">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center">
                <a class="small" href="login.html">¿Ya tienes una cuenta? ¡Inicia sesión!</a>                
            </div>                
        </div>
    </div>        
</div>