<!-- USERS Modal-->
<div class="modal fade" id="register_userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form id="register_list_form" class="user" method="POST" action="{{ route($route_name.'_registersent') }}" enctype="multipart/form-data">
                @csrf
                @foreach ($spaces as $space)
                    @if ($space !== 'created_at' && $space !== 'updated_at' && $space !== 'id')
                        @if ($space == 'ingreso')
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="{{ $space }}" type="date" class="form-control form-control-user" id="MODAL_id_{{ $space }}"
                                        placeholder="ingreso">
                                    @error($space)
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @elseif ($space == 'genero')
                            <div class="form-group row">                    
                                <div class="col-sm-6">                        
                                    <select name="genero" id="genero" class="dropdown-menu">
                                        <option value="Masculino" class="dropdown-item">Masculino</option>                                
                                        <option value="Femenino" class="dropdown-item">Femenino</option>
                                        <div class="dropdown-divider"></div>
                                        <option value="Otros" class="dropdown-item">Otros</option>                                
                                    </select> 
                                    <div class="btn-group">
                                        <!-- <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Genero
                                        </button> -->
                                        <input class="form-control" list="browsers" name="{{ $space }}" id="MODAL_id_{{ $space }}">
                                        @error($space)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <datalist id="browsers">
                                            <option value="Masculino">
                                            <option value="Femenino">
                                            <option value="Otros">                                                                
                                        </datalist>                                
                                        <!-- <div name="genero" class="dropdown-menu">
                                            <a value="Masculino" class="dropdown-item" href="#">Masculino</a>
                                            <a value="Femenino" class="dropdown-item" href="#">Femenino</a>                                
                                            <div class="dropdown-divider"></div>
                                            <a value="Otros" class="dropdown-item" href="#">Otros</a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>    
                        @elseif ($space == 'foto')
                            <!-- <div class="form-group row">                     -->
                                <div class="form-group">                    
                                    <!--Avatar-->
                                    <div>
                                        <div class="d-flex justify-content-center mb-4">
                                        <img 
                                            src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                            class="rounded-circle" 
                                            alt="example placeholder" 
                                            style="width: 200px;" 
                                            id="MODAL_id_avatar" 
                                        />
                                            <!-- <img src="{{ asset('storage/avatar_img/Xb2bOVqgcW4JyyLClTEzFD7yM41acNTsG10C6C9X.jpg')}}"
                                            class="rounded-circle" alt="example placeholder" style="width: 200px;" id="MODAL_id_avatar" /> -->
                                        </div>
                                        <div id="dropzone" class="dropzone">
                                            <p>Arrastre y suelte los archivos aquí o haga clic para seleccionar los archivos</p>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <div class="btn btn-primary btn-rounded" id="foto_imputcontainer">

                                                <label class="form-label text-white m-1" for="MODAL_id_{{ $space }}" onclick="foto_restaur('MODAL_id_{{ $space }}')">Choose file</label>
                                                <input name="{{ $space }}" type="file" class="form-control d-none" id="MODAL_id_{{ $space }}" />                                                
                                                @error($space)
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        @elseif ($space == 'password')
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="{{ $space }}" type="password" class="form-control form-control-user" id="MODAL_id_{{ $space }}" placeholder="Password">
                                @error($space)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="Repeat_MODAL_id_{{ $space }}" placeholder="Repeat Password">
                            </div>
                        </div>                    

                        @else
                            <div class="form-group">
                                <input name="{{ $space }}" type="" class="form-control form-control-user" id="MODAL_id_{{ $space }}"
                                    placeholder="{{ $space }}">                    
                                @error($space)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>                    
                        @endif
                        
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