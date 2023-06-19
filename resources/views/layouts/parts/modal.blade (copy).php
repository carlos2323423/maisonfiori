<!-- USERS Modal-->
<div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">    
<!-- <div class="modal fade show" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 15px; display: block;" aria-modal="true"> -->
<!-- <div class="modal fade @if ($errors->any()) show @endif" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="@if ($errors->any()) padding-right: 15px; display: block; @endif" aria-modal="@if ($errors->any()) true @endif"> -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">ESTE ES EL USER MODAL?</h5> -->
                <h1 class="h4 text-gray-900 mb-4">Crear un empleado</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.                    
                {{-- 
                    {{ dd(route($route_name.'_registersent')) }}
                    {{ dd($spaces); }}
                --}}
                <form id="register_list_form" class="user" method="POST" action="{{ $accionform }}" enctype="multipart/form-data">
                    @csrf
                    @foreach ($spaces as $space)
                        @if (!in_array($space, ['created_at', 'updated_at', 'id']))
                            @if ($space.'es' === $space)
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="{{ $space }}" type="date" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="ingreso">
                                    </div>
                                </div>
                                @foreach ($array as $propiedad => $valores)
                                    @if ($propiedad === $space.'es')
                                        @include('layouts.parts.dropdown_form')
                                    @endif                                    
                                @endforeach
                            @elseif ($space === 'cargo')
                                @include('layouts.parts.dropdown_form')
                            @elseif ($space === 'nivel')
                                @include('layouts.parts.dropdown_form')                                     
                            @elseif ($space === 'hotel')
                                @include('layouts.parts.dropdown_form')                                     
                            @elseif ($space === 'genero')
                                @include('layouts.parts.dropdown_form')                                     
                            @elseif ($space === 'type')
                                @include('layouts.parts.dropdown_form')                                     
                            @elseif ($space === 'foto')
                                <div class="form-group">
                                    <div>
                                        <div class="d-flex justify-content-center mb-4">
                                            <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="rounded-circle" alt="example placeholder" style="width: 200px;" id="MODAL_id_avatar" />
                                        </div>
                                        <div id="dropzone" class="dropzone">
                                            <p>Arrastre y suelte los archivos aquí o haga clic para seleccionar los archivos</p>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="btn btn-primary btn-rounded" id="foto_imputcontainer">
                                                <label class="form-label text-white m-1" for="MODAL_id_{{ $space }}" onclick="inputfile_restaur('MODAL_id_{{ $space }}')">Choose file</label>
                                                <input name="{{ $space }}" type="file" class="form-control d-none" id="MODAL_id_{{ $space }}" />                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($space === 'password')
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="{{ $space }}" type="password" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="Repeat_MODAL_id_{{ $space }}" placeholder="Repeat Password">
                                    </div>
                                </div>
                            @else
                                <div class="form-group">                                    
                                    <input name="{{ $space }}" type="" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="{{ $space }}" value="{{ old( $space ) }}">
                                </div>
                            @endif

                            {{--
                                @if ($errors->has($space))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first($space) }}</strong>
                                    </span>
                                @endif
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                --}}
                            @error($space)
                            <div>
                                <span class="invalid-feedback" role="alert" style="@if ($errors->any()) display: block; @endif">
                                    <strong>{{ $message }}</strong>
                                </span>
                            </div>                            
                            @enderror

                            <script>
                                console.log("Campo: {{ $space }}");
                                {{--
                                    console.log("Mensaje de error: {{ $message }}");
                                --}}
                            </script>

                        @endif
                    @endforeach
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Register Account') }}
                    </button>
                    <hr>

                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>

                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>                    
                </form>  

                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>

                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>                
                </div>                

            </div>
        </div>        
    </div>
</div>
<!-- END USERS Modal-->